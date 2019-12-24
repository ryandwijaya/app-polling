<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class JwbModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat(){
		$this->db->select('*');
		$this->db->from('hr_jwb');
		$this->db->order_by('jwb_dcreated','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lihat_by_versi($versi){
		$this->db->select('*');
		$this->db->from('hr_jwb');
		$this->db->where('jwb_kategori',$versi);
		$this->db->order_by('jwb_dcreated','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	

	public function tambah($data){
		$this->db->insert('hr_jwb', $data);
		return $this->db->affected_rows();
	}

	public function lihat_satu($id){
		$this->db->select('*');
		$this->db->from('hr_jwb');
		$this->db->where('hr_jwb.jwb_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function update($id,$data){
		$this->db->where('jwb_id',$id);
		$this->db->update('hr_jwb',$data);
		return $this->db->affected_rows();
	}

	public function hapus($id){
		$this->db->where('jwb_id', $id);
		$this->db->delete('hr_jwb');
		return $this->db->affected_rows();
	}
}
