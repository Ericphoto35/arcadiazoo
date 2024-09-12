<?php

namespace App\Controller;

use App\Entity\Services;
use App\Repository\ServicesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/services', name: 'api_services_crud_')]
class ServicesApiController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $manager,
        private ServicesRepository $repository,
        private SerializerInterface $serializer,
        
    ) {
    }
    #[Route('/{id}', name: 'show', methods: 'GET')]
    public function show(int $id,EntityManagerInterface $entityManager,): Response
    {
        $services = $entityManager->getRepository(Services::class)->findOneBy(['id' => $id]);
        if ($services) {
            $responseData= $this->serializer->serialize($services, 'json');
            return new JsonResponse($responseData, Response::HTTP_OK, [], true);
        }
        return new JsonResponse(null, Response::HTTP_NOT_FOUND);
    } 
    public function index(): JsonResponse
    {
        return new JsonResponse([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ServicesCrudController.php',
        ]);
    }   
}
