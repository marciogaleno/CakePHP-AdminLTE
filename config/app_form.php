<?php 

return [
	'formStart' => '<form class="form-horizontal" {{attrs}}><div class="box-body">',
	'formEnd' => '</gmp_div()></form>',
	'inputContainer' => '<div class="form-group">{{content}}</div>',
	'input' => '<div class="col-xs-5"><input type="{{type}}" name="{{name}}" class="form-control" {{attrs}}/></div>',
	'label' => '<label class="col-sm-2 control-label" {{attrs}}>{{text}}</label>',
	'submitContainer' => '<div class="box-footer"><a href="{{url_button_cancel}}" class="btn btn-default pull-right" style="margin-left:5px">{{name_button_cancel}}</a>{{content}}</div>',
	'inputSubmit' => '<input class="btn btn-success pull-right" type="{{type}}"{{attrs}}/>',
	'select' => '<div class="col-md-{{size_select}}"><select class="form-control" name="{{name}}"{{attrs}}>{{content}}</select></div>',
	'selectMultiple' => '<select name="{{name}}[]" multiple="multiple"{{attrs}} class="form-control">{{content}}</select>',
	'option' => '<option value="{{value}}"{{attrs}}>{{text}}</option>',
	'inputContainerError' => '<div class="form-group {{required}} has-error">{{content}}{{error}}</div>',
	'error' => '<span class="help-block">{{content}}</span>',
	'checkbox' => '<input type="checkbox" class="minimal" name="{{name}}" value="{{value}}"{{attrs}}>',
    'checkboxFormGroup' => '{{label}}',
    'checkboxWrapper' => '<div class="checkbox">{{label}}</div>'
];