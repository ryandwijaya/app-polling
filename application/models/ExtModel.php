<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ExtModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getVotes()
	{      // MENGAMBIL SEMUA JUMLAH VOTE YANG ADA
		$this->db->select('*');
		$this->db->from('hr_kpsn');
		return $this->db->get();
	}

	public function getVideo()
	{    // MENGAMBIL SEMUA LIST VIDEO YANG ADA DI DATABASE
		$this->db->select('*');
		$this->db->from('hr_video');
		return $this->db->get();
	}

	public function getVotesBetween($start, $end, $ptn, $versi)
	{ //MENGAMBIL JUMLAH VOTE BERDASARKAN TANGGAL MULAI-TANGGAL AKHIR
		$this->db->select('*');
		$this->db->from('hr_kpsn');
		$this->db->order_by('kpsn_dcreated', 'DESC');
		$this->db->join('hr_ptn', 'hr_ptn.ptn_id = hr_kpsn.kpsn_ptn');
		$this->db->join('hr_lynn', 'hr_lynn.lynn_id = hr_kpsn.kpsn_lynn');
		$this->db->join('hr_jwb', 'hr_jwb.jwb_id = hr_kpsn.kpsn_jwb');
		$this->db->join('hr_usr', 'hr_usr.usr_id = hr_kpsn.kpsn_petugas');
		$this->db->where('kpsn_ptn', $ptn);
		if ($this->session->userdata('sess_hr_version') == 'monitor'){
			$this->db->where('kpsn_lynn', 5);
		}else{
			$this->db->where('kpsn_lynn !=', 5);
		}
		$this->db->where('jwb_kategori', $versi);
		$this->db->where('date(kpsn_dcreated) >= ', $start);
		$this->db->where('date(kpsn_dcreated) <= ', $end);
		return $this->db->get();
	}

	public function getSetUmum()
	{  //UNTUK MENGAMBIL DATA PENGATURAN UMUM
		$this->db->select('*');
		$this->db->from('hr_umum');
		return $this->db->get();
	}

	public function getPertanyaan()
	{
		$this->db->select('*');
		$this->db->from('hr_pertanyaan');
		return $this->db->get();
	}

	public function getPertanyaanById($id)
	{  //MENGAMBIL DATA PERTANYAAN BY ID
		$this->db->select('*');
		$this->db->from('hr_ptn');
		$this->db->where('ptn_id', $id);
		return $this->db->get()->row_array();
	}

	public function getPertanyaanByLyn($lyn)
	{  //MENGAMBIL DATA PERTANYAAN BY LAYANAN
		$this->db->select('*');
		$this->db->from('hr_set_monitor2');
		$this->db->where('set_lyn', $lyn);
		return $this->db->get()->row_array();
	}

	public function getJawaban()
	{  //MENGAMBIL DATA JAWABAN
		$this->db->select('*');
		$this->db->from('hr_jwb');
		return $this->db->get();
	}

	public function getJawabanByKat($kategori)
	{  //MENGAMBIL DATA JAWABAN BY KATEGORI
		$this->db->select('*');
		$this->db->from('hr_jwb');
		$this->db->where('jwb_kategori', $kategori);
		return $this->db->get();
	}

	public function getInstansi()
	{
		$this->db->select('*');
		$this->db->from('hr_instansi');
		return $this->db->get();
	}

	public function getUmum()
	{
		$this->db->select('*');
		$this->db->from('hr_umum');
		return $this->db->get();
	}

	public function edit_instansi($id, $data)
	{  //BERGUNA UNTUK MENGUBAH DATA INSTANSI
		$this->db->where('instansi_id', $id);
		$this->db->update('hr_instansi', $data);
		return $this->db->affected_rows();
	}

	public function getVotesNow($now, $lyn, $versi)
	{
		$this->db->select('*');
		$this->db->from('hr_kpsn');
		$this->db->join('hr_jwb', 'hr_jwb.jwb_id = hr_kpsn.kpsn_jwb');
		$this->db->where('date(kpsn_dcreated)', $now);
		$this->db->where('kpsn_lynn', $lyn);
		$this->db->where('jwb_kategori', $versi);
		return $this->db->get();
	}


	public function getAllVoteByVersi($versi)
	{
		$this->db->select('*');
		$this->db->from('hr_kpsn');
		$this->db->join('hr_jwb', 'hr_jwb.jwb_id = hr_kpsn.kpsn_jwb');
		if ($this->session->userdata('sess_hr_version') == 'monitor'){
			$this->db->where('kpsn_lynn', 5);
		}else{
			$this->db->where('kpsn_lynn !=', 5);
		}
		$this->db->where('jwb_kategori', $versi);
		return $this->db->get();
	}

	public function getVoteStatNow($ket, $now, $lyn)
	{
		$this->db->select('*');
		$this->db->from('hr_kpsn');
		$this->db->where('kpsn_jwb', $ket);
		$this->db->where('kpsn_lynn', $lyn);
		$this->db->where('date(kpsn_dcreated)', $now);
		return $this->db->get();
	}

	public function getVoteByJwb($ket)
	{
		$this->db->select('*');
		$this->db->from('hr_kpsn');
		if ($this->session->userdata('sess_hr_version') == 'monitor'){
			$this->db->where('kpsn_lynn', 5);
		}else{
			$this->db->where('kpsn_lynn !=', 5);
		}
		$this->db->where('kpsn_jwb', $ket);
		return $this->db->get();
	}

	public function getVoteNow($now, $versi)
	{
		$this->db->select('*');
		$this->db->from('hr_kpsn');
		$this->db->join('hr_jwb', 'hr_jwb.jwb_id = hr_kpsn.kpsn_jwb');
		$this->db->where('date(kpsn_dcreated)', $now);
		$this->db->where('jwb_kategori', $versi);
		$this->db->where('kpsn_lynn', 5);
		return $this->db->get();
	}

	public function getVoteAndroidNow($now, $versi)
	{
		$this->db->select('*');
		$this->db->from('hr_kpsn');
		$this->db->join('hr_jwb', 'hr_jwb.jwb_id = hr_kpsn.kpsn_jwb');
		$this->db->where('date(kpsn_dcreated)', $now);
		$this->db->where('jwb_kategori', $versi);
		$this->db->where('kpsn_lynn != ', 5);
		return $this->db->get();
	}

	public function getVoteStat($ket)
	{
		$this->db->select('*');
		$this->db->from('hr_kpsn');
		$this->db->where('kpsn_jwb', $ket);
		return $this->db->get();
	}

	public function getKpsn()
	{
		$this->db->select('*');
		$this->db->from('hr_kpsn');
		return $this->db->get()->result_array();
	}

	public function getResponden()
	{
		$this->db->select('*');
		$this->db->from('hr_responden');
		return $this->db->get()->result_array();
	}

	public function getVoteReport($ptn, $lyn, $tgl_start, $tgl_end, $versi)
	{ // MENGAMBIL JUMLAH VOTE DENGAN FILTER PERTANYAAN,LAYANAN,TGL-AWAL,TGL-AKHIR,DAN VERSI
		$this->db->select('*');
		$this->db->from('hr_kpsn');
		$this->db->join('hr_ptn', 'hr_ptn.ptn_id = hr_kpsn.kpsn_ptn');
		$this->db->join('hr_lynn', 'hr_lynn.lynn_id = hr_kpsn.kpsn_lynn');
		$this->db->join('hr_jwb', 'hr_jwb.jwb_id = hr_kpsn.kpsn_jwb');
		$this->db->where('kpsn_ptn', $ptn);
		$this->db->where('kpsn_lynn', $lyn);
		$this->db->where('jwb_kategori', $versi);
		$this->db->where('date(kpsn_dcreated) >= ', $tgl_start);
		$this->db->where('date(kpsn_dcreated) <= ', $tgl_end);
		return $this->db->get();
	}

	public function getOneVoteReport($ptn, $lyn, $tgl_start, $tgl_end, $value)
	{
		$this->db->select('*');
		$this->db->from('hr_kpsn');
		$this->db->join('hr_ptn', 'hr_ptn.ptn_id = hr_kpsn.kpsn_ptn');
		$this->db->join('hr_lynn', 'hr_lynn.lynn_id = hr_kpsn.kpsn_lynn');
		$this->db->join('hr_jwb', 'hr_jwb.jwb_id = hr_kpsn.kpsn_jwb');
		$this->db->where('kpsn_ptn', $ptn);
		$this->db->where('kpsn_lynn', $lyn);
		$this->db->where('kpsn_jwb', $value);
		$this->db->where('date(kpsn_dcreated) >= ', $tgl_start);
		$this->db->where('date(kpsn_dcreated) <= ', $tgl_end);
		return $this->db->get();
	}

	function insert($table, $data)
	{  //FUNGSI GLOBAL UNTUK MEMASUKKAN DATA KE DATABASE
		$this->db->insert($table, $data);
		return $this->db->affected_rows();
	}

	function update($key, $id, $table, $data)
	{ //FUNGSI GLOBAL UNTUK MENGUBAH DATA KE DATABASE
		$this->db->where($key, $id);
		return $this->db->update($table, $data);
	}

	public function updateMonitor3($id, $data)
	{
		$this->db->where('mnt3_id', $id);
		$this->db->update('hr_lynn', $data);
		return $this->db->affected_rows();
	}

	public function getGlobal($table)
	{ //FUNGSI GLOBAL UNTUK MENGAMBIL DATA KE DATABASE
		$this->db->select('*');
		$this->db->from($table);
		return $this->db->get()->result_array();
	}

	public function getOneGlobal($references, $key, $table)
	{ //FUNGSI GLOBAL UNTUK MANGAMBIL SATU DATA KE DATABASE
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($references, $key);
		return $this->db->get()->row_array();
	}

	public function hapus($key, $id, $table)
	{ //FUNGSI GLOBAL UNTUK MENGHAPUS DATA KE DATABASE
		$this->db->where($key, $id);
		$this->db->delete($table);
		return $this->db->affected_rows();
	}


}
