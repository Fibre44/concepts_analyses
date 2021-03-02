<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210302171714 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE detailrubrique (id INT AUTO_INCREMENT NOT NULL, date DATE DEFAULT NULL, sens VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE surcharge (id INT AUTO_INCREMENT NOT NULL, rubriqueclient_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_54C9B0DF4C3113BB (rubriqueclient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE surcharge ADD CONSTRAINT FK_54C9B0DF4C3113BB FOREIGN KEY (rubriqueclient_id) REFERENCES rubriqueclient (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE detailrubrique');
        $this->addSql('DROP TABLE surcharge');
    }
}
