<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $panelProduit = FormField::addPanel("INFOS PRODUITS");
        $nom = TextField::new('nom', "Nom du produit");
        $prix = MoneyField::new('prix', "Prix du produit")->setCurrency("EUR");
        $dispo = BooleanField::new("dispo", "Est Disponible ?");
        $description = TextEditorField::new('description', "Description du produit");
        $marque = AssociationField::new("marque", "Constructeur du produit");
        $categorie = AssociationField::new("categorie", "Type du produit");

        $panelCaracteristique = FormField::addPanel("INFOS CARACTERISTIQUES");
        $os = TextField::new("os", "Sytème d'expoitation");
        $wireless = TextField::new("wireless", "Carte Wifi");
        $bluetooth = BooleanField::new("bluetooth", "Bluetooth");
        $clavier = TextField::new("clavier", "Clavier");
        $processeur = AssociationField::new("processeur", "Processeur");
        $ecran = AssociationField::new("ecran", "Ecran");
        $connectique = AssociationField::new("connectique", "Connectiques");
        $boitier = AssociationField::new("boitier", "Boitier");
        $vga = AssociationField::new("carteGraphique", "Carte graphique");
        $stockage = AssociationField::new("stockage", "Stockage");
        $webcam = TextField::new("webcam", "Webcam");

        $panelImage = FormField::addPanel("INFOS IMAGES");
        $imageName = ImageField::new("imageName", "Photo")->setBasePath("/images/produits");
        $imageFile = ImageField::new("imageFile", "Telecharger la photo du produit")->setFormType(VichImageType::class);

        $infosProduits = [$panelProduit, $nom, $marque, $categorie, $prix, $dispo, $description];
        $infosCaracteristiques = [$panelCaracteristique, $os, $wireless, $webcam, $bluetooth, $clavier, $processeur, $ecran, $vga, $connectique, $boitier, $stockage];


        if ($pageName === Crud::PAGE_INDEX || $pageName === Crud::PAGE_DETAIL) {
            $infosImages = [$panelImage, $imageName];
        } else {
            $infosImages = [$panelImage, $imageFile];
        }

        return array_merge($infosProduits, $infosCaracteristiques, $infosImages);
    }

}
