<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Departement Model
 *
 * @method \App\Model\Entity\Departement newEmptyEntity()
 * @method \App\Model\Entity\Departement newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Departement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Departement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Departement findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Departement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Departement[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Departement|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Departement saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Departement[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Departement[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Departement[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Departement[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DepartementTable extends Table
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

        $this->setTable('departement');
        $this->setDisplayField('nom_depart');
        $this->setPrimaryKey('id_depart');
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
            ->scalar('nom_depart')
            ->maxLength('nom_depart', 4)
            ->requirePresence('nom_depart', 'create')
            ->notEmptyString('nom_depart');

        $validator
            ->scalar('fonction_depart')
            ->maxLength('fonction_depart', 255)
            ->allowEmptyString('fonction_depart');

        $validator
            ->scalar('logo_depart')
            ->maxLength('logo_depart', 255)
            ->allowEmptyString('logo_depart');

        return $validator;
    }
}
