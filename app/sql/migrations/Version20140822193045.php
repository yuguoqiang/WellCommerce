<?php

namespace WellCommerce\Migration;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140822193045 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE producer ADD photo_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE producer ADD CONSTRAINT FK_976449DC7E9E4C8C FOREIGN KEY (photo_id) REFERENCES media (id) ON DELETE SET NULL");
        $this->addSql("CREATE INDEX IDX_976449DC7E9E4C8C ON producer (photo_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE producer DROP FOREIGN KEY FK_976449DC7E9E4C8C");
        $this->addSql("DROP INDEX IDX_976449DC7E9E4C8C ON producer");
        $this->addSql("ALTER TABLE producer DROP photo_id");
    }
}
