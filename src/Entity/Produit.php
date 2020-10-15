<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProduitRepository;
use App\Service\DwwmAppInterface;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Groups;
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
 * @ApiResource(
 *     normalizationContext={"groups" = {"main_produit"}}
 * )
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"main_produit"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Veuillez renseigner le nom du produit svp")
     * @Assert\Length(max="50", maxMessage="Le nom du produit ne peut exceder 50 caracteres")
     * @Groups({"main_produit"})
     */
    private $nom;

    /**
     * @ORM\Column(type="float")
     * @Groups({"main_produit"})
     */
    private $prix;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"main_produit"})
     */
    private $dispo = true;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank (message="Veuillez renseigner le nom de l'image")
     * @Groups({"main_produit"})
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\NotBlank(message="Le champ webcam est requis")
     * @Groups({"main_produit"})
     */
    private $webcam = true;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"main_produit"})
     */
    private $cpu;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"main_produit"})
     */
    private $ram;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"main_produit"})
     */
    private $vga;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"main_produit"})
     */
    private $taille;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"main_produit"})
     */
    private $disqueDur;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"main_produit"})
     */
    private $imageName;

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="produits", fileNameProperty="imageName")
     */
    private $imageFile;

    /**
     * @Gedmo\Slug(fields={"nom"})
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"main_produit"})
     */
    private $slug;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"main_produit"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     */
    private $updatedAt;

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
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="produit")
     */
    private $commentaires;

    /**
     * @ORM\OneToMany(targetEntity=PieceJointe::class, mappedBy="produit", cascade={"persist"})
     */
    private $pieceJointes;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
        $this->pieceJointes = new ArrayCollection();
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
     * @return bool
     */
    public function isWebcam(): bool
    {
        return $this->webcam;
    }

    /**
     * @param bool $webcam
     */
    public function setWebcam(bool $webcam): void
    {
        $this->webcam = $webcam;
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
     * @return Collection|PieceJointe[]
     */
    public function getPieceJointes(): Collection
    {
        return $this->pieceJointes;
    }

    public function addPieceJointe(PieceJointe $pieceJointe): self
    {
        if (!$this->pieceJointes->contains($pieceJointe)) {
            $this->pieceJointes[] = $pieceJointe;
            $pieceJointe->setProduit($this);
        }

        return $this;
    }

    public function removePieceJointe(PieceJointe $pieceJointe): self
    {
        if ($this->pieceJointes->contains($pieceJointe)) {
            $this->pieceJointes->removeElement($pieceJointe);
            // set the owning side to null (unless already changed)
            if ($pieceJointe->getProduit() === $this) {
                $pieceJointe->setProduit(null);
            }
        }

        return $this;
    }

    public function getCpu(): ?string
    {
        return $this->cpu;
    }

    public function setCpu(string $cpu): self
    {
        $this->cpu = $cpu;

        return $this;
    }

    public function getVga(): ?string
    {
        return $this->vga;
    }

    public function setVga(string $vga): self
    {
        $this->vga = $vga;

        return $this;
    }

    public function getDisqueDur(): ?string
    {
        return $this->disqueDur;
    }

    public function setDisqueDur(string $disqueDur): self
    {
        $this->disqueDur = $disqueDur;

        return $this;
    }

    public function getRam(): ?string
    {
        return $this->ram;
    }

    public function setRam(string $ram): self
    {
        $this->ram = $ram;

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
}
