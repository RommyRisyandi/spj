<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {


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

			$this->simple_petugas->login($username,$password);
		}

		$data = array( 'title' 	=> 'Login Petugas | SPJ');
		$this->load->view('masuk/masuk', $data, FALSE);
	}

	public function logout()
	{
		$this->simple_petugas->logout();
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */