<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login_model extends CI_Model{
	public function getAccount($user){
		$this->db->select('username,password');
		$query = $this->db->get_where('account',array('username'=>$user),1);
		return $query->row_array();
	}
}
