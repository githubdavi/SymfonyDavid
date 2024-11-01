<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241002142612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, label VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_media (categorie_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_9F544CDCBCF5E72D (categorie_id), INDEX IDX_9F544CDCEA9FDD75 (media_id), PRIMARY KEY(categorie_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, comment_id INT NOT NULL, user_id_id INT DEFAULT NULL, media_id_id INT DEFAULT NULL, user_id INT NOT NULL, media_id INT NOT NULL, parent_comment_id INT NOT NULL, content VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, user VARCHAR(255) NOT NULL, INDEX IDX_9474526CF8697D13 (comment_id), UNIQUE INDEX UNIQ_9474526C9D86650F (user_id_id), UNIQUE INDEX UNIQ_9474526C605D5AE6 (media_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE episode (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, duration VARCHAR(255) NOT NULL, release_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, code VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language_media (language_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_1574A55D82F1BAF4 (language_id), INDEX IDX_1574A55DEA9FDD75 (media_id), PRIMARY KEY(language_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, short_description LONGTEXT NOT NULL, long_description LONGTEXT NOT NULL, release_date DATETIME NOT NULL, cover VARCHAR(255) NOT NULL, casting JSON NOT NULL, staff JSON NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_categorie (media_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_6C1D65BAEA9FDD75 (media_id), INDEX IDX_6C1D65BABCF5E72D (categorie_id), PRIMARY KEY(media_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_language (media_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_DBBA5F07EA9FDD75 (media_id), INDEX IDX_DBBA5F0782F1BAF4 (language_id), PRIMARY KEY(media_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parent_comment (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist_subscription (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, subscribed_at DATETIME NOT NULL, INDEX IDX_832940C9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist_subscription_playlist (playlist_subscription_id INT NOT NULL, playlist_id INT NOT NULL, INDEX IDX_67132B44B2A122C2 (playlist_subscription_id), INDEX IDX_67132B446BBD148 (playlist_id), PRIMARY KEY(playlist_subscription_id, playlist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE season (id INT AUTO_INCREMENT NOT NULL, seasson_number INT NOT NULL, episode VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscription (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, price INT NOT NULL, duration_month INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscription_history (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, subscription_id_id INT DEFAULT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, INDEX IDX_54AF90D09D86650F (user_id_id), INDEX IDX_54AF90D0857C9F24 (subscription_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, current_subscription_id INT DEFAULT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, account_status VARCHAR(255) NOT NULL, INDEX IDX_8D93D649DDE45DDE (current_subscription_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE watch_history (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, media_id_id INT DEFAULT NULL, number_of_view VARCHAR(255) NOT NULL, INDEX IDX_DE44EFD89D86650F (user_id_id), INDEX IDX_DE44EFD8605D5AE6 (media_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorie_media ADD CONSTRAINT FK_9F544CDCBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_media ADD CONSTRAINT FK_9F544CDCEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CF8697D13 FOREIGN KEY (comment_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C9D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C605D5AE6 FOREIGN KEY (media_id_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE language_media ADD CONSTRAINT FK_1574A55D82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE language_media ADD CONSTRAINT FK_1574A55DEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_categorie ADD CONSTRAINT FK_6C1D65BAEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_categorie ADD CONSTRAINT FK_6C1D65BABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_language ADD CONSTRAINT FK_DBBA5F07EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_language ADD CONSTRAINT FK_DBBA5F0782F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_subscription ADD CONSTRAINT FK_832940C9D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE playlist_subscription_playlist ADD CONSTRAINT FK_67132B44B2A122C2 FOREIGN KEY (playlist_subscription_id) REFERENCES playlist_subscription (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_subscription_playlist ADD CONSTRAINT FK_67132B446BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D09D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D0857C9F24 FOREIGN KEY (subscription_id_id) REFERENCES subscription (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649DDE45DDE FOREIGN KEY (current_subscription_id) REFERENCES subscription (id)');
        $this->addSql('ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD89D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD8605D5AE6 FOREIGN KEY (media_id_id) REFERENCES media (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie_media DROP FOREIGN KEY FK_9F544CDCBCF5E72D');
        $this->addSql('ALTER TABLE categorie_media DROP FOREIGN KEY FK_9F544CDCEA9FDD75');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CF8697D13');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C9D86650F');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C605D5AE6');
        $this->addSql('ALTER TABLE language_media DROP FOREIGN KEY FK_1574A55D82F1BAF4');
        $this->addSql('ALTER TABLE language_media DROP FOREIGN KEY FK_1574A55DEA9FDD75');
        $this->addSql('ALTER TABLE media_categorie DROP FOREIGN KEY FK_6C1D65BAEA9FDD75');
        $this->addSql('ALTER TABLE media_categorie DROP FOREIGN KEY FK_6C1D65BABCF5E72D');
        $this->addSql('ALTER TABLE media_language DROP FOREIGN KEY FK_DBBA5F07EA9FDD75');
        $this->addSql('ALTER TABLE media_language DROP FOREIGN KEY FK_DBBA5F0782F1BAF4');
        $this->addSql('ALTER TABLE playlist_subscription DROP FOREIGN KEY FK_832940C9D86650F');
        $this->addSql('ALTER TABLE playlist_subscription_playlist DROP FOREIGN KEY FK_67132B44B2A122C2');
        $this->addSql('ALTER TABLE playlist_subscription_playlist DROP FOREIGN KEY FK_67132B446BBD148');
        $this->addSql('ALTER TABLE subscription_history DROP FOREIGN KEY FK_54AF90D09D86650F');
        $this->addSql('ALTER TABLE subscription_history DROP FOREIGN KEY FK_54AF90D0857C9F24');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649DDE45DDE');
        $this->addSql('ALTER TABLE watch_history DROP FOREIGN KEY FK_DE44EFD89D86650F');
        $this->addSql('ALTER TABLE watch_history DROP FOREIGN KEY FK_DE44EFD8605D5AE6');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE categorie_media');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE episode');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE language_media');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE media_categorie');
        $this->addSql('DROP TABLE media_language');
        $this->addSql('DROP TABLE parent_comment');
        $this->addSql('DROP TABLE playlist');
        $this->addSql('DROP TABLE playlist_subscription');
        $this->addSql('DROP TABLE playlist_subscription_playlist');
        $this->addSql('DROP TABLE season');
        $this->addSql('DROP TABLE subscription');
        $this->addSql('DROP TABLE subscription_history');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE watch_history');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
