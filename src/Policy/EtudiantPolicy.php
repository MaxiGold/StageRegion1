<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Etudiant;
use Authorization\IdentityInterface;

/**
 * Etudiant policy
 */
class EtudiantPolicy
{
    /**
     * Check if $user can create Etudiant
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Etudiant $etudiant
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Etudiant $etudiant)
    {
		return in_array($user->role, ["ROLE_ADMINISTRATION", "ROLE_DIRECTION", "ROLE_GESTIONNAIRE"]);
    }

    /**
     * Check if $user can update Etudiant
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Etudiant $etudiant
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Etudiant $etudiant)
    {
		return in_array($user->role, ["ROLE_ADMINISTRATION", "ROLE_DIRECTION", "ROLE_GESTIONNAIRE"]);
    }

    /**
     * Check if $user can delete Etudiant
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Etudiant $etudiant
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Etudiant $etudiant)
    {
		return in_array($user->role, ["ROLE_ADMINISTRATION", "ROLE_DIRECTION", "ROLE_GESTIONNAIRE"]);
    }

    /**
     * Check if $user can view Etudiant
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Etudiant $etudiant
     * @return bool
     */
    public function canView(IdentityInterface $user, Etudiant $etudiant)
    {
    }
}
