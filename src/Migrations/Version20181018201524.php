<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181018201524 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE classes (id INT AUTO_INCREMENT NOT NULL, school_id INT NOT NULL, class_number INT NOT NULL, INDEX IDX_2ED7EC5C32A47EE (school_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE classes ADD CONSTRAINT FK_2ED7EC5C32A47EE FOREIGN KEY (school_id) REFERENCES schools (id)');
        $this->addSql("INSERT INTO classes(class_number, school_id) VALUES (1, 1),
                                                                                (2, 1),
                                                                                (3, 1),
                                                                                (4, 1),
                                                                                (5, 1),
                                                                                (6, 1),
                                                                                (7, 1),
                                                                                (8, 1),
                                                                                (9, 1),
                                                                                (10, 1),
                                                                                (11, 1)
                                                                              ");
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE classes');
    }
}
