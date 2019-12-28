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
		$this->db->from('hr_jwb4');
		$this->db->where('jwb4_ptn',$ptn);
		$query = $this->db->get();
		return $query->result_array();
	}
	
}
