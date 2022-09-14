<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EtudiantTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EtudiantTable Test Case
 */
class EtudiantTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EtudiantTable
     */
    protected $Etudiant;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Etudiant',
        'app.Personnel',
        'app.Stage',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Etudiant') ? [] : ['className' => EtudiantTable::class];
        $this->Etudiant = $this->getTableLocator()->get('Etudiant', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Etudiant);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EtudiantTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EtudiantTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test rechercher method
     *
     * @return void
     * @uses \App\Model\Table\EtudiantTable::rechercher()
     */
    public function testRechercher(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test chartPieHommesFemmes method
     *
     * @return void
     * @uses \App\Model\Table\EtudiantTable::chartPieHommesFemmes()
     */
    public function testChartPieHommesFemmes(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test chartLineHommesFemmesAnnees method
     *
     * @return void
     * @uses \App\Model\Table\EtudiantTable::chartLineHommesFemmesAnnees()
     */
    public function testChartLineHommesFemmesAnnees(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test chartBarAnnees method
     *
     * @return void
     * @uses \App\Model\Table\EtudiantTable::chartBarAnnees()
     */
    public function testChartBarAnnees(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test chartRecap method
     *
     * @return void
     * @uses \App\Model\Table\EtudiantTable::chartRecap()
     */
    public function testChartRecap(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getColors method
     *
     * @return void
     * @uses \App\Model\Table\EtudiantTable::getColors()
     */
    public function testGetColors(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
