<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PasserDemande Model
 *
 * @method \App\Model\Entity\PasserDemande newEmptyEntity()
 * @method \App\Model\Entity\PasserDemande newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PasserDemande[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PasserDemande get($primaryKey, $options = [])
 * @method \App\Model\Entity\PasserDemande findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PasserDemande patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PasserDemande[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PasserDemande|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PasserDemande saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PasserDemande[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PasserDemande[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PasserDemande[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PasserDemande[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PasserDemandeTable extends Table
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

        $this->setTable('passer_demande');
        $this->setDisplayField('id_passe');
        $this->setPrimaryKey('id_passe');
		$this->belongsTo('Personnel')->setForeignKey('id_pers');
		$this->belongsTo('Etudiant')->setForeignKey('id_etu');
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
            ->integer('id_etu')
            ->requirePresence('id_etu', 'create')
            ->notEmptyString('id_etu');

        $validator
            ->integer('id_pers')
            ->requirePresence('id_pers', 'create')
            ->notEmptyString('id_pers');

        $validator
            ->boolean('cv_etu')
            ->requirePresence('cv_etu', 'create')
            ->notEmptyString('cv_etu');

        $validator
            ->boolean('motiv_etu')
            ->requirePresence('motiv_etu', 'create')
            ->notEmptyString('motiv_etu');

        $validator
            ->boolean('permis_etu')
            ->requirePresence('permis_etu', 'create')
            ->notEmptyString('permis_etu');

        $validator
            ->boolean('observ_etu')
            ->requirePresence('observ_etu', 'create')
            ->notEmptyString('observ_etu');

        $validator
            ->date('date_recept')
            ->requirePresence('date_recept', 'create')
            ->notEmptyDate('date_recept');

        return $validator;
    }
}
