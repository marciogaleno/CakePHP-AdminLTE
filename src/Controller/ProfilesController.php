<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Profiles Controller
 *
 * @property \App\Model\Table\ProfilesTable $Profiles
 */
class ProfilesController extends AppController
{

    public $setMenuParent = 'Areas';

    public $setGroupMenu = 'Configurações';
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {   
        $this->checkAccess($this->name, __FUNCTION__);

        $profiles = $this->paginate($this->Profiles);

        $this->set(compact('profiles'));
        $this->set('_serialize', ['profiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Profile id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->checkAccess($this->name, __FUNCTION__);

        $profile = $this->Profiles->get($id, [
            'contain' => ['Areas']
        ]);

        $this->set('profile', $profile);
        $this->set('_serialize', ['profile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->checkAccess($this->name, __FUNCTION__);

        $profile = $this->Profiles->newEntity();

        if ($this->request->is('post')) {
            $profile = $this->Profiles->patchEntity($profile, $this->request->data, ['associated' => ['Areas']]);
            if ($this->Profiles->save($profile)) {
                $this->Flash->set(null, ['params' => ['class' => 'success']]);
                return $this->redirect(['action' => 'view', $profile->id]);
            } else {
                $this->Flash->set(null, ['params' => ['class' => 'error']]);
            }
        }
        $areas = $this->Profiles->Areas->lists();
        $this->set(compact('profile', 'areas'));
        $this->set('_serialize', ['profile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Profile id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->checkAccess($this->name, __FUNCTION__);

        $profile = $this->Profiles->get($id, [
            'contain' => ['Areas']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $profile = $this->Profiles->patchEntity($profile, $this->request->data, ['associated' => ['Areas']]);
            if ($this->Profiles->save($profile)) {
                $this->Flash->set(null, ['params' => ['class' => 'editSuccess']]);
                return $this->redirect(['action' => 'view', $profile->id]);
            } else {
                $this->Flash->error(__('The profile could not be saved. Please, try again.'));
            }
        }
        $areas = $areas = $this->Profiles->Areas->lists();
        $this->set(compact('profile', 'areas'));
        $this->set('_serialize', ['profile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Profile id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->checkAccess($this->name, __FUNCTION__);
        
        $this->request->allowMethod(['post', 'delete']);
        $profile = $this->Profiles->get($id);
        if ($this->Profiles->delete($profile)) {
            $this->Flash->success(__('The profile has been deleted.'));
        } else {
            $this->Flash->error(__('The profile could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
