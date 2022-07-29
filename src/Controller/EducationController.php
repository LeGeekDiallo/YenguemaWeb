<?php

namespace App\Controller;

use App\Entity\TeacherSearch;
use App\Form\TeacherSearchFomType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EducationController extends AbstractController
{
    /**
     * @Route("/education", name="education")
     */
    public function index(): Response
    {
        $search = new TeacherSearch();
        $form = $this->createForm(TeacherSearchFomType::class, $search);
        return $this->render('education/index.html.twig', [
            'form_search' => $form->createView(),
        ]);
    }

}
