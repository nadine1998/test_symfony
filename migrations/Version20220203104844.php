<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220203104844 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE scpi (id INT AUTO_INCREMENT NOT NULL, societe_de_gestion_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, tdvm VARCHAR(255) NOT NULL, prix_part VARCHAR(255) NOT NULL, capitalisation VARCHAR(255) NOT NULL, taux_occupation VARCHAR(255) NOT NULL, valeur_retrait VARCHAR(255) NOT NULL, annee_creation VARCHAR(255) NOT NULL, INDEX IDX_90E051DE6CEA821 (societe_de_gestion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE scpi ADD CONSTRAINT FK_90E051DE6CEA821 FOREIGN KEY (societe_de_gestion_id) REFERENCES societe_de_gestion (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE scpi');
        $this->addSql('ALTER TABLE admin CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE societe_de_gestion CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE effectifs effectifs VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
