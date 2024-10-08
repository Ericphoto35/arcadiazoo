<?php

namespace App\Controller;

use App\Document\DocAnimal1;
use App\Document\DocAnimal2;
use App\Entity\Animals;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\SecurityBundle\Security as SecurityBundleSecurity;
use Doctrine\ODM\MongoDB\DocumentManager;


class Animal5Controller extends AbstractController
{
    private $security;

    public function __construct(SecurityBundleSecurity $security)
    {
        $this->security = $security;
    }

    #[Route('/zaza', name: 'app_zaza')]
    public function index(EntityManagerInterface $EntityManager,DocumentManager $dm ): Response
    {
        $pageViewRepository = $dm->getRepository(DocAnimal2::class);
        $pageView = $pageViewRepository->findOneBy(['page' => 'zaza']);
        if (!$pageView) {
            $pageView = new DocAnimal2();
            $pageView->setPage('zaza');
        }
        $pageView->incrementViewCount();
        $dm->persist($pageView);
        $dm->flush();

        $animal = $EntityManager->getRepository(Animals::class)->findOneBy(['prenomani' => 'zaza']);

        return $this->render('animals/animal5.html.twig', [
            'animals' => $animal,
            'viewZazaCount' => $pageView->getViewCount(),
        ]);
    }
}

