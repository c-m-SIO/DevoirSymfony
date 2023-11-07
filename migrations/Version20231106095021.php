<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106095021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet ADD id_utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_50159CA9C6EE5C49 ON projet (id_utilisateur_id)');
        $this->addSql('ALTER TABLE tache ADD id_statut_id INT DEFAULT NULL, ADD id_projet_id INT DEFAULT NULL, ADD id_utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_9387207576158423 FOREIGN KEY (id_statut_id) REFERENCES statut (id)');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_9387207580F43E55 FOREIGN KEY (id_projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_93872075C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_9387207576158423 ON tache (id_statut_id)');
        $this->addSql('CREATE INDEX IDX_9387207580F43E55 ON tache (id_projet_id)');
        $this->addSql('CREATE INDEX IDX_93872075C6EE5C49 ON tache (id_utilisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_9387207576158423');
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_9387207580F43E55');
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_93872075C6EE5C49');
        $this->addSql('DROP INDEX IDX_9387207576158423 ON tache');
        $this->addSql('DROP INDEX IDX_9387207580F43E55 ON tache');
        $this->addSql('DROP INDEX IDX_93872075C6EE5C49 ON tache');
        $this->addSql('ALTER TABLE tache DROP id_statut_id, DROP id_projet_id, DROP id_utilisateur_id');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9C6EE5C49');
        $this->addSql('DROP INDEX IDX_50159CA9C6EE5C49 ON projet');
        $this->addSql('ALTER TABLE projet DROP id_utilisateur_id');
    }
}
