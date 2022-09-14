<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PasserDemande Entity
 *
 * @property int $id_passe
 * @property int $id_etu
 * @property int $id_pers
 * @property bool $cv_etu
 * @property bool $motiv_etu
 * @property bool $permis_etu
 * @property bool $observ_etu
 * @property \Cake\I18n\FrozenDate $date_recept
 *
 * @property \App\Model\Entity\Personnel $personnel
 * @property \App\Model\Entity\Etudiant $etudiant
 */
class PasserDemande extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'id_etu' => true,
        'id_pers' => true,
        'cv_etu' => true,
        'motiv_etu' => true,
        'permis_etu' => true,
        'observ_etu' => true,
        'date_recept' => true,
        'personnel' => true,
        'etudiant' => true,
    ];
}
