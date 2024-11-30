<?php

declare(strict_types=1);

use Migrations\BaseMigration;

class CreateUsers extends BaseMigration
{
    public bool $autoId = false;

    public function up(): void
    {
        $table = $this->table('users');
        $table->addColumn('id_user', 'integer', [
            'autoIncrement' => true,
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('email', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('username', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('password', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addTimestamps('created_at', 'updated_at');
        $table->addIndex([
            'email',

        ], [
            'name' => 'UNIQUE_EMAIL',
            'unique' => true,
        ]);
        $table->addPrimaryKey([
            'id_user',
        ]);
        $table->create();
    }

    public function down(): void
    {
        $this->table('users')->drop()->save();
    }
}
