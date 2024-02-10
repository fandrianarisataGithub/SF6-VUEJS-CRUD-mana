<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240209134308 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE member ADD marketing_id INT DEFAULT NULL, ADD building_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA78C6DCB66C FOREIGN KEY (marketing_id) REFERENCES marketing (id)');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA784D2A7E12 FOREIGN KEY (building_id) REFERENCES building (id)');
        $this->addSql('CREATE INDEX IDX_70E4FA78C6DCB66C ON member (marketing_id)');
        $this->addSql('CREATE INDEX IDX_70E4FA784D2A7E12 ON member (building_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA78C6DCB66C');
        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA784D2A7E12');
        $this->addSql('DROP INDEX IDX_70E4FA78C6DCB66C ON member');
        $this->addSql('DROP INDEX IDX_70E4FA784D2A7E12 ON member');
        $this->addSql('ALTER TABLE member DROP marketing_id, DROP building_id');
    }
}
