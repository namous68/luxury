<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231002102853 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE offer (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, type_id INT NOT NULL, category_id INT NOT NULL, reference VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, is_active TINYINT(1) NOT NULL, job_title VARCHAR(255) NOT NULL, job_location VARCHAR(255) DEFAULT NULL, closing_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', salary INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_29D6873E19EB6921 (client_id), INDEX IDX_29D6873EC54C8C93 (type_id), INDEX IDX_29D6873E12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873EC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('DROP TABLE job_offer');
        $this->addSql('ALTER TABLE application ADD candidate_id INT NOT NULL, ADD offer_id INT NOT NULL, DROP offer, DROP user');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC191BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC153C674EE FOREIGN KEY (offer_id) REFERENCES offer (id)');
        $this->addSql('CREATE INDEX IDX_A45BDDC191BD8781 ON application (candidate_id)');
        $this->addSql('CREATE INDEX IDX_A45BDDC153C674EE ON application (offer_id)');
        $this->addSql('ALTER TABLE client ADD company_name VARCHAR(255) NOT NULL, ADD typeof_activity VARCHAR(255) NOT NULL, ADD contact_name VARCHAR(255) NOT NULL, ADD contact_position VARCHAR(255) NOT NULL, ADD contact_number VARCHAR(255) NOT NULL, ADD contact_email VARCHAR(255) NOT NULL, ADD notes LONGTEXT DEFAULT NULL, DROP society_name, DROP name_contact, DROP mail_contact, DROP created_at, DROP phone_number_contact');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC153C674EE');
        $this->addSql('CREATE TABLE job_offer (id INT AUTO_INCREMENT NOT NULL, title_job VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, is_visible TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expired_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', salary VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, location VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, category VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, contact_mail VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, close_date TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E19EB6921');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873EC54C8C93');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E12469DE2');
        $this->addSql('DROP TABLE offer');
        $this->addSql('DROP TABLE type');
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC191BD8781');
        $this->addSql('DROP INDEX IDX_A45BDDC191BD8781 ON application');
        $this->addSql('DROP INDEX IDX_A45BDDC153C674EE ON application');
        $this->addSql('ALTER TABLE application ADD offer VARCHAR(255) NOT NULL, ADD user VARCHAR(255) NOT NULL, DROP candidate_id, DROP offer_id');
        $this->addSql('ALTER TABLE client ADD society_name VARCHAR(255) NOT NULL, ADD name_contact VARCHAR(255) NOT NULL, ADD mail_contact VARCHAR(255) NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD phone_number_contact VARCHAR(255) NOT NULL, DROP company_name, DROP typeof_activity, DROP contact_name, DROP contact_position, DROP contact_number, DROP contact_email, DROP notes');
    }
}
