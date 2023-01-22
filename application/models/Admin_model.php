<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->order_by('id_admin', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_admin)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('id_admin', $id_admin);
		$this->db->order_by('id_admin', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where(array('username' 	=> $username,
							   'password'	=> SHA1($password)));
		$this->db->order_by('id_admin', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function tambah($data)
	{
		$this->db->insert('admin', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_admin', $data['id_admin']);
		$this->db->delete('admin', $data);
	}

	public function edit($data)
	{
		$this->db->where('id_admin', $data['id_admin']);
		$this->db->update('admin', $data);
	}

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */