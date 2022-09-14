<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stage Model
 *
 * @method \App\Model\Entity\Stage newEmptyEntity()
 * @method \App\Model\Entity\Stage newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Stage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Stage get($primaryKey, $options = [])
 * @method \App\Model\Entity\Stage findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Stage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Stage[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Stage|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stage saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stage[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Stage[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Stage[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Stage[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class StageTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('stage');
        $this->setDisplayField('theme_stage');
        $this->setPrimaryKey('id_stage');
		$this->belongsTo('Personnel')->setForeignKey('id_pers');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id_pers')
            ->allowEmptyString('id_pers');

        $validator
            ->scalar('theme_stage')
            ->maxLength('theme_stage', 100)
            ->requirePresence('theme_stage', 'create')
            ->notEmptyString('theme_stage');

        $validator
            ->date('date_debut')
            ->allowEmptyDate('date_debut');

        $validator
            ->date('date_fin')
            ->allowEmptyDate('date_fin');

        $validator
            ->boolean('finition_theme')
            ->allowEmptyString('finition_theme');

        $validator
            ->boolean('remis_livre')
            ->allowEmptyString('remis_livre');

        $validator
            ->scalar('note_stage')
            ->maxLength('note_stage', 10)
            ->allowEmptyString('note_stage');

        return $validator;
    }
}
