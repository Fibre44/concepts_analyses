<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210302205654 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE surcharge DROP FOREIGN KEY FK_54C9B0DF4C3113BB');
        $this->addSql('DROP INDEX IDX_54C9B0DF4C3113BB ON surcharge');
        $this->addSql('ALTER TABLE surcharge DROP rubriqueclient_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE surcharge ADD rubriqueclient_id INT NOT NULL');
        $this->addSql('ALTER TABLE surcharge ADD CONSTRAINT FK_54C9B0DF4C3113BB FOREIGN KEY (rubriqueclient_id) REFERENCES rubriqueclient (id)');
        $this->addSql('CREATE INDEX IDX_54C9B0DF4C3113BB ON surcharge (rubriqueclient_id)');
    }
}
