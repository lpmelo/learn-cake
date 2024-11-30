<?php

declare(strict_types=1);

use Migrations\BaseMigration;

class CreateStorage extends BaseMigration
{
    public bool $autoId = false;

    public function up(): void
    {
        $table = $this->table('storage');
        $table->addColumn('id_storage', 'integer', [
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
        $table->addColumn('fk_id_product', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addForeignKey(
            'fk_id_user',
            'users',
            'id_user',
            ['delete' => 'RESTRICT', 'update' => 'NO_ACTION']
        );
        $table->addForeignKey(
            'fk_id_product',
            'products',
            'id_product',
            ['delete' => 'RESTRICT', 'update' => 'NO_ACTION']
        );
        $table->addPrimaryKey([
            'id_storage',
        ]);
        $table->addTimestamps('created_at', 'updated_at');
        $table->create();
    }

    public function down(): void
    {
        $this->table('storage')->drop()->save();
    }
}
