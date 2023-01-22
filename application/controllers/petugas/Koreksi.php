<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koreksi extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('penerimaan_model');
	$this->load->model('koreksi_model');
	$this->load->model('kegiatan_model');
	$this->simple_petugas->cek_login();
}


	public function index()
	{
		$penerimaan = $this->koreksi_model->listing_aktif();


		$data = array( 'title'		=> 'Data Koreksi SPJ | ',
					   'penerimaan'	=> $penerimaan,
					   'isi'		=> 'petugas/koreksi/list');
		
		$this->load->view('petugas/layout/wrapper', $data, FALSE);
	}

	// listing Data yang sudah di perbaiki
	public function perbaikan()
	{
		$perbaikan = $this->koreksi_model->listing_perbaikan_aktif();

		$data = array( 'title'		=> 'Data Perbaikan SPJ | ',
					   'perbaikan'	=> $perbaikan,
					   'isi'		=> 'petugas/perbaikan/list');
		
		$this->load->view('petugas/layout/wrapper', $data, FALSE);
	}


	public function edit($id_penerimaan)
	{
		$penerimaan = $this->koreksi_model->detail($id_penerimaan);
		$kegiatan = $this->kegiatan_model->listing();

		$valid = $this->form_validation;

		$valid->set_rules('jumlah', 'Jumlah', 'required',
			array('required' => '%s harus diisi'));

		if($valid->run()===FALSE) {
			// End Validasi

		$data = array( 'title' 		=> 'Koreksi SPJ | ',
					   'penerimaan' => $penerimaan,
					   'kegiatan'	=> $kegiatan,
					   'isi'  		=> 'petugas/koreksi/edit'
					  );
		$this->load->view('petugas/layout/wrapper3', $data, FALSE);
	// Masuk database
	}else{
		$i = $this->input;
		$data = array('id_penerimaan'		=> $id_penerimaan,
					  'tanggal_post' 		=> $i->post('tanggal_post'),
					  'uraian_belanja' 		=> $i->post('uraian_belanja'),
					  'id_kegiatan' 		=> $i->post('id_kegiatan'),
					  'jumlah'				=> $i->post('jumlah'),
					  'status'				=> $i->post('status'));

		$this->koreksi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data berhasil dikoreksi');
		redirect(base_url('petugas/koreksi/perbaikan'),'refresh');
		
		}
	}

}

/* End of file Koreksi.php */
/* Location: ./application/controllers/petugas/Koreksi.php */