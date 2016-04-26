<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GroupMenus Controller
 *
 * @property \App\Model\Table\GroupMenusTable $GroupMenus
 */
class GroupMenusController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->checkAccess($this->name, __FUNCTION__);

        $this->paginate = [
            'limit' => 15
        ];

        $groupMenus = $this->paginate($this->GroupMenus);

        $this->set(compact('groupMenus'));
        $this->set('_serialize', ['groupMenus']);
    }

    /**
     * View method
     *
     * @param string|null $id Group Menu id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $groupMenu = $this->GroupMenus->get($id, [
            'contain' => ['Areas']
        ]);

        $this->set('groupMenu', $groupMenu);
        $this->set('_serialize', ['groupMenu']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $groupMenu = $this->GroupMenus->newEntity();
        if ($this->request->is('post')) {
            $groupMenu = $this->GroupMenus->patchEntity($groupMenu, $this->request->data);
            if ($this->GroupMenus->save($groupMenu)) {
                $this->Flash->set(null,['params' => ['class' => 'success']]);
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->set(null,['params' => ['class' => 'error']]);
            }
        }
        $this->set(compact('groupMenu'));
        $this->set('_serialize', ['groupMenu']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Group Menu id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $groupMenu = $this->GroupMenus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $groupMenu = $this->GroupMenus->patchEntity($groupMenu, $this->request->data);
            if ($this->GroupMenus->save($groupMenu)) {
                $this->Flash->set(null,['params' => ['class' => 'success']]);
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->set(null,['params' => ['class' => 'error']]);
            }
        }
        $this->set(compact('groupMenu'));
        $this->set('_serialize', ['groupMenu']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Group Menu id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $groupMenu = $this->GroupMenus->get($id);
        if ($this->GroupMenus->delete($groupMenu)) {
            $this->Flash->set(null,['params' => ['class' => 'success']]);
        } else {
            $this->Flash->set(null,['params' => ['class' => 'success']]);
        }
        return $this->redirect(['action' => 'index']);
    }
}
