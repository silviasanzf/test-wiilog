<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181203145940 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE french (id INT AUTO_INCREMENT NOT NULL, def TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE company CHANGE name name VARCHAR(255) NOT NULL, CHANGE address1 address1 LONGTEXT DEFAULT NULL, CHANGE post_code post_code VARCHAR(255) DEFAULT NULL, CHANGE city city VARCHAR(255) DEFAULT NULL, CHANGE siret siret VARCHAR(255) DEFAULT NULL, CHANGE phone phone VARCHAR(255) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE french');
        $this->addSql('ALTER TABLE company CHANGE name name LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE address1 address1 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE post_code post_code LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE city city LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE siret siret LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE phone phone LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE email email LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
