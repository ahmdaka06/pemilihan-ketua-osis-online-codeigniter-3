<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voting extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model(array('Calon_model', 'Guru_model', 'Siswa_model'));
    }

	public function index(){
		$this->load->view('front-end/voting');
	}

	public function siswa(){
		$users = $this->Siswa_model->dataUser()->row_array();
		$gender = $this->db->escape_str($users['jns_kelamin']);
		$data['users'] = $users;
		$data['calon'] = $this->Calon_model->getByGender($gender);
		$this->load->view('front-end/siswa', $data);
	}

	public function guru(){
		$data['users'] = $this->Guru_model->dataUser()->row_array();
		$data['calon'] = $this->Calon_model->get();
		$this->load->view('front-end/guru', $data);
	}


}
