<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180905203000 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE answers (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, answer VARCHAR(255) NOT NULL, correct TINYINT(1) DEFAULT NULL, INDEX IDX_50D0C6061E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cities (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classes (id INT AUTO_INCREMENT NOT NULL, school_id INT NOT NULL, class_number INT NOT NULL, INDEX IDX_2ED7EC5C32A47EE (school_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profile_settings (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, avatar VARCHAR(255) NOT NULL, INDEX IDX_1C2FC174A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profile_settins (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE questions (id INT AUTO_INCREMENT NOT NULL, subject_id INT NOT NULL, question VARCHAR(255) NOT NULL, INDEX IDX_8ADC54D523EDC87 (subject_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE results (id INT AUTO_INCREMENT NOT NULL, result VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE school (id INT AUTO_INCREMENT NOT NULL, city_id INT NOT NULL, name VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_F99EDABB8BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subjects (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, no VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subjects_classes (subjects_id INT NOT NULL, classes_id INT NOT NULL, INDEX IDX_2A1DAE6794AF957A (subjects_id), INDEX IDX_2A1DAE679E225B24 (classes_id), PRIMARY KEY(subjects_id, classes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, city_id INT NOT NULL, school_id INT NOT NULL, class_id INT NOT NULL, surname VARCHAR(60) NOT NULL, name VARCHAR(70) NOT NULL, fathername VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, is_admin TINYINT(1) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_8D93D6498BAC62AF (city_id), INDEX IDX_8D93D649C32A47EE (school_id), INDEX IDX_8D93D649EA000B10 (class_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE answers ADD CONSTRAINT FK_50D0C6061E27F6BF FOREIGN KEY (question_id) REFERENCES questions (id)');
        $this->addSql('ALTER TABLE classes ADD CONSTRAINT FK_2ED7EC5C32A47EE FOREIGN KEY (school_id) REFERENCES school (id)');
        $this->addSql('ALTER TABLE profile_settings ADD CONSTRAINT FK_1C2FC174A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE questions ADD CONSTRAINT FK_8ADC54D523EDC87 FOREIGN KEY (subject_id) REFERENCES subjects (id)');
        $this->addSql('ALTER TABLE school ADD CONSTRAINT FK_F99EDABB8BAC62AF FOREIGN KEY (city_id) REFERENCES cities (id)');
        $this->addSql('ALTER TABLE subjects_classes ADD CONSTRAINT FK_2A1DAE6794AF957A FOREIGN KEY (subjects_id) REFERENCES subjects (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE subjects_classes ADD CONSTRAINT FK_2A1DAE679E225B24 FOREIGN KEY (classes_id) REFERENCES classes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498BAC62AF FOREIGN KEY (city_id) REFERENCES cities (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649C32A47EE FOREIGN KEY (school_id) REFERENCES school (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649EA000B10 FOREIGN KEY (class_id) REFERENCES classes (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE school DROP FOREIGN KEY FK_F99EDABB8BAC62AF');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498BAC62AF');
        $this->addSql('ALTER TABLE subjects_classes DROP FOREIGN KEY FK_2A1DAE679E225B24');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649EA000B10');
        $this->addSql('ALTER TABLE answers DROP FOREIGN KEY FK_50D0C6061E27F6BF');
        $this->addSql('ALTER TABLE classes DROP FOREIGN KEY FK_2ED7EC5C32A47EE');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649C32A47EE');
        $this->addSql('ALTER TABLE questions DROP FOREIGN KEY FK_8ADC54D523EDC87');
        $this->addSql('ALTER TABLE subjects_classes DROP FOREIGN KEY FK_2A1DAE6794AF957A');
        $this->addSql('ALTER TABLE profile_settings DROP FOREIGN KEY FK_1C2FC174A76ED395');
        $this->addSql('DROP TABLE answers');
        $this->addSql('DROP TABLE cities');
        $this->addSql('DROP TABLE classes');
        $this->addSql('DROP TABLE profile_settings');
        $this->addSql('DROP TABLE profile_settins');
        $this->addSql('DROP TABLE questions');
        $this->addSql('DROP TABLE results');
        $this->addSql('DROP TABLE school');
        $this->addSql('DROP TABLE subjects');
        $this->addSql('DROP TABLE subjects_classes');
        $this->addSql('DROP TABLE user');
    }
}
