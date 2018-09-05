<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180905174822 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cities (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classes (id INT AUTO_INCREMENT NOT NULL, school_id INT NOT NULL, class_number INT NOT NULL, INDEX IDX_2ED7EC5C32A47EE (school_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE results (id INT AUTO_INCREMENT NOT NULL, result VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE school (id INT AUTO_INCREMENT NOT NULL, city_id INT NOT NULL, name VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_F99EDABB8BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subjects (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, no VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subjects_classes (subjects_id INT NOT NULL, classes_id INT NOT NULL, INDEX IDX_2A1DAE6794AF957A (subjects_id), INDEX IDX_2A1DAE679E225B24 (classes_id), PRIMARY KEY(subjects_id, classes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE classes ADD CONSTRAINT FK_2ED7EC5C32A47EE FOREIGN KEY (school_id) REFERENCES school (id)');
        $this->addSql('ALTER TABLE school ADD CONSTRAINT FK_F99EDABB8BAC62AF FOREIGN KEY (city_id) REFERENCES cities (id)');
        $this->addSql('ALTER TABLE subjects_classes ADD CONSTRAINT FK_2A1DAE6794AF957A FOREIGN KEY (subjects_id) REFERENCES subjects (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE subjects_classes ADD CONSTRAINT FK_2A1DAE679E225B24 FOREIGN KEY (classes_id) REFERENCES classes (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE school DROP FOREIGN KEY FK_F99EDABB8BAC62AF');
        $this->addSql('ALTER TABLE subjects_classes DROP FOREIGN KEY FK_2A1DAE679E225B24');
        $this->addSql('ALTER TABLE classes DROP FOREIGN KEY FK_2ED7EC5C32A47EE');
        $this->addSql('ALTER TABLE subjects_classes DROP FOREIGN KEY FK_2A1DAE6794AF957A');
        $this->addSql('DROP TABLE cities');
        $this->addSql('DROP TABLE classes');
        $this->addSql('DROP TABLE results');
        $this->addSql('DROP TABLE school');
        $this->addSql('DROP TABLE subjects');
        $this->addSql('DROP TABLE subjects_classes');
    }
}
