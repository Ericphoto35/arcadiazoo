<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240904062811 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE espace_employe (id INT AUTO_INCREMENT NOT NULL, empanimal_id INT DEFAULT NULL, empvisite DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', empfood VARCHAR(50) DEFAULT NULL, empquantite INT DEFAULT NULL, INDEX IDX_AEA1D6F0CEB2BB68 (empanimal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE espace_employe ADD CONSTRAINT FK_AEA1D6F0CEB2BB68 FOREIGN KEY (empanimal_id) REFERENCES animals (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE espace_employe DROP FOREIGN KEY FK_AEA1D6F0CEB2BB68');
        $this->addSql('DROP TABLE espace_employe');
    }
}
