<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230922153052 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidate (id INT AUTO_INCREMENT NOT NULL, experience_id INT DEFAULT NULL, category_id INT NOT NULL, gendre VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, nationality VARCHAR(255) NOT NULL, passport TINYINT(1) NOT NULL, passport_file BIGINT NOT NULL, curriculum_vitae BIGINT NOT NULL, profil_picture BIGINT NOT NULL, current_location VARCHAR(255) NOT NULL, date_of_birth DATE NOT NULL, place_of_birth VARCHAR(255) NOT NULL, email_adress VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, availability TINYINT(1) NOT NULL, user BIGINT NOT NULL, INDEX IDX_C8B28E4446E90E27 (experience_id), INDEX IDX_C8B28E4412469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, experience VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gendre (id INT AUTO_INCREMENT NOT NULL, gendre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E4446E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E4412469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E4446E90E27');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E4412469DE2');
        $this->addSql('DROP TABLE candidate');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE gendre');
    }
}
