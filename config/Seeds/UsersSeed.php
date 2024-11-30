<?php

declare(strict_types=1);

use Migrations\BaseSeed;

/**
 * Users seed.
 */
class UsersSeed extends BaseSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/migrations/4/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [['email' => 'admin@gmail.com', 'username' => 'admin', 'password' => md5('123')]];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
