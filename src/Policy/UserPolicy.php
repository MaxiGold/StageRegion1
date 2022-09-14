<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\User;
use Authorization\IdentityInterface;

/**
 * Users policy
 */
class UserPolicy
{
    /**
     * Check if $user can create Users
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Users $users
     * @return bool
     */
    public function canAdd(IdentityInterface $user, User $users)
    {
		return in_array($user->role, ["ROLE_ADMINISTRATION", "ROLE_DIRECTION", "ROLE_GESTIONNAIRE"]);
    }

    /**
     * Check if $user can update Users
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Users $users
     * @return bool
     */
    public function canEdit(IdentityInterface $user, User $users)
    {
		return $user->role == "ROLE_ADMINISTRATION" ||  $user->id == $users->id;
    }

    /**
     * Check if $user can delete Users
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Users $users
     * @return bool
     */
    public function canDelete(IdentityInterface $user, User $users)
    {
		return $user->role == "ROLE_ADMINISTRATION" && $user->id != $users->id;
    }

    /**
     * Check if $user can view Users
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Users $users
     * @return bool
     */
    public function canView(IdentityInterface $user, User $users)
    {
    }
	
	
	
}
