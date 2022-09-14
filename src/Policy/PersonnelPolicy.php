<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Personnel;
use Authorization\IdentityInterface;

/**
 * Personnel policy
 */
class PersonnelPolicy
{
    /**
     * Check if $user can create Personnel
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Personnel $personnel
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Personnel $personnel)
    {
		return in_array($user->role, ["ROLE_ADMINISTRATION", "ROLE_DIRECTION", "ROLE_GESTIONNAIRE"]);
    }

    /**
     * Check if $user can update Personnel
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Personnel $personnel
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Personnel $personnel)
    {
		return in_array($user->role, ["ROLE_ADMINISTRATION", "ROLE_DIRECTION", "ROLE_GESTIONNAIRE"]);
    }

    /**
     * Check if $user can delete Personnel
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Personnel $personnel
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Personnel $personnel)
    {
		return in_array($user->role, ["ROLE_ADMINISTRATION", "ROLE_DIRECTION", "ROLE_GESTIONNAIRE"]);
    }

    /**
     * Check if $user can view Personnel
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Personnel $personnel
     * @return bool
     */
    public function canView(IdentityInterface $user, Personnel $personnel)
    {
    }
}
