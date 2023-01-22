<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model('penerimaan_model');
			$this->load->model('kegiatan_model');
			//Do your magic here
			$this->simple_petugas->cek_login();
		}	

	public function index()
	{
		$penerimaan = $this->penerimaan_model->listing_aktif();

		$data = array( 'title'		=> 'Data Penerimaan SPJ | ',
					   'penerimaan'	=> $penerimaan,
					   'isi'		=> 'petugas/penerimaan/list');
		
		$this->load->view('petugas/layout/wrapper', $data, FALSE);
	}

	// Tambah Penerimaan SPJ
	public function tambah()
	{
		$kegiatan = $this->kegiatan_model->listing();

		$valid = $this->form_validation;

		$valid->set_rules('uraian_belanja', 'Uraian Belanja', 'required',
					array('required' => '%s harus diisi'));

		
		if($valid->run()===FALSE) {

		$data = array(  'title' 	=> 'Tambah SPJ Baru',
						'kegiatan'	=> $kegiatan,
					   	'isi'  		=> 'petugas/penerimaan/tambah'
					  );
		$this->load->view('petugas/layout/wrapper3', $data, FALSE);
	// Masuk database
	}else{
		$i = $this->input;
		$data = array('id_petugas'			=> $this->session->userdata('id_petugas'),
					  'tanggal_post' 		=> $i->post('tanggal_post'),
					  'uraian_belanja' 		=> $i->post('uraian_belanja'),
					  'id_kegiatan' 		=> $i->post('id_kegiatan'),
					  'jumlah'				=> $i->post('jumlah'),
					  'status'				=> $i->post('status'));

		$this->penerimaan_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data berhasil ditambah');
		redirect(base_url('petugas/penerimaan'),'refresh');
		}
	// End Masuk database
	}

	public function delete($id_penerimaan)
	{
		$data = array('id_penerimaan' => $id_penerimaan);

		$this->penerimaan_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus');
		redirect(base_url('petugas/penerimaan'),'refresh');
	}

	// Listing Data Entry SIPKD
	public function entry()
	{
		$entry = $this->penerimaan_model->listing_entry_aktif();

		$data = array( 'title'		=> 'Data Penerimaan SPJ | ',
					   'entry'		=> $entry,
					   'isi'		=> 'petugas/entry/list');
		
		$this->load->view('petugas/layout/wrapper', $data, FALSE);
	}

}

/* End of file Penerimaan.php */
/* Location: ./application/controllers/petugas/Penerimaan.php */