<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230418134848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add index for token_value';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE INDEX IDX_6196A1F9BEA95C75 ON sylius_order (token_value)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP INDEX IDX_6196A1F9BEA95C75 ON sylius_order');
    }
}
