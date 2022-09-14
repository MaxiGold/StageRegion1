<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StageTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StageTable Test Case
 */
class StageTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StageTable
     */
    protected $Stage;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Stage',
        'app.Personnel',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Stage') ? [] : ['className' => StageTable::class];
        $this->Stage = $this->getTableLocator()->get('Stage', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Stage);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StageTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
