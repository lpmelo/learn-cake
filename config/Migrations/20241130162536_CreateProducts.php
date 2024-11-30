<?php

declare(strict_types=1);

use Migrations\BaseMigration;

class CreateProducts extends BaseMigration
{
    public bool $autoId = false;

    public function up(): void
    {
        $table = $this->table('products');
        $table->addColumn('id_product', 'integer', [
            'autoIncrement' => true,
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('description', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('unit_price', 'decimal', [
            'default' => null,
            'null' => false,
            'precision' => 10,
            'scale' => 2,
        ]);
        $table->addTimestamps('created_at', 'updated_at');
        $table->addPrimaryKey([
            'id_product',
        ]);
        $table->create();
    }

    public function down(): void
    {
        $this->table('products')->drop()->save();
    }
}
