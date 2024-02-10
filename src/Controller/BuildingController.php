<?php

namespace App\Controller;

use App\Repository\BuildingRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api')]
class BuildingController extends AbstractController
{   
    private $repoBuilding;

    public function __construct(
        BuildingRepository $repoBuilding
    )
    {
        $this->repoBuilding = $repoBuilding;
    }

    #[Route('/buildings', name: 'app_building')]
    public function readAll(Request $request,SerializerInterface $serializer): Response
    {
        $buildings = $this->repoBuilding->findAll();
        //dd($buildings);
        $responseData = $serializer->serialize($buildings, 'json');

        return $this->json($responseData);
    }
}
