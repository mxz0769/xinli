<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Question extends CI_Controller{
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

			$this->load->model('Question_model','question');
			$bool = $this->question->save_ques($data);
			if($bool){
				echo "save data success";
			}
//			print_r($data);
		}else{
			$this->load->view('question/set');
		}
	}

	public function qlist(){
		$this->load->model('Question_model','question');
		$data['qlist'] = $this->question->get_ques();
//		var_dump($data);
		$this->load->view('question/qlist',$data);
	}

	public function changeList(){
		if($this->input->get()){
			$cate = $this->input->get('cate');
//			var_dump($cate);
			$this->load->model('Question_model','question');
			$qlist = $this->question->get_ques(array('q.cate_id'=>$cate));
			$temp = '';
			foreach ($qlist as $list){
				$temp .= '<div class="list-item">
				<div class="item-title">'.$list['title'].'</div>
				<div class="item-answer">
					<div class="answer-user">
						<div class="user-header"><img src="'.base_url().'assets/imgs/erha.jpg" alt=""></div>
						<div class="user-name">'.$list['ausername'].'</div>
					</div>
					<div class="answer-content">'.$list['content'].'</div>
				</div>
			</div>';
			}
			echo json_encode($temp);exit;
		}
	}

	public function detail(){
		$qid = $this->uri->segment(3);
		if(is_numeric($qid)){
			$this->load->model('Question_model','question');
			$question = $this->question->getQuesFromId($qid);
			$answer = $this->question->getAnswerFromId($qid);
			$data['question'] = $question;
			$data['answer'] = $answer;
//			var_dump($question);
			$this->load->view('question/detail',$data);
		}
	}
}
