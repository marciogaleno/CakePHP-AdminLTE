<?php 

return [
	'formStart' => '<form class="form-horizontal" {{attrs}}>',
	'inputContainer' => '<div class="form-group">{{content}}</div>',
	'input' => '<div class="col-sm-{{size_element}}"><input type="{{type}}" name="{{name}}" class="form-control" {{attrs}}/></div>',
	'label' => '<label class="col-sm-2 control-label" {{attrs}}>{{text}}</label>',
	'submitContainer' => '<div class="box-footer">{{content}}</div>',
	'inputSubmit' => '<input class="btn btn-primary" type="{{type}}"{{attrs}}/>',
	'button' => '<button class="btn btn-primary" {{attrs}}>{{text}}</button>',

];