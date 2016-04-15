<?php

namespace App\View\Helper;

use Cake\View\Helper;

class BFormHelper extends Helper {

	/*----------------------------------------
	 * Attributes
	 ----------------------------------------*/

	public $helpers = array( 'Form' );

	private $defaultOptions = array( 

		'label'  => false, 
		'class'    => 'form-control', 
	);



	/*----------------------------------------
	 * Methods
	 ----------------------------------------*/

	private function controlGroupOpen()
	{

		$str = '<div class="box-body">';

		return $str;
	}

	private function controlGroupClose()
	{

		return '</div>';
	}

	public function input( $fieldName, $options = array() ){

		if (stripos($fieldName, '.')){
			$temp = explode('.', $fieldName);
			$model = $temp[0];
			$field = $temp[1];
		}


		//$str = $this->controlGroupOpen();

		$str = '';

		$str .= $this->Form->input($fieldName, array_merge($this->defaultOptions, $options));
		

		//$str .= $this->controlGroupClose();

		return $str;
	}

	public function check( $fieldName, $options = array() ){

		
		

		$str .= $this->controlGroupClose();
		return $str;	
	}

	public function radio( $fieldName, $options = array() ){

		
		$str .= $this->controlGroupClose();
		return $str;	
	}

}