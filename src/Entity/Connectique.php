<?php

namespace App\Entity;

use App\Repository\ConnectiqueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConnectiqueRepository::class)
 */
class Connectique
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $usb2;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $usb3;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $usbc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $carteMemoire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsb2(): ?int
    {
        return $this->usb2;
    }

    public function setUsb2(?int $usb2): self
    {
        $this->usb2 = $usb2;

        return $this;
    }

    public function getUsb3(): ?int
    {
        return $this->usb3;
    }

    public function setUsb3(?int $usb3): self
    {
        $this->usb3 = $usb3;

        return $this;
    }

    public function getUsbc(): ?bool
    {
        return $this->usbc;
    }

    public function setUsbc(?bool $usbc): self
    {
        $this->usbc = $usbc;

        return $this;
    }

    public function getCarteMemoire(): ?string
    {
        return $this->carteMemoire;
    }

    public function setCarteMemoire(?string $carteMemoire): self
    {
        $this->carteMemoire = $carteMemoire;

        return $this;
    }

    public function __toString()
    {
        return $this->usb2 . "-" . $this->usb3 . "-" . $this->usbc . "-" . $this->carteMemoire;
    }
}
