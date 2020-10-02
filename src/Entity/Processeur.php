<?php

namespace App\Entity;

use App\Repository\ProcesseurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProcesseurRepository::class)
 */
class Processeur
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
    private $modele;

    /**
     * @ORM\Column(type="smallint")
     */
    private $nbCoeur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $frequence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $memoireCache;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getNbCoeur(): ?int
    {
        return $this->nbCoeur;
    }

    public function setNbCoeur(int $nbCoeur): self
    {
        $this->nbCoeur = $nbCoeur;

        return $this;
    }

    public function getFrequence(): ?string
    {
        return $this->frequence;
    }

    public function setFrequence(?string $frequence): self
    {
        $this->frequence = $frequence;

        return $this;
    }

    public function getMemoireCache(): ?string
    {
        return $this->memoireCache;
    }

    public function setMemoireCache(string $memoireCache): self
    {
        $this->memoireCache = $memoireCache;

        return $this;
    }

    public function __toString()
    {
        return $this->modele . "-" . $this->nbCoeur . "-" . $this->frequence . "-" . $this->memoireCache;
    }
}
