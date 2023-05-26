<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230525103218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE voiture_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE voiture (id INT NOT NULL, immatriculation VARCHAR(255) NOT NULL, marque VARCHAR(255) NOT NULL, serie VARCHAR(255) NOT NULL, couleur VARCHAR(255) NOT NULL, nombre_place INT NOT NULL, disponible VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE voiture_id_seq CASCADE');
        $this->addSql('DROP TABLE voiture');
    }
}
