<?php

namespace App\Controller;

use App\Entity\Troc;
use App\Entity\User;
use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{
    /**
     * @Route("/user/{id}", name="user")
     * @param $id
     * @return Response
     */
    public function afficherUser($id)
    {
        $em = $this->getDoctrine()->getRepository(User::class);
        return $this->render('user.html.twig', [
            'user'=> $em->find($id),
            'id' => $id,
        ]);
    }

    /**
     * @Route("/users", name="users")
     * @return Response
     */
    public function afficherUsers()
    {
        $em = $this->getDoctrine()->getRepository(User::class);
        return $this->render('users.html.twig', [
                'users' => $em->findAll(),
        ]);
    }
}
