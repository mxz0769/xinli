<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Question extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Question_model','question');
		$this->load->library('pagination');
	}

	public function list(){
		$page = $this->uri->segment(3)?$this->uri->segment(3):1;
		$pagesize = 3;
		$offset = ($page-1)*$pagesize;
		$qlist = $this->question->get_ques(array('q.check'=>1),$pagesize,$offset);
//		print_r($qlist);
		$data['qlist'] = $qlist;

		$total = $this->question->count_ques(array('question.check'=>1));
		$page = $this->getPage($pagesize,$total);
		$data['page'] = $page;

		$this->load->view('question/list',$data);
	}

	public function edit($qid){
//		echo $qid;
		$question = $this->question->get_one_ques($qid);
		$answer = $this->question->get_answer($qid);
		$data['question'] = $question;
		$data['answer'] = $answer;
//		print_r($data);
		$this->load->view('question/edit',$data);
	}

	public function editsave(){
		if($this->input->post()){
			$qid = $this->input->post('qid');
			$answer = $this->input->post('answer');
			if(is_numeric($qid)){
				$data['content'] = $answer;
				$data['answertime'] = time();
				$update = $this->question->update_answer($data,array('question_id'=>$qid));
				if($update){
					redirect('question/list');
				}
			}
		}
	}

	public function del(){
		if($this->input->post()){
			$qid = $this->input->post('qid');
			if(is_numeric($qid)){
				$update = $this->question->del_ques($qid);
				if($update){
					$res['code'] = 1;
					$res['msg'] = "success";
					echo json_encode($res);exit;
				}
			}
		}
	}

	private function getPage($pagesize,$total){
		$config['base_url'] = site_url('question/list');
		$config['total_rows'] = $total;
		$config['per_page'] = $pagesize;


		$config['full_tag_open'] = '<ul class="pagination justify-content-end">';
		$config['full_tag_close'] = '</ul>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
		$config['cur_tag_close'] = '</a></li>';


		$config['attributes'] = array('class' => 'page-link');
		$config['use_page_numbers'] = TRUE;

		$this->pagination->initialize($config);
		$page =  $this->pagination->create_links();
		return $page;
	}
}
