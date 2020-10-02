<?php

namespace App\Entity;

use App\Repository\CarteGraphiqueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarteGraphiqueRepository::class)
 */
class CarteGraphique
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
    private $marque;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $modeleProcesseur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $memoireVideo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeMemoire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModeleProcesseur(): ?string
    {
        return $this->modeleProcesseur;
    }

    public function setModeleProcesseur(?string $modeleProcesseur): self
    {
        $this->modeleProcesseur = $modeleProcesseur;

        return $this;
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

    /**
     * @return mixed
     */
    public function getMemoireVideo()
    {
        return $this->memoireVideo;
    }

    /**
     * @param string $memoireVideo
     */
    public function setMemoireVideo(string $memoireVideo): void
    {
        $this->memoireVideo = $memoireVideo;
    }

    /**
     * @return mixed
     */
    public function getTypeMemoire()
    {
        return $this->typeMemoire;
    }

    /**
     * @param string $typeMemoire
     */
    public function setTypeMemoire(string $typeMemoire): void
    {
        $this->typeMemoire = $typeMemoire;
    }

    public function __toString()
    {
        return $this->marque . "-" . $this->modeleProcesseur . "-" . $this->memoireVideo . "-" . $this->typeMemoire;
    }
}
