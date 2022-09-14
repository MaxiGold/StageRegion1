<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\ProfileHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\ProfileHelper Test Case
 */
class ProfileHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\ProfileHelper
     */
    protected $Profile;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->Profile = new ProfileHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Profile);

        parent::tearDown();
    }
}
