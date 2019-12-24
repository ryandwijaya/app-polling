<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LynModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat(){
		$this->db->select('*');
		$this->db->from('hr_lynn');
		$this->db->order_by('lynn_dcreated','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	

	public function tambah($data){
		$this->db->insert('hr_lynn', $data);
		return $this->db->affected_rows();
	}

	public function lihat_satu($id){
		$this->db->select('*');
		$this->db->from('hr_lynn');
		$this->db->where('hr_lynn.lynn_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function check_lyn($id){
		$this->db->select('*');
		$this->db->from('hr_set_monitor2');
		$this->db->where('set_lyn',$id);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function update($id,$data){
		$this->db->where('lynn_id',$id);
		$this->db->update('hr_lynn',$data);
		return $this->db->affected_rows();
	}

	public function hapus($id){
		$this->db->where('lynn_id', $id);
		$this->db->delete('hr_lynn');
		return $this->db->affected_rows();
	}
}
