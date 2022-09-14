<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Personnel Controller
 *
 * @property \App\Model\Table\PersonnelTable $Personnel
 * @method \App\Model\Entity\Personnel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PersonnelController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
		$this->Authorization->skipAuthorization();
		$personnel = $this->Personnel->find('all', ['contain' => ['Departement']]);
        $this->set(compact('personnel'));
    }

    /**
     * View method
     *
     * @param string|null $id Personnel id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->Authorization->skipAuthorization();
        $personnel = $this->Personnel->get($id, [
            'contain' => ['Departement'],
        ]);
        $this->set(compact('personnel'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $personnel = $this->Personnel->newEmptyEntity();
		$this->Authorization->authorize($personnel);
        if ($this->request->is('post')) {
            $personnel = $this->Personnel->patchEntity($personnel, $this->request->getData());
            if ($this->Personnel->save($personnel)) {
                $this->Flash->success(__('The personnel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The personnel could not be saved. Please, try again.'));
        }
        $departement = $this->Personnel->Departement->find('list', ['limit' => 200])->all();
        $this->set(compact('personnel', 'departement'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Personnel id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $personnel = $this->Personnel->get($id, [
            'contain' => [],
        ]);
		$this->Authorization->authorize($personnel);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $personnel = $this->Personnel->patchEntity($personnel, $this->request->getData());
            if ($this->Personnel->save($personnel)) {
                $this->Flash->success(__('The personnel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The personnel could not be saved. Please, try again.'));
        }
        $departement = $this->Personnel->Departement->find('list', ['limit' => 200])->all();
        $this->set(compact('personnel', 'departement'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Personnel id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $personnel = $this->Personnel->get($id);
		$this->Authorization->authorize($personnel);
        if ($this->Personnel->delete($personnel)) {
            $this->Flash->success(__('The personnel has been deleted.'));
        } else {
            $this->Flash->error(__('The personnel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
