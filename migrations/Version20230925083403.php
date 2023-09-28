<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230925083403 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP name, DROP gender, DROP last_name, DROP adresse, DROP country, DROP nationality, DROP passport, DROP passport_file, DROP curriculum_vitae, DROP profil_picture, DROP location, DROP date_of_birth, DROP place_of_birth, DROP availability, DROP experience, DROP note, DROP date_created, DROP date_updated');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD name VARCHAR(255) NOT NULL, ADD gender VARCHAR(255) DEFAULT NULL, ADD last_name VARCHAR(255) DEFAULT NULL, ADD adresse VARCHAR(255) NOT NULL, ADD country VARCHAR(255) NOT NULL, ADD nationality VARCHAR(255) NOT NULL, ADD passport VARCHAR(255) NOT NULL, ADD passport_file VARCHAR(255) NOT NULL, ADD curriculum_vitae VARCHAR(255) NOT NULL, ADD profil_picture VARCHAR(255) NOT NULL, ADD location VARCHAR(255) NOT NULL, ADD date_of_birth DATE NOT NULL, ADD place_of_birth VARCHAR(255) NOT NULL, ADD availability VARCHAR(255) NOT NULL, ADD experience VARCHAR(255) NOT NULL, ADD note VARCHAR(255) NOT NULL, ADD date_created DATE NOT NULL, ADD date_updated DATE NOT NULL');
    }
}
