<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Personnel Entity
 *
 * @property int $id_pers
 * @property int $id_departement
 * @property string $nom_pers
 * @property string $prenom_pers
 * @property string|null $tel_pers
 * @property string|null $adresse_pers
 * @property string|null $email_pers
 * @property bool $pers_encad
 *
 * @property \App\Model\Entity\Departement $departement
 */
class Personnel extends Entity
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
        'id_departement' => true,
        'nom_pers' => true,
        'prenom_pers' => true,
        'tel_pers' => true,
        'adresse_pers' => true,
        'email_pers' => true,
        'pers_encad' => true,
        'departement' => true,
    ];
}
