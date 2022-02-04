<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220204200850 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scpi ADD date_creation DATE NOT NULL, DROP annee_creation');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE categorie CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE scpi ADD annee_creation VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP date_creation, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE tdvm tdvm VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prix_part prix_part VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE capitalisation capitalisation VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE taux_occupation taux_occupation VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE valeur_retrait valeur_retrait VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE societe_de_gestion CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE effectifs effectifs VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
