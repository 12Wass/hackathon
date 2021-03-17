<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210317101445 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A254CB1B7BA');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A25895C9E3C');
        $this->addSql('DROP INDEX IDX_DADD4A254CB1B7BA ON answer');
        $this->addSql('DROP INDEX IDX_DADD4A25895C9E3C ON answer');
        $this->addSql('ALTER TABLE answer DROP answer_from_link_id, DROP answer_to_link_id');
        $this->addSql('ALTER TABLE answer_link ADD from_answer_id INT NOT NULL, ADD to_answer_id INT NOT NULL');
        $this->addSql('ALTER TABLE answer_link ADD CONSTRAINT FK_68877A31BAAFDDBD FOREIGN KEY (from_answer_id) REFERENCES answer (id)');
        $this->addSql('ALTER TABLE answer_link ADD CONSTRAINT FK_68877A319B909F76 FOREIGN KEY (to_answer_id) REFERENCES answer (id)');
        $this->addSql('CREATE INDEX IDX_68877A31BAAFDDBD ON answer_link (from_answer_id)');
        $this->addSql('CREATE INDEX IDX_68877A319B909F76 ON answer_link (to_answer_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer ADD answer_from_link_id INT DEFAULT NULL, ADD answer_to_link_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A254CB1B7BA FOREIGN KEY (answer_to_link_id) REFERENCES answer_link (id)');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A25895C9E3C FOREIGN KEY (answer_from_link_id) REFERENCES answer_link (id)');
        $this->addSql('CREATE INDEX IDX_DADD4A254CB1B7BA ON answer (answer_to_link_id)');
        $this->addSql('CREATE INDEX IDX_DADD4A25895C9E3C ON answer (answer_from_link_id)');
        $this->addSql('ALTER TABLE answer_link DROP FOREIGN KEY FK_68877A31BAAFDDBD');
        $this->addSql('ALTER TABLE answer_link DROP FOREIGN KEY FK_68877A319B909F76');
        $this->addSql('DROP INDEX IDX_68877A31BAAFDDBD ON answer_link');
        $this->addSql('DROP INDEX IDX_68877A319B909F76 ON answer_link');
        $this->addSql('ALTER TABLE answer_link DROP from_answer_id, DROP to_answer_id');
    }
}
