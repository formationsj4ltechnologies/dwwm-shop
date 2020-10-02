<?php

namespace App\Entity;

use App\Repository\EcranRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EcranRepository::class)
 */
class Ecran
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeEcran;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $dalleMate;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $uHd4k;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $tactile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $resolution;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $taille;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeEcran(): ?string
    {
        return $this->typeEcran;
    }

    public function setTypeEcran(?string $typeEcran): self
    {
        $this->typeEcran = $typeEcran;

        return $this;
    }

    public function getDalleMate(): ?bool
    {
        return $this->dalleMate;
    }

    public function setDalleMate(?bool $dalleMate): self
    {
        $this->dalleMate = $dalleMate;

        return $this;
    }

    public function getUHd4k(): ?bool
    {
        return $this->uHd4k;
    }

    public function setUHd4k(?bool $uHd4k): self
    {
        $this->uHd4k = $uHd4k;

        return $this;
    }

    public function getTactile(): ?bool
    {
        return $this->tactile;
    }

    public function setTactile(?bool $tactile): self
    {
        $this->tactile = $tactile;

        return $this;
    }

    public function getResolution(): ?string
    {
        return $this->resolution;
    }

    public function setResolution(?string $resolution): self
    {
        $this->resolution = $resolution;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(string $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function __toString()
    {
        return $this->typeEcran . ' ' . $this->taille;
    }
}
