<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stage Entity
 *
 * @property int $id_stage
 * @property int|null $id_pers
 * @property string $theme_stage
 * @property \Cake\I18n\FrozenDate|null $date_debut
 * @property \Cake\I18n\FrozenDate|null $date_fin
 * @property bool|null $finition_theme
 * @property bool|null $remis_livre
 * @property string|null $note_stage
 *
 * @property \App\Model\Entity\Personnel $personnel
 */
class Stage extends Entity
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
        'theme_stage' => true,
        'date_debut' => true,
        'date_fin' => true,
        'finition_theme' => true,
        'remis_livre' => true,
        'note_stage' => true,
        'personnel' => true,
    ];
}
