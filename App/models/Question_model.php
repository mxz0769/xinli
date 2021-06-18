<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Question_model extends CI_Model{
	public function save_ques($data){
		return $this->db->insert('question',$data);
	}
}
