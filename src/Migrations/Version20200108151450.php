<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200108151450 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE troc DROP FOREIGN KEY FK_A4B2136367B3B43D');
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE troc DROP FOREIGN KEY FK_A4B2136367B3B43D');
        $this->addSql('ALTER TABLE troc ADD CONSTRAINT FK_A4B2136367B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD trocs_id INT DEFAULT NULL, CHANGE roles roles VARCHAR(180) NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F1752243 FOREIGN KEY (trocs_id) REFERENCES troc (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649F1752243 ON user (trocs_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, lastname VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, age VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, phone VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE troc DROP FOREIGN KEY FK_A4B2136367B3B43D');
        $this->addSql('ALTER TABLE troc ADD CONSTRAINT FK_A4B2136367B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F1752243');
        $this->addSql('DROP INDEX IDX_8D93D649F1752243 ON user');
        $this->addSql('ALTER TABLE user DROP trocs_id, CHANGE roles roles JSON NOT NULL');
    }
}
