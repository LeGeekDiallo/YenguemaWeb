<?php

namespace App\Controller;

use App\Entity\Teacher;
use App\Entity\TeacherSearch;
use App\Entity\User;
use App\Form\TeacherFomType;
use App\Form\TeacherSearchFomType;
use App\Repository\TeacherRepository;
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

class TeacherController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    /**
     * TeacherController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/teacher/new_teacher/{slug}-{id}", name="new_teacher", requirements={"id"="\d+", "slug"="[a-zA-z0-9\-]*"})
     * @param Request $request
     * @param User $user
     * @param NotifierInterface $notifier
     * @return Response
     */
    public function new_teacher(Request $request, User $user, NotifierInterface $notifier): Response
    {
        $teacher = new Teacher();
        $form = $this->createForm(TeacherFomType::class, $teacher);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $teacher->setCreatedAt(new \DateTime('now'))
                ->setUser($user);
            $this->entityManager->persist($teacher);
            $this->entityManager->flush();
            $notifier->send(new Notification("Votre annonce de cours a bien été ajoutée !", ['browser']));

            return $this->redirectToRoute('profile');
        }
        return $this->render('teacher/new_teacher.html.twig', [
            'form'=>$form->createView(),
        ]);
    }

    /**
     * @Route("/teacher/all_teachers", name="all_teachers")
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @param TeacherRepository $repository
     * @return Response
     */
    public function all_teachers(PaginatorInterface $paginator, Request $request, TeacherRepository $repository):Response{
        $search = new TeacherSearch();
        $form = $this->createForm(TeacherSearchFomType::class, $search);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $pagination = $paginator->paginate(
                $repository->findSearchByQuery($search),
                $request->query->getInt('page', 1),
                12
            );
            return $this->render('/teacher/all_teachers.html.twig', [
                'pagination'=>$pagination,
                'form_search' => $form->createView()
            ]);
        }
        $pagination = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1),
            12
        );
        return $this->render('/teacher/all_teachers.html.twig', [
            'pagination'=>$pagination,
            'form_search' => $form->createView()
        ]);
    }

    /**
     * @Route("/teacher/teacher_details/{id}-{slug}", name="teacher_details", requirements={"slug"="[a-zA-z0-9\-]*"})
     * @param Teacher $teacher
     * @return Response
     */
    public function teacher_details(Teacher $teacher):Response{
        return $this->render('teacher/teacher_details.html.twig', [
            'teacher'=>$teacher
        ]);
    }

    /**
     * @Route("/teacher/course_ad_delete/{id}", name="course_ad_delete", requirements={"id"="\d+"})
     * @param Teacher $teacher
     * @param Request $request
     * @param NotifierInterface $notifier
     * @return Response
     */
    public function course_ad_delete(Teacher $teacher, Request $request, NotifierInterface $notifier):Response{
        if($this->isCsrfTokenValid('delete'.$teacher->getId(), $request->get('_token'))){
            $this->entityManager->remove($teacher);
            $this->entityManager->flush();
            $notifier->send(new Notification("Votre annonce a bien été supprimée !", ['browser']));
            return $this->redirectToRoute('profile');
        }
        return $this->redirectToRoute('profile');
    }

    /**
     * @Route("/teacher/course_ad_edit/{slug}-edit-{id}", name="course_ad_edit", requirements={"id"="\d+", "slug"="[a-zA-z0-9\-]*"})
     * @param Teacher $teacher
     * @param Request $request
     * @param NotifierInterface $notifier
     * @return Response
     */
    public function course_ad_edit(Teacher $teacher, Request $request, NotifierInterface $notifier):Response{
        $form = $this->createForm(TeacherFomType::class, $teacher);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->entityManager->flush();
            $notifier->send(new Notification("Votre annonce a bien été modifiée !", ['browser']));
            return $this->redirectToRoute('profile');
        }
        return $this->render('teacher/course_ad_edit.html.twig', [
            'form'=>$form->createView()
        ]);
    }

    /**
     * @Route("/teacher/all_teachers/{column}-{filter}", name="teacher_filter")
     * @param string $column
     * @param string $filter
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @param TeacherRepository $repository
     * @return Response
     */
    public function teacher_filter(string $column, string $filter, Request $request, PaginatorInterface $paginator, TeacherRepository $repository):Response{
        $search = new TeacherSearch();
        $form = $this->createForm(TeacherSearchFomType::class, $search);
        $pagination = $paginator->paginate(
            $repository->findByQuery($column, $filter),
            $request->query->getInt('page', 1),
            15
        );
        $response = $this->render("teacher/all_teachers.html.twig", [
            'pagination'=>$pagination,
            'form_search'=>$form->createView()
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
}
