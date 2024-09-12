<?php

namespace App\Controller;

use App\Entity\Animals;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\SecurityBundle\Security as SecurityBundleSecurity;
use Doctrine\ODM\MongoDB\DocumentManager;
use App\Document\DocAnimal1;

class Animal9Controller extends AbstractController
{
    private $security;

    public function __construct(SecurityBundleSecurity $security)
    {
        $this->security = $security;
    }

    #[Route('/Joseph', name: 'app_joseph')]
    public function index(EntityManagerInterface $EntityManager,DocumentManager $dm ): Response
    {
        $pageViewRepository = $dm->getRepository(DocAnimal1::class);
        $pageView = $pageViewRepository->findOneBy(['page' => 'joseph']);
        if (!$pageView) {
            $pageView = new DocAnimal1();
            $pageView->setPage('joseph');
        }
        $pageView->incrementViewCount();
        $dm->persist($pageView);
        $dm->flush();

        $animal = $EntityManager->getRepository(Animals::class)->findOneBy(['prenomani' => 'joseph']);

        return $this->render('animals/animal9.html.twig', [
            'animals' => $animal,
            'viewJosephCount' => $pageView->getViewCount(),
        ]);
    }
}

