<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230925113350 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate CHANGE gendre gendre VARCHAR(255) DEFAULT NULL, CHANGE first_name first_name VARCHAR(255) DEFAULT NULL, CHANGE last_name last_name VARCHAR(255) DEFAULT NULL, CHANGE adress adress VARCHAR(255) DEFAULT NULL, CHANGE country country VARCHAR(255) DEFAULT NULL, CHANGE nationality nationality VARCHAR(255) DEFAULT NULL, CHANGE passport passport TINYINT(1) DEFAULT NULL, CHANGE passport_file passport_file BIGINT DEFAULT NULL, CHANGE curriculum_vitae curriculum_vitae BIGINT DEFAULT NULL, CHANGE profil_picture profil_picture BIGINT DEFAULT NULL, CHANGE current_location current_location VARCHAR(255) DEFAULT NULL, CHANGE date_of_birth date_of_birth DATE DEFAULT NULL, CHANGE place_of_birth place_of_birth VARCHAR(255) DEFAULT NULL, CHANGE email_adress email_adress VARCHAR(255) DEFAULT NULL, CHANGE password password VARCHAR(255) DEFAULT NULL, CHANGE availability availability TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate CHANGE gendre gendre VARCHAR(255) NOT NULL, CHANGE first_name first_name VARCHAR(255) NOT NULL, CHANGE last_name last_name VARCHAR(255) NOT NULL, CHANGE adress adress VARCHAR(255) NOT NULL, CHANGE country country VARCHAR(255) NOT NULL, CHANGE nationality nationality VARCHAR(255) NOT NULL, CHANGE passport passport TINYINT(1) NOT NULL, CHANGE passport_file passport_file BIGINT NOT NULL, CHANGE curriculum_vitae curriculum_vitae BIGINT NOT NULL, CHANGE profil_picture profil_picture BIGINT NOT NULL, CHANGE current_location current_location VARCHAR(255) NOT NULL, CHANGE date_of_birth date_of_birth DATE NOT NULL, CHANGE place_of_birth place_of_birth VARCHAR(255) NOT NULL, CHANGE email_adress email_adress VARCHAR(255) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL, CHANGE availability availability TINYINT(1) NOT NULL');
    }
}
