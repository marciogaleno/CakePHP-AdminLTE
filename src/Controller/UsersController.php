<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    private $gender = ['M' => 'Masculino', 'F' => 'Feminino'];
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {   
        //$this->checkAccess($this->name, __FUNCTION__);

        $this->paginate = [
            'limit' => 15,
            'contain' => ['Profiles']
        ];

        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->checkAccess($this->name, __FUNCTION__);

        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->set(null, ['params' => ['class' => 'success']]);
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->set(null, ['params' => ['class' => 'error']]);
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);

        $list_profiles = $this->Profiles->find('list')->select(['id', 'name']);
        $this->set('profiles', $list_profiles);
        
        $this->set('options', $this->gender);
        

    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->viewBuilder()->layout('login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->set('Seu usuário ou senha está incorreta', ['params' => ['class' => 'error']]);
        }
    }

    public function logout()
    {
        //$this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }


    public function manageAccount() 
    {

        $user = $this->Users->get($this->Auth->user('id'));

        if ($this->request->is('PUT')) {

            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {    
                $this->Flash->set('Seus dados foram atualizados com <strong>sucesso</strong>.', ['params' => ['class' => 'success']]);
                $this->Session->write("Auth.User.name", $this->request->data('name'));
                $this->Session->write("Auth.User.pass_switched", $user->pass_switched);
                return $this->redirect("/");
            }
            else
                $this->Flash->set("Ocorreu um <strong>erro</strong> ao tentar atualizar seus dados. Por favor tente novamente.", ['params' => ['class' => 'error']]);
        
        }

        if (!$this->Auth->user('pass_switched') && !$this->request->session()->check('Message.flash'))
            $this->Flash->set('<h4>Bem vindo(a)!</h4>Este é seu primeiro acesso a este Sistema. <strong>Antes</strong> de continuar é necessário <strong>modificar sua senha</strong> de acesso.<br />Confira também seus dados abaixo. Feito isto, <strong>não informe sua senha para terceiros</strong>.', ['params' => ['class' => 'error']]);

        unset($user->password);
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
        $this->set('options', $this->gender);
    }

}
