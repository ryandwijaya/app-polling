<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ExtModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getVotes(){
		$this->db->select('*');
		$this->db->from('hr_kpsn');
		return $this->db->get();
	}

	public function getVotesBetween($start,$end,$ptn,$versi){
		$this->db->select('*');
		$this->db->from('hr_kpsn');
		$this->db->join('hr_ptn','hr_ptn.ptn_id = hr_kpsn.kpsn_ptn');
        $this->db->join('hr_lynn','hr_lynn.lynn_id = hr_kpsn.kpsn_lynn');
        $this->db->join('hr_jwb','hr_jwb.jwb_id = hr_kpsn.kpsn_jwb');
        $this->db->join('hr_usr','hr_usr.usr_id = hr_kpsn.kpsn_petugas');
		$this->db->where('kpsn_ptn',$ptn);
		$this->db->where('jwb_kategori',$versi);
		$this->db->where('date(kpsn_dcreated) >= ', $start);
		$this->db->where('date(kpsn_dcreated) <= ', $end);
		return $this->db->get();
	}

	public function getSetUmum(){
		$this->db->select('*');
		$this->db->from('hr_umum');
		return $this->db->get();
	}

	public function getPertanyaan(){
		$this->db->select('*');
		$this->db->from('hr_pertanyaan');
		return $this->db->get();
	}
	public function getPertanyaanById($id){
		$this->db->select('*');
		$this->db->from('hr_ptn');
		$this->db->where('ptn_id',$id);
		return $this->db->get()->row_array();
	}

	public function getPertanyaanByLyn($lyn){
		$this->db->select('*');
		$this->db->from('hr_set_monitor2');
		$this->db->where('set_lyn',$lyn);
		return $this->db->get()->row_array();
	}

	public function getJawaban(){
		$this->db->select('*');
		$this->db->from('hr_jwb');
		return $this->db->get();
	}
	public function getJawabanByKat($kategori){
		$this->db->select('*');
		$this->db->from('hr_jwb');
		$this->db->where('jwb_kategori',$kategori);
		return $this->db->get();
	}

	public function getInstansi(){
		$this->db->select('*');
		$this->db->from('hr_instansi');
		return $this->db->get();
	}

	public function getUmum(){
		$this->db->select('*');
		$this->db->from('hr_umum');
		return $this->db->get();
	}
	public function edit_instansi($id,$data){
		$this->db->where('instansi_id',$id);
		$this->db->update('hr_instansi',$data);
		return $this->db->affected_rows();
	}

	public function getVotesNow($now,$lyn,$versi){
		$this->db->select('*');
		$this->db->from('hr_kpsn');
        $this->db->join('hr_jwb','hr_jwb.jwb_id = hr_kpsn.kpsn_jwb');
		$this->db->where('date(kpsn_dcreated)', $now);
		$this->db->where('kpsn_lynn', $lyn);
		$this->db->where('jwb_kategori', $versi);
		return $this->db->get();
	}

	public function getVoteStatNow($ket,$now,$lyn){
		$this->db->select('*');
		$this->db->from('hr_kpsn');
		$this->db->where('kpsn_jwb',$ket);
		$this->db->where('kpsn_lynn', $lyn);	
		$this->db->where('date(kpsn_dcreated)', $now);
		return $this->db->get();
	}

	public function getVoteNow($now,$versi){
		$this->db->select('*');
		$this->db->from('hr_kpsn');
        $this->db->join('hr_jwb','hr_jwb.jwb_id = hr_kpsn.kpsn_jwb');
		$this->db->where('date(kpsn_dcreated)', $now);
		$this->db->where('jwb_kategori',$versi);
		return $this->db->get();
	}

	public function getVoteStat($ket){
		$this->db->select('*');
		$this->db->from('hr_kpsn');
		$this->db->where('kpsn_jwb',$ket);
		return $this->db->get();
	}
	public function getKpsn(){
		$this->db->select('*');
		$this->db->from('hr_kpsn');
		return $this->db->get()->result_array();
	}

	public function getResponden(){
		$this->db->select('*');
		$this->db->from('hr_responden');
		return $this->db->get()->result_array();
	}

	public function getVoteReport($ptn,$lyn,$tgl_start,$tgl_end,$versi){
		$this->db->select('*');
		$this->db->from('hr_kpsn');
        $this->db->join('hr_ptn','hr_ptn.ptn_id = hr_kpsn.kpsn_ptn');
        $this->db->join('hr_lynn','hr_lynn.lynn_id = hr_kpsn.kpsn_lynn');
        $this->db->join('hr_jwb','hr_jwb.jwb_id = hr_kpsn.kpsn_jwb');
		$this->db->where('kpsn_ptn',$ptn);
		$this->db->where('kpsn_lynn',$lyn);
		$this->db->where('jwb_kategori',$versi);
		$this->db->where('date(kpsn_dcreated) >= ', $tgl_start);
		$this->db->where('date(kpsn_dcreated) <= ', $tgl_end);
		return $this->db->get();
	}

	public function getOneVoteReport($ptn,$lyn,$tgl_start,$tgl_end,$value){
		$this->db->select('*');
		$this->db->from('hr_kpsn');
        $this->db->join('hr_ptn','hr_ptn.ptn_id = hr_kpsn.kpsn_ptn');
        $this->db->join('hr_lynn','hr_lynn.lynn_id = hr_kpsn.kpsn_lynn');
        $this->db->join('hr_jwb','hr_jwb.jwb_id = hr_kpsn.kpsn_jwb');
		$this->db->where('kpsn_ptn',$ptn);
		$this->db->where('kpsn_lynn',$lyn);
		$this->db->where('kpsn_jwb',$value);
		$this->db->where('date(kpsn_dcreated) >= ', $tgl_start);
		$this->db->where('date(kpsn_dcreated) <= ', $tgl_end);
		return $this->db->get();
	}
	function insert($table,$data){
		$this->db->insert($table, $data);
		return $this->db->affected_rows();
    }
    function update($key,$id,$table,$data){
        $this->db->where($key,$id);
        return $this->db->update($table,$data);
    }

    

}
