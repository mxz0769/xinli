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
}
