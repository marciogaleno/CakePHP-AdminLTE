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
			
			$this->request->session()->write( "Menu", null );
			$this->request->session()->write( "Menu.{$this->Controller->setMenu}", 'active' );

		} else
			 $this->request->session()->write( "Menu", null );
	}

	public function mount()
	{	

		$profiles = TableRegistry::get('Profiles');

		dump($this->request->session()->read('Auth.User.profile_id'));
		$areas = $profiles->find()
				->select('id')
				->where(['id' =>  $this->request->session()->read('Auth.User.profile_id')])
				->contain([
					'Areas' => function ($query){
						return $query->where(['Areas.appear' => '1'])
									 ->select(['Areas.controller', 'Areas.controller_label', 'Areas.id', 'Areas.parent_id'])
									 ->contain([
									 	'ChildAreas' => function ($q) {
									 		return $q->where(['appear' => '1'])
									 		         ->select(['ChildAreas.controller', 'ChildAreas.controller_label', 'ChildAreas.action','ChildAreas.parent_id']);
									 				 
									 }]);
					}
				])
				->toArray();

		dump($areas);
		//$this->request->session()->write( 'Auth.User.Menu', $areas[0]->areas);

	}
}