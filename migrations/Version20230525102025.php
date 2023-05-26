<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230525102025 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE client_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE client (id INT NOT NULL, employe_id INT NOT NULL, matricule_client VARCHAR(255) NOT NULL, nom_client VARCHAR(255) NOT NULL, prenom_client VARCHAR(255) NOT NULL, sexe_client VARCHAR(255) NOT NULL, datenaissance_client VARCHAR(255) NOT NULL, email_client VARCHAR(255) NOT NULL, contact_client VARCHAR(255) NOT NULL, num_pieces_client VARCHAR(255) NOT NULL, satut_client VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C74404551B65292 ON client (employe_id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404551B65292 FOREIGN KEY (employe_id) REFERENCES employe (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE client_id_seq CASCADE');
        $this->addSql('ALTER TABLE client DROP CONSTRAINT FK_C74404551B65292');
        $this->addSql('DROP TABLE client');
    }
}
