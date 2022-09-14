<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Etudiant Model
 *
 * @method \App\Model\Entity\Etudiant newEmptyEntity()
 * @method \App\Model\Entity\Etudiant newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Etudiant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Etudiant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Etudiant findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Etudiant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Etudiant[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Etudiant|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Etudiant saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Etudiant[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Etudiant[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Etudiant[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Etudiant[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EtudiantTable extends Table
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

        $this->setTable('etudiant');
        $this->setDisplayField('nom_etu');
        $this->setPrimaryKey('id_etudiant');
		$this->belongsTo('Personnel')->setForeignKey('id_pers');
		$this->belongsTo('Stage')->setForeignKey('id_stage');
		$this->belongsTo('Users')->setForeignKey('user_confirm');
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
            ->integer('id_stage')
            ->allowEmptyString('id_stage');

        $validator
            ->integer('user_confirm')
            ->allowEmptyString('user_confirm');

        $validator
            ->scalar('nom_etu')
            ->maxLength('nom_etu', 50)
            ->requirePresence('nom_etu', 'create')
            ->notEmptyString('nom_etu');

        $validator
            ->scalar('prenom_etu')
            ->maxLength('prenom_etu', 50)
            ->requirePresence('prenom_etu', 'create')
            ->notEmptyString('prenom_etu');

        $validator
            ->date('date_naiss')
            ->allowEmptyDate('date_naiss');

        $validator
            ->scalar('cin_etu')
            ->maxLength('cin_etu', 12)
            ->requirePresence('cin_etu', 'create')
            ->notEmptyString('cin_etu')
            ->add('cin_etu', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('tel_etu')
            ->maxLength('tel_etu', 10)
            ->requirePresence('tel_etu', 'create')
            ->notEmptyString('tel_etu');

        $validator
            ->scalar('email_etu')
            ->maxLength('email_etu', 100)
            ->allowEmptyString('email_etu');

        $validator
            ->scalar('adresse_etu')
            ->maxLength('adresse_etu', 100)
            ->allowEmptyString('adresse_etu');

        $validator
            ->scalar('sexe_etu')
            ->maxLength('sexe_etu', 8)
            ->requirePresence('sexe_etu', 'create')
            ->notEmptyString('sexe_etu');

        $validator
            ->scalar('nationalite_etu')
            ->maxLength('nationalite_etu', 100)
            ->requirePresence('nationalite_etu', 'create')
            ->notEmptyString('nationalite_etu');

        $validator
            ->scalar('etabli_etu')
            ->maxLength('etabli_etu', 100)
            ->allowEmptyString('etabli_etu');

        $validator
            ->scalar('parcours_etu')
            ->maxLength('parcours_etu', 100)
            ->allowEmptyString('parcours_etu');

        $validator
            ->scalar('niveau_etu')
            ->maxLength('niveau_etu', 2)
            ->allowEmptyString('niveau_etu');

        $validator
            ->date('date_conf')
            ->allowEmptyDate('date_conf');

        $validator
            ->boolean('options_conf')
            ->allowEmptyString('options_conf');

        $validator
            ->scalar('photo_etu')
            ->maxLength('photo_etu', 255)
            ->allowEmptyString('photo_etu');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['cin_etu']), ['errorField' => 'cin_etu']);

        return $rules;
    }
	
	
	public function rechercher($param){
		$query = $this->getTableLocator()->get('etudiant');
/*
		$query = $articles
		->find()
		->select(['id', 'name'])
		->where(['id !=' => 1])
		->order(['created' => 'DESC']);
		
*/
	return $query;
	}
	
	public function chartPieHommesFemmes()
	{
		$resultset = $this->find();
		$resultset = $resultset
			->select(['sexe_etu', 'nombre' => $resultset->func()->count('sexe_etu')])
			->where(['options_conf' => 1, 'year(date_conf)' => date("Y")])
			->group(['sexe_etu'])
			->order(['sexe_etu' => 'DESC'])
			;
			
		$array = ['Masculin' => 1, 'Féminin' => 1 ];
		foreach($resultset as $sexe_etu){
			$array[$sexe_etu['sexe_etu']] = $sexe_etu['nombre'];
		}
		return $array;
	}
	
	public function chartLineHommesFemmesAnnees()
	{
		$resultset = $this->find();
		$resultset = $resultset
			->select(['sexe_etu', 'nombre' => $resultset->func()->count('sexe_etu'), 'annee' => $resultset->func()->year(['date_conf' => 'identifier'])])
			->where(['options_conf' => 1])
			->group(['sexe_etu', 'annee'])
			->order(['annee' => 'ASC'])
			;
		$array = ['Masculin' => 0, 'Féminin' => 0 ];
		$annees = [];
		foreach($resultset as $sexe_etu){
			$annees[$sexe_etu['annee']] = 0;
			$array[$sexe_etu['sexe_etu']] = $annees;
		}
		
		foreach($array as $cle => $val){
			$array[$cle] = $annees;
		}
				
		foreach($resultset as $sexe_etu){
			$array[$sexe_etu['sexe_etu']][$sexe_etu['annee']] = $sexe_etu['nombre'];
		}

		return $array;
	
	}
	
	public function chartBarAnnees()
	{
		$resultset = $this->find();
		$resultset = $resultset->select(['annee' => $resultset->func()->year(['date_conf' => 'identifier']), 'nombre' => $resultset->func()->count('id_etudiant')])
			->where(['options_conf' => 1, 'year(date_conf) >' => date("Y")-10])
			->limit(10)
			->order(['annee' => 'DESC'])
			->group(['annee'])
			;
		$array = [];
		foreach($resultset as $annees){
			$array[$annees['annee']] = $annees['nombre'];
		}
		asort($array);
		return $array;
	}
	
	public function chartRecap()
	{
		$resultset = $this->find();
		$nbrFemmes = $resultset->newExpr()->case()->when(['sexe_etu' => 'Féminin', 'options_conf' => 1])->then(1);
		$nbrHommes = $resultset->newExpr()->case()->when(['sexe_etu' => 'Masculin', 'options_conf' => 1])->then(1);	
		$nbrNonConfirme = $resultset->newExpr()->case()->when(['options_conf' => 0])->then(1);
		$nbrEtranger = $resultset->newExpr()->case()->when(['nationalite_etu' => 'Etranger'])->then(1);
		$nbrMalagasy = $resultset->newExpr()->case()->when(['nationalite_etu' => 'Malagasy'])->then(1);	
		$resultset->select([
			'nbrTotal' => $resultset->func()->count('id_etudiant'),
			'nbrFemmes' => $resultset->func()->count($nbrFemmes),
			'nbrHommes' => $resultset->func()->count($nbrHommes),
			'nbrNonConfirme' => $resultset->func()->count($nbrNonConfirme),
			'nbrEtranger' => $resultset->func()->count($nbrEtranger),
			'nbrMalagasy' => $resultset->func()->count($nbrMalagasy),
		]);

		return $resultset;
	}
	
	public function getColors(){
		
		$colorName = [
			"aqua"=> [0, 255, 255],
			"aquamarine"=> [127, 255, 212],
			"bisque"=> [255, 228, 196],
			"black"=> [0, 0, 0],
			"blue"=> [0, 0, 255],
			"blueviolet"=> [138, 43, 226],
			"brown"=> [165, 42, 42],
			"burlywood"=> [222, 184, 135],
			"cadetblue"=> [95, 158, 160],
			"chartreuse"=> [127, 255, 0],
			"chocolate"=> [210, 105, 30],
			"coral"=> [255, 127, 80],
			"cornflowerblue"=> [100, 149, 237],
			"cornsilk"=> [255, 248, 220],
			"crimson"=> [220, 20, 60],
			"cyan"=> [0, 255, 255],
			"darkblue"=> [0, 0, 139],
			"darkcyan"=> [0, 139, 139],
			"darkgoldenrod"=> [184, 134, 11],
			"darkgray"=> [169, 169, 169],
			"darkgreen"=> [0, 100, 0],
			"darkgrey"=> [169, 169, 169],
			"darkkhaki"=> [189, 183, 107],
			"darkmagenta"=> [139, 0, 139],
			"darkolivegreen"=> [85, 107, 47],
			"darkorange"=> [255, 140, 0],
			"darkorchid"=> [153, 50, 204],
			"darkred"=> [139, 0, 0],
			"darksalmon"=> [233, 150, 122],
			"darkseagreen"=> [143, 188, 143],
			"darkslateblue"=> [72, 61, 139],
			"darkslategray"=> [47, 79, 79],
			"darkslategrey"=> [47, 79, 79],
			"darkturquoise"=> [0, 206, 209],
			"darkviolet"=> [148, 0, 211],
			"deeppink"=> [255, 20, 147],
			"deepskyblue"=> [0, 191, 255],
			"dimgray"=> [105, 105, 105],
			"dimgrey"=> [105, 105, 105],
			"dodgerblue"=> [30, 144, 255],
			"firebrick"=> [178, 34, 34],
			"forestgreen"=> [34, 139, 34],
			"fuchsia"=> [255, 0, 255],
			"gainsboro"=> [220, 220, 220],
			"gold"=> [255, 215, 0],
			"goldenrod"=> [218, 165, 32],
			"gray"=> [128, 128, 128],
			"green"=> [0, 128, 0],
			"greenyellow"=> [173, 255, 47],
			"grey"=> [128, 128, 128],
			"honeydew"=> [240, 255, 240],
			"hotpink"=> [255, 105, 180],
			"indianred"=> [205, 92, 92],
			"indigo"=> [75, 0, 130],
			"khaki"=> [240, 230, 140],
			"lavender"=> [230, 230, 250],
			"lawngreen"=> [124, 252, 0],
			"lightblue"=> [173, 216, 230],
			"lightcoral"=> [240, 128, 128],
			"lightgray"=> [211, 211, 211],
			"lightgreen"=> [144, 238, 144],
			"lightgrey"=> [211, 211, 211],
			"lightpink"=> [255, 182, 193],
			"lightsalmon"=> [255, 160, 122],
			"lightseagreen"=> [32, 178, 170],
			"lightskyblue"=> [135, 206, 250],
			"lightslategray"=> [119, 136, 153],
			"lightslategrey"=> [119, 136, 153],
			"lightsteelblue"=> [176, 196, 222],
			"lime"=> [0, 255, 0],
			"limegreen"=> [50, 205, 50],
			"magenta"=> [255, 0, 255],
			"maroon"=> [128, 0, 0],
			"mediumaquamarine"=> [102, 205, 170],
			"mediumblue"=> [0, 0, 205],
			"mediumorchid"=> [186, 85, 211],
			"mediumpurple"=> [147, 112, 219],
			"mediumseagreen"=> [60, 179, 113],
			"mediumslateblue"=> [123, 104, 238],
			"mediumspringgreen"=> [0, 250, 154],
			"mediumturquoise"=> [72, 209, 204],
			"mediumvioletred"=> [199, 21, 133],
			"midnightblue"=> [25, 25, 112],
			"moccasin"=> [255, 228, 181],
			"navajowhite"=> [255, 222, 173],
			"navy"=> [0, 0, 128],
			"olive"=> [128, 128, 0],
			"olivedrab"=> [107, 142, 35],
			"orange"=> [255, 165, 0],
			"orangered"=> [255, 69, 0],
			"orchid"=> [218, 112, 214],
			"palegoldenrod"=> [238, 232, 170],
			"palegreen"=> [152, 251, 152],
			"paleturquoise"=> [175, 238, 238],
			"palevioletred"=> [219, 112, 147],
			"papayawhip"=> [255, 239, 213],
			"peachpuff"=> [255, 218, 185],
			"peru"=> [205, 133, 63],
			"pink"=> [255, 192, 203],
			"plum"=> [221, 160, 221],
			"powderblue"=> [176, 224, 230],
			"purple"=> [128, 0, 128],
			"rebeccapurple"=> [102, 51, 153],
			"red"=> [255, 0, 0],
			"rosybrown"=> [188, 143, 143],
			"royalblue"=> [65, 105, 225],
			"saddlebrown"=> [139, 69, 19],
			"salmon"=> [250, 128, 114],
			"sandybrown"=> [244, 164, 96],
			"seagreen"=> [46, 139, 87],
			"seashell"=> [255, 245, 238],
			"sienna"=> [160, 82, 45],
			"silver"=> [192, 192, 192],
			"skyblue"=> [135, 206, 235],
			"slateblue"=> [106, 90, 205],
			"slategray"=> [112, 128, 144],
			"slategrey"=> [112, 128, 144],
			"springgreen"=> [0, 255, 127],
			"steelblue"=> [70, 130, 180],
			"tan"=> [210, 180, 140],
			"teal"=> [0, 128, 128],
			"thistle"=> [216, 191, 216],
			"tomato"=> [255, 99, 71],
			"turquoise"=> [64, 224, 208],
			"violet"=> [238, 130, 238],
			"wheat"=> [245, 222, 179],
			"whitesmoke"=> [245, 245, 245],
			"yellow"=> [255, 255, 0],
			"yellowgreen"=> [154, 205, 50]
		];
		$colors = array_keys($colorName);
		shuffle($colors);
		return $colors;
	}
	
}
