<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
	'login/check'=>array(
		array(
			'field' => 'username',
			'label' => 'username',
			'rules' => 'required'
		),
		array(
			'field' => 'password',
			'label' => 'password',
			'rules' => 'addslashes|required'
		)
	),
	'cate/addsave'=>array(
		array(
			'field' => 'catename',
			'label' => 'catename',
			'rules' => 'required'
		)
	)

);
