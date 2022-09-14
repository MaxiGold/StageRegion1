<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Personnel Model
 *
 * @method \App\Model\Entity\Personnel newEmptyEntity()
 * @method \App\Model\Entity\Personnel newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Personnel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Personnel get($primaryKey, $options = [])
 * @method \App\Model\Entity\Personnel findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Personnel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Personnel[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Personnel|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Personnel saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Personnel[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Personnel[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Personnel[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Personnel[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PersonnelTable extends Table
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

        $this->setTable('personnel');
        $this->setDisplayField('nom_pers');
        $this->setPrimaryKey('id_pers');
		$this->belongsTo('Departement')->setForeignKey('id_departement');
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
            ->integer('id_departement')
            ->requirePresence('id_departement', 'create')
            ->notEmptyString('id_departement');

        $validator
            ->scalar('nom_pers')
            ->maxLength('nom_pers', 100)
            ->requirePresence('nom_pers', 'create')
            ->notEmptyString('nom_pers');

        $validator
            ->scalar('prenom_pers')
            ->maxLength('prenom_pers', 100)
            ->requirePresence('prenom_pers', 'create')
            ->notEmptyString('prenom_pers');

        $validator
            ->scalar('tel_pers')
            ->maxLength('tel_pers', 255)
            ->allowEmptyString('tel_pers');

        $validator
            ->scalar('adresse_pers')
            ->maxLength('adresse_pers', 255)
            ->allowEmptyString('adresse_pers');

        $validator
            ->scalar('email_pers')
            ->maxLength('email_pers', 255)
            ->allowEmptyString('email_pers');

        $validator
            ->boolean('pers_encad')
            ->requirePresence('pers_encad', 'create')
            ->notEmptyString('pers_encad');

        return $validator;
    }
}
