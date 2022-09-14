<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Etudiant Entity
 *
 * @property int $id_etudiant
 * @property int|null $id_pers
 * @property int|null $id_stage
 * @property int|null $user_confirm
 * @property string $nom_etu
 * @property string $prenom_etu
 * @property \Cake\I18n\FrozenDate|null $date_naiss
 * @property string $cin_etu
 * @property string $tel_etu
 * @property string|null $email_etu
 * @property string|null $adresse_etu
 * @property string $sexe_etu
 * @property string $nationalite_etu
 * @property string|null $etabli_etu
 * @property string|null $parcours_etu
 * @property string|null $niveau_etu
 * @property \Cake\I18n\FrozenDate|null $date_conf
 * @property bool|null $options_conf
 * @property string|null $photo_etu
 *
 * @property \App\Model\Entity\Personnel $personnel
 * @property \App\Model\Entity\Stage $stage
 * @property \App\Model\Entity\User $user
 */
class Etudiant extends Entity
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
        'id_pers' => true,
        'id_stage' => true,
        'user_confirm' => true,
        'nom_etu' => true,
        'prenom_etu' => true,
        'date_naiss' => true,
        'cin_etu' => true,
        'tel_etu' => true,
        'email_etu' => true,
        'adresse_etu' => true,
        'sexe_etu' => true,
        'nationalite_etu' => true,
        'etabli_etu' => true,
        'parcours_etu' => true,
        'niveau_etu' => true,
        'date_conf' => true,
        'options_conf' => true,
        'photo_etu' => true,
        'personnel' => true,
        'stage' => true,
        'user' => true,
    ];
}
