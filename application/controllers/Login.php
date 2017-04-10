<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}
	public function login_do()
	{

		$u = $this->input->post('username');
		$p = $this->input->post('password');
		$this->model->login($u,$p);
	}
	
}
