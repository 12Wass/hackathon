<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210317101129 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE answer (id INT AUTO_INCREMENT NOT NULL, answer_from_link_id INT DEFAULT NULL, answer_to_link_id INT DEFAULT NULL, created_at DATETIME NOT NULL, text LONGTEXT NOT NULL, first TINYINT(1) NOT NULL, INDEX IDX_DADD4A25895C9E3C (answer_from_link_id), INDEX IDX_DADD4A254CB1B7BA (answer_to_link_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE answer_link (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A25895C9E3C FOREIGN KEY (answer_from_link_id) REFERENCES answer_link (id)');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A254CB1B7BA FOREIGN KEY (answer_to_link_id) REFERENCES answer_link (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A25895C9E3C');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A254CB1B7BA');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP TABLE answer_link');
    }
}
