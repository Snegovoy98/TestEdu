<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180908130937 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE regions (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, short_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql("INSERT INTO regions (name, short_name) VALUES ('Винницкая область', 'АB'), 
                                                                          ('Волынская область', 'АC'),
                                                                          ('Днепропетровская область', 'AЕ'),
                                                                          ('Донецкая область', 'AН'),
                                                                          ('Житомирская область', 'АM'), 
                                                                          ('Закарпатская область', 'АO'),
                                                                          ('Запорожская область', 'АP'),
                                                                          ('Ивано-Франковская область', 'АT'),
                                                                          ('Киевская область', 'AI'),
                                                                          ('Кировоградская область', 'BА'),
                                                                          ('Луганская область', 'ВB'),
                                                                          ('Львовская область', 'ВC'),
                                                                          ('Николаевская область', 'ВE'),
                                                                          ('Одесская область', 'BН'),
                                                                          ('Полтавская область', 'ВI'),
                                                                          ('Ровенская область', 'BК'),
                                                                          ('Сумская область', 'ВM' ),
                                                                          ('Тернопольская область', 'ВO'),
                                                                          ('Харьковская область', 'АX'),
                                                                          ('Херсонская область', 'ВT'),
                                                                          ('Хмельницкая область', 'ВX'),
                                                                          ('Черкасская область', 'CА'),
                                                                          ('Черниговская область', 'CВ'),
                                                                          ('Черновицкая область', 'СE') ");
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE regions');
    }
}
