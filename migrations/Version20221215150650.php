<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221215150650 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game_pictures ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE game_pictures ADD CONSTRAINT FK_2438D0E612469DE2 FOREIGN KEY (category_id) REFERENCES game_category (id)');
        $this->addSql('CREATE INDEX IDX_2438D0E612469DE2 ON game_pictures (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game_pictures DROP FOREIGN KEY FK_2438D0E612469DE2');
        $this->addSql('DROP INDEX IDX_2438D0E612469DE2 ON game_pictures');
        $this->addSql('ALTER TABLE game_pictures DROP category_id');
    }
}
