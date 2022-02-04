<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220204175148 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE scpi ADD categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scpi ADD CONSTRAINT FK_90E051DBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_90E051DBCF5E72D ON scpi (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scpi DROP FOREIGN KEY FK_90E051DBCF5E72D');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('ALTER TABLE admin CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX IDX_90E051DBCF5E72D ON scpi');
        $this->addSql('ALTER TABLE scpi DROP categorie_id, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE tdvm tdvm VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prix_part prix_part VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE capitalisation capitalisation VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE taux_occupation taux_occupation VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE valeur_retrait valeur_retrait VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE annee_creation annee_creation VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE localisation localisation VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE societe_de_gestion CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE effectifs effectifs VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
