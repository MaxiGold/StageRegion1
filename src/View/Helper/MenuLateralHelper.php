<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Profile helper
 */
class MenuLateralHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [];
	
	public function getAccessiblePages($userRole){
		
		$gestionsPages = [
			'Users' => __d('global','Utilisateur'),
			'Departement' => __d('global','Départements'),
			'Personnel' => __d('global','Personnels'),
			'Etudiant' => __d('global','Stagiaires'),
			'PasserDemande' => __d('global','Demandes'),
			'Stage' => __d('global','Stages'),
		];	
		if($userRole !== "ROLE_ADMINISTRATION"){
			unset($gestionsPages['Users']);
		}
		if(!in_array($userRole, ["ROLE_ADMINISTRATION", "ROLE_GESTIONNAIRE"])){
			unset($gestionsPages['Departement']);
			unset($gestionsPages['Personnel']);
			unset($gestionsPages['PasserDemande']);
			unset($gestionsPages['Stage']);
		}

		return $gestionsPages;
	}
	
	public function getStagiaireMenus($userRole){
		$racine = env('WEB_FULL_PATH') . 'Etudiant';
		$gestionsPages = [
			 $racine => __d('global','Tous les stagiaires'),
			 $racine . "?filter=confirmed" => __d('global','Les stagiaires confirmés'),
			 $racine . "?filter=waiting" => __d('global','Les stagiaires en attentes'),
		];	
	
		return $gestionsPages;
	}
	
	public function isAccessiblePages($gestionsPages, $pageName, $actionName){
		return $this->isAccessibleGestionsPages($gestionsPages, $pageName, $actionName);
	}
	
	public function isAccessibleGestionsPages($gestionsPages, $pageName, $actionName){
		return (array_key_exists($pageName, $gestionsPages) || in_array( $actionName, ['rh'])) 
			&& !in_array( $actionName, ['login', 'profil']);
	}
	

	

}
