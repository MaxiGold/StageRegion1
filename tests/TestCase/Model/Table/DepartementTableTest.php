<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DepartementTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DepartementTable Test Case
 */
class DepartementTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DepartementTable
     */
    protected $Departement;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
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
        $config = $this->getTableLocator()->exists('Departement') ? [] : ['className' => DepartementTable::class];
        $this->Departement = $this->getTableLocator()->get('Departement', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Departement);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DepartementTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
