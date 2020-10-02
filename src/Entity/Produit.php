<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use App\Service\DwwmAppInterface;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 * @ORM\HasLifecycleCallbacks
 * @UniqueEntity(
 *     fields={"nom"},
 *     message="Ce produit existe deja dans le systeme"
 * )
 * @Vich\Uploadable
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Veuillez renseigner le nom du produit svp")
     * @Assert\Length(max="50", maxMessage="Le nom du produit ne peut exceder 50 caracteres")
     */
    private $nom;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="boolean")
     */
    private $dispo = true;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @Gedmo\Slug(fields={"nom"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageName;

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="produits", fileNameProperty="imageName")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $os = "Windows 10";

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $clavier = "Azerty";

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $wireless;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $bluetooth = true;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le champ webcam est requis")
     */
    private $webcam;

    /**
     * @ORM\ManyToOne(targetEntity=Marque::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $marque;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity=Stockage::class)
     */
    private $stockage;

    /**
     * @ORM\ManyToOne(targetEntity=Processeur::class)
     */
    private $processeur;

    /**
     * @ORM\ManyToOne(targetEntity=Memoire::class)
     */
    private $memoire;

    /**
     * @ORM\ManyToOne(targetEntity=Connectique::class)
     */
    private $connectique;

    /**
     * @ORM\ManyToOne(targetEntity=CarteGraphique::class)
     */
    private $carteGraphique;

    /**
     * @ORM\ManyToOne(targetEntity=Boitier::class)
     */
    private $boitier;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="produit")
     */
    private $commentaires;

    /**
     * @ORM\ManyToOne(targetEntity=Ecran::class)
     */
    private $ecran;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDispo(): ?bool
    {
        return $this->dispo;
    }

    public function setDispo(bool $dispo): self
    {
        $this->dispo = $dispo;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param File|null $imageFile
     */
    public function setImageFile(?File $imageFile): void
    {
        $this->imageFile = $imageFile;
        if (null !== $imageFile) {
            $this->updatedAt = new DateTime();
        }
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getOs(): ?string
    {
        return $this->os;
    }

    public function setOs(string $os): self
    {
        $this->os = $os;

        return $this;
    }

    public function getClavier(): ?string
    {
        return $this->clavier;
    }

    public function setClavier(string $clavier): self
    {
        $this->clavier = $clavier;

        return $this;
    }

    public function getWireless(): ?string
    {
        return $this->wireless;
    }

    public function setWireless(string $wireless): self
    {
        $this->wireless = $wireless;

        return $this;
    }

    public function getBluetooth(): ?bool
    {
        return $this->bluetooth;
    }

    public function setBluetooth(?bool $bluetooth): self
    {
        $this->bluetooth = $bluetooth;

        return $this;
    }

    public function getWebcam(): ?string
    {
        return $this->webcam;
    }

    public function setWebcam(string $webcam): self
    {
        $this->webcam = $webcam;

        return $this;
    }


    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getStockage(): ?Stockage
    {
        return $this->stockage;
    }

    public function setStockage(?Stockage $stockage): self
    {
        $this->stockage = $stockage;

        return $this;
    }

    public function getProcesseur(): ?Processeur
    {
        return $this->processeur;
    }

    public function setProcesseur(?Processeur $processeur): self
    {
        $this->processeur = $processeur;

        return $this;
    }

    public function getMemoire(): ?Memoire
    {
        return $this->memoire;
    }

    public function setMemoire(?Memoire $memoire): self
    {
        $this->memoire = $memoire;

        return $this;
    }

    public function getConnectique(): ?Connectique
    {
        return $this->connectique;
    }

    public function setConnectique(?Connectique $connectique): self
    {
        $this->connectique = $connectique;

        return $this;
    }

    public function getCarteGraphique(): ?CarteGraphique
    {
        return $this->carteGraphique;
    }

    public function setCarteGraphique(?CarteGraphique $carteGraphique): self
    {
        $this->carteGraphique = $carteGraphique;

        return $this;
    }

    public function getBoitier(): ?Boitier
    {
        return $this->boitier;
    }

    public function setBoitier(?Boitier $boitier): self
    {
        $this->boitier = $boitier;

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setProduit($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->contains($commentaire)) {
            $this->commentaires->removeElement($commentaire);
            // set the owning side to null (unless already changed)
            if ($commentaire->getProduit() === $this) {
                $commentaire->setProduit(null);
            }
        }

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function beforePersiste()
    {
        $this->nom = DwwmAppInterface::capitalize($this->nom);
        $this->createdAt = new DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function beforeUpdate()
    {
        $this->nom = DwwmAppInterface::capitalize($this->nom);
        $this->updatedAt = new DateTime();
    }

    public function __toString()
    {
        return $this->nom;
    }

    public function getEcran(): ?Ecran
    {
        return $this->ecran;
    }

    public function setEcran(?Ecran $ecran): self
    {
        $this->ecran = $ecran;

        return $this;
    }
}
