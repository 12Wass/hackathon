<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210317121729 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer_link ADD CONSTRAINT FK_68877A31C2ADDBC9 FOREIGN KEY (source_answer_id) REFERENCES answer (id)');
        $this->addSql('ALTER TABLE answer_link ADD CONSTRAINT FK_68877A319E873A2B FOREIGN KEY (target_answer_id) REFERENCES answer (id)');
        $this->addSql('CREATE INDEX IDX_68877A31C2ADDBC9 ON answer_link (source_answer_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_68877A319E873A2B ON answer_link (target_answer_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer_link DROP FOREIGN KEY FK_68877A31C2ADDBC9');
        $this->addSql('ALTER TABLE answer_link DROP FOREIGN KEY FK_68877A319E873A2B');
        $this->addSql('DROP INDEX IDX_68877A31C2ADDBC9 ON answer_link');
        $this->addSql('DROP INDEX UNIQ_68877A319E873A2B ON answer_link');
    }
}
