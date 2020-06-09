<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model {

    private $table = 'data';
    public $id = 'id';

    function __construct(){
        parent::__construct();
    }

	function JumlahPemilih(){
		$result = $this->db->get($this->table);
		return $result->num_rows();
	}

	// Sudah Memilih
	function sudahMemilih(){
		$query = $this->db->where(['status' => '1']);
		$query = $this->db->from($this->table);
		$result = $this->db->get();
		return $result->num_rows();
	}

	// Belum Memilih
	function belumMemilih(){
		$query = $this->db->where(['status' => '0']);
		$query = $this->db->from($this->table);
		$result = $this->db->get();
		return $result->num_rows();
	}

	function dataTampil(){
		$result = $this->db->get($this->table);

		return $result;
	}

// Tambah
	function dataTambah($a, $b ,$c){
		$data = [
				'nis' => $a,
				'nama' => $b,
				'kelas' => $c,
				'status' => '0'
			];
		return $this->db->insert($this->table, $data);
	}

// Hapus
	function dataHapus(){
		return $this->db->empty_table($this->table);
	}
}