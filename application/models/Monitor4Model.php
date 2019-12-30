<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor4Model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function getPtn(){
		$this->db->select('*');
		$this->db->from('hr_ptn4');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getIdPtn($ptn){
		$this->db->select('*');
		$this->db->from('hr_ptn4');
		$this->db->where('ptn4_txt',$ptn);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function getJwb($ptn){
		$this->db->select('*');
		$this->db->order_by('jwb4_option','ASC');
		$this->db->from('hr_jwb4');
		$this->db->where('jwb4_ptn',$ptn);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getCountJwb($ptn,$field_jwb,$jwb){
		$this->db->select('*');
		$this->db->from('hr_kpsn4');
		$this->db->where('kpsn4_ptn',$ptn);
		$this->db->where($field_jwb,$jwb);
		$this->db->where('date(kpsn4_dcreated) >= ', $start);
		$this->db->where('date(kpsn4_dcreated) <= ', $end);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getKpsn($start,$end){
		$this->db->select('*');
		$this->db->from('hr_kpsn4');
		$this->db->where('date(kpsn4_dcreated) >= ', $start);
		$this->db->where('date(kpsn4_dcreated) <= ', $end);
		$query = $this->db->get();
		return $query->result_array();
	}


	public function hapus($id){
		$this->db->where('ptn4_id', $id);
		$this->db->delete('hr_ptn4');
		$this->db->where('kpsn4_ptn', $id);
		$this->db->delete('hr_kpsn4');
		$this->db->where('jwb4_ptn', $id);
		$this->db->delete('hr_jwb4');
		return $this->db->affected_rows();
	}
}
