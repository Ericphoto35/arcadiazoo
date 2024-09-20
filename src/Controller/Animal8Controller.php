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
use App\Document\DocAnimal2;

class Animal8Controller extends AbstractController
{
    private $security;

    public function __construct(SecurityBundleSecurity $security)
    {
        $this->security = $security;
    }

    #[Route('/coco2', name: 'app_coco2')]
    public function index(EntityManagerInterface $EntityManager,DocumentManager $dm ): Response
    {
        $pageViewRepository = $dm->getRepository(DocAnimal2::class);
        $pageView = $pageViewRepository->findOneBy(['page' => 'coco2']);
        if (!$pageView) {
            $pageView = new DocAnimal2();
            $pageView->setPage('coco2');
        }
        $pageView->incrementViewCount();
        $dm->persist($pageView);
        $dm->flush();

        $animal = $EntityManager->getRepository(Animals::class)->findOneBy(['prenomani' => 'coco2']);

        return $this->render('animals/animal8.html.twig', [
            'animals' => $animal,
            'viewCoco2Count' => $pageView->getViewCount(),
        ]);
    }
}

