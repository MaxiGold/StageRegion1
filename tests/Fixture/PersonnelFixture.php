<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PersonnelFixture
 */
class PersonnelFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'personnel';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_pers' => 1,
                'id_departement' => 1,
                'nom_pers' => 'Lorem ipsum dolor sit amet',
                'prenom_pers' => 'Lorem ipsum dolor sit amet',
                'tel_pers' => 'Lorem ipsum dolor sit amet',
                'adresse_pers' => 'Lorem ipsum dolor sit amet',
                'email_pers' => 'Lorem ipsum dolor sit amet',
                'pers_encad' => 1,
            ],
        ];
        parent::init();
    }
}
