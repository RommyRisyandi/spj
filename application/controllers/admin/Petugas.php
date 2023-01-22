<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('petugas_model');
		$this->simple_login->cek_login();
	}

	public function index()
	{
		$petugas = $this->petugas_model->listing();

		$data = array( 'title' 		=> 'Data Petugas | SPJ',
					   'petugas' 	=> $petugas,
					   'isi'		=> 'admin/petugas/list');

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah()
	{
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama', 'Nama Lengkap', 'required',
					array('required' => '%s harus diisi'));

		$valid->set_rules('email', 'Email', 'required|valid_email',
					array('required' 	=> '%s harus diisi',
						  'valid_email' => '%s tidak valid'));

		$valid->set_rules('username', 'Username', 'required|min_length[6]|max_length[32]|is_unique[petugas.username]',
					array('required' 	=> '%s harus diisi',
						  'min_length' 	=> '%s minimal 6 karakter',
						  'max_length' 	=> '%s maksimal 32 karakter',
						  'is_unique' 	=> '%s sudah ada. Buat Username baru'));

		$valid->set_rules('password', 'Password', 'required',
					array('required' => '%s harus diisi'));
		if($valid->run()===FALSE) {
			// End Validasi

		$data = array( 'title' 	=> 'Tambah Petugas | SPJ',
					   'isi'  	=> 'admin/petugas/tambah'
					  );
		$this->load->view('admin/layout/wrapper3', $data, FALSE);
	// Masuk database
	}else{
		$i = $this->input;
		$data = array('nama' 		=> $i->post('nama'),
					  'email' 		=> $i->post('email'),
					  'username' 	=> $i->post('username'),
					  'password' 	=> SHA1($i->post('password')),
					  'akses_level' => $i->post('akses_level'));

		$this->petugas_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data berhasil ditambah');
		redirect(base_url('admin/petugas/index'),'refresh');
		}
	}

	public function edit($id_petugas)
	{
		$petugas = $this->petugas_model->detail($id_petugas);

		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama', 'Nama Lengkap', 'required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('email', 'Email', 'required|valid_email',
					array('required' 	=> '%s harus diisi',
						  'valid_email' => '%s tidak valid'));

		$valid->set_rules('password', 'Password', 'required',
					array('required' => '%s harus diisi'));
		if($valid->run()===FALSE) {
			// End Validasi

		$data = array( 'title' 	=> 'Edit Petugas | SPJ ',
					   'petugas' 	=> $petugas,
					   'isi'  	=> 'admin/petugas/edit'
					  );
		$this->load->view('admin/layout/wrapper3', $data, FALSE);
	// Masuk database
	}else{
		$i = $this->input;
		$data = array('id_petugas'	=> $id_petugas,
					  'nama' 		=> $i->post('nama'),
					  'email' 		=> $i->post('email'),
					  'username' 	=> $i->post('username'),
					  'password' 	=> SHA1($i->post('password')),
					  'akses_level' => $i->post('akses_level'));

		$this->petugas_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data berhasil diubah');
		redirect(base_url('admin/petugas'),'refresh');
		}
	// End Masuk database
	}

	public function delete($id_petugas)
	{
		$data = array('id_petugas' => $id_petugas);

		$this->petugas_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus');
		redirect(base_url('admin/petugas'),'refresh');
	}

}

/* End of file Petugas.php */
/* Location: ./application/controllers/admin/Petugas.php */