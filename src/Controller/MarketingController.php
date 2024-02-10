<?php

namespace App\Controller;

use App\Repository\MarketingRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api')]
class MarketingController extends AbstractController
{
    private $repoMarketing;

    public function __construct(MarketingRepository $repoMarketing)
    {
        $this->repoMarketing = $repoMarketing;
    }

    #[Route('/marketings', name: 'app_marketing')]
    public function readAll(Request $request,SerializerInterface $serializer): Response
    {
        $marketings = $this->repoMarketing->findAll();
        //dd($marketings);
        $responseData = $serializer->serialize($marketings, 'json');

        return $this->json($responseData);
    } 
}
