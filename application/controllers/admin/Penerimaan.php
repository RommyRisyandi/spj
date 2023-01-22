<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model('penerimaan_model');
			$this->load->model('kegiatan_model');
			//Do your magic here
			$this->simple_login->cek_login();
		}	

	public function index()
	{
		$penerimaan = $this->penerimaan_model->listing_belum();

		$data = array( 'title'		=> 'Halaman Administrator | ',
					   'penerimaan'	=> $penerimaan,
					   'isi'		=> 'admin/penerimaan/list');
		
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah Kategori Produk
	public function tambah()
	{
		$kegiatan = $this->kegiatan_model->listing();
		$valid = $this->form_validation;

		$valid->set_rules('uraian_belanja', 'Uraian Belanja', 'required',
					array('required' => '%s harus diisi'));

		
		if($valid->run()===FALSE) {

		$data = array( 'title' 		=> 'Tambah SPJ Baru | SPJ ',
					   'kegiatan'	=> $kegiatan,
					   'isi'  		=> 'admin/penerimaan/tambah'
					  );
		$this->load->view('admin/layout/wrapper3', $data, FALSE);
	// Masuk database
	}else{
		$i = $this->input;
		$data = array('tanggal_post' 		=> $i->post('tanggal_post'),
					  'uraian_belanja' 		=> $i->post('uraian_belanja'),
					  'id_kegiatan' 		=> $i->post('id_kegiatan'),
					  'jumlah'				=> $i->post('jumlah'),
					  'status'				=> $i->post('status'));

		$this->penerimaan_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data berhasil ditambah');
		redirect(base_url('admin/penerimaan'),'refresh');
		}
	// End Masuk database
	}

	public function sudah_dientry($id_penerimaan='')
	{
		$query = $this->penerimaan_model->update('penerimaan', array('status' => 'sudah dientry') , array( 'id_penerimaan' => $id_penerimaan));
		redirect('admin/penerimaan','refresh');
	}

	public function perbaiki($id_penerimaan='')
	{
		$query = $this->penerimaan_model->update('penerimaan', array('status' => 'perbaiki') , array( 'id_penerimaan' => $id_penerimaan));
		redirect('admin/penerimaan','refresh');
	}

	public function delete($id_penerimaan)
	{
		$data = array('id_penerimaan' => $id_penerimaan);

		$this->penerimaan_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus');
		redirect(base_url('admin/penerimaan'),'refresh');
	}

	// Listing Data Entry SIPKD
	public function entry()
	{
		$entry = $this->penerimaan_model->listing_entry();

		$data = array( 'title'		=> 'Data Penerimaan SPJ | ',
					   'entry'		=> $entry,
					   'isi'		=> 'admin/entry/list');
		
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */