<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EtudiantFixture
 */
class EtudiantFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'etudiant';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_etudiant' => 1,
                'id_pers' => 1,
                'id_stage' => 1,
                'user_confirm' => 1,
                'nom_etu' => 'Lorem ipsum dolor sit amet',
                'prenom_etu' => 'Lorem ipsum dolor sit amet',
                'date_naiss' => '2022-09-11',
                'cin_etu' => 'Lorem ipsu',
                'tel_etu' => 'Lorem ip',
                'email_etu' => 'Lorem ipsum dolor sit amet',
                'adresse_etu' => 'Lorem ipsum dolor sit amet',
                'sexe_etu' => 'Lorem ',
                'nationalite_etu' => 'Lorem ipsum dolor sit amet',
                'etabli_etu' => 'Lorem ipsum dolor sit amet',
                'parcours_etu' => 'Lorem ipsum dolor sit amet',
                'niveau_etu' => 'Lo',
                'date_conf' => '2022-09-11',
                'options_conf' => 1,
                'photo_etu' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
