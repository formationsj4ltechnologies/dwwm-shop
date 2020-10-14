<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use App\Form\PieceJointeType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Vich\UploaderBundle\Form\Type\VichImageType;

/**
 * Class ProduitCrudController
 * @package App\Controller\Admin
 * @IsGranted("ROLE_ADMIN", message="Vous n'avez pas les droits necessaires pour acceder à cette ressource")
 */
class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $panelProduit = FormField::addPanel("INFOS PRODUITS");
        $marque = AssociationField::new("marque", "Constructeur");
        $categorie = AssociationField::new("categorie", "Type");
        $nom = TextField::new('nom', "Nom");
        $prix = MoneyField::new('prix', "Prix")->setCurrency("EUR");
        $description = TextEditorField::new('description', "Description");
        $dispo = BooleanField::new("dispo", "En Stock ?");

        $panelCaracteristique = FormField::addPanel("INFOS CARACTERISTIQUES");
        $webcam = BooleanField::new("webcam", "Webcam");
        $cpu = TextField::new("cpu", "Processeur");
        $ram = TextField::new("ram", "Ram");
        $vga = TextField::new("vga", "Carte graphique");
        $taille = TextField::new("taille", "Dimension");
        $disqueDur = TextField::new("disqueDur", "Disque Dur");

        $panelImage = FormField::addPanel("INFOS IMAGES");
        $imageName = ImageField::new("imageName", "Photo")
            ->setBasePath("/images/produits");
        $imageFile = ImageField::new("imageFile", "Telecharger la photo du produit")
            ->setFormType(VichImageType::class);

        $imageJointeFile = CollectionField::new("pieceJointes", "Images Jointes")
            ->setEntryType(PieceJointeType::class)
            ->setFormTypeOption("by_reference", false)
            ->onlyOnForms();

        $imageJointeName = CollectionField::new("pieceJointes", "Images Jointes")
            ->setTemplatePath("pj/images.html.twig")
            ->onlyOnDetail();

        $infosProduits = [$panelProduit, $marque, $categorie, $nom, $prix, $dispo, $description];
        $infosCaracteristiques = [$panelCaracteristique, $webcam, $cpu, $taille, $ram, $vga, $disqueDur];

        if ($pageName === Crud::PAGE_INDEX || $pageName === Crud::PAGE_DETAIL) {
            $infosImages = [$panelImage, $imageName, $imageJointeName];
        } else {
            $infosImages = [$panelImage, $imageFile, $imageJointeFile];
        }

        return array_merge($infosProduits, $infosCaracteristiques, $infosImages);
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
    }
}