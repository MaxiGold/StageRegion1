<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DepartementFixture
 */
class DepartementFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'departement';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_depart' => 1,
                'nom_depart' => 'Lo',
                'fonction_depart' => 'Lorem ipsum dolor sit amet',
                'logo_depart' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
