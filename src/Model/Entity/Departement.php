<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Departement Entity
 *
 * @property int $id_depart
 * @property string $nom_depart
 * @property string|null $fonction_depart
 * @property string|null $logo_depart
 */
class Departement extends Entity
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
        'nom_depart' => true,
        'fonction_depart' => true,
        'logo_depart' => true,
    ];
}
