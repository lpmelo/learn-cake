<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AuthenticationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AuthenticationsTable Test Case
 */
class AuthenticationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AuthenticationsTable
     */
    protected $Authentications;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Authentications',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Authentications') ? [] : ['className' => AuthenticationsTable::class];
        $this->Authentications = $this->getTableLocator()->get('Authentications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Authentications);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AuthenticationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
