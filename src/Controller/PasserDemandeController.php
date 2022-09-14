<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PasserDemande Controller
 *
 * @property \App\Model\Table\PasserDemandeTable $PasserDemande
 * @method \App\Model\Entity\PasserDemande[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PasserDemandeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
		$this->Authorization->skipAuthorization();;
		$passerDemande = $this->PasserDemande->find('all', ['contain' => ['Personnel', 'Etudiant']]);
        $this->set(compact('passerDemande'));
    }

    /**
     * View method
     *
     * @param string|null $id Passer Demande id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->Authorization->skipAuthorization();
        $passerDemande = $this->PasserDemande->get($id, [
            'contain' => ['Personnel', 'Etudiant'],
        ]);

        $this->set(compact('passerDemande'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $passerDemande = $this->PasserDemande->newEmptyEntity();
		$this->Authorization->authorize($passerDemande);
        if ($this->request->is('post')) {
            $passerDemande = $this->PasserDemande->patchEntity($passerDemande, $this->request->getData());
            if ($this->PasserDemande->save($passerDemande)) {
                $this->Flash->success(__('The passer demande has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The passer demande could not be saved. Please, try again.'));
        }
        $personnel = $this->PasserDemande->Personnel->find('list', ['limit' => 200])->all();
        $etudiant = $this->PasserDemande->Etudiant->find('list', ['limit' => 200])->all();
        $this->set(compact('passerDemande', 'personnel', 'etudiant'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Passer Demande id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $passerDemande = $this->PasserDemande->get($id, [
            'contain' => [],
        ]);
		$this->Authorization->authorize($passerDemande);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $passerDemande = $this->PasserDemande->patchEntity($passerDemande, $this->request->getData());
            if ($this->PasserDemande->save($passerDemande)) {
                $this->Flash->success(__('The passer demande has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The passer demande could not be saved. Please, try again.'));
        }
        $personnel = $this->PasserDemande->Personnel->find('list', ['limit' => 200])->all();
        $etudiant = $this->PasserDemande->Etudiant->find('list', ['limit' => 200])->all();
        $this->set(compact('passerDemande', 'personnel', 'etudiant'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Passer Demande id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $passerDemande = $this->PasserDemande->get($id);
		$this->Authorization->authorize($passerDemande);
        if ($this->PasserDemande->delete($passerDemande)) {
            $this->Flash->success(__('The passer demande has been deleted.'));
        } else {
            $this->Flash->error(__('The passer demande could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
