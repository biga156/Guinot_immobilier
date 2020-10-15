<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201015172247 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE locations (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, titre VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, surface DOUBLE PRECISION NOT NULL, type_maison VARCHAR(255) NOT NULL, chambres INT NOT NULL, etage INT NOT NULL, cout DOUBLE PRECISION NOT NULL, adresse VARCHAR(255) NOT NULL, accesibilite VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ventes (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, titre VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, surface DOUBLE PRECISION NOT NULL, type_maison VARCHAR(255) NOT NULL, chambres INT NOT NULL, etage INT NOT NULL, cout DOUBLE PRECISION NOT NULL, adresse VARCHAR(255) NOT NULL, accesibility VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE locations');
        $this->addSql('DROP TABLE ventes');
    }
}
