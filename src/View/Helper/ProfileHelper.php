<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Profile helper
 */
class ProfileHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [];

	public function estGouverneur($role)
	{
		return in_array($role, ["ROLE_GOUVERNEUR", "ROLE_DIRECTION_GENERALE"]);
	}
	public function estDirecteur($role)
	{
		return $role == "ROLE_DIRECTION" || $this->estGouverneur($role);
	}
	public function estSuperutilisateur($role)
	{
		return $role == "ROLE_ADMINISTRATION" || $this->estDirecteur($role);
	}
	public function estAdmin($role)
	{
		return $role == "ROLE_ADMINISTRATION";
	}
	public function estDirigeant($role)
	{
		return in_array($role, ["ROLE_ADMINISTRATION", "ROLE_DIRECTION"]);
	}
	
	public function estGestonnaire($role)
	{
		return in_array($role, ["ROLE_ADMINISTRATION", "ROLE_GESTIONNAIRE"]);
	}
	
	public function estPersonnel($role)
	{
		return in_array($role, ["ROLE_ADMINISTRATION", "ROLE_DIRECTION", "ROLE_GESTIONNAIRE", "ROLE_PERSONNEL"]);
	}
}
