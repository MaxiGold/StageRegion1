<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PasserDemandeTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PasserDemandeTable Test Case
 */
class PasserDemandeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PasserDemandeTable
     */
    protected $PasserDemande;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.PasserDemande',
        'app.Personnel',
        'app.Etudiant',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PasserDemande') ? [] : ['className' => PasserDemandeTable::class];
        $this->PasserDemande = $this->getTableLocator()->get('PasserDemande', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PasserDemande);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PasserDemandeTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
