<?php

namespace App\Controller;

use App\Document\DocAnimal1;
use App\Document\DocAnimal2;
use App\Entity\Habitats;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AnimalsController extends AbstractController
{
    #[Route('/animals', name: 'app_animals')]
    public function index(EntityManagerInterface $entityManager, DocumentManager $dm): Response
    {
        $habitats = $entityManager->getRepository(Habitats::class)->findAll();

        // Préchargement des animaux pour chaque habitat
        foreach ($habitats as $habitat) {
            $entityManager->initializeObject($habitat);
            $habitat->getAnimals()->toArray(); // Force le chargement des animaux
        }

        $animalDocuments = [
            'loulou' => DocAnimal2::class,
            'celi' => DocAnimal2::class,
            'coco' => DocAnimal2::class,
            'coco2' => DocAnimal2::class,
            'hector' => DocAnimal2::class,
            'zaza' => DocAnimal2::class,
            'joseph' => DocAnimal2::class,
            'sophie' => DocAnimal2::class,
            'leo' => DocAnimal2::class, 
        ];

        $viewCounts = [];
        foreach ($animalDocuments as $animalName => $documentClass) {
            $repository = $dm->getRepository($documentClass);
            $pageView = $repository->findOneBy(['page' => $animalName]);
            $viewCounts[$animalName . 'Count'] = $pageView ? $pageView->getViewCount() : 0;
        }

        return $this->render('animals/index.html.twig', [
            'habitats' => $habitats,
            'viewCounts' => $viewCounts,
        ]);
    }
}