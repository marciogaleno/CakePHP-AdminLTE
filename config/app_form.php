<?php 

return [
	'formStart' => '<form class="form-horizontal" {{attrs}}><div class="box-body">',
	'formEnd' => '</gmp_div()></form>',
	'inputContainer' => '<div class="form-group">{{content}}</div>',
	'input' => '<div class="col-sm-{{size_element}}"><input type="{{type}}" name="{{name}}" class="form-control" {{attrs}}/></div>',
	'label' => '<label class="col-sm-2 control-label" {{attrs}}>{{text}}</label>',
	'submitContainer' => '<div class="box-footer"><a href="{{url_button_cancel}}" class="btn btn-default pull-right" style="margin-left:10px">{{name_button_cancel}}</a>{{content}}</div>',
	'inputSubmit' => '<input class="btn btn-success pull-right" type="{{type}}"{{attrs}}/>'
];