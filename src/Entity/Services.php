<?php

namespace App\Entity;

use App\Repository\ServicesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServicesRepository::class)]
class Services
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60, nullable: true)]
    private ?string $servicesnom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $servicesdescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $serviceimg = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServicesnom(): ?string
    {
        return $this->servicesnom;
    }

    public function setServicesnom(?string $servicesnom): static
    {
        $this->servicesnom = $servicesnom;

        return $this;
    }

    public function getServicesdescription(): ?string
    {
        return $this->servicesdescription;
    }

    public function setServicesdescription(?string $servicesdescription): static
    {
        $this->servicesdescription = $servicesdescription;

        return $this;
    }

    public function getServiceimg(): ?string
    {
        return $this->serviceimg;
    }

    public function setServiceimg(?string $serviceimg): static
    {
        $this->serviceimg = $serviceimg;

        return $this;
    }
}
