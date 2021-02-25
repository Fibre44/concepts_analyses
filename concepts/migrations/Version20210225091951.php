<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210225091951 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, raisonsociale VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rubriqueclient (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, ccn VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_9ED4797119EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rubriquehru (id INT AUTO_INCREMENT NOT NULL, ccn VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rubriqueclient ADD CONSTRAINT FK_9ED4797119EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rubriqueclient DROP FOREIGN KEY FK_9ED4797119EB6921');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE rubriqueclient');
        $this->addSql('DROP TABLE rubriquehru');
    }
}
