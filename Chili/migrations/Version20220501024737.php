<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220501024737 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actions_infos (id INT AUTO_INCREMENT NOT NULL, creer_par VARCHAR(255) NOT NULL, creer_le DATE NOT NULL, modifier_par VARCHAR(255) DEFAULT NULL, modifier_le VARCHAR(255) DEFAULT NULL, enable TINYINT(1) NOT NULL, dtype VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone INT NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', username VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plat (id INT NOT NULL, personne_id INT DEFAULT NULL, categorie_plat_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, prix VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, categorie VARCHAR(255) NOT NULL, INDEX IDX_2038A207A21BD112 (personne_id), INDEX IDX_2038A20788BE1BC2 (categorie_plat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE responsable (id INT NOT NULL, fonction VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin ADD CONSTRAINT FK_880E0D76BF396750 FOREIGN KEY (id) REFERENCES actions_infos (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personne ADD CONSTRAINT FK_FCEC9EFBF396750 FOREIGN KEY (id) REFERENCES actions_infos (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plat ADD CONSTRAINT FK_2038A207A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE plat ADD CONSTRAINT FK_2038A20788BE1BC2 FOREIGN KEY (categorie_plat_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE plat ADD CONSTRAINT FK_2038A207BF396750 FOREIGN KEY (id) REFERENCES actions_infos (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE responsable ADD CONSTRAINT FK_52520D07BF396750 FOREIGN KEY (id) REFERENCES actions_infos (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin DROP FOREIGN KEY FK_880E0D76BF396750');
        $this->addSql('ALTER TABLE personne DROP FOREIGN KEY FK_FCEC9EFBF396750');
        $this->addSql('ALTER TABLE plat DROP FOREIGN KEY FK_2038A207BF396750');
        $this->addSql('ALTER TABLE responsable DROP FOREIGN KEY FK_52520D07BF396750');
        $this->addSql('ALTER TABLE plat DROP FOREIGN KEY FK_2038A20788BE1BC2');
        $this->addSql('ALTER TABLE plat DROP FOREIGN KEY FK_2038A207A21BD112');
        $this->addSql('DROP TABLE actions_infos');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE plat');
        $this->addSql('DROP TABLE responsable');
    }
}
