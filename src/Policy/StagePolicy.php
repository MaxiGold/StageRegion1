<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Stage;
use Authorization\IdentityInterface;

/**
 * Stage policy
 */
class StagePolicy
{
    /**
     * Check if $user can create Stage
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Stage $stage
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Stage $stage)
    {
		return in_array($user->role, ["ROLE_ADMINISTRATION", "ROLE_DIRECTION", "ROLE_GESTIONNAIRE"]);
    }

    /**
     * Check if $user can update Stage
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Stage $stage
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Stage $stage)
    {
		return in_array($user->role, ["ROLE_ADMINISTRATION", "ROLE_DIRECTION", "ROLE_GESTIONNAIRE"]);
    }

    /**
     * Check if $user can delete Stage
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Stage $stage
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Stage $stage)
    {
		return in_array($user->role, ["ROLE_ADMINISTRATION", "ROLE_DIRECTION", "ROLE_GESTIONNAIRE"]);
    }

    /**
     * Check if $user can view Stage
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Stage $stage
     * @return bool
     */
    public function canView(IdentityInterface $user, Stage $stage)
    {
    }
}
