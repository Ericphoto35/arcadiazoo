<?php

namespace App\Entity;

use App\Repository\VetvisitRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VetvisitRepository::class)]
class Vetvisit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $vetvisitedate = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $food = null;

    #[ORM\Column(nullable: true)]
    private ?int $quantite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $etat = null;

    #[ORM\ManyToOne(inversedBy: 'vetvisits')]
    private ?Animals $vetanimal = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVetvisitedate(): ?\DateTimeImmutable
    {
        return $this->vetvisitedate;
    }

    public function setVetvisitedate(?\DateTimeImmutable $vetvisitedate): static
    {
        $this->vetvisitedate = $vetvisitedate;

        return $this;
    }

    public function getFood(): ?string
    {
        return $this->food;
    }

    public function setFood(?string $food): static
    {
        $this->food = $food;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(?int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(?string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getVetanimal(): ?Animals
    {
        return $this->vetanimal;
    }

    public function setVetanimal(?Animals $vetanimal): static
    {
        $this->vetanimal = $vetanimal;

        return $this;
    }
}
