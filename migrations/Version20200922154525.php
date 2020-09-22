<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200922154525 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Init project migrations';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE event_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE event_bid_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE event_custom_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE event_custom_time_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE event_time_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE event (id INT NOT NULL, name VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE event_bid (id INT NOT NULL, event_id_id INT NOT NULL, date DATE NOT NULL, time VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5B3D76203E5F2F7B ON event_bid (event_id_id)');
        $this->addSql('CREATE TABLE event_custom (id INT NOT NULL, event_id_id INT NOT NULL, date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C71D61C93E5F2F7B ON event_custom (event_id_id)');
        $this->addSql('CREATE TABLE event_custom_time (id INT NOT NULL, custom_id_id INT NOT NULL, time VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C56B8338BC49663E ON event_custom_time (custom_id_id)');
        $this->addSql('CREATE TABLE event_time (id INT NOT NULL, event_id_id INT NOT NULL, week_day INT NOT NULL, time VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_705FD4EE3E5F2F7B ON event_time (event_id_id)');
        $this->addSql('ALTER TABLE event_bid ADD CONSTRAINT FK_5B3D76203E5F2F7B FOREIGN KEY (event_id_id) REFERENCES event (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE event_custom ADD CONSTRAINT FK_C71D61C93E5F2F7B FOREIGN KEY (event_id_id) REFERENCES event (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE event_custom_time ADD CONSTRAINT FK_C56B8338BC49663E FOREIGN KEY (custom_id_id) REFERENCES event_custom (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE event_time ADD CONSTRAINT FK_705FD4EE3E5F2F7B FOREIGN KEY (event_id_id) REFERENCES event (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE event_bid DROP CONSTRAINT FK_5B3D76203E5F2F7B');
        $this->addSql('ALTER TABLE event_custom DROP CONSTRAINT FK_C71D61C93E5F2F7B');
        $this->addSql('ALTER TABLE event_time DROP CONSTRAINT FK_705FD4EE3E5F2F7B');
        $this->addSql('ALTER TABLE event_custom_time DROP CONSTRAINT FK_C56B8338BC49663E');
        $this->addSql('DROP SEQUENCE event_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE event_bid_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE event_custom_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE event_custom_time_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE event_time_id_seq CASCADE');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_bid');
        $this->addSql('DROP TABLE event_custom');
        $this->addSql('DROP TABLE event_custom_time');
        $this->addSql('DROP TABLE event_time');
    }
}
