<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('petugas');
		$this->db->order_by('id_petugas', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_petugas)
	{
		$this->db->select('*');
		$this->db->from('petugas');
		$this->db->where('id_petugas', $id_petugas);
		$this->db->order_by('id_petugas', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('petugas');
		$this->db->where(array('username' 	=> $username,
							   'password'	=> SHA1($password)));
		$this->db->order_by('id_petugas', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function tambah($data)
	{
		$this->db->insert('petugas', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_petugas', $data['id_petugas']);
		$this->db->delete('petugas', $data);
	}

	public function edit($data)
	{
		$this->db->where('id_petugas', $data['id_petugas']);
		$this->db->update('petugas', $data);
	}

}

/* End of file petugas_model.php */
/* Location: ./application/models/petugas_model.php */

/* End of file petugas_petugas.php */
/* Location: ./application/models/petugas_petugas.php */