<?php

namespace App\Entity;

use App\Repository\HabitatsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HabitatsRepository::class)]
class Habitats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $habitatsnom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $habitatsdescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $habitatsimg = null;

    /**
     * @var Collection<int, Animals>
     */
    #[ORM\OneToMany(targetEntity: Animals::class, mappedBy: 'habitatsani')]
    private Collection $animals;

    public function __construct()
    {
        $this->animals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHabitatsnom(): ?string
    {
        return $this->habitatsnom;
    }

    public function setHabitatsnom(?string $habitatsnom): static
    {
        $this->habitatsnom = $habitatsnom;

        return $this;
    }

    public function getHabitatsdescription(): ?string
    {
        return $this->habitatsdescription;
    }

    public function setHabitatsdescription(?string $habitatsdescription): static
    {
        $this->habitatsdescription = $habitatsdescription;

        return $this;
    }

    public function getHabitatsimg(): ?string
    {
        return $this->habitatsimg;
    }

    public function setHabitatsimg(?string $habitatsimg): static
    {
        $this->habitatsimg = $habitatsimg;

        return $this;
    }

    /**
     * @return Collection<int, Animals>
     */
    public function getAnimals(): Collection
    {
        return $this->animals;
    }

    public function addAnimal(Animals $animal): static
    {
        if (!$this->animals->contains($animal)) {
            $this->animals->add($animal);
            $animal->setHabitatsani($this);
        }

        return $this;
    }

    public function removeAnimal(Animals $animal): static
    {
        if ($this->animals->removeElement($animal)) {
            // set the owning side to null (unless already changed)
            if ($animal->getHabitatsani() === $this) {
                $animal->setHabitatsani(null);
            }
        }

        return $this;
    }
}
