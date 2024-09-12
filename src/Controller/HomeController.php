<?php

namespace App\Controller;

use App\Entity\AvisVisiteurs;
use App\Entity\Habitats;
use App\Entity\HorairesZoo;
use App\Entity\Services;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(EntityManagerInterface $EntityManager): Response 
    {
        $service = $EntityManager->getRepository(Services::class)->findAll();
        $habitat = $EntityManager->getRepository(Habitats::class)->findAll();
        $avisvisiteur = $EntityManager->getRepository(AvisVisiteurs::class)->findAll();
        $horairezoo = $EntityManager->getRepository(HorairesZoo::class)->findOneBy([]);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'services' => $service,
            'habitats' => $habitat,
            'avisvisiteurs' => $avisvisiteur,
            'horaireszoo' => $horairezoo,
        ]);
    }
}
