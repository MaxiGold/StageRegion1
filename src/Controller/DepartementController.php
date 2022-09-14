<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Departement Controller
 *
 * @property \App\Model\Table\DepartementTable $Departement
 * @method \App\Model\Entity\Departement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DepartementController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
		$this->Authorization->skipAuthorization();
       // $departement = $this->paginate($this->Departement);
		$departement = $this->Departement->find('all');

        $this->set(compact('departement'));
    }

    /**
     * View method
     *
     * @param string|null $id Departement id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->Authorization->skipAuthorization();
        $departement = $this->Departement->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('departement'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $departement = $this->Departement->newEmptyEntity();
		$this->Authorization->authorize($departement);
        if ($this->request->is('post')) {
            $departement = $this->Departement->patchEntity($departement, $this->request->getData());
            if ($this->Departement->save($departement)) {
				$this->uploadProfil($departement);
                $this->Flash->success(__('The departement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The departement could not be saved. Please, try again.'));
        }
        $this->set(compact('departement'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Departement id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $departement = $this->Departement->get($id, [
            'contain' => [],
        ]);
		$this->Authorization->authorize($departement);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $departement = $this->Departement->patchEntity($departement, $this->request->getData());
            if ($this->Departement->save($departement)) {
				$this->uploadProfil($departement);
                $this->Flash->success(__('The departement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The departement could not be saved. Please, try again.'));
        }
        $this->set(compact('departement'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Departement id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $departement = $this->Departement->get($id);
		$this->Authorization->authorize($departement);
        if ($this->Departement->delete($departement)) {
            $this->Flash->success(__('The departement has been deleted.'));
        } else {
            $this->Flash->error(__('The departement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
		
	private function uploadProfil($departement){
		$photo = $departement->logo_depart ?: "home-" . $departement->nom_depart	. ".png";
		$targetPath = env('DOC_FULL_PATH') . 'webroot/img/departements/' . strtolower($departement->nom_depart) . '.jpeg';
		foreach($this->request->getUploadedFiles() as $file){
			if(!$_FILES['photo']['error']){
				$file->moveTo($targetPath);
				$photo = is_file($targetPath) ? $departement->nom_depart . '.jpeg' : "user.png";
			}
		}
		$departement->logo_depart = strtolower($photo) ;

		$this->Departement->save($departement);
	}
}
