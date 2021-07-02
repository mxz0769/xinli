<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Question extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Question_model','question');
	}

	public function set(){
//		echo base_url();
		$this->load->view('question/set');
//		echo '11111111';
	}

	public function save(){
		if($this->form_validation->run() != false){
			$data['cate_id'] = $this->input->post('cate');
			$data['title'] = $this->input->post('title');
			$data['description'] = $this->input->post('description');
			$data['display'] = $this->input->post('display');
			$data['user_id'] = 1;
			$data['addtime'] = time();

			$bool = $this->question->save_ques($data);
			if($bool){
				echo "save data success";
			}

		}else{
			$this->load->view('question/set');
		}
	}

	public function qlist($search=''){
		if($search){
			$search = addslashes($search);
		}
		$data['search'] = $search;
		$data['cate'] = $this->question->getCate();
//		var_dump($data['cate']);
		$data['qlist'] = $this->question->get_ques('',$search);
		$this->load->view('question/qlist',$data);
	}


	public function changeList(){
		if($this->input->get()){
			$cate = $this->input->get('cate');
//			$this->load->model('Question_model','question');
			$qlist = $this->question->get_ques(array('q.cate_id'=>$cate));
			$temp = '';
			foreach ($qlist as $list){
				$temp .= '<div class="list-item">
				<a href="'.site_url('question/detail/'.$list['qid']).'">
				<div class="item-title">'.$list['title'].'</div>
				<div class="item-answer">
					<div class="answer-user">
						<div class="user-header"><img src="'.base_url().'assets/imgs/erha.jpg" alt=""></div>
						<div class="user-name">'.$list['ausername'].'</div>
					</div>
					<div class="answer-content">'.$list['content'].'</div>
				</div>
				</a>
			</div>';
			}
			echo json_encode($temp);exit;
		}
	}

	public function detail(){
		$qid = $this->uri->segment(3);
		if(is_numeric($qid)){
//			$this->load->model('Question_model','question');
			$question = $this->question->getQuesFromId($qid);
			$answer = $this->question->getAnswerFromId($qid);

			//评论
			$comments = $this->question->getCommentsFromId($answer['aid']);
//			var_dump($comments);

			$data['question'] = $question;
			$data['answer'] = $answer;
			$data['comments'] = $comments;
//			var_dump($question);
			$this->load->view('question/detail',$data);
		}
	}

	public function comment(){
		if($this->input->post()){
			$data['comment'] = $this->input->post('comment');
			$data['parent_id'] = $this->input->post('parent_id');
			$data['answer_id'] = $this->input->post('answer_id');
			$data['user_id'] = 4;
			$data['cmtime'] = time();
//			$this->load->model('Question_model','question');
			$insert_id = $this->question->addComment($data);
//			var_dump($insert_id);
			if($insert_id){
				$user = $this->question->getUser($data['user_id']);
				$html = '<div class="pl-item" data="'.$insert_id.'">';
				if($data['parent_id']!=0){
					$puser = $this->question->getUser($data['parent_id']);

					$html .= '<span class="pl-name pl-user">'.$user['nickname'].'</span> 回复 <span class="pl-name">'.$puser['nickname'].'</span>：';
				}else{
					$html .= '<span class="pl-name pl-user">'.$user['nickname'].'</span>：';
				}
				$html .= '<span class="pl-detail">'.$data['comment'].'</span></div>';

				echo json_encode($html);exit;

			}else{

			}

		}
	}

	public function getCode(){
		$this->load->library('wechat');
		$this->wechat->getCode("question/getUser");
	}

	public function getUser(){
		$this->load->library('wechat');
		$code = $this->input->get('code');
		echo $code;
		$data = $this->WeChat->getAccessToken($code);
		print_r($data);
	}
}
