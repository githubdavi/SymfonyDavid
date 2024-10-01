<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthController extends AbstractController
{

    #[Route('/login', name: 'login')]
    public function login(): Response
    {
        return $this->render('auth/login.html.twig');
    }

    #[Route('/abonnements', name: 'abonnements')]
    public function register(): Response
    {
        return $this->render('auth/abonnements.html.twig');
    }

    #[Route('/reset', name: 'reset')]
    public function resetPassword(): Response
    {
        return $this->render('auth/reset.html.twig');
    }
}
