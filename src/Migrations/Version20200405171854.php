<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200405171854 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, nom_personne VARCHAR(255) NOT NULL, motdepasse VARCHAR(255) NOT NULL, id_metier INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE personne_backup');
        $this->addSql('ALTER TABLE commune CHANGE IdCommune IdCommune INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE espece CHANGE idEspece idEspece INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE lieu CHANGE idLieu idLieu INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE metier CHANGE idMetier idMetier INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE plage_has_etude CHANGE idZone idZone INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE zone CHANGE idZone idZone INT AUTO_INCREMENT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE personne_backup (idPersonne INT AUTO_INCREMENT NOT NULL, nomPersonne VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, motdePasse VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, idMetier INT NOT NULL, INDEX idMetier (idMetier), PRIMARY KEY(idPersonne)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('DROP TABLE personne');
        $this->addSql('ALTER TABLE commune CHANGE IdCommune IdCommune INT NOT NULL');
        $this->addSql('ALTER TABLE espece CHANGE idEspece idEspece INT NOT NULL');
        $this->addSql('ALTER TABLE lieu CHANGE idLieu idLieu INT NOT NULL');
        $this->addSql('ALTER TABLE metier CHANGE idMetier idMetier INT NOT NULL');
        $this->addSql('ALTER TABLE plage_has_etude CHANGE idZone idZone INT NOT NULL');
        $this->addSql('ALTER TABLE zone CHANGE idZone idZone INT NOT NULL');
    }
}
