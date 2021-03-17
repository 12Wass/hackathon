<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210317121748 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE answer (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, text LONGTEXT NOT NULL, first TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE answer_link (id INT AUTO_INCREMENT NOT NULL, source_answer_id INT NOT NULL, target_answer_id INT NOT NULL, INDEX IDX_68877A31C2ADDBC9 (source_answer_id), UNIQUE INDEX UNIQ_68877A319E873A2B (target_answer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE answer_link ADD CONSTRAINT FK_68877A31C2ADDBC9 FOREIGN KEY (source_answer_id) REFERENCES answer (id)');
        $this->addSql('ALTER TABLE answer_link ADD CONSTRAINT FK_68877A319E873A2B FOREIGN KEY (target_answer_id) REFERENCES answer (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer_link DROP FOREIGN KEY FK_68877A31C2ADDBC9');
        $this->addSql('ALTER TABLE answer_link DROP FOREIGN KEY FK_68877A319E873A2B');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP TABLE answer_link');
    }
}
