<?php

namespace App\Entity;

use App\Repository\PropertyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PropertyRepository::class)]
class Property
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $typology = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypology(): ?string
    {
        return $this->typology;
    }

    public function setTypology(string $typology): static
    {
        $this->typology = $typology;

        return $this;
    }
}
