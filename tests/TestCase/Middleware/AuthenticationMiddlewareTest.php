<?php
declare(strict_types=1);

namespace App\Test\TestCase\Middleware;

use App\Middleware\AuthenticationMiddleware;
use Cake\TestSuite\TestCase;

/**
 * App\Middleware\AuthenticationMiddleware Test Case
 */
class AuthenticationMiddlewareTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Middleware\AuthenticationMiddleware
     */
    protected $Authentication;

    /**
     * Test process method
     *
     * @return void
     * @uses \App\Middleware\AuthenticationMiddleware::process()
     */
    public function testProcess(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
