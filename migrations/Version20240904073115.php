<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240904073115 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vetvisit (id INT AUTO_INCREMENT NOT NULL, vetanimal_id INT DEFAULT NULL, vetvisitedate DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', food VARCHAR(50) DEFAULT NULL, quantite INT DEFAULT NULL, etat VARCHAR(255) DEFAULT NULL, INDEX IDX_C37C75CF61CC55B (vetanimal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vetvisit ADD CONSTRAINT FK_C37C75CF61CC55B FOREIGN KEY (vetanimal_id) REFERENCES animals (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vetvisit DROP FOREIGN KEY FK_C37C75CF61CC55B');
        $this->addSql('DROP TABLE vetvisit');
    }
}
