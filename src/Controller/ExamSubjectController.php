<?php

namespace App\Controller;

use App\Entity\ExamSubject;
use App\Entity\ExamSubjectSearch;
use App\Form\ExamSubjectFormType;
use App\Form\ExamSubjectSearchFormType;
use App\Repository\ExamSubjectRepository;
use App\Tools\UploadFile;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\EventListener\AbstractSessionListener;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Routing\Annotation\Route;

class ExamSubjectController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    /**
     * ExamSubjectController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/exam/subject", name="exam_subject")
     * @param Request $request
     * @param ExamSubjectRepository $repository
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function index(Request $request, ExamSubjectRepository $repository, PaginatorInterface $paginator): Response
    {
        $search = new ExamSubjectSearch();
        $form = $this->createForm(ExamSubjectSearchFormType::class, $search);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $pagination = $paginator->paginate(
                $repository->findSearchByQuery($search),
                $request->query->getInt('page', 1),
                15
            );

            return $this->render('exam_subject/index.html.twig', [
                'pagination'=>$pagination,
                'form_search' => $form->createView()
            ]);
        }
        $response = $this->render('exam_subject/index.html.twig', [
            'form_search' => $form->createView(),
            'pagination'=>false
        ]);
        $response->headers->set(AbstractSessionListener::NO_AUTO_CACHE_CONTROL_HEADER, true);
        $response->setCache([
            'max_age'=>3600,
            's_maxage'=>3600,
            'immutable'=>true,
            'last_modified'=>new \DateTime(),
        ]);
        return $response;
    }

    /**
     * @param NotifierInterface $notifier
     * @param Request $request
     * @param string $ebook_file_dir
     * @return Response
     * @Route("/exam/subject/new_exam_subject", name="new_exam_subject")
     * @IsGranted("ROLE_USER")
     */
    public function new_exam_subject(NotifierInterface $notifier, Request $request, string $ebook_file_dir):Response{
        $exam_subject = new ExamSubject();
        $form = $this->createForm(ExamSubjectFormType::class, $exam_subject);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $exam_subject->setCreatedAt(new \DateTime('now'));
            $uploadFile = new UploadFile();
            $filename = $uploadFile->loadEbookSubjectFile($form, $ebook_file_dir, $exam_subject->getSlug());
            $exam_subject->setFilename($filename);
            $this->entityManager->persist($exam_subject);
            $this->entityManager->flush();
            $notifier->send(new Notification("Merci pour votre contribution !", ['browser']));
            return $this->redirectToRoute('exam_subject');
        }
        return $this->render('exam_subject/new_exam_subject.html.twig', [
            'form'=>$form->createView()
        ]);
    }
}
