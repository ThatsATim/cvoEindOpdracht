<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240131214515 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achievement DROP FOREIGN KEY FK_96737FF14D77E7D8');
        $this->addSql('DROP INDEX IDX_96737FF14D77E7D8 ON achievement');
        $this->addSql('ALTER TABLE achievement CHANGE game_id_id game_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE achievement ADD CONSTRAINT FK_96737FF1E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('CREATE INDEX IDX_96737FF1E48FD905 ON achievement (game_id)');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_329937514D77E7D8');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_32993751C036E511');
        $this->addSql('DROP INDEX IDX_329937514D77E7D8 ON score');
        $this->addSql('DROP INDEX IDX_32993751C036E511 ON score');
        $this->addSql('ALTER TABLE score ADD game_id INT DEFAULT NULL, ADD player_id INT DEFAULT NULL, DROP game_id_id, DROP player_id_id');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_32993751E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_3299375199E6F5DF FOREIGN KEY (player_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_32993751E48FD905 ON score (game_id)');
        $this->addSql('CREATE INDEX IDX_3299375199E6F5DF ON score (player_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achievement DROP FOREIGN KEY FK_96737FF1E48FD905');
        $this->addSql('DROP INDEX IDX_96737FF1E48FD905 ON achievement');
        $this->addSql('ALTER TABLE achievement CHANGE game_id game_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE achievement ADD CONSTRAINT FK_96737FF14D77E7D8 FOREIGN KEY (game_id_id) REFERENCES game (id)');
        $this->addSql('CREATE INDEX IDX_96737FF14D77E7D8 ON achievement (game_id_id)');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_32993751E48FD905');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_3299375199E6F5DF');
        $this->addSql('DROP INDEX IDX_32993751E48FD905 ON score');
        $this->addSql('DROP INDEX IDX_3299375199E6F5DF ON score');
        $this->addSql('ALTER TABLE score ADD game_id_id INT DEFAULT NULL, ADD player_id_id INT DEFAULT NULL, DROP game_id, DROP player_id');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_329937514D77E7D8 FOREIGN KEY (game_id_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_32993751C036E511 FOREIGN KEY (player_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_329937514D77E7D8 ON score (game_id_id)');
        $this->addSql('CREATE INDEX IDX_32993751C036E511 ON score (player_id_id)');
    }
}
