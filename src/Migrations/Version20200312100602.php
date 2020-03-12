<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200312100602 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE guest (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(80) NOT NULL, last_name VARCHAR(80) NOT NULL, member_since DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hosted_at (id INT AUTO_INCREMENT NOT NULL, guest_id INT NOT NULL, occupied_room_id INT NOT NULL, INDEX FK_29 (guest_id), INDEX FK_51 (occupied_room_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE occupied_room (id INT AUTO_INCREMENT NOT NULL, check_in DATETIME DEFAULT NULL, check_out DATETIME DEFAULT NULL, reservation_id INT NOT NULL, room_id INT NOT NULL, INDEX FK_39 (reservation_id), INDEX FK_48 (room_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, date_in DATE NOT NULL, date_out DATE NOT NULL, made_by VARCHAR(20) NOT NULL, guest_id INT NOT NULL, INDEX FK_16 (guest_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reserved_room (id INT AUTO_INCREMENT NOT NULL, reservation_id INT DEFAULT NULL, room_type_id INT DEFAULT NULL, number_of_rooms INT DEFAULT NULL, INDEX fk_reserved_room_room_type1 (room_type_id), INDEX fk_reserved_room_reservation1 (reservation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room (id INT AUTO_INCREMENT NOT NULL, number VARCHAR(10) NOT NULL, name VARCHAR(40) NOT NULL, status VARCHAR(10) NOT NULL, room_type_id INT NOT NULL, INDEX FK_59 (room_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room_type (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(80) NOT NULL, max_capacity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reserved_room ADD CONSTRAINT FK_223AE444B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE reserved_room ADD CONSTRAINT FK_223AE444296E3073 FOREIGN KEY (room_type_id) REFERENCES room_type (id)');
        $this->addSql('ALTER TABLE article CHANGE url url VARCHAR(200) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reserved_room DROP FOREIGN KEY FK_223AE444B83297E7');
        $this->addSql('ALTER TABLE reserved_room DROP FOREIGN KEY FK_223AE444296E3073');
        $this->addSql('DROP TABLE guest');
        $this->addSql('DROP TABLE hosted_at');
        $this->addSql('DROP TABLE occupied_room');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE reserved_room');
        $this->addSql('DROP TABLE room');
        $this->addSql('DROP TABLE room_type');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE article CHANGE url url VARCHAR(200) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
