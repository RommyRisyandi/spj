<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required',
		array( 'required' => '%s harus diisi'));

		$this->form_validation->set_rules('password', 'Password', 'required',
		array( 'required' => '%s harus diisi'));

		if($this->form_validation->run())
		{
			$username 	= $this->input->post('username');
			$password 	= $this->input->post('password');

			$this->simple_login->login($username,$password);
		}

		$data = array( 'title' 	=> 'Login Administrator | SPJ');
		$this->load->view('login/login', $data, FALSE);
	}

	public function logout()
	{
		$this->simple_login->logout();
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */