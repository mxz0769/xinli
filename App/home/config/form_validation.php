<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
	'question/save'=>array(
		array(
			'field' => 'cate',
			'label' => 'cate',
			'rules' => 'required'
		),
		array(
			'field' => 'title',
			'label' => 'title',
			'rules' => 'htmlspecialchars|required'
		),
		array(
			'field' => 'description',
			'label' => 'description',
			'rules' => 'htmlspecialchars|required'
		)
	),

	'question/comment'=>array(
		array(
			'field' => 'comment',
			'label' => 'comment',
			'rules' => 'htmlspecialchars|required'
		),
	)
);
