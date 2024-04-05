<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240329074636 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE associer (id INT AUTO_INCREMENT NOT NULL, prix DOUBLE PRECISION NOT NULL, stock INT NOT NULL, capote_id INT DEFAULT NULL, taille_id INT DEFAULT NULL, INDEX IDX_FA230DB913C63952 (capote_id), INDEX IDX_FA230DB9FF25611A (taille_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE capote (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE taille (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE associer ADD CONSTRAINT FK_FA230DB913C63952 FOREIGN KEY (capote_id) REFERENCES capote (id)');
        $this->addSql('ALTER TABLE associer ADD CONSTRAINT FK_FA230DB9FF25611A FOREIGN KEY (taille_id) REFERENCES taille (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE associer DROP FOREIGN KEY FK_FA230DB913C63952');
        $this->addSql('ALTER TABLE associer DROP FOREIGN KEY FK_FA230DB9FF25611A');
        $this->addSql('DROP TABLE associer');
        $this->addSql('DROP TABLE capote');
        $this->addSql('DROP TABLE taille');
    }
}
