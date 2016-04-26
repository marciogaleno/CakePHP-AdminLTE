<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Areas Controller
 *
 * @property \App\Model\Table\AreasTable $Areas
 */
class AreasController extends AppController
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
            'contain' => ['ChildAreas', 'GroupMenus'],
            'limit' => 15
        ];
        
        $areas = $this->paginate($this->Areas);

        //dump($areas);

        $this->set(compact('areas'));
        $this->set('_serialize', ['areas']);
    }

    /**
     * View method
     *
     * @param string|null $id Area id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {   
        $area = $this->Areas->get($id, [
            'contain' => ['ChildAreas']
        ]);

        $this->set('area', $area);
        $this->set('_serialize', ['area']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $area = $this->Areas->newEntity();
        if ($this->request->is('post')) {
            $area = $this->Areas->patchEntity($area, $this->request->data, ['associated' => ['ChildAreas']]);
            if (!$area->errors()){
               if ($this->Areas->save($area)) {
                    $this->Flash->set(null,['params' => ['class' => 'success']]);
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->set(null,['params' => ['class' => 'error']]);
                }         
            } else {
                $this->Flash->set('Erro ao salvar. Por favor verifique os campos digitados',['params' => ['class' => 'error']]);
            }

        }

        $ChildAreas = $this->Areas->ChildAreas->find('list',[
            'keyField' => 'id',
            'valueField' => function ($e) {
                return $e->label_group_name . ' > ' . $e->controller_label . ' > ' . $e->action_label;
            }
        ]);

        $group_menus = $this->Areas->GroupMenus->find('list');

        $this->set(compact('area', 'ChildAreas', 'group_menus'));
        $this->set('_serialize', ['area', 'ChildAreas', 'group_menus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Area id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $area = $this->Areas->get($id, [
            'contain' => ['ChildAreas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $area = $this->Areas->patchEntity($area, $this->request->data, ['associated' => ['ChildAreas']]);
            if (!$area->errors()){
                if ($this->Areas->save($area)) {
                    $this->Flash->set(null,['params' => ['class' => 'success']]);
                    return $this->redirect(['action' => 'index']);
                } else {
                   $this->Flash->set(null,['params' => ['class' => 'error']]);
                }                
            } else {
                $this->Flash->set('Erro ao salvar. Por favor verifique os campos digitados',['params' => ['class' => 'error']]);
            }

        }

        $ChildAreas = $this->Areas->ChildAreas->find('list',[
            'keyField' => 'id',
            'valueField' => function ($e) {
                return $e->label_group_name . ' > ' . $e->controller_label . ' > ' . $e->action_label;
            }
        ]);

         $group_menus = $this->Areas->GroupMenus->find('list');

        $this->set(compact('area', 'ChildAreas', 'group_menus'));
        $this->set('_serialize', ['area', 'ChildAreas', 'group_menus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Area id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $area = $this->Areas->get($id);
        if ($this->Areas->delete($area)) {
            $this->Flash->success(__('The area has been deleted.'));
        } else {
            $this->Flash->error(__('The area could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
