<?php

declare(strict_types=1);

use Migrations\BaseMigration;

class CreateAuthentications extends BaseMigration
{
    public bool $autoId = false;

    public function up(): void
    {
        $table = $this->table('authentications');
        $table->addColumn('id_auth', 'integer', [
            'autoIncrement' => true,
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('fk_id_user', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('token', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addTimestamps('created_at', 'updated_at');
        $table->addPrimaryKey([
            'id_auth',
        ]);
        $table->addForeignKey('fk_id_user', 'users', 'id_user');
        $table->create();
    }

    public function down(): void
    {
        $this->table('authentications')->drop()->save();
    }
}
