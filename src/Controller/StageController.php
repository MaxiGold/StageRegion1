<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Stage Controller
 *
 * @property \App\Model\Table\StageTable $Stage
 * @method \App\Model\Entity\Stage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StageController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
		$this->Authorization->skipAuthorization();
		$stage = $this->Stage->find('all', ['contain' => ['Personnel']]);
        $this->set(compact('stage'));
    }

    /**
     * View method
     *
     * @param string|null $id Stage id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->Authorization->skipAuthorization();
        $stage = $this->Stage->get($id, [
            'contain' => ['Personnel'],
        ]);

        $this->set(compact('stage'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stage = $this->Stage->newEmptyEntity();
		$this->Authorization->authorize($stage);
        if ($this->request->is('post')) {
            $stage = $this->Stage->patchEntity($stage, $this->request->getData());
            if ($this->Stage->save($stage)) {
                $this->Flash->success(__('The stage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stage could not be saved. Please, try again.'));
        }
        $personnel = $this->Stage->Personnel->find('list', ['limit' => 200])->all();
        $this->set(compact('stage', 'personnel'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stage id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stage = $this->Stage->get($id, [
            'contain' => [],
        ]);
		$this->Authorization->authorize($stage);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stage = $this->Stage->patchEntity($stage, $this->request->getData());
            if ($this->Stage->save($stage)) {
                $this->Flash->success(__('The stage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stage could not be saved. Please, try again.'));
        }
        $personnel = $this->Stage->Personnel->find('list', ['limit' => 200])->all();
        $this->set(compact('stage', 'personnel'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stage id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stage = $this->Stage->get($id);
		$this->Authorization->authorize($stage);
        if ($this->Stage->delete($stage)) {
            $this->Flash->success(__('The stage has been deleted.'));
        } else {
            $this->Flash->error(__('The stage could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
