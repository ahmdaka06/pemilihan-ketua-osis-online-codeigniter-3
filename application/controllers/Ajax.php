<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model(array('Guru_model','Siswa_model'));
    }

	public function voting_siswa(){
		if ($this->input->post('type', true) == 'login') {
  
  		$username  = $this->db->escape_str($this->input->post('username', true));
  		$password = $this->db->escape_str($this->input->post('password', true));

  			if ($this->Siswa_model->checkUser($username)) {
  			  	$response = array(
  			    	'status'=>'ada'
  			  	);
  				if ($this->Siswa_model->loginUser($username, $password)) {
  			  		$response = array(
  			    		'status'=>'ada'
  			  		);
   					$this->session->set_userdata(['user' => $username, 'login' => true]);
  			  	} else {
  			  		$response = array(
  			    		'status'=>'tidak ada'
  			  		);
  				}	
  			} else {
  			  	$response = array(
  			    	'status'=>'tidak ada'
  			  	);
  			}
		} else if ($this->input->post('type', true) == 'pilih'){

			$id_calon  = $this->db->escape_str($this->input->post('id_calon', true));
			$session = $this->db->escape_str($this->session->userdata('user'));
  
			if($this->Siswa_model->pilih($session, $id_calon) == true){
			    $response = array(
			      'status'=>'sukses'
			    );
			    $this->logout();
			} else {
			    $response = array(
			      'status'=>'gagal'
			    );
			}
			
		}
				echo json_encode($response);
	}

	public function voting_guru(){
		if ($this->input->post('type', true) == 'login') {
  
  		$username  = $this->db->escape_str($this->input->post('username', true));
  		$password = $this->db->escape_str($this->input->post('password', true));

  			if ($this->Guru_model->checkUser($username)) {
  			  	$response = array(
  			    	'status'=>'ada'
  			  	);
  				if ($this->Guru_model->loginUser($username, $password)) {
  			  		$response = array(
  			    		'status'=>'ada'
  			  		);
   					$this->session->set_userdata(['user' => $username, 'login' => true]);
  			  	} else {
  			  		$response = array(
  			    		'status'=>'tidak ada'
  			  		);
  				}	
  			} else {
  			  	$response = array(
  			    	'status'=>'tidak ada'
  			  	);
  			}
		} else if ($this->input->post('type', true) == 'pilih'){

			$id_calon  = $this->db->escape_str($this->input->post('id_calon', true));
			$session = $this->db->escape_str($this->session->userdata('user'));
  
			if($this->Guru_model->pilih($session, $id_calon) == true){
			    $response = array(
			      'status'=>'sukses'
			    );
			    $this->logout();
			} else {
			    $response = array(
			      'status'=>'gagal'
			    );
			}
			
		}
				echo json_encode($response);
	}

	public function logout(){
		$this->session->sess_destroy();
	}
	
}
