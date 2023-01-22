<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan_model extends CI_Model {

	public function __construct()
{
	parent::__construct();
	$this->load->database();
}
	//Listing all kegiatan
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->order_by('id_kegiatan', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	// Detail kegiatan
	public function detail($id_kegiatan)
	{
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->where('id_kegiatan', $id_kegiatan);
		$this->db->order_by('id_kegiatan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail slug kegiatan
	public function read($slug_kegiatan)
	{
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->where('slug_kegiatan', $slug_kegiatan);
		$this->db->order_by('id_kegiatan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Login kegiatan
	public function masuk($username,$password)
	{
		$this->db->select('*');
		$this->db->from('petugas');
		$this->db->where(array('username' => $username,
							   'password' => SHA1($password)));
		$this->db->order_by('id_petugas', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('kegiatan', $data);
	}
	// delete 
	public function delete($data)
	{
		$this->db->where('id_kegiatan', $data['id_kegiatan']);
		$this->db->delete('kegiatan', $data);
	}
	// edit
	public function edit($data)
	{
		$this->db->where('id_kegiatan', $data['id_kegiatan']);
		$this->db->update('kegiatan', $data);
	}

}

/* End of file Kegiatan_model.php */
/* Location: ./application/models/Kegiatan_model.php */