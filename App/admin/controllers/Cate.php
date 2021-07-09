<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cate extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Cate_model','cate');
	}

	public function index(){
		$cates = $this->cate->get_cates();
//		print_r($cates);
		$data['cates'] = $cates;
		$this->load->view('cate/index',$data);
	}

	public function add(){
		$this->load->view('cate/add');
	}

	public function addsave(){
		if($this->form_validation->run()!=FALSE){
			$catename = $this->input->post('catename');
			$data['catename'] = $catename;
			$bool = $this->cate->addcate($data);
			if($bool){
				redirect('cate/index');
			}
		}else{
			echo validation_errors();
//			redirect('cate/index');
		}
	}

	public function delcate(){
		if($this->input->get()){
			$cid = $this->input->get('cate');
			$bool = $this->cate->delcate($cid);
			if($bool){
				$data['status'] = 1;
				echo json_encode($data);exit;
			}
		}
	}
}
