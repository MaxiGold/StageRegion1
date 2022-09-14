<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PasserDemandeFixture
 */
class PasserDemandeFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'passer_demande';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_passe' => 1,
                'id_etu' => 1,
                'id_pers' => 1,
                'cv_etu' => 1,
                'motiv_etu' => 1,
                'permis_etu' => 1,
                'observ_etu' => 1,
                'date_recept' => '2022-08-18',
            ],
        ];
        parent::init();
    }
}
