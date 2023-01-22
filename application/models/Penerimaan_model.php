<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan_model extends CI_Model 
{

public function __construct()
{
	parent::__construct();
	$this->load->database();
}

	// Listing Data Penerimaan Admin
	public function listing()
	{
		//$id_petugas = $this->session->userdata['penerimaan']['id_petugas']; // dapatkan id user yg login
		$this->db->select('penerimaan.*,kegiatan.nama_kegiatan,petugas.nama');
		$this->db->from('penerimaan');
		// Join
		$this->db->join('kegiatan', 'kegiatan.id_kegiatan = penerimaan.id_kegiatan', 'left');
		$this->db->join('petugas', 'petugas.id_petugas = penerimaan.id_petugas', 'left');

		
		$this->db->group_by('penerimaan.id_penerimaan');
		$this->db->order_by('id_penerimaan', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing Data Penerimaan Petugas
	public function listing_aktif()
	{
		//$id_petugas = $this->session->userdata['penerimaan']['id_petugas']; // dapatkan id user yg login
		$this->db->select('penerimaan.*,kegiatan.nama_kegiatan');
		$this->db->from('penerimaan');
		// Join
		$this->db->join('kegiatan', 'kegiatan.id_kegiatan = penerimaan.id_kegiatan', 'left');
		$this->db->join('petugas', 'petugas.id_petugas = penerimaan.id_petugas', 'left');

		$this->db->where('penerimaan.id_petugas', $this->session->userdata('id_petugas'));
		$this->db->group_by('penerimaan.id_penerimaan');
		$this->db->order_by('id_penerimaan', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
	// Listing Data Belum Di Proses Admin
	public function listing_belum()
	{
		$this->db->select('penerimaan.*,kegiatan.nama_kegiatan,petugas.nama');
		$this->db->from('penerimaan');
		// Join
		$this->db->join('kegiatan', 'kegiatan.id_kegiatan = penerimaan.id_kegiatan', 'left');
		$this->db->join('petugas', 'petugas.id_petugas = penerimaan.id_petugas', 'left');

		$this->db->where('penerimaan.status', 'belum diproses');
		$this->db->group_by('penerimaan.id_penerimaan');
		$this->db->order_by('id_penerimaan', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing Entry Admin
	public function listing_entry()
	{
		$this->db->select('penerimaan.*,petugas.nama');
		$this->db->from('penerimaan');

		$this->db->join('petugas', 'petugas.id_petugas = penerimaan.id_petugas', 'left');

		$this->db->where('penerimaan.status', 'sudah dientry');
		$this->db->group_by('penerimaan.id_penerimaan');
		$this->db->order_by('id_penerimaan', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing Entry Petugas 
	public function listing_entry_aktif()
	{
		$this->db->select('*');
		$this->db->from('penerimaan');

		$this->db->where('penerimaan.id_petugas', $this->session->userdata('id_petugas'));
		$this->db->where('penerimaan.status', 'sudah dientry');
		$this->db->group_by('penerimaan.id_penerimaan');
		$this->db->order_by('id_penerimaan', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_penerimaan)
	{
		$this->db->select('*');
		$this->db->from('penerimaan');
		$this->db->where('id_penerimaan', $id_penerimaan);
		$this->db->order_by('id_penerimaan', 'asc');
		$query = $this->db->get();
		return $query->row();
	
	}

	public function tambah($data)
	{
		$this->db->insert('penerimaan', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_penerimaan', $data['id_penerimaan']);
		$this->db->delete('penerimaan', $data);
	}

	public function update($table,$where,$id)
	{
		return $query = $this->db->update($table, $where, $id);
	}

}

/* End of file Penerimaan_model.php */
/* Location: ./application/models/Penerimaan_model.php */