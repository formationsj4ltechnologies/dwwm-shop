<?php

namespace App\Entity;

use App\Repository\StockageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StockageRepository::class)
 */
class Stockage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $capacite;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $gamer;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $lecteurGraveur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCapacite(): ?string
    {
        return $this->capacite;
    }

    public function setCapacite(string $capacite): self
    {
        $this->capacite = $capacite;

        return $this;
    }

    public function getGamer(): ?bool
    {
        return $this->gamer;
    }

    public function setGamer(?bool $gamer): self
    {
        $this->gamer = $gamer;

        return $this;
    }

    public function getLecteurGraveur(): ?bool
    {
        return $this->lecteurGraveur;
    }

    public function setLecteurGraveur(?bool $lecteurGraveur): self
    {
        $this->lecteurGraveur = $lecteurGraveur;

        return $this;
    }

    public function __toString()
    {
        return $this->type . "-" . $this->capacite . "-" . $this->gamer . "-" . $this->lecteurGraveur;
    }
}
