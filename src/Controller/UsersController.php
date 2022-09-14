<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\I18n;
use Aura\Intl\Package;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
	
	public function initialize(): void
    {
        parent::initialize();
		
		foreach(['mg_MG', 'fr_FR', 'en_US'] as $lang){
			I18n::setTranslator('roles', function () {
				$package = new Package('default', 'default');
				$package->setMessages([
					'ROLE_PERSONNEL' => env('ROLE_PERSONNEL'),
					'ROLE_GESTIONNAIRE' => env('ROLE_GESTIONNAIRE'), 
					'ROLE_DIRECTION' => env('ROLE_DIRECTION'), 
					'ROLE_DIRECTION_GENERALE' => env('ROLE_DIRECTION_GENERALE'), 
					'ROLE_GOUVERNEUR' => env('ROLE_GOUVERNEUR'), 
					'ROLE_ADMINISTRATION' => env('ROLE_ADMINISTRATION') 
				]);
				return $package;
			}, $lang);
		}
    }
	
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
		$users = $this->Users->find('all', ['contain' => ['Personnel']]);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $user = $this->Users->get($id, [
            'contain' => ['Personnel'],
        ]);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
		$this->Authorization->authorize($user);
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $personnel = $this->Users->Personnel->find('list')->all();
        $this->set(compact('user', 'personnel'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
		$this->Authorization->authorize($user);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $personnel = $this->Users->Personnel->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'personnel'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
		$this->Authorization->authorize($user);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
	
	public function beforeFilter(\Cake\Event\EventInterface $event)
	{
		parent::beforeFilter($event);
		// Configure the login action to not require authentication, preventing
		// the infinite redirect loop issue
		$this->Authentication->addUnauthenticatedActions(['login']);
	}
	
	public function login()
	{
		$this->Authorization->skipAuthorization();
		$this->request->allowMethod(['get', 'post']);
		$result = $this->Authentication->getResult();
		// regardless of POST or GET, redirect if user is logged in
		if ($result->isValid()) {
			// redirect to /articles after login success
			if ($this->request->is('post')){
					$this->request->getSession()->write('username', $this->request->getData('email'));
					$user = $this->Users->get($this->request->getAttribute('identity')->getIdentifier());
					$photo = is_file(env('DOC_FULL_PATH') . 'webroot/img/profils/' . $user->photo) ? $user->photo : "user.png";
					$this->request->getSession()->write('photoprofil', $photo);
			}
			$redirect = $this->request->getQuery('redirect', [
				'controller' => '/',
				'action' => 'index',
			]);
			return $this->redirect($redirect);
		}
		// display error if user submitted and authentication failed
		if ($this->request->is('post') && !$result->isValid()) {
			$this->Flash->error(__('Invalid email or password'));
		}
		//$this->render('/element/login');
	}

	public function logout()
	{
		$this->Authorization->skipAuthorization();
		$result = $this->Authentication->getResult();
		// regardless of POST or GET, redirect if user is logged in
		if ($result->isValid()) {
			$this->Authentication->logout();
			$this->request->getSession()->delete('username');
			$this->request->getSession()->delete('photo');
			$this->request->getSession()->delete('lang');
			return $this->redirect(['controller' => 'Users', 'action' => 'login']);
		}
	}
	
	public function profil()
    {
		$id = $this->request->getAttribute('identity')->getIdentifier();		
        $user = $this->Users->get($id , [
            'contain' => [],
        ]);
		
		$this->Authorization->authorize($user, 'edit');

		if ($this->request->is('put')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
			$data = $this->request->getData();
			if($user->id == $id){
				$targetPath = env('DOC_FULL_PATH') . 'webroot/img/profils/' . $user->id . '.jpeg';
				
				foreach($this->request->getUploadedFiles() as $file){
					if(!$_FILES['photo']['error']){
						$file->moveTo($targetPath);
						$photo = is_file($targetPath) ? $user->id . '.jpeg' : "user.png";
						$this->request->getSession()->write('photoprofil', $photo);
					}
				}
				$user->photo = $user->id . '.jpeg';	
				if($data['newPass'] == $data['confirmPass'] && $data['newPass'] != "" && $data['oldPass'] != ""){
					$user->password = $data['newPass'];	
				}					
				if ($this->Users->save($user)) {
					$this->Flash->success(__('The user profile has been changed.'));
					 return $this->redirect(['action' => 'profil']);
				}
				$this->Flash->error(__('The user profile could not be saved. Please, try again.'));
			}
        }
        $personnel = $this->Users->Personnel->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'personnel'));
    }
}
