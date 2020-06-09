<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calon_model extends CI_Model {

    private $table = 'calon';
    public $id = 'id';
    public $order = 'DESC';

    function __construct(){
        parent::__construct();
    }

	function get(){
		return $this->db->get($this->table);
	}

	function getByGender($gender){
		return $this->db->get_where($this->table, array('jns_kelamin' => $gender));
	}

// Tambah
	function calonTambah($nama, $jns_kelamin, $kelas, $organisasi, $visi, $misi, $fotobaru){
		$data = [
				'nama' => $nama,
				'jns_kelamin' => $jns_kelamin,
				'kelas' => $kelas,
				'organisasi' => $organisasi,
				'visi' => $visi,
				'misi' => $misi,
				'foto' => $fotobaru
			];
		return $this->db->insert($this->table, $data);
	}

// Ubah Edit
	function calonEdit1($nama, $jns_kelamin, $kelas, $organisasi, $visi, $misi, $fotobaru, $_id){
		if ($jns_kelamin == 'Laki Laki') {
			$jns_kelamin = 'L';
		} else {
			$jns_kelamin = 'P';
		}
		$data = [
				'nama' => $nama,
				'jns_kelamin' => $jns_kelamin,
				'kelas' => $kelas,
				'organisasi' => $organisasi,
				'visi' => $visi,
				'misi' => $misi,
				'foto' => $fotobaru
			];

		return $this->db->update($this->table, $data, array($this->id => $_id));
	}

	function calonEdit2($nama, $jns_kelamin, $kelas, $organisasi, $visi, $misi, $_id){
		$data = [
				'nama' => $nama,
				'jns_kelamin' => $jns_kelamin,
				'kelas' => $kelas,
				'organisasi' => $organisasi,
				'visi' => $visi,
				'misi' => $misi,
			];

		return $this->db->update($this->table, $data, array($this->id => $_id));
	}

// Hapus
	function calonHapus($_id){
		return $this->db->delete($this->table, array($this->id => $_id));
	}

// Hapus
	function calonHapusSemua(){
		return $this->db->empty_table($this->table);
	}

}