<?php

namespace App\Controller;

use App\Entity\Troc;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("", name="home")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getRepository(Troc::class);
        return $this->render('trocs.html.twig', [
            'trocs' => $em->findAll(),
        ]);
    }

    public function navBar()
    {
        return $this->render('header.html.twig', [

        ]);
    }
}
