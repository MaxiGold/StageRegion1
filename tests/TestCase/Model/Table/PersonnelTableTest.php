<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersonnelTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PersonnelTable Test Case
 */
class PersonnelTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PersonnelTable
     */
    protected $Personnel;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Personnel',
        'app.Departement',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Personnel') ? [] : ['className' => PersonnelTable::class];
        $this->Personnel = $this->getTableLocator()->get('Personnel', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Personnel);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PersonnelTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
