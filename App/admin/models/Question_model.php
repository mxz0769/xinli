<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Question_model extends CI_Model{
	public function get_ques($where='',$limit='',$offset=0){
		$this->db->select('q.qid,q.title,q.description,a.content as answer');
		$this->db->from('question q');
		$this->db->join('answer as a','a.question_id = q.qid');
		if($where){
			$this->db->where($where);
		}
		if($limit){
			$this->db->limit($limit,$offset);
		}
		$this->db->where('q.status',1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function count_ques($where){
		$this->db->from('question');
		$this->db->where($where);
		$this->db->where('status',1);
		return $this->db->count_all_results();
	}

	public function get_one_ques($qid){
		$this->db->select('qid,title,description');
		$query = $this->db->get_where('question',array('qid' => $qid));
		return $query->row_array();
	}

	public function del_ques($qid){
		$this->db->where(array('qid'=>$qid));
		return $this->db->update('question',array('status'=>-1));
	}

	public function get_answer($qid){
		$this->db->select('content as answer');
		$query = $this->db->get_where('answer',array('question_id' => $qid));
		return $query->row_array();
	}

	public function update_answer($data,$where){
		$this->db->where($where);
		return $this->db->update('answer',$data);
	}
}
