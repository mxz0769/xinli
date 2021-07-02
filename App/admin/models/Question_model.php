<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Question_model extends CI_Model{
	public function get_ques($where='',$limit='',$offset=0){
		$this->db->select('q.title,q.description,a.content as answer');
		$this->db->from('question q');
		$this->db->join('answer as a','a.question_id = q.qid');
		if($where){
			$this->db->where($where);
		}
		if($limit){
			$this->db->limit($limit,$offset);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function count_ques($where){
		$this->db->from('question');
		$this->db->where($where);
		return $this->db->count_all_results();
	}
}
