<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cate_model extends CI_Model{
	public function get_cates(){
		$query = $this->db->get_where('cate',array('state'=>1));
		return $query->result_array();
	}

	public function addcate($data){
		return $this->db->insert('cate',$data);

	}

	public function delcate($cid){
		$this->db->where('cid',$cid);
		return $this->db->update('cate',array('state'=>-1));
	}
}
