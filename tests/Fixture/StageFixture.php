<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StageFixture
 */
class StageFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'stage';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_stage' => 1,
                'id_pers' => 1,
                'theme_stage' => 'Lorem ipsum dolor sit amet',
                'date_debut' => '2022-08-18',
                'date_fin' => '2022-08-18',
                'finition_theme' => 1,
                'remis_livre' => 1,
                'note_stage' => 'Lorem ip',
            ],
        ];
        parent::init();
    }
}
