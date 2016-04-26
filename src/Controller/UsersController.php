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
        $this->checkAccess($this->name, __FUNCTION__);

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
            'contain' => ['Profiles'],
        ]);

        $user->gender = $this->gender[$user->gender];
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
        $this->checkAccess($this->name, __FUNCTION__);

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->set(null, ['params' => ['class' => 'success']]);
                return $this->redirect(['action' => 'view', $user->id]);
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
        $this->checkAccess($this->name, __FUNCTION__);

        $user = $this->Users->get($id, [
            'contain' => ['Profiles']
        ]);

        if ($this->isAdmin($user->$id) && $this->isAdmin($user->id)) {

            $this->Flash->set("Você não pode <strong>editar</strong> o usuário <strong>Master</strong>.", ['params' => ['class' => 'error']]);
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->set(null, ['params' => ['class' => 'editSuccess']]);
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->set(null, ['params' => ['class' => 'error']]);
            }
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);

        $this->set('options_profiles', $this->Users->Profiles->find('list'));
        $this->set('options_genders', $this->gender);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {
        $this->checkAccess($this->name, __FUNCTION__);

        $this->request->allowMethod(['post', 'delete']);
        $id = $this->request->data['id'];

        if ($this->isAdmin($id) && $this->isAdmin($id)) {

            $this->Flash->set("Você não pode <strong>excluir</strong> o usuário <strong>Master</strong>.", ['params' => ['class' => 'error']]);
            return $this->redirect(['action' => 'index']);
        }


        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->set(null, ['params' => ['class' => 'deleteSuccess']]);
        } else {
            $this->Flash->set(null, ['params' => ['class' => 'error']]);
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
        $this->checkAccess($this->name, __FUNCTION__);

        $user = $this->Users->get($this->Auth->user('id'));

        if ($this->request->is('PUT')) {

            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {    
                $this->Flash->set('Seus dados foram atualizados com <strong>sucesso</strong>.', ['params' => ['class' => 'success']]);
                $this->Session->write("Auth.User.name", $this->request->data('name'));
                $this->Session->write("Auth.User.pass_switched", $user->pass_switched);
                return $this->redirect($this->referer());
            }
            else
                $this->Flash->set("Ocorreu um <strong>erro</strong> ao tentar atualizar seus dados. Por favor tente novamente.", ['params' => ['class' => 'error']]);
        
        }

        unset($user->password);
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
        $this->set('options', $this->gender);
    }

    public function changePassword()
    {
        $user = $this->Users->get($this->Auth->user('id'));

        if ($this->request->is('PUT')) {

            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {    
                $this->Flash->set("Sua senha foi alterada com <strong>sucesso</strong>.", ['params' => ['class' => 'success']]);
                $this->Session->write("Auth.User.pass_switched", $user->pass_switched);
                return $this->redirect('/');
            }
            else
                $this->Flash->set("Ocorreu um <strong>erro</strong> ao tentar atualizar seus dados. Por favor tente novamente.", ['params' => ['class' => 'error']]);
        
        }

        if (!$this->Auth->user('pass_switched'))
            $this->Flash->set('<h4>Bem vindo(a)!</h4>Este é seu primeiro acesso a este Sistema. <strong>Antes</strong> de continuar é necessário <strong>modificar sua senha</strong> de acesso.<br />Confira também seus dados abaixo. Feito isto, <strong>não informe sua senha para terceiros</strong>.', ['params' => ['class' => 'error']]);


        unset($user->password);
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
        $this->set('options', $this->gender);
        
    }

}
