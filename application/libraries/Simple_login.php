<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        $this->CI->load->model('admin_model');
	}

	public function login($username,$password)
	{
		$check = $this->CI->admin_model->login($username,$password);

		if($check) {
			$id_admin		= $check->id_admin;
			$nama			= $check->nama;
			$akses_level	= $check->akses_level;
			$email 			= $check->email;

			$this->CI->session->set_userdata('id_admin', $id_admin);
			$this->CI->session->set_userdata('nama', $nama);
			$this->CI->session->set_userdata('username', $username);
			$this->CI->session->set_userdata('email', $email);
			$this->CI->session->set_userdata('akses_level',$akses_level);

			redirect(base_url('admin/penerimaan'),'refresh');
		
		}else{
			$this->CI->session->set_flashdata('warning', 'Username atau Password Salah, Silahkan coba lagi');
			redirect(base_url('login'),'refresh');
		}
	}

	public function cek_login()
	{
		if($this->CI->session->userdata('username') == "") {
			$this->CI->session->set_flashdata('warning', 'Anda belum login, Silahkan login dulu');
		}
	}

	public function logout()
	{
		$this->CI->session->unset_userdata('id_admin');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('email');
		$this->CI->session->unset_userdata('akses_level');

		$this->CI->session->set_flashdata('sukses', 'Anda Berhasil logout');
		redirect(base_url('login'),'refresh');
	}

	

}

/* End of file Simple_login.php */
/* Location: ./application/libraries/Simple_login.php */
