<?php

namespace App\View\Helper;

use Cake\View\Helper;

class FrontEndHelper extends Helper 
{

	/*----------------------------------------
	 * Atributtes
	 ----------------------------------------*/
	
	public $helpers = array( 'Html', 'Session', 'Time', 'Url' );

	private $months = array( 1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril', 5 => 'Maio', 6 => 'Junho', 7 => 'Julho', 8 => 'Agosto', 9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro' );

	private $iconClasses = array(
		'config' => 'fa-cog'
	);

	/*----------------------------------------
	 * Methods
	 ----------------------------------------*/

	public function niceDate( &$date, $verbose = false )
	{

		if( $verbose )
			return '<i class="icon-calendar"></i> '. $this->Time->format( "d", $date ) .' de '. $this->months[$this->Time->format( "n", $date )] .' de '. $this->Time->format( "Y", $date ) .' <i class="icon-time"></i> '. $this->Time->format( "H:i:s", $date );

		return '<i class="icon-calendar"></i> '. $this->Time->format( "d/m/Y", $date ) .' <i class="icon-time"></i> '. $this->Time->format( "H:i:s", $date );
	}

	public function getNavegation()
	{	

		//dump($this->request->session()->read( "Auth.User.Profile" ));
		$controller_label = $this->request->session()->read( "Auth.User.Profile.{$this->request->param('controller')}.controller_label" );
		$action_label = $this->request->session()->read( "Auth.User.Profile.{$this->request->param('controller')}.actions_labels.{$this->request->param('action')}" );

		$string = '';

		$string .= '<ol class="breadcrumb">';

			$string .= '<li><a href="'. $this->Url->build("/{$this->request->param('controller')}") . '">'. $controller_label .'</a></li>';

			$string .= '<li>' . $action_label .'</li>';

		$string .= '</ol>';

		return $string;
	}

	public function getHeader( &$controller, $action, $subtitle = null )
	{
		
		if( !$this->Session->check( "Auth.User.Profile" ) )
			return $this->output( "" );
		
		$permissions = $this->Session->read( "Auth.User.Profile" );

		$tagOpen = '<div class="page-header"><h1>';
		$tagClose = '</h1></div>';

		if( $subtitle )
			return $tagOpen . $this->output( $subtitle ) . $tagClose;

		elseif( !empty( $permissions[ $controller ] ) )
			return $tagOpen . $this->output( $permissions[ $controller ][ 'controller_label' ] ) . $tagClose;

		else
			return null;
	}


	public function getMenu()
	{
		
		$string = '';
		$areas_by_group = $this->request->session()->read( "Auth.User.Menu" );
		$permissions = $this->request->session()->read( "Auth.User.Profile" );

		$string .= '<ul class="sidebar-menu">';
		$string .= '<li class="header">Menu</li>';

		foreach ($areas_by_group as $group_id => $group) {

			//Se for array é porque é um grupo
			if (is_array($group)){

				//constrói html de grupo de menu
				$string .= '<li class="'. $this->selected( $group_id ) . ' treeview">';
				$string .= '<a href="#">';
				$string .= '<i class=" fa '. ( !empty($group['icon']) ?  $group['icon'] : 'fa-dashboard') . ' "></i> <span>'. $group['name'] .'</span> <i class="fa fa-angle-left pull-right"></i>';
				$string .= '</a>';

				$string .= '<ul class="treeview-menu">';

				//Constrói área dentro do grupo de menu

				foreach ($group['areas'] as $area) {
					
					// se tiver permissao para controller/action
					if ( !empty( $permissions[ $area->controller ][ 'action' ][ $area->action ] ) ) {
						if( !empty( $area->group_menu->id) ){
	
								$string .= '<li class="'. ( ($area->controller == $this->request->param('controller') ? 'active' : null) ) .'">' .
											    '<a href="' .  $this->Url->build(['controller' => $area->controller, 'action' => $area->action]) . '">
											   		 <i class="fa fa-circle-o"></i>' . $area->controller_label . 
											    '</a>
											</li>';

						}
					}
				}
				//fecha grupo de menu
				$string .= '</ul>';	
				$string .= '</li>';
				
			} else {					
				$string .= '<li><a href="'. $this->Url->build(['controller' => $group->controller, 'action' => $group->action]) . '"><i class="fa ' . ( !empty($group->icon) ? $group->icon : 'fa-tags' ) . '"></i> <span>' . $group->controller_label . '</span></a></li>';
			}

		}
		
		$string .= '</ul>';

		return $string;
	}
	

	private function selected( $group_menu_id_selected )
	{
		if( $this->request->session()->check( "Menu.selected" ) ){
			if ($this->request->session()->read('Menu.selected') === $group_menu_id_selected){
				return 'active';
			}
		}
			
		return null;
	}

}