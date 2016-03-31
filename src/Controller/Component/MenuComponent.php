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

		$areas = $profiles->find()
				->select('id')
				->where(['id' =>  $this->request->session()->read('Auth.User.profile_id')])
				->contain(['Areas' => function ($query) {

					return 
						$query->select(['controller', 'controller_label', 'action'])
						 	  ->where(['Areas.appear' => 1, function ($exp, $q){
										return $exp->isNull('Areas.parent_id');
							  }])
							  ->contain(['ChildAreas' => function ($query) {
									return $query->select(['controller', 'controller_label', 'action'])
									 			 ->where(['ChildAreas.appear' => 1]);
							  }]);

				}])
				->toArray();
		
		$this->request->session()->write( 'Auth.User.Menu', $areas[0]->areas);

	}
}