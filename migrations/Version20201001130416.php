<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201001130416 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carte_graphique ADD marque VARCHAR(255) NOT NULL, ADD modele_processeur VARCHAR(255) DEFAULT NULL, ADD memoire_video VARCHAR(255) DEFAULT NULL, ADD type_memoire VARCHAR(255) DEFAULT NULL, DROP type, DROP modele, DROP type_ecran, DROP dalle_mate, DROP u_hd4k, DROP tactile, DROP resolution, DROP taille');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carte_graphique ADD modele VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD type_ecran VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD dalle_mate TINYINT(1) DEFAULT NULL, ADD u_hd4k TINYINT(1) DEFAULT NULL, ADD tactile TINYINT(1) DEFAULT NULL, ADD resolution VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD taille VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP modele_processeur, DROP memoire_video, DROP type_memoire, CHANGE marque type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
