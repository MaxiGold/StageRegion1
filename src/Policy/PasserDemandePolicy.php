<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\PasserDemande;
use Authorization\IdentityInterface;

/**
 * PasserDemande policy
 */
class PasserDemandePolicy
{
    /**
     * Check if $user can create PasserDemande
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\PasserDemande $passerDemande
     * @return bool
     */
    public function canAdd(IdentityInterface $user, PasserDemande $passerDemande)
    {
		return in_array($user->role, ["ROLE_ADMINISTRATION", "ROLE_DIRECTION", "ROLE_GESTIONNAIRE"]);
    }

    /**
     * Check if $user can update PasserDemande
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\PasserDemande $passerDemande
     * @return bool
     */
    public function canEdit(IdentityInterface $user, PasserDemande $passerDemande)
    {
		return in_array($user->role, ["ROLE_ADMINISTRATION", "ROLE_DIRECTION", "ROLE_GESTIONNAIRE"]);
    }

    /**
     * Check if $user can delete PasserDemande
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\PasserDemande $passerDemande
     * @return bool
     */
    public function canDelete(IdentityInterface $user, PasserDemande $passerDemande)
    {
		return in_array($user->role, ["ROLE_ADMINISTRATION", "ROLE_DIRECTION", "ROLE_GESTIONNAIRE"]);
    }

    /**
     * Check if $user can view PasserDemande
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\PasserDemande $passerDemande
     * @return bool
     */
    public function canView(IdentityInterface $user, PasserDemande $passerDemande)
    {
    }
}
