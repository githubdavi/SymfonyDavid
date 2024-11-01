<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241101202837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_category (media_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_92D3773EA9FDD75 (media_id), INDEX IDX_92D377312469DE2 (category_id), PRIMARY KEY(media_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist_media (id INT AUTO_INCREMENT NOT NULL, playlist_id INT NOT NULL, media_id INT NOT NULL, added_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_C930B84F6BBD148 (playlist_id), INDEX IDX_C930B84FEA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE media_category ADD CONSTRAINT FK_92D3773EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_category ADD CONSTRAINT FK_92D377312469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26FBF396750 FOREIGN KEY (id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84F6BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id)');
        $this->addSql('ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84FEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE serie ADD CONSTRAINT FK_AA3A9334BF396750 FOREIGN KEY (id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_media DROP FOREIGN KEY FK_9F544CDCBCF5E72D');
        $this->addSql('ALTER TABLE categorie_media DROP FOREIGN KEY FK_9F544CDCEA9FDD75');
        $this->addSql('ALTER TABLE playlist_subscription_playlist DROP FOREIGN KEY FK_67132B446BBD148');
        $this->addSql('ALTER TABLE playlist_subscription_playlist DROP FOREIGN KEY FK_67132B44B2A122C2');
        $this->addSql('ALTER TABLE media_categorie DROP FOREIGN KEY FK_6C1D65BABCF5E72D');
        $this->addSql('ALTER TABLE media_categorie DROP FOREIGN KEY FK_6C1D65BAEA9FDD75');
        $this->addSql('ALTER TABLE language_media DROP FOREIGN KEY FK_1574A55D82F1BAF4');
        $this->addSql('ALTER TABLE language_media DROP FOREIGN KEY FK_1574A55DEA9FDD75');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('DROP TABLE categorie_media');
        $this->addSql('DROP TABLE playlist_subscription_playlist');
        $this->addSql('DROP TABLE media_categorie');
        $this->addSql('DROP TABLE language_media');
        $this->addSql('DROP TABLE parent_comment');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C605D5AE6');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C9D86650F');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CF8697D13');
        $this->addSql('DROP INDEX IDX_9474526CF8697D13 ON comment');
        $this->addSql('DROP INDEX UNIQ_9474526C605D5AE6 ON comment');
        $this->addSql('DROP INDEX UNIQ_9474526C9D86650F ON comment');
        $this->addSql('ALTER TABLE comment ADD publisher_id INT NOT NULL, DROP comment_id, DROP user_id_id, DROP media_id_id, DROP user_id, DROP user, CHANGE parent_comment_id parent_comment_id INT DEFAULT NULL, CHANGE content content LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CBF2AF943 FOREIGN KEY (parent_comment_id) REFERENCES comment (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C40C86FCE FOREIGN KEY (publisher_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_9474526CBF2AF943 ON comment (parent_comment_id)');
        $this->addSql('CREATE INDEX IDX_9474526C40C86FCE ON comment (publisher_id)');
        $this->addSql('CREATE INDEX IDX_9474526CEA9FDD75 ON comment (media_id)');
        $this->addSql('ALTER TABLE episode ADD season_id INT NOT NULL, ADD released_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP release_date, CHANGE duration duration INT NOT NULL');
        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDA4EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
        $this->addSql('CREATE INDEX IDX_DDAA1CDA4EC001D1 ON episode (season_id)');
        $this->addSql('ALTER TABLE language ADD nom VARCHAR(255) NOT NULL, DROP name, CHANGE code code VARCHAR(3) NOT NULL');
        $this->addSql('ALTER TABLE media ADD discr VARCHAR(255) NOT NULL, CHANGE cover cover_image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE playlist ADD creator_id INT NOT NULL');
        $this->addSql('ALTER TABLE playlist ADD CONSTRAINT FK_D782112D61220EA6 FOREIGN KEY (creator_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_D782112D61220EA6 ON playlist (creator_id)');
        $this->addSql('ALTER TABLE playlist_subscription DROP FOREIGN KEY FK_832940C9D86650F');
        $this->addSql('DROP INDEX IDX_832940C9D86650F ON playlist_subscription');
        $this->addSql('ALTER TABLE playlist_subscription ADD subscriber_id INT NOT NULL, ADD playlist_id INT NOT NULL, DROP user_id_id, CHANGE subscribed_at subscribed_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE playlist_subscription ADD CONSTRAINT FK_832940C7808B1AD FOREIGN KEY (subscriber_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE playlist_subscription ADD CONSTRAINT FK_832940C6BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id)');
        $this->addSql('CREATE INDEX IDX_832940C7808B1AD ON playlist_subscription (subscriber_id)');
        $this->addSql('CREATE INDEX IDX_832940C6BBD148 ON playlist_subscription (playlist_id)');
        $this->addSql('ALTER TABLE season CHANGE seasson_number serie_id INT NOT NULL, CHANGE episode number VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE season ADD CONSTRAINT FK_F0E45BA9D94388BD FOREIGN KEY (serie_id) REFERENCES serie (id)');
        $this->addSql('CREATE INDEX IDX_F0E45BA9D94388BD ON season (serie_id)');
        $this->addSql('ALTER TABLE subscription CHANGE name name VARCHAR(255) NOT NULL, CHANGE duration_month duration INT NOT NULL');
        $this->addSql('ALTER TABLE subscription_history DROP FOREIGN KEY FK_54AF90D0857C9F24');
        $this->addSql('ALTER TABLE subscription_history DROP FOREIGN KEY FK_54AF90D09D86650F');
        $this->addSql('DROP INDEX IDX_54AF90D0857C9F24 ON subscription_history');
        $this->addSql('DROP INDEX IDX_54AF90D09D86650F ON subscription_history');
        $this->addSql('ALTER TABLE subscription_history ADD subscriber_id INT NOT NULL, ADD subscription_id INT NOT NULL, ADD start_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD end_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP user_id_id, DROP subscription_id_id, DROP start_date, DROP end_date');
        $this->addSql('ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D07808B1AD FOREIGN KEY (subscriber_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D09A1887DC FOREIGN KEY (subscription_id) REFERENCES subscription (id)');
        $this->addSql('CREATE INDEX IDX_54AF90D07808B1AD ON subscription_history (subscriber_id)');
        $this->addSql('CREATE INDEX IDX_54AF90D09A1887DC ON subscription_history (subscription_id)');
        $this->addSql('ALTER TABLE watch_history DROP FOREIGN KEY FK_DE44EFD8605D5AE6');
        $this->addSql('ALTER TABLE watch_history DROP FOREIGN KEY FK_DE44EFD89D86650F');
        $this->addSql('DROP INDEX IDX_DE44EFD8605D5AE6 ON watch_history');
        $this->addSql('DROP INDEX IDX_DE44EFD89D86650F ON watch_history');
        $this->addSql('ALTER TABLE watch_history ADD watcher_id INT NOT NULL, ADD media_id INT NOT NULL, ADD last_watched_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD number_of_views INT NOT NULL, DROP user_id_id, DROP media_id_id, DROP number_of_view');
        $this->addSql('ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD8C300AB5D FOREIGN KEY (watcher_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD8EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_DE44EFD8C300AB5D ON watch_history (watcher_id)');
        $this->addSql('CREATE INDEX IDX_DE44EFD8EA9FDD75 ON watch_history (media_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE season DROP FOREIGN KEY FK_F0E45BA9D94388BD');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, label VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, headers LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, queue_name VARCHAR(190) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E016BA31DB (delivered_at), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E0FB7336F0 (queue_name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE categorie_media (categorie_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_9F544CDCBCF5E72D (categorie_id), INDEX IDX_9F544CDCEA9FDD75 (media_id), PRIMARY KEY(categorie_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE playlist_subscription_playlist (playlist_subscription_id INT NOT NULL, playlist_id INT NOT NULL, INDEX IDX_67132B446BBD148 (playlist_id), INDEX IDX_67132B44B2A122C2 (playlist_subscription_id), PRIMARY KEY(playlist_subscription_id, playlist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE media_categorie (media_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_6C1D65BABCF5E72D (categorie_id), INDEX IDX_6C1D65BAEA9FDD75 (media_id), PRIMARY KEY(media_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE language_media (language_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_1574A55D82F1BAF4 (language_id), INDEX IDX_1574A55DEA9FDD75 (media_id), PRIMARY KEY(language_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE parent_comment (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE categorie_media ADD CONSTRAINT FK_9F544CDCBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_media ADD CONSTRAINT FK_9F544CDCEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_subscription_playlist ADD CONSTRAINT FK_67132B446BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_subscription_playlist ADD CONSTRAINT FK_67132B44B2A122C2 FOREIGN KEY (playlist_subscription_id) REFERENCES playlist_subscription (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_categorie ADD CONSTRAINT FK_6C1D65BABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_categorie ADD CONSTRAINT FK_6C1D65BAEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE language_media ADD CONSTRAINT FK_1574A55D82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE language_media ADD CONSTRAINT FK_1574A55DEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_category DROP FOREIGN KEY FK_92D3773EA9FDD75');
        $this->addSql('ALTER TABLE media_category DROP FOREIGN KEY FK_92D377312469DE2');
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26FBF396750');
        $this->addSql('ALTER TABLE playlist_media DROP FOREIGN KEY FK_C930B84F6BBD148');
        $this->addSql('ALTER TABLE playlist_media DROP FOREIGN KEY FK_C930B84FEA9FDD75');
        $this->addSql('ALTER TABLE serie DROP FOREIGN KEY FK_AA3A9334BF396750');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE media_category');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE playlist_media');
        $this->addSql('DROP TABLE serie');
        $this->addSql('DROP INDEX IDX_F0E45BA9D94388BD ON season');
        $this->addSql('ALTER TABLE season CHANGE serie_id seasson_number INT NOT NULL, CHANGE number episode VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE language ADD name VARCHAR(100) NOT NULL, DROP nom, CHANGE code code VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDA4EC001D1');
        $this->addSql('DROP INDEX IDX_DDAA1CDA4EC001D1 ON episode');
        $this->addSql('ALTER TABLE episode ADD release_date DATETIME NOT NULL, DROP season_id, DROP released_at, CHANGE duration duration VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CBF2AF943');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C40C86FCE');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CEA9FDD75');
        $this->addSql('DROP INDEX IDX_9474526CBF2AF943 ON comment');
        $this->addSql('DROP INDEX IDX_9474526C40C86FCE ON comment');
        $this->addSql('DROP INDEX IDX_9474526CEA9FDD75 ON comment');
        $this->addSql('ALTER TABLE comment ADD user_id_id INT DEFAULT NULL, ADD media_id_id INT DEFAULT NULL, ADD user_id INT NOT NULL, ADD user VARCHAR(255) NOT NULL, CHANGE parent_comment_id parent_comment_id INT NOT NULL, CHANGE content content VARCHAR(255) NOT NULL, CHANGE publisher_id comment_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C605D5AE6 FOREIGN KEY (media_id_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CF8697D13 FOREIGN KEY (comment_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_9474526CF8697D13 ON comment (comment_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9474526C605D5AE6 ON comment (media_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9474526C9D86650F ON comment (user_id_id)');
        $this->addSql('ALTER TABLE playlist_subscription DROP FOREIGN KEY FK_832940C7808B1AD');
        $this->addSql('ALTER TABLE playlist_subscription DROP FOREIGN KEY FK_832940C6BBD148');
        $this->addSql('DROP INDEX IDX_832940C7808B1AD ON playlist_subscription');
        $this->addSql('DROP INDEX IDX_832940C6BBD148 ON playlist_subscription');
        $this->addSql('ALTER TABLE playlist_subscription ADD user_id_id INT DEFAULT NULL, DROP subscriber_id, DROP playlist_id, CHANGE subscribed_at subscribed_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE playlist_subscription ADD CONSTRAINT FK_832940C9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_832940C9D86650F ON playlist_subscription (user_id_id)');
        $this->addSql('ALTER TABLE playlist DROP FOREIGN KEY FK_D782112D61220EA6');
        $this->addSql('DROP INDEX IDX_D782112D61220EA6 ON playlist');
        $this->addSql('ALTER TABLE playlist DROP creator_id');
        $this->addSql('ALTER TABLE media ADD cover VARCHAR(255) NOT NULL, DROP cover_image, DROP discr');
        $this->addSql('ALTER TABLE subscription CHANGE name name VARCHAR(100) NOT NULL, CHANGE duration duration_month INT NOT NULL');
        $this->addSql('ALTER TABLE subscription_history DROP FOREIGN KEY FK_54AF90D07808B1AD');
        $this->addSql('ALTER TABLE subscription_history DROP FOREIGN KEY FK_54AF90D09A1887DC');
        $this->addSql('DROP INDEX IDX_54AF90D07808B1AD ON subscription_history');
        $this->addSql('DROP INDEX IDX_54AF90D09A1887DC ON subscription_history');
        $this->addSql('ALTER TABLE subscription_history ADD user_id_id INT DEFAULT NULL, ADD subscription_id_id INT DEFAULT NULL, ADD start_date DATETIME NOT NULL, ADD end_date DATETIME NOT NULL, DROP subscriber_id, DROP subscription_id, DROP start_at, DROP end_at');
        $this->addSql('ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D0857C9F24 FOREIGN KEY (subscription_id_id) REFERENCES subscription (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D09D86650F FOREIGN KEY (user_id_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_54AF90D0857C9F24 ON subscription_history (subscription_id_id)');
        $this->addSql('CREATE INDEX IDX_54AF90D09D86650F ON subscription_history (user_id_id)');
        $this->addSql('ALTER TABLE watch_history DROP FOREIGN KEY FK_DE44EFD8C300AB5D');
        $this->addSql('ALTER TABLE watch_history DROP FOREIGN KEY FK_DE44EFD8EA9FDD75');
        $this->addSql('DROP INDEX IDX_DE44EFD8C300AB5D ON watch_history');
        $this->addSql('DROP INDEX IDX_DE44EFD8EA9FDD75 ON watch_history');
        $this->addSql('ALTER TABLE watch_history ADD user_id_id INT DEFAULT NULL, ADD media_id_id INT DEFAULT NULL, ADD number_of_view VARCHAR(255) NOT NULL, DROP watcher_id, DROP media_id, DROP last_watched_at, DROP number_of_views');
        $this->addSql('ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD8605D5AE6 FOREIGN KEY (media_id_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD89D86650F FOREIGN KEY (user_id_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_DE44EFD8605D5AE6 ON watch_history (media_id_id)');
        $this->addSql('CREATE INDEX IDX_DE44EFD89D86650F ON watch_history (user_id_id)');
    }
}
