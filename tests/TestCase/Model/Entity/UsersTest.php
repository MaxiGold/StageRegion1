<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Entity;

use App\Model\Entity\Users;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Entity\Users Test Case
 */
class UsersTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Entity\Users
     */
    protected $Users;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'Table',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->Users = new Users();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Users);

        parent::tearDown();
    }
}
