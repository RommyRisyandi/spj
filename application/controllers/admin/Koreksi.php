<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koreksi extends CI_Controller {

	public function __construct()
	{
	parent::__construct();
	$this->load->model('penerimaan_model');
	$this->load->model('koreksi_model');
	$this->load->model('');
	$this->simple_login->cek_login();
	}

	public function index()
	{
		$koreksi = $this->koreksi_model->listing();

		$data = array( 'title'		=> 'Data Koreksi SPJ | ',
					   'koreksi'	=> $koreksi,
					   'isi'		=> 'admin/koreksi/list');
		
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// listing Data yang sudah di perbaiki
	public function perbaikan()
	{
		$perbaikan = $this->koreksi_model->listing_perbaikan();

		$data = array( 'title'		=> 'Data Perbaikan SPJ | ',
					   'perbaikan'	=> $perbaikan,
					   'isi'		=> 'admin/perbaikan/list');
		
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function sudah_dientry($id_penerimaan='')
	{
		$query = $this->koreksi_model->update('penerimaan', array('status' => 'sudah dientry') , array( 'id_penerimaan' => $id_penerimaan));
		redirect('admin/penerimaan','refresh');
	}

	public function perbaiki($id_penerimaan='')
	{
		$query = $this->koreksi_model->update('penerimaan', array('status' => 'perbaiki') , array( 'id_penerimaan' => $id_penerimaan));
		redirect('admin/penerimaan','refresh');
	}

	public function perbaiki_l($id_penerimaan='')
	{
		$query = $this->koreksi_model->update('penerimaan', array('status' => 'perbaiki lagi') , array( 'id_penerimaan' => $id_penerimaan));
		redirect('admin/penerimaan','refresh');
	}

	public function tambah($id_penerimaan)
	{
		$koreksi = $this->koreksi_model->detail($id_penerimaan);
		$valid = $this->form_validation;

		$valid->set_rules('jenis_koreksi', 'Jenis_koreksi', 'required',
					array('required' => '%s harus diisi'));

		
		if($valid->run()===FALSE) {

		$data = array(  'title' 	=> 'Tambah Koreksi',
						'koreksi'	=> $koreksi,
					   	'isi'  		=> 'admin/koreksi/tambah'
					  );
		$this->load->view('admin/layout/wrapper3', $data, FALSE);
	// Masuk database
	}else{
		$i = $this->input;
		$data = array('id_penerimaan'		=> $id_penerimaan,
					  'id_penerimaan'		=> $i->post('id_penerimaan'),
					  'jenis_koreksi' 		=> $i->post('jenis_koreksi'));

		$this->koreksi_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data berhasil ditambah');
		redirect(base_url('admin/koreksi'),'refresh');
		}
	// End Masuk database
	}

	public function edit($id_penerimaan)
	{
		$koreksi = $this->koreksi_model->detail_k($id_penerimaan);
		$valid = $this->form_validation;

		$valid->set_rules('jenis_koreksi', 'Jenis_koreksi', 'required',
					array('required' => '%s harus diisi'));

		
		if($valid->run()===FALSE) {

		$data = array(  'title' 	=> 'Tambah Koreksi |',
						'koreksi'	=> $koreksi,
					   	'isi'  		=> 'admin/koreksi/edit'
					  );
		$this->load->view('admin/layout/wrapper3', $data, FALSE);
	// Masuk database
	}else{
		$i = $this->input;
		$data = array(
					  'id_penerimaan'		=> $id_penerimaan,
					  'jenis_koreksi' 		=> $i->post('jenis_koreksi'));

		$this->koreksi_model->edit_k($data);
		$this->session->set_flashdata('sukses', 'Data berhasil diedit');
		redirect(base_url('admin/koreksi'),'refresh');
		}
	// End Masuk database
	}

}

/* End of file Penerimaan.php */
/* Location: ./application/controllers/admin/Penerimaan.php */