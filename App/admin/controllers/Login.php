<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Login_model','login');
	}

	public function index(){
		$this->load->view('login');
	}
	
	public function check(){
		if($this->form_validation->run()!=false){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$user = $this->login->getAccount($username);

			if(password_verify($password,$user['password'])){
				redirect('question/list');
			}
			print_r($user);
		}
	}

}
