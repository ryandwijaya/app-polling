<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PtnModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat(){
		$this->db->select('*');
		$this->db->from('hr_ptn');
		$this->db->order_by('ptn_dcreated','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	

	public function tambah($data){
		$this->db->insert('hr_ptn', $data);
		return $this->db->affected_rows();
	}

	public function lihat_satu($id){
		$this->db->select('*');
		$this->db->from('hr_ptn');
		$this->db->where('hr_ptn.ptn_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function update($id,$data){
		$this->db->where('ptn_id',$id);
		$this->db->update('hr_ptn',$data);
		return $this->db->affected_rows();
	}

	public function hapus($id){
		$this->db->where('ptn_id', $id);
		$this->db->delete('hr_ptn');
		return $this->db->affected_rows();
	}
}
