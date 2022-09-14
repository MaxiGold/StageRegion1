<?php
namespace App\View\Helper;

use Cake\View\Helper;

class ProfileHelper extends Helper
{

	protected $request;
	
	
	public function init($request)
	{
	//$this->request = $request;
	}
	
	
    public function setMenubar($request)
    { 
	   return $request->getAttribute("identity");
    }
	
	public function getRole($request)
    {
	   return $request->getAttribute("identity")->role;
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
