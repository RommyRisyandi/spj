<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kegiatan_model');
	// Authentication Halaman
		$this->simple_login->cek_login();
	}

	//Data kegiatan
	public function index()
	{
		$kegiatan = $this->kegiatan_model->listing();

		$data = array( 'title' => 'Data kegiatan SPJ | ',
					   'kegiatan'  => $kegiatan,
					   'isi'  => 'admin/kegiatan/list'
					  );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
		// Tambah kegiatan Produk
	public function tambah()
	{
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_kegiatan', 'Nama kegiatan', 'required|is_unique[kegiatan.nama_kegiatan]',
					array('required' => '%s harus diisi',
						  'is_unique' => '%s sudah ada. buat kegiatan baru!'));

		
		if($valid->run()===FALSE) {
			// End Validasi

		$data = array( 'title' 	=> 'Tambah kegiatan SPJ | ',
					   'isi'  	=> 'admin/kegiatan/tambah'
					  );
		$this->load->view('admin/layout/wrapper3', $data, FALSE);
	// Masuk database
	}else{
		$i = $this->input;
		$slug_kegiatan = url_title($this->input->post('nama_kegiatan'), 'dash', TRUE);
		$data = array('slug_kegiatan' 		=> $slug_kegiatan,
					  'nama_kegiatan' 		=> $i->post('nama_kegiatan'));

		$this->kegiatan_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data berhasil ditambah');
		redirect(base_url('admin/kegiatan'),'refresh');
		}
	// End Masuk database
	}
	// Edit kegiatan
	public function edit($id_kegiatan)
	{
		$kegiatan = $this->kegiatan_model->detail($id_kegiatan);

		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_kegiatan', 'Nama kegiatan', 'required',
			array('required' => '%s harus diisi'));

		
		if($valid->run()===FALSE) {
			// End Validasi

		$data = array( 'title' 		=> 'Edit kegiatan SPJ | ',
					   'kegiatan' 	=> $kegiatan,
					   'isi'  		=> 'admin/kegiatan/edit'
					  );
		$this->load->view('admin/layout/wrapper3', $data, FALSE);
	// Masuk database
	}else{
		$i = $this->input;
		$slug_kegiatan = url_title($this->input->post('nama_kegiatan'), 'dash', TRUE);
		$data = array('id_kegiatan'			=> $id_kegiatan,
					  'slug_kegiatan' 		=> $slug_kegiatan,
					  'nama_kegiatan' 		=> $i->post('nama_kegiatan'));

		$this->kegiatan_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data berhasil diubah');
		redirect(base_url('admin/kegiatan'),'refresh');
		}
	// End Masuk database
	}

	public function delete($id_kegiatan)
	{
		$data = array('id_kegiatan' => $id_kegiatan);

		$this->kegiatan_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus');
		redirect(base_url('admin/kegiatan'),'refresh');
	}

}

/* End of file Kegiatan.php */
/* Location: ./application/controllers/admin/Kegiatan.php */