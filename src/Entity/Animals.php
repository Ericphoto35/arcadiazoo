<?php

namespace App\Entity;

use App\Repository\AnimalsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalsRepository::class)]
class Animals
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $prenomani = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $raceani = null;

    #[ORM\Column(length: 60, nullable: true)]
    private ?string $imageani = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    private ?Habitats $habitatsani = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $FoodAni = null;

    #[ORM\Column(nullable: true)]
    private ?int $quantiteani = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $etatani = null;

    /**
     * @var Collection<int, EspaceEmploye>
     */
    #[ORM\OneToMany(targetEntity: EspaceEmploye::class, mappedBy: 'empanimal')]
    private Collection $espaceEmployes;

    /**
     * @var Collection<int, Vetvisit>
     */
    #[ORM\OneToMany(targetEntity: Vetvisit::class, mappedBy: 'vetanimal')]
    private Collection $vetvisits;

    public function __construct()
    {
        $this->espaceEmployes = new ArrayCollection();
        $this->vetvisits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenomani(): ?string
    {
        return $this->prenomani;
    }

    public function setPrenomani(?string $prenomani): static
    {
        $this->prenomani = $prenomani;

        return $this;
    }

    public function getRaceani(): ?string
    {
        return $this->raceani;
    }

    public function setRaceani(?string $raceani): static
    {
        $this->raceani = $raceani;

        return $this;
    }

    public function getImageani(): ?string
    {
        return $this->imageani;
    }

    public function setImageani(?string $imageani): static
    {
        $this->imageani = $imageani;

        return $this;
    }

    public function getHabitatsani(): ?Habitats
    {
        return $this->habitatsani;
    }

    public function setHabitatsani(?Habitats $habitatsani): static
    {
        $this->habitatsani = $habitatsani;

        return $this;
    }

    public function getFoodAni(): ?string
    {
        return $this->FoodAni;
    }

    public function setFoodAni(?string $FoodAni): static
    {
        $this->FoodAni = $FoodAni;

        return $this;
    }

    public function getQuantiteani(): ?int
    {
        return $this->quantiteani;
    }

    public function setQuantiteani(?int $quantiteani): static
    {
        $this->quantiteani = $quantiteani;

        return $this;
    }

    public function getEtatani(): ?string
    {
        return $this->etatani;
    }

    public function setEtatani(?string $etatani): static
    {
        $this->etatani = $etatani;

        return $this;
    }

    /**
     * @return Collection<int, EspaceEmploye>
     */
    public function getEspaceEmployes(): Collection
    {
        return $this->espaceEmployes;
    }

    public function addEspaceEmploye(EspaceEmploye $espaceEmploye): static
    {
        if (!$this->espaceEmployes->contains($espaceEmploye)) {
            $this->espaceEmployes->add($espaceEmploye);
            $espaceEmploye->setEmpanimal($this);
        }

        return $this;
    }

    public function removeEspaceEmploye(EspaceEmploye $espaceEmploye): static
    {
        if ($this->espaceEmployes->removeElement($espaceEmploye)) {
            // set the owning side to null (unless already changed)
            if ($espaceEmploye->getEmpanimal() === $this) {
                $espaceEmploye->setEmpanimal(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Vetvisit>
     */
    public function getVetvisits(): Collection
    {
        return $this->vetvisits;
    }

    public function addVetvisit(Vetvisit $vetvisit): static
    {
        if (!$this->vetvisits->contains($vetvisit)) {
            $this->vetvisits->add($vetvisit);
            $vetvisit->setVetanimal($this);
        }

        return $this;
    }

    public function removeVetvisit(Vetvisit $vetvisit): static
    {
        if ($this->vetvisits->removeElement($vetvisit)) {
            // set the owning side to null (unless already changed)
            if ($vetvisit->getVetanimal() === $this) {
                $vetvisit->setVetanimal(null);
            }
        }

        return $this;
    }
}
