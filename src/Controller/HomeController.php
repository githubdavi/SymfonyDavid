<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Subscription;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
<<<<<<< HEAD
    #[Route(path: '/', name: 'page_hello')]
    public function accueil()
    {
        return $this->render('index.html.twig');
=======
    #[Route('/home', name: 'app_home')]
    public function accceuil(): Response
    {
         return $this->render('index.html.twig');
>>>>>>> a52e1e2a17f6414666b4fc16cfd652e69e853778
    }
}
