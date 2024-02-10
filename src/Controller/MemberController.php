<?php

namespace App\Controller;

use App\Entity\Member;
use App\Repository\BuildingRepository;
use App\Repository\MarketingRepository;
use App\Repository\MemberRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api')]
class MemberController extends AbstractController
{

    public function __construct(
        private MemberRepository $repoMember,
        private SerializerInterface $serializer,
        private MarketingRepository $repoMarketing,
        private BuildingRepository $repoBuilding,
        private EntityManagerInterface $em
    )
    {
    }

    #[Route('/members', name: 'app_member')]
    public function readAll(Request $request,SerializerInterface $serializer): Response
    {
        $marketings = $this->repoMember->findAll();
        //dd($marketings);
        $responseData = $serializer->serialize($marketings, 'json');
        //dd($responseData);
        return $this->json($responseData);
    } 
    #[Route('/members/create', name: 'member.add')]
    public function add(Request $request,SerializerInterface $serializer) : JsonResponse
    {

        $member = new Member();
        
        $jsonData = json_decode($request->getContent());
        $hisFunction = $jsonData->hisFunction;
        $fPhone = $jsonData->fPhone;
        $mPhone = $jsonData->mPhone;
        $sPhone = $jsonData->sPhone;
        $email = $jsonData->email;
        $linkedIn = $jsonData->linkedIn;
        $marketing = $this->repoMarketing->find(intval($jsonData->marketing));
        $building = $this->repoBuilding->find(intval($jsonData->building));

        $member = new Member();
        $member->setHisFunction($hisFunction);
        $member->setSTel($sPhone);
        $member->setFTel($fPhone);
        $member->setMTel($mPhone);
        $member->setEmail($email);
        $member->setLinkedIn($linkedIn);
        $member->setBuilding($building);
        $member->setMarketing($marketing);

        $this->em->persist($member);
        $this->em->flush();

        return new JsonResponse([
            'message' => 'Member ajouter avec succès !',
            'status' => 'success',
            201
        ]);
    }
}