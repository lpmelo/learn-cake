<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AuthenticationsFixture
 */
class AuthenticationsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_auth' => 1,
                'fk_id_user' => 1,
                'token' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1733002108,
                'updated_at' => 1733002108,
            ],
        ];
        parent::init();
    }
}
