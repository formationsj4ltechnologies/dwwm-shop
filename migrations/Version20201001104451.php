<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201001104451 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, numero VARCHAR(255) NOT NULL, voie VARCHAR(255) NOT NULL, code_poste VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE boitier (id INT AUTO_INCREMENT NOT NULL, batterie VARCHAR(255) NOT NULL, dimensions VARCHAR(255) NOT NULL, poids VARCHAR(255) NOT NULL, origine VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carte_graphique (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, modele VARCHAR(255) DEFAULT NULL, type_ecran VARCHAR(255) DEFAULT NULL, dalle_mate TINYINT(1) DEFAULT NULL, u_hd4k TINYINT(1) DEFAULT NULL, tactile TINYINT(1) DEFAULT NULL, resolution VARCHAR(255) DEFAULT NULL, taille VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, description LONGTEXT DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, adresse_id INT NOT NULL, numero VARCHAR(255) NOT NULL, total DOUBLE PRECISION NOT NULL, date_commande DATE NOT NULL, create_at DATETIME NOT NULL, update_at DATETIME DEFAULT NULL, INDEX IDX_6EEAA67D19EB6921 (client_id), INDEX IDX_6EEAA67D4DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, produit_id INT NOT NULL, contenu LONGTEXT NOT NULL, note SMALLINT NOT NULL, INDEX IDX_67F068BC19EB6921 (client_id), INDEX IDX_67F068BCF347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE connectique (id INT AUTO_INCREMENT NOT NULL, usb2 SMALLINT DEFAULT NULL, usb3 SMALLINT DEFAULT NULL, usbc TINYINT(1) DEFAULT NULL, carte_memoire VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ecran (id INT AUTO_INCREMENT NOT NULL, type_ecran VARCHAR(255) DEFAULT NULL, dalle_mate TINYINT(1) DEFAULT NULL, u_hd4k TINYINT(1) DEFAULT NULL, tactile TINYINT(1) DEFAULT NULL, resolution VARCHAR(255) DEFAULT NULL, taille VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_commande (id INT AUTO_INCREMENT NOT NULL, commande_id INT NOT NULL, produit_id INT NOT NULL, quantite SMALLINT NOT NULL, prix_unitaire DOUBLE PRECISION NOT NULL, INDEX IDX_3170B74B82EA2E54 (commande_id), INDEX IDX_3170B74BF347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, slug VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_5A6F91CE6C6E55B5 (nom), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE memoire (id INT AUTO_INCREMENT NOT NULL, ram VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE processeur (id INT AUTO_INCREMENT NOT NULL, modele VARCHAR(255) NOT NULL, nb_coeur SMALLINT NOT NULL, frequence VARCHAR(255) DEFAULT NULL, memoire_cache VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, marque_id INT NOT NULL, categorie_id INT NOT NULL, stockage_id INT DEFAULT NULL, processeur_id INT DEFAULT NULL, memoire_id INT DEFAULT NULL, connectique_id INT DEFAULT NULL, carte_graphique_id INT DEFAULT NULL, boitier_id INT DEFAULT NULL, ecran_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, prix DOUBLE PRECISION NOT NULL, dispo TINYINT(1) NOT NULL, description LONGTEXT NOT NULL, slug VARCHAR(255) DEFAULT NULL, image_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, os VARCHAR(255) NOT NULL, clavier VARCHAR(255) NOT NULL, wireless VARCHAR(255) NOT NULL, bluetooth TINYINT(1) DEFAULT NULL, webcam VARCHAR(255) NOT NULL, INDEX IDX_29A5EC274827B9B2 (marque_id), INDEX IDX_29A5EC27BCF5E72D (categorie_id), INDEX IDX_29A5EC27DAA83D7F (stockage_id), INDEX IDX_29A5EC275C9BE5AD (processeur_id), INDEX IDX_29A5EC27DE665C15 (memoire_id), INDEX IDX_29A5EC27CBE590B7 (connectique_id), INDEX IDX_29A5EC2721E1B659 (carte_graphique_id), INDEX IDX_29A5EC2744DE6F7C (boitier_id), INDEX IDX_29A5EC27E73649EB (ecran_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stockage (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, capacite VARCHAR(255) NOT NULL, gamer TINYINT(1) DEFAULT NULL, lecteur_graveur TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', prenom VARCHAR(50) NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, nom_complet VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D19EB6921 FOREIGN KEY (client_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D4DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC19EB6921 FOREIGN KEY (client_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74B82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74BF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC274827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27DAA83D7F FOREIGN KEY (stockage_id) REFERENCES stockage (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC275C9BE5AD FOREIGN KEY (processeur_id) REFERENCES processeur (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27DE665C15 FOREIGN KEY (memoire_id) REFERENCES memoire (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27CBE590B7 FOREIGN KEY (connectique_id) REFERENCES connectique (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2721E1B659 FOREIGN KEY (carte_graphique_id) REFERENCES carte_graphique (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2744DE6F7C FOREIGN KEY (boitier_id) REFERENCES boitier (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27E73649EB FOREIGN KEY (ecran_id) REFERENCES ecran (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D4DE7DC5C');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2744DE6F7C');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2721E1B659');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BCF5E72D');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74B82EA2E54');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27CBE590B7');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27E73649EB');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC274827B9B2');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27DE665C15');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC275C9BE5AD');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCF347EFB');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74BF347EFB');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27DAA83D7F');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D19EB6921');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC19EB6921');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE boitier');
        $this->addSql('DROP TABLE carte_graphique');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE connectique');
        $this->addSql('DROP TABLE ecran');
        $this->addSql('DROP TABLE ligne_commande');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE memoire');
        $this->addSql('DROP TABLE processeur');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE stockage');
        $this->addSql('DROP TABLE user');
    }
}
