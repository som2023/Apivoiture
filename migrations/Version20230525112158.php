<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230525112158 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE location_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE location (id INT NOT NULL, voiture_id INT NOT NULL, date_debut DATE NOT NULL, date_retour DATE NOT NULL, prix_location INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5E9E89CB181A8BA ON location (voiture_id)');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB181A8BA FOREIGN KEY (voiture_id) REFERENCES voiture (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE client ADD client_id INT NOT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C744045519EB6921 FOREIGN KEY (client_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_C744045519EB6921 ON client (client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE client DROP CONSTRAINT FK_C744045519EB6921');
        $this->addSql('DROP SEQUENCE location_id_seq CASCADE');
        $this->addSql('ALTER TABLE location DROP CONSTRAINT FK_5E9E89CB181A8BA');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP INDEX IDX_C744045519EB6921');
        $this->addSql('ALTER TABLE client DROP client_id');
    }
}
