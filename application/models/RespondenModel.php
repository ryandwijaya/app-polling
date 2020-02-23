<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RespondenModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihatByDate($start,$end,$lynn,$versi){ //mengambil data responden berdasarkan tanggal
		$this->db->select('*');
		$this->db->from('hr_kpsn');
		$this->db->order_by('kpsn_dcreated','DESC');
		$this->db->join('hr_ptn','hr_ptn.ptn_id = hr_kpsn.kpsn_ptn');
        $this->db->join('hr_lynn','hr_lynn.lynn_id = hr_kpsn.kpsn_lynn');
        $this->db->join('hr_jwb','hr_jwb.jwb_id = hr_kpsn.kpsn_jwb');
        $this->db->join('hr_responden','hr_responden.responden_id = hr_kpsn.kpsn_responden');
        $this->db->join('hr_usr','hr_usr.usr_id = hr_kpsn.kpsn_petugas');
		$this->db->where('jwb_kategori',$versi);
		$this->db->where('kpsn_lynn',$lynn);
		$this->db->where('date(kpsn_dcreated) >= ', $start);
		$this->db->where('date(kpsn_dcreated) <= ', $end);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function Monitor3ByDate($start,$end){ //mengambil data responden berdasarkan tanggal
		$this->db->select('*');
		$this->db->from('hr_monitor3');
		$this->db->order_by('mnt3_dcreated','DESC');
		$this->db->join('hr_responden','hr_responden.responden_id = hr_monitor3.mnt3_responden');
		$this->db->where('date(mnt3_dcreated) >= ', $start);
		$this->db->where('date(mnt3_dcreated) <= ', $end);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function Monitor4ByDate($start,$end){ //mengambil data responden berdasarkan tanggal
		$this->db->distinct();
		$this->db->select('kpsn4_responden');
		$this->db->from('hr_kpsn4');
		$this->db->order_by('kpsn4_dcreated','DESC');
		$this->db->join('hr_responden','hr_responden.responden_id = hr_kpsn4.kpsn4_responden');
		$this->db->where('date(kpsn4_dcreated) >= ', $start);
		$this->db->where('date(kpsn4_dcreated) <= ', $end);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getRespondenById($id){ //mengambil data responden berdasarkan tanggal
//		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('hr_responden');
//		$this->db->order_by('responden_dcreated','DESC');
//		$this->db->join('hr_responden','hr_responden.responden_id = hr_kpsn4.kpsn4_responden');
//		$this->db->where('date(kpsn4_dcreated) >= ', $start);
		$this->db->where('responden_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function getRespondenByData($nama,$umur,$jk,$pnd){ //mengambil data responden berdasarkan data yang diinputkan
		$this->db->select('*');
		$this->db->from('hr_responden');
		$this->db->where('responden_nama',$nama);
		$this->db->where('responden_umur',$umur);
		$this->db->where('responden_jk',$jk);
		$this->db->where('responden_pendidikan',$pnd);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function getOneVote($id){ //mengambil data responden berdasarkan data yang diinputkan
		$this->db->select('*');
		$this->db->from('hr_monitor3');
		$this->db->where('mnt3_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

}
