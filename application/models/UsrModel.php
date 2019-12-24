<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UsrModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat(){
		$this->db->select('*');
		$this->db->from('hr_usr');
		$this->db->order_by('usr_dcreated','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tambah($data){
		$this->db->insert('hr_usr', $data);
		return $this->db->affected_rows();
	}

	public function lihat_satu($id){
		$this->db->select('*');
		$this->db->from('hr_usr');
		$this->db->where('hr_usr.usr_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_by_usrnm($usrnm){
		$this->db->select('*');
		$this->db->from('hr_usr');
		$this->db->where('hr_usr.usr_usrnm',$usrnm);
		return $this->db->get();

	}

	public function update($id,$data){
		$this->db->where('usr_id',$id);
		$this->db->update('hr_usr',$data);
		return $this->db->affected_rows();
	}

	public function hapus($id){
		$this->db->where('usr_id', $id);
		$this->db->delete('hr_usr');
		return $this->db->affected_rows();
	}
}
