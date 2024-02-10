<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\MemberRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MemberRepository::class)]
class Member
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $hisFunction = null;

    #[ORM\Column(length: 255)]
    private ?string $sTel = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fTel = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mTel = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $linkedIn = null;

    #[ORM\ManyToOne(inversedBy: 'members')]
    private ?Marketing $marketing = null;

    #[ORM\ManyToOne(inversedBy: 'members')]
    private ?Building $building = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHisFunction(): ?string
    {
        return $this->hisFunction;
    }

    public function setHisFunction(string $hisFunction): static
    {
        $this->hisFunction = $hisFunction;

        return $this;
    }

    public function getSTel(): ?string
    {
        return $this->sTel;
    }

    public function setSTel(string $sTel): static
    {
        $this->sTel = $sTel;

        return $this;
    }

    public function getFTel(): ?string
    {
        return $this->fTel;
    }

    public function setFTel(?string $fTel): static
    {
        $this->fTel = $fTel;

        return $this;
    }

    public function getMTel(): ?string
    {
        return $this->mTel;
    }

    public function setMTel(?string $mTel): static
    {
        $this->mTel = $mTel;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getLinkedIn(): ?string
    {
        return $this->linkedIn;
    }

    public function setLinkedIn(?string $linkedIn): static
    {
        $this->linkedIn = $linkedIn;

        return $this;
    }

    public function getMarketing(): ?Marketing
    {
        return $this->marketing;
    }

    public function setMarketing(?Marketing $marketing): static
    {
        $this->marketing = $marketing;

        return $this;
    }

    public function getBuilding(): ?Building
    {
        return $this->building;
    }

    public function setBuilding(?Building $building): static
    {
        $this->building = $building;

        return $this;
    }
}
