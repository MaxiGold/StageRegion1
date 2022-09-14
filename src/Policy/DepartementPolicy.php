<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Departement;
use Authorization\IdentityInterface;

/**
 * Departement policy
 */
class DepartementPolicy
{
    /**
     * Check if $user can create Departement
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Departement $departement
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Departement $departement)
    {
		return in_array($user->role, ["ROLE_ADMINISTRATION", "ROLE_DIRECTION", "ROLE_GESTIONNAIRE"]);
    }

    /**
     * Check if $user can update Departement
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Departement $departement
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Departement $departement)
    {
		return in_array($user->role, ["ROLE_ADMINISTRATION", "ROLE_DIRECTION", "ROLE_GESTIONNAIRE"]);
    }

    /**
     * Check if $user can delete Departement
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Departement $departement
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Departement $departement)
    {
		return in_array($user->role, ["ROLE_ADMINISTRATION", "ROLE_DIRECTION", "ROLE_GESTIONNAIRE"]);
    }

    /**
     * Check if $user can view Departement
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Departement $departement
     * @return bool
     */
    public function canView(IdentityInterface $user, Departement $departement)
    {
    }
}
