<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240201141124 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE achievement (id INT AUTO_INCREMENT NOT NULL, game_id INT DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, picture VARCHAR(255) DEFAULT NULL, date_unlocked DATETIME NOT NULL, INDEX IDX_96737FF1E48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE achievement_user (achievement_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_E71294E0B3EC99FE (achievement_id), INDEX IDX_E71294E0A76ED395 (user_id), PRIMARY KEY(achievement_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE friend (id INT AUTO_INCREMENT NOT NULL, user_a_id INT DEFAULT NULL, user_b_id INT DEFAULT NULL, INDEX IDX_55EEAC61415F1F91 (user_a_id), INDEX IDX_55EEAC6153EAB07F (user_b_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, picture VARCHAR(255) DEFAULT NULL, is_public TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, user_a_id INT DEFAULT NULL, player_b_id INT DEFAULT NULL, message VARCHAR(255) NOT NULL, is_removed TINYINT(1) NOT NULL, INDEX IDX_B6BD307F415F1F91 (user_a_id), INDEX IDX_B6BD307F8B71AC85 (player_b_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE score (id INT AUTO_INCREMENT NOT NULL, game_id INT DEFAULT NULL, player_id INT DEFAULT NULL, time DATETIME NOT NULL, score VARCHAR(255) NOT NULL, INDEX IDX_32993751E48FD905 (game_id), INDEX IDX_3299375199E6F5DF (player_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, birthday DATETIME DEFAULT NULL, picture VARCHAR(255) DEFAULT NULL, is_banned TINYINT(1) NOT NULL, is_admin TINYINT(1) NOT NULL, is_muted TINYINT(1) NOT NULL, is_friend_invite_blocked TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_game (user_id INT NOT NULL, game_id INT NOT NULL, INDEX IDX_59AA7D45A76ED395 (user_id), INDEX IDX_59AA7D45E48FD905 (game_id), PRIMARY KEY(user_id, game_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE achievement ADD CONSTRAINT FK_96737FF1E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE achievement_user ADD CONSTRAINT FK_E71294E0B3EC99FE FOREIGN KEY (achievement_id) REFERENCES achievement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE achievement_user ADD CONSTRAINT FK_E71294E0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE friend ADD CONSTRAINT FK_55EEAC61415F1F91 FOREIGN KEY (user_a_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE friend ADD CONSTRAINT FK_55EEAC6153EAB07F FOREIGN KEY (user_b_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F415F1F91 FOREIGN KEY (user_a_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F8B71AC85 FOREIGN KEY (player_b_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_32993751E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_3299375199E6F5DF FOREIGN KEY (player_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_game ADD CONSTRAINT FK_59AA7D45A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_game ADD CONSTRAINT FK_59AA7D45E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achievement DROP FOREIGN KEY FK_96737FF1E48FD905');
        $this->addSql('ALTER TABLE achievement_user DROP FOREIGN KEY FK_E71294E0B3EC99FE');
        $this->addSql('ALTER TABLE achievement_user DROP FOREIGN KEY FK_E71294E0A76ED395');
        $this->addSql('ALTER TABLE friend DROP FOREIGN KEY FK_55EEAC61415F1F91');
        $this->addSql('ALTER TABLE friend DROP FOREIGN KEY FK_55EEAC6153EAB07F');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F415F1F91');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F8B71AC85');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_32993751E48FD905');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_3299375199E6F5DF');
        $this->addSql('ALTER TABLE user_game DROP FOREIGN KEY FK_59AA7D45A76ED395');
        $this->addSql('ALTER TABLE user_game DROP FOREIGN KEY FK_59AA7D45E48FD905');
        $this->addSql('DROP TABLE achievement');
        $this->addSql('DROP TABLE achievement_user');
        $this->addSql('DROP TABLE friend');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE score');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_game');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
