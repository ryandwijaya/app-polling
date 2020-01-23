<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SettingModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat(){  //MENGAMBIL DATA PENGATURAN PADA MONITOR2
		$this->db->select('*');
		$this->db->from('hr_set_monitor2');
		$this->db->order_by('set_dcreated','DESC');
		return $this->db->get();
	}

	public function getByMonitor($lynn){ //MENGAMBIL DATA PENGATURAN MONITOR 2 DENGAN FILTER BY LAYANAN
		$this->db->select('*');
		$this->db->from('hr_set_monitor2');
		$this->db->where('set_lyn',$lynn);
		$this->db->order_by('set_dcreated','DESC');
		return $this->db->get();
	}

	public function lihat_satu($id){ //MENGAMBIL SATU DATA PADA PENGATURAN MONITOR 2
		$this->db->select('*');
		$this->db->from('hr_set_monitor2');
		$this->db->where('set_lyn',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function tambah($data){ 
		$this->db->insert('hr_set_monitor2', $data);
		return $this->db->affected_rows();
	}

	public function update($id,$data){
		$this->db->where('set_lyn',$id);
		$this->db->update('hr_set_monitor2',$data);
		return $this->db->affected_rows();
	}

	public function hapus($id){
		$this->db->where('ptn_id', $id);
		$this->db->delete('hr_set_monitor2');
		return $this->db->affected_rows();
	}
}
