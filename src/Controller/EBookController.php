<?php

namespace App\Controller;

use App\Entity\EBook;
use App\Entity\EBookSearch;
use App\Form\EBookFormType;
use App\Form\EBookSearchFormType;
use App\Repository\EBookRepository;
use App\Repository\TeacherRepository;
use App\Tools\UploadFile;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\EventListener\AbstractSessionListener;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Routing\Annotation\Route;

class EBookController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    /**
     * EBookController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/e/book", name="e_books")
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @param EBookRepository $repository
     * @return Response
     */
    public function all_books(PaginatorInterface $paginator, Request $request, EBookRepository $repository): Response
    {
        $search = new EBookSearch();
        $form = $this->createForm(EBookSearchFormType::class, $search);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $pagination = $paginator->paginate(
                $repository->findSearchByQuery($search),
                $request->query->getInt('page', 1),
                12
            );
            return $this->render('e_book/e_books.html.twig', [
                'pagination'=>$pagination,
                'form_search' => $form->createView()
            ]);
        }
        $pagination = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1),
            12
        );
        $response = $this->render('e_book/e_books.html.twig', [
            'pagination'=>$pagination,
            'form_search' => $form->createView()
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
     * @Route("/e/book/{column}-{filter}", name="ebook_filter")
     * @param string $column
     * @param string $filter
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @param EBookRepository $repository
     * @return Response
     */
    public function ebook_filter(string $column, string $filter, Request $request, PaginatorInterface $paginator, EBookRepository $repository):Response{
        $search = new EBookSearch();
        $form = $this->createForm(EBookSearchFormType::class, $search);
        $pagination = $paginator->paginate(
            $repository->findByQuery($column, $filter),
            $request->query->getInt('page', 1),
            15
        );

        return $this->render('e_book/e_books.html.twig', [
            'pagination'=>$pagination,
            'form_search' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @param EBookRepository $repository
     * @return Response
     * @Route("/e/book/search_ebook", name="search_ebook")
     */
    public function ebook_search(Request $request, PaginatorInterface $paginator, EBookRepository $repository):Response{
        $search = new EBookSearch();
        $form = $this->createForm(EBookSearchFormType::class, $search);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $pagination = $paginator->paginate(
                $repository->findSearchByQuery($search),
                $request->query->getInt('page', 1),
                15
            );

            return $this->render('e_book/e_books.html.twig', [
                'pagination'=>$pagination,
                'form_search' => $form->createView()
            ]);
        }
        return $this->render('e_book/e_books.html.twig', [
            'form_search' => $form->createView()
        ]);
    }
    /**
     * @param Request $request
     * @param NotifierInterface $notifier
     * @param string $ebook_file_dir
     * @return Response
     * @Route("/e/book/new_ebook", name="new_ebook")
     * @throws Exception
     * @IsGranted("ROLE_USER")
     */
    public function new_ebook(Request $request, NotifierInterface $notifier, string $ebook_file_dir):Response{
        $ebook = new EBook();
        $form = $this->createForm(EBookFormType::class, $ebook);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $ebook->setCreatedAt(new \DateTime('now'));
            $uploadFile = new UploadFile();
            $filename = $uploadFile->loadEbookSubjectFile($form, $ebook_file_dir, $ebook->getSlug());
            $ebook->setFilename($filename);

            $this->entityManager->persist($ebook);
            $this->entityManager->flush();
            $notifier->send(new Notification("Merci pour votre contribution !", ['browser']));
            return $this->redirectToRoute('e_books');
        }

        return $this->render('e_book/new_ebook.html.twig', [
            'form'=>$form->createView()
        ]);
    }
}
