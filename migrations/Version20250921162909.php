<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250921162909 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artiste (id INT AUTO_INCREMENT NOT NULL, prenom_pseudo VARCHAR(255) NOT NULL, nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chanson (id INT AUTO_INCREMENT NOT NULL, chanteur_id INT NOT NULL, titre VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, difficulte INT DEFAULT NULL, tonalite VARCHAR(255) DEFAULT NULL, capodastre INT DEFAULT NULL, vitesse_deplacement DOUBLE PRECISION DEFAULT NULL, nb_clics INT NOT NULL, autre LONGTEXT DEFAULT NULL, INDEX IDX_A2E637C2C7E25364 (chanteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chanson_playlist (chanson_id INT NOT NULL, playlist_id INT NOT NULL, INDEX IDX_D4DF062F2D0460C5 (chanson_id), INDEX IDX_D4DF062F6BBD148 (playlist_id), PRIMARY KEY(chanson_id, playlist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chanson ADD CONSTRAINT FK_A2E637C2C7E25364 FOREIGN KEY (chanteur_id) REFERENCES artiste (id)');
        $this->addSql('ALTER TABLE chanson_playlist ADD CONSTRAINT FK_D4DF062F2D0460C5 FOREIGN KEY (chanson_id) REFERENCES chanson (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chanson_playlist ADD CONSTRAINT FK_D4DF062F6BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chanson DROP FOREIGN KEY FK_A2E637C2C7E25364');
        $this->addSql('ALTER TABLE chanson_playlist DROP FOREIGN KEY FK_D4DF062F2D0460C5');
        $this->addSql('ALTER TABLE chanson_playlist DROP FOREIGN KEY FK_D4DF062F6BBD148');
        $this->addSql('DROP TABLE artiste');
        $this->addSql('DROP TABLE chanson');
        $this->addSql('DROP TABLE chanson_playlist');
        $this->addSql('DROP TABLE playlist');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
