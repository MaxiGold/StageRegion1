<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\I18n;
use Aura\Intl\Package;

class StatisticsController extends AppController
{
	
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
		$colorName = $this->Etudiant->getColors();
		$chartRecap = $this->Etudiant->chartRecap()->first();
		$chartBarAnnees = $this->Etudiant->chartBarAnnees();
		$chartPieHommesFemmes = $this->Etudiant->chartPieHommesFemmes();
		$chartLineHommesFemmesAnnees = $this->Etudiant->chartLineHommesFemmesAnnees();
        $this->set(compact('chartRecap', 'chartBarAnnees', 'chartPieHommesFemmes', 'chartLineHommesFemmesAnnees', 'colorName'));
    }

	public function beforeFilter(\Cake\Event\EventInterface $event)
	{
		parent::beforeFilter($event);
		$this->Authorization->skipAuthorization();
		$this->loadModel('Etudiant');
		$this->loadModel('Stage');
		$this->loadModel('PasserDemande');
	}
	
	
	
}
