<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LearningController extends AbstractController
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }
    /**
     * @Route("/show", name="showMyName")
     */
    public function index(): Response
    {
        $session = $this->requestStack->getSession();


        return $this->render('learning/index.html.twig', [
            'controller_name' => 'showMyName',
            'name' => $session->get('name'),
        ]);
    }

    /**
     * @Route("/change", name="changeMyName")
     */
    public function changeMyName(Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('name', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Change name'])
            ->getForm();

        $name = "Unknown";

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();
            $name = $task['name'];
            $session = $this->requestStack->getSession();
            $session->set('name', $name);
            return $this->redirectToRoute('showMyName');
        }

        return $this->render('learning/changename.html.twig', [
            'form' => $form->createView(),
            'name' => $name
        ]);


    }

    /**
     * @Route("/learning/about-becode", name="learning_aboutme")
     */
    public function aboutMe(): Response
    {
        $session = $this->requestStack->getSession();

        if ($session->get('name') === "Unknown"){

            $response = $this->forward('App\Controller\LearningController::changeMyName', [
            ]);

            return $response;
        }

        return $this->render('learning/aboutme.html.twig', [
            'controller_name' => 'LearningController',
            'name' => $session->get('name'),
            'date'=> date("Y/m/d"),
        ]);


    }
}
