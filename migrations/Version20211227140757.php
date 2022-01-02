<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211227140757 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE UNIQUE INDEX UNIQ_55AB14026EA0B0C ON auteur (nom_prenom)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_835033F86C6E55B5 ON genre (nom)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_55AB14026EA0B0C ON auteur');
        $this->addSql('DROP INDEX UNIQ_835033F86C6E55B5 ON genre');
    }
}
