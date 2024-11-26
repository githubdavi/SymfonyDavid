<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Subscription;
use App\Entity\User;
use App\Repository\MediaRepository;
use Doctrine\ORM\Query\Expr\GroupBy;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route(path: '/', name: 'page_home')]
    public function accueil(MediaRepository $mediaRepository)
    {   
        $medias=$mediaRepository->findPopular(MaxResults: 9);
        return $this->render('index.html.twig');
    }

    public function findPopular(int $MaxResults) {
        
    // return $this->createQueryBuilder(alias:'m')
    //     ->leftJoin(join:'m.watchHistories',alias:'wh')
    //     ->groupBy(groupBy:'m.id')
    //     ->getQuery()
    //     ->getResult();
    // }
}
