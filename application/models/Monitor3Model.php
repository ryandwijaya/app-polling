<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor3Model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function getJwbKet($field,$ket,$start,$end){
		$this->db->select('*');
		$this->db->from('hr_monitor3');
		$this->db->where($field,$ket);
		$this->db->where('date(mnt3_dcreated) >= ', $start);
		$this->db->where('date(mnt3_dcreated) <= ', $end);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getAllJwbKet($field,$ket){
		$this->db->select('*');
		$this->db->from('hr_monitor3');
		$this->db->where($field,$ket);
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function getVotesNow(){
		$this->db->select('mnt3_jwb14');
		$this->db->from('hr_monitor3');
		$this->db->where('date(mnt3_dcreated)', date('Y-m-d'));
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getJmlResponden($start,$end){
		$this->db->select('*');
		$this->db->from('hr_monitor3');
		$this->db->where('date(mnt3_dcreated) >= ', $start);
		$this->db->where('date(mnt3_dcreated) <= ', $end);
		$query = $this->db->get();
		return $query->num_rows();
	}
	
}
