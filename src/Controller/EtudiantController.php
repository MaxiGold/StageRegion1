<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
use Cake\Mailer\MailerAwareTrait;
use Cake\Mailer\Email;

/**
 * Etudiant Controller
 *
 * @property \App\Model\Table\EtudiantTable $Etudiant
 * @method \App\Model\Entity\Etudiant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EtudiantController extends AppController
{
	use MailerAwareTrait;
	
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
		$this->Authorization->skipAuthorization();
		$etudiant = $this->Etudiant->find('all', ['contain' => ['Personnel', 'Stage']])->order(['id_etudiant' => 'ASC']);
		$personnel = $this->Etudiant->Personnel->find('list')->all();
		if($this->request->getQuery('filter')!=""){
			$etudiant->andWhere(['options_conf' => $this->request->getQuery('filter') == "confirmed"] );
		}
		//$ecoles = $this->Etudiant->find('all', ['keyField' => 'etabli_etu', 'valueField' => 'etabli_etu'])->select(['etabli_etu'])->distinct()->order(['etabli_etu' => 'ASC'])->toArray();
		$ecoles = $this->Etudiant->find()->distinct(['etabli_etu'])->order(['etabli_etu' => 'ASC'])->extract('etabli_etu')->toArray();
		$niveaux = $this->Etudiant->find()->distinct(['niveau_etu'])->order(['niveau_etu' => 'ASC'])->extract('niveau_etu')->toArray();
		$ecoles = array_combine($ecoles, $ecoles);
		$niveaux = array_combine($niveaux, $niveaux);
		$this->set(compact('etudiant', 'ecoles', 'niveaux'));
    }

    /**
     * View method
     *
     * @param string|null $id Etudiant id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->Authorization->skipAuthorization();
        $etudiant = $this->Etudiant->get($id, [
            'contain' => ['Personnel', 'Stage'],
        ]);
        $personnel = $this->Etudiant->Personnel->find('list')->all();
        $stage = $this->Etudiant->Stage->find('list')->all();
        $this->set(compact('etudiant', 'personnel', 'stage'));
		
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $etudiant = $this->Etudiant->newEmptyEntity();
		$this->Authorization->authorize($etudiant);
        if ($this->request->is('post')) {
            $etudiant = $this->Etudiant->patchEntity($etudiant, $this->request->getData());
            if ($this->Etudiant->save($etudiant)) {
				$this->uploadProfil($etudiant);
                $this->Flash->success(__('The etudiant has been saved.'));

               // return $this->redirect(['action' => 'index']);
            }
			
            $this->Flash->error(__('The etudiant could not be saved. Please, try again.'));
        }
        $personnel = $this->Etudiant->Personnel->find('list')->all();
        $stage = $this->Etudiant->Stage->find('list')->all();
        $this->set(compact('etudiant', 'personnel', 'stage'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Etudiant id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $etudiant = $this->Etudiant->get($id, [
            'contain' => [],
        ]);
		$this->Authorization->authorize($etudiant);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $etudiant = $this->Etudiant->patchEntity($etudiant, $this->request->getData());					
            if ($this->Etudiant->save($etudiant)) {
				$this->uploadProfil($etudiant);
                $this->Flash->success(__('The etudiant has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The etudiant could not be saved. Please, try again.'));
        }
        $personnel = $this->Etudiant->Personnel->find('list')->all();
        $stage = $this->Etudiant->Stage->find('list')->all();
        $this->set(compact('etudiant', 'personnel', 'stage'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Etudiant id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $etudiant = $this->Etudiant->get($id);
		$this->Authorization->authorize($etudiant);
        if ($this->Etudiant->delete($etudiant)) {
            $this->Flash->success(__('The etudiant has been deleted.'));
        } else {
            $this->Flash->error(__('The etudiant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	
	private function uploadProfil($etudiant){
		$photo = $etudiant->photo_etu ?: "stagiaire-" . $etudiant->sexe_etu	. ".png";
		$targetPath = env('DOC_FULL_PATH') . 'webroot/img/stagiaires/' . $etudiant->id_etudiant . '.jpeg';
		foreach($this->request->getUploadedFiles() as $file){
			if(!$_FILES['image']['error']){
				$file->moveTo($targetPath);
				$photo = is_file($targetPath) ? $etudiant->id_etudiant . '.jpeg' : "user.png";
			}
		}
		$etudiant->photo_etu = $photo ;

		$this->Etudiant->save($etudiant);
	}
	
	public function find(){
		$this->Authorization->skipAuthorization();
		
		$data = $this->request->getData();
		$etudiant = $this->Etudiant->find('all', ['contain' => ['Personnel', 'Stage']]);
		if(isset($data['nationalite']) && $data['nationalite'] != ''){
			$etudiant = $etudiant->andWhere(['nationalite_etu' => $data['nationalite']]);
		}
		if(isset($data['ecole']) && $data['ecole'] != ''){
			$etudiant = $etudiant->andWhere(['etabli_etu' => $data['ecole']]);
		}
		if(isset($data['niveau']) && $data['niveau'] != ''){
			$etudiant = $etudiant->andWhere(['niveau_etu' => $data['niveau']]);
		}
		if(isset($data['sexe']) && $data['sexe'] != ''){
			$etudiant = $etudiant->andWhere(['sexe_etu' => $data['sexe']]);
		}
		if(isset($data['motcle']) && $data['motcle'] != ''){
			$motcle = $data['motcle'];
			$etudiant = $etudiant->andWhere(function (QueryExpression $exp, Query $q) use ($motcle) {
			return $exp
				->or(['nom_etu LIKE' => '%' . $motcle .'%'])
				->add(['prenom_etu LIKE' => '%' . $motcle .'%'])
				->add(['cin_etu LIKE' => '%' . $motcle .'%'])
				->add(['tel_etu LIKE' => '%' . $motcle .'%'])
				->add(['email_etu LIKE' => '%' . $motcle .'%'])
				->add(['adresse_etu LIKE' => '%' . $motcle .'%'])
				;
			});
		}
		if($data['filter'] !=""){
			$etudiant->andWhere(['options_conf' => $data['filter'] == "confirmed"] );
		}
		$etudiant = $etudiant->order(['id_etudiant' => 'ASC']);

		$this->set(compact('etudiant'));
		$this->render('/element/ajax/stagiaire');

	}
	
	/**
     * View method
     *
     * @param string|null $id Etudiant id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function detail($id = null)
    {
		$this->Authorization->skipAuthorization();
        $etudiant = $this->Etudiant->get($id, [
            'contain' => ['Personnel', 'Stage'],
        ]);
		if ($this->request->is(['patch', 'post', 'put'])) {
            $etudiant->user_confirm = $this->request->getSession()->read('Auth')->id;					
            $etudiant->users = $this->request->getSession()->read('Auth');					
            $etudiant->options_conf = true;					
			$etudiant->date_conf = new \DateTime();	
          
            if ($this->Etudiant->save($etudiant)) {
                $this->Flash->success(__('The etudiant has been confirmed.'));
				$this->emailConfirmation($etudiant);
				//$this->getMailer('Gmail')->send('confirmation', [$etudiant]);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The etudiant could not be saved. Please, try again.'));
			
        }
		if ($this->request->is('ajax')) {

			$personnel = $this->Etudiant->Personnel->find('list')->all();
			$stage = $this->Etudiant->Stage->find('list')->all();
			$this->set(compact('etudiant', 'personnel', 'stage'));
			$this->render('/element/ajax/detail');
		}
    }
	
	private function emailConfirmation($etudiant){
		
	$tire = $etudiant->sexe_etu == "Masculin" ? "Monsieur " : "Madame" ; 
	
	$content = <<<VAN

Bonjour $tire $etudiant->nom_etu $etudiant->prenom_etu,

Nous avons le plaisir de vous informez que votre demande de stage au sein de la région de haute matsiatra a été accepté.
On vous contactera prochainement pour les étapes suivantes de la procedure de stage.

Bien cordialement,

VAN;

		$email = new Email('default');
		$email->setFrom(['admin@regionhm.mg' => 'Region Haute Matsiatra'])
		->setTransport('gmail')
		->setTo($etudiant->email_etu, $etudiant->nom_etu . " " . $etudiant->prenom_etu )
		->setSubject('Validation de la demande de stage!')
		->send($content)
		;

	}
}
