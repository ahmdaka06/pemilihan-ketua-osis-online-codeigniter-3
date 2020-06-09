<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    private $table = 'admin';
    public $id = 'id';

    function __construct(){
        parent::__construct();
    }

	function checkAdmin($username){
		$query = $this->db->where(['username' => $username]);
		$query = $this->db->get($this->table);

		if ($query->num_rows() != 0) return true;
		else return false;
	}

	function checkPasswordAdmin($username, $password){
		$query = $this->db->where(['username' => $username]);
		$query = $this->db->get($this->table);

		$result = $query->row();
		if(password_verify($password, $result->password)) return true;
		else return false;
	}

	function show($session){
		$query = $this->db->where(['username' => $session]);
		$query = $this->db->get($this->table);

		return $query->row();
	}

// Tampil admin
	function adminTampil(){
		$result = $this->db->get($this->table);
	
		return $result->result_array();
	}
	// Tambah Admin
	function adminTambah($nama, $user, $pass, $mail){
		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$data = [
				'nama' => $nama,
				'username' => $user,
				'password' => $pass,
				'email' => $mail
			];
		return $this->db->insert($this->table, $data);
	}

	function adminTampilID($id){
		$query = $this->db->where([$this->id => $id]);
		$query = $this->db->get($this->table);
		$result = $query->row_array();

		return $result['password'];
	}

// Edit Admin
	function adminUbah($nama, $user, $passB, $mail, $id){
		$passB = password_hash($passB, PASSWORD_DEFAULT);
		$data = [
				'nama' => $nama,
				'username' => $user,
				'password' => $passB,
				'email' => $mail
			];
		return $this->db->update($this->table, $data, array($this->id => $id));
	}

// Hapus Admin
	function adminHapus($id){
		return $this->db->delete($this->table, array($this->id => $id));;
	}

//Uji nama kembar
	function cek_nama($user){
		$query = $this->db->where(['username' => $user]);
		$result = $query->get($this->table);
		if($result){
			if($result->num_rows() == 0) return true;
			else return false;
		}
	}

}