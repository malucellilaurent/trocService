<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200108155731 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE troc (id INT AUTO_INCREMENT NOT NULL, service_demande VARCHAR(255) NOT NULL, service_propose VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE troc_user (troc_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_4039002D685023DF (troc_id), INDEX IDX_4039002DA76ED395 (user_id), PRIMARY KEY(troc_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE troc_user ADD CONSTRAINT FK_4039002D685023DF FOREIGN KEY (troc_id) REFERENCES troc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE troc_user ADD CONSTRAINT FK_4039002DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE troc_user DROP FOREIGN KEY FK_4039002D685023DF');
        $this->addSql('ALTER TABLE troc_user DROP FOREIGN KEY FK_4039002DA76ED395');
        $this->addSql('DROP TABLE troc');
        $this->addSql('DROP TABLE troc_user');
        $this->addSql('DROP TABLE user');
    }
}
