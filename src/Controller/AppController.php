<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    public $Session;

    public $controllerLabel;

    private $title_for_layout;
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Menu');

        $this->loadComponent(
            'Auth', [
                'authorize'=> 'Controller',
                'authenticate' => [
                    'Form' => [
                        'fields' => [
                            'username' => 'email',
                            'password' => 'password'
                        ]
                    ]
                ],
                'loginAction' => [
                    'controller' => 'Users',
                    'action' => 'login'
                ]
            ]
        );

        $this->Session = $this->request->session();
        $this->loadModel('Profiles');
        $this->loadModel('Users');
        $this->Auth->allow(['add', 'edit', 'index']);

        $this->title_for_layout = 'Cordel';
        $this->controllerLabel = $this->Session->read("Auth.User.Profile.{$this->request->param('controller')}.controller_label");

    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {   
        $this->set('title_for_layout', $this->title_for_layout);
        $this->set('controller_label', $this->controllerLabel);

        $menu_parent = $this->Session->read("Auth.User.Profile.{$this->request->param('controller')}.parent_menu");
        $name_group_menu_selected = $this->Session->read("Auth.User.Profile.{$this->request->param('controller')}.name_group_menu");

        $this->Session->write('Menu.selected', $menu_parent);
        $this->Session->write('Menu.name_group_menu_selected', $name_group_menu_selected);

        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function beforeFilter(Event $event) 
    {
        if ($this->Auth->user()) {  

            if (!$this->Session->check("Auth.User.Profile")) {
                $this->Session->write("Auth.User.Profile", $this->Profiles->getAreas($this->Auth->user("profile_id")));
                $this->Users->lastLogin($this->Auth->user("id"));
                $this->Menu->mount();              
            }

            // if (!$this->Auth->user('pass_switched') && $this->action != 'manageAccount')
            //     $this->redirect(array('controller' => 'users', 'action' => 'manageAccount'));
        }
    }

    public function isAuthorized($user)
    {
        return true;
    }

    protected function checkAccess($controller = null, $action = null) 
    {   

        if ($controller == null || $action == null) {

            $this->Session->setFlash("Ocorreu um erro de permiss&otilde;es. (erro: falta de parametros)", "default", array('class' => 'error'));
            $this->redirect("/");
        }

        if (!$this->Session->check("Auth.User")) {

            $this->Session->setFlash("Por favor, efetue login para ter acesso a esta &aacute;rea.", "default", array('class' => 'error'));
            $this->redirect("/");
        }

        if (!$this->Session->check("Auth.User.Profile.{$controller}")) {

            $this->Session->setFlash("Voc&ecirc; n&atilde;o tem acesso a esta &Aacute;rea ({$this->label}).", "default", array('class' => 'error'));
            $this->redirect("/");
        }

        if (!$this->Session->check("Auth.User.Profile.{$controller}.action.{$action}")) {
            dump($controller);
            $this->Session->setFlash("Voc&ecirc; n&atilde;o tem acesso a esta opera&ccedil;&atilde;o ({$this->label}: {$action}).", "default", array('class' => 'error'));
            $this->redirect("/");
        }
    }



}
