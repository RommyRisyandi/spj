<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koreksi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing Data Penerimaan Admin
	public function listing()
	{
		$this->db->select('penerimaan.*,koreksi.jenis_koreksi,petugas.nama');
		$this->db->from('penerimaan');
		// Join
		$this->db->join('koreksi', 'koreksi.id_penerimaan = penerimaan.id_penerimaan', 'left');
		$this->db->join('petugas', 'petugas.id_petugas = penerimaan.id_petugas', 'left');

		
		$this->db->where('penerimaan.status', 'perbaiki lagi');
		$this->db->or_where('penerimaan.status', 'perbaiki');
		$this->db->group_by('penerimaan.id_penerimaan');
		$this->db->order_by('id_penerimaan', 'asc');
		$query = $this->db->get();
		return $query->result();
	}


	// Listing Data Penerimaan petugas
	public function listing_aktif()
	{
		$this->db->select('penerimaan.*,koreksi.jenis_koreksi');
		$this->db->from('penerimaan');
		// Join
		$this->db->join('koreksi', 'koreksi.id_penerimaan = penerimaan.id_penerimaan', 'left');

		$this->db->where('penerimaan.id_petugas', $this->session->userdata('id_petugas'));
		$this->db->where('penerimaan.status', 'perbaiki lagi');
		$this->db->or_where('penerimaan.status', 'perbaiki');
		$this->db->group_by('penerimaan.id_penerimaan');
		$this->db->order_by('id_penerimaan', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing Perbaikan Admin
	public function listing_perbaikan()
	{
		$this->db->select('penerimaan.*,petugas.nama');
		$this->db->from('penerimaan');

		$this->db->join('petugas', 'petugas.id_petugas = penerimaan.id_petugas', 'left');

		$this->db->where('penerimaan.status', 'sudah dikoreksi');
		$this->db->group_by('penerimaan.id_penerimaan');
		$this->db->order_by('id_penerimaan', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing Perbaikan Petugas
	public function listing_perbaikan_aktif()
	{
		$this->db->select('*');
		$this->db->from('penerimaan');

		$this->db->where('penerimaan.id_petugas', $this->session->userdata('id_petugas'));
		$this->db->where('penerimaan.status', 'sudah dikoreksi');
		$this->db->group_by('penerimaan.id_penerimaan');
		$this->db->order_by('id_penerimaan', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	// mengambil data penerimaan
	public function detail($id_penerimaan)
	{
		$this->db->select('*');
		$this->db->from('penerimaan');
		$this->db->where('id_penerimaan', $id_penerimaan);
		$this->db->order_by('id_penerimaan', 'asc');
		$query = $this->db->get();
		return $query->row();
	
	}

	public function detail_k($id_penerimaan)
	{
		$this->db->select('*');
		$this->db->from('koreksi');
		$this->db->where('id_penerimaan', $id_penerimaan);
		$this->db->order_by('id_penerimaan', 'asc');
		$query = $this->db->get();
		return $query->row();
	
	}
	// edit untuk admin petugas
	public function edit($data)
	{
		$this->db->where('id_penerimaan', $data['id_penerimaan']);
		$this->db->update('penerimaan', $data);
	}
	//edit data yang statusnya perbaiki lagi
	public function edit_k($data)
	{
		$this->db->where('id_penerimaan', $data['id_penerimaan']);
		$this->db->update('koreksi', $data);
	}
	//tambah koreksi
	public function tambah($data)
	{
		$this->db->where('id_penerimaan', $data['id_penerimaan']);
		$this->db->insert('koreksi', $data);
	}

	public function update($table,$where,$id)
	{
		return $query = $this->db->update($table, $where, $id);
	}


}

/* End of file Koreksi_model.php */
/* Location: ./application/models/Koreksi_model.php */