<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;


class MenuComponent extends Component
{

	private $Controller;


	public function startup(Event $event){
		
		$this->Controller = $event->subject();
	}


	public function beforeRender( Event $event )
	{
		
		//	setando a opcao selecionada do menu
		if( !empty( $this->Controller->setMenu ) ){
			
			$this->Session->write( "Menu", null );
			$this->Session->write( "Menu.{$this->controller->setMenu}", 'active' );

		} else
			 $this->request->session()->write( "Menu", null );
	}

	public function mount()
	{

		

		$profiles = TableRegistry::get('Profiles');
		dump( $this->request->session()->read('Auth.User.profile_id'));
		$areas = $profiles->find()
				->select('id')
				->where(['id' =>  $this->request->session()->read('Auth.User.profile_id')])
				->contain(['Areas' => function ($query){
					return $query
						->select(['controller', 'controller_label', 'action'])
						->where(['Areas.appear' => '1', 'parent_id' => null])
						->contain(['ChildAreas' => function ($query) {
							return $query
										->select(['controller', 'controller_label', 'action'])
										->where(['ChildAreas.appear' => '1']);
						}]);

				} ] )
				->toArray();

		foreach ($areas as $key => $areas) {
			dump($areas);
		}

		
		$this->request->session()->write( 'Auth.User.Menu', $areas->Area );
				
		// $this->Profiles->find( 'first', array(
		// 	'conditions' => array( 'Profile.id' => $this->Session->read( 'Auth.User.profile_id' ) ),
		// 	'fields' => 'id',
		// 	'contain' => array(
		// 		'Area' => array(
		// 			'order' => 'Area.controller_label ASC',
		// 			'conditions' => array( 'Area.appear' => '1', 'Area.parent_id' => null ),
		// 			'fields' => array( 'controller', 'controller_label', 'action' ),
		// 			'AreaChild' => array(
		// 				'conditions' => array( 'AreaChild.appear' => '1' ),
		// 				'fields' => array( 'controller', 'controller_label', 'action' )
		// ) ) ) ) );
		
		
	}
}