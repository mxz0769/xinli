<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Question_model extends CI_Model{
	public function save_ques($data){
		return $this->db->insert('question',$data);
	}

	public function get_ques($where='',$like=''){
		$this->db->select('q.*,u.nickname,c.catename,a.content,u1.nickname as ausername');
		$this->db->from('question as q');
		$this->db->join('user u','u.uid = q.user_id');
		$this->db->join('cate c','c.cid = q.cate_id');
		$this->db->join('answer a','a.question_id = q.qid');
		$this->db->join('user u1','u1.uid = a.user_id');
		$this->db->where('q.check = 1 and c.state = 1');
		if($where){
			$this->db->where($where);
		}
		if($like){
			$this->db->like('title',$like);
		}
		$this->db->limit(5);
		$this->db->order_by('q.addtime','desc');
		$this->db->group_by('q.qid');
		$query = $this->db->get();
		$qlist = $query->result_array();
		return $qlist;
	}

	public function getQuesFromId($id){
		$this->db->select('q.*,u.nickname');
		$this->db->from('question as q');
		$this->db->join('user u','u.uid = q.user_id');
		$this->db->where('q.qid = '.$id);
		$query = $this->db->get();
		$question = $query->row_array();
		return $question;
	}

	public function getAnswerFromId($id){
		$this->db->select('a.*,u.nickname');
		$this->db->from('answer as a');
		$this->db->join('user u','u.uid = a.user_id');
		$this->db->where('a.question_id ='.$id);
		$query = $this->db->get();
		$answer = $query->row_array();
		return $answer;
	}

	//评论
	public function getCommentsFromId($answerid){
		$this->db->select('cm.*,u.nickname as cm_name,p.nickname as parent_name');
		$this->db->from('comment as cm');
		$this->db->join('user u','u.uid = cm.user_id');
		$this->db->join('user p','p.uid = cm.parent_id','left');
		$this->db->where('cm.answer_id ='.$answerid);
		$query = $this->db->get();
		$comment = $query->result_array();
		return $comment;
	}

	public function addComment($data){
		$this->db->insert('comment',$data);
		return $this->db->insert_id('comment');
	}

	public function getUser($uid){
		$query = $this->db->get_where('user',array('uid'=>$uid));
		$user = $query->row_array();
		return $user;
	}

	public function getCate(){
		$query = $this->db->get('cate');
		return $query->result_array();
	}

}
