<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200405020330 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE dice_round_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE dice_round (id INT NOT NULL, game_id INT NOT NULL, member_id INT NOT NULL, result_id INT DEFAULT NULL, parameters JSON DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B2B89892E48FD905 ON dice_round (game_id)');
        $this->addSql('CREATE INDEX IDX_B2B898927597D3FE ON dice_round (member_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B2B898927A7B643 ON dice_round (result_id)');
        $this->addSql('ALTER TABLE dice_round ADD CONSTRAINT FK_B2B89892E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE dice_round ADD CONSTRAINT FK_B2B898927597D3FE FOREIGN KEY (member_id) REFERENCES member (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE dice_round ADD CONSTRAINT FK_B2B898927A7B643 FOREIGN KEY (result_id) REFERENCES dice_round_result (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE dice_bet ADD dice_round_id INT NOT NULL');
        $this->addSql('ALTER TABLE dice_bet ADD CONSTRAINT FK_67C0D7AAE4F492B0 FOREIGN KEY (dice_round_id) REFERENCES dice_round (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_67C0D7AAE4F492B0 ON dice_bet (dice_round_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE dice_bet DROP CONSTRAINT FK_67C0D7AAE4F492B0');
        $this->addSql('DROP SEQUENCE dice_round_id_seq CASCADE');
        $this->addSql('DROP TABLE dice_round');
        $this->addSql('DROP INDEX IDX_67C0D7AAE4F492B0');
        $this->addSql('ALTER TABLE dice_bet DROP dice_round_id');
    }
}
