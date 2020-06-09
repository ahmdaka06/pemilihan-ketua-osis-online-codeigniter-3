<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model(array('Calon_model', 'Users_model', 'Admin_model', 'Guru_model', 'Siswa_model'));
    }

	public function login(){
        if ($this->session->userdata('login') == true) {
            redirect('admin', 'refresh');
        } else if (count($this->input->post())) { 
            $username = $this->db->escape_str($this->input->post('username', true)); 
            $password = $this->db->escape_str($this->input->post('password', true));   

            if ($this->Admin_model->checkAdmin($username)) {
                if ($this->Admin_model->checkPasswordAdmin($username, $password)) {
                	$this->session->set_userdata(['admin' => $username, 'login' => true]);
                	redirect('admin');
      			} else {
      				$this->session->set_flashdata('result', '<script>swal("Oops...", "Password salah", "error");</script>');
      			}
    		} else {
    			$this->session->set_flashdata('result', '<script>swal("Oops...", "Username salah/tidak terdaftar", "error");</script>');
    		}    	
        }
		$this->load->view('admin/login');
	}

	public function index(){
        if (!$this->session->userdata('login') == true) {
        	redirect('admin/login');
        }
        
		$data['admin'] = $this->Admin_model->show($this->session->userdata('admin'));
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/template/footer', $data);
	}

    public function dashboard_view(){
        
        $data['admin'] = $this->Admin_model->show($this->session->userdata('admin'));
        // Data Guru 
        $suaraGuruMasuk = $this->Guru_model->sudahMemilih();
        $SuaraGuruBelumMasuk = $this->Guru_model->JumlahPemilih();
        $jumlahGuruPemilih = $this->Guru_model->belumMemilih();
        $GuruBelumMemilih = $this->Guru_model->belumMemilih();
        $GuruSudahMemilih = $this->Guru_model->sudahMemilih();
        //Data Siswa
        $suaraSiswaMasuk = $this->Siswa_model->sudahMemilih();
        $SuaraSiswaBelumMasuk = $this->Siswa_model->JumlahPemilih();
        $jumlahSiswaPemilih = $this->Siswa_model->belumMemilih();
        $SiswaBelumMemilih = $this->Siswa_model->belumMemilih();
        $SiswaSudahMemilih = $this->Siswa_model->sudahMemilih();

        // Calon
        $data['calonTampil'] = $this->Calon_model->get()->result_array();
        // Menampilkan Semua Data Ke View
        $data['suaraMasuk'] = $suaraGuruMasuk + $suaraSiswaMasuk;
        $data['jumlahPemilih'] = $SuaraGuruBelumMasuk + $SuaraSiswaBelumMasuk;
        $data['belumMemilih'] = $jumlahGuruPemilih + $jumlahSiswaPemilih;
        $data['belumMasuk'] = $GuruBelumMemilih + $SiswaBelumMemilih;
        $data['sudahMemilih'] = $GuruSudahMemilih + $SiswaSudahMemilih;
        $this->load->view('admin/dashboard-view', $data);
    }

    public function action(){
        if ($this->input->post('type') == 'insert' ) {
            $nama = @$_POST['nama'];
            $user = trim(@$_POST['user']);
            $pass = trim(@$_POST['pass']);
            $mail = trim(@$_POST['mail']);

            if($this->Admin_model->cek_nama($user)){
                if ($this->Admin_model->adminTambah($nama, $user, $pass, $mail)) {
                    ob_start();
                    $data['adminTampil'] = $this->Admin_model->adminTampil();
                    $this->load->view('admin/admin-view', $data); 
                  $html = ob_get_contents();
                  ob_end_clean();
                  
                  $response = array(
                        'status'=>'sukses',
                        'html'=>$html
                  );
                }else{
                    $response = array(
                        'status'=>'gagal'
                  );
                }
            }else{
                $response = array(
                    'status'=>'nama'
              );
            }

        } else if ($this->input->post('type') == 'delete' ) {

            $id = $this->input->post('id');
        
            if ($this->Admin_model->adminHapus($id)) {
                ob_start();
                $data['adminTampil'] = $this->Admin_model->adminTampil();
                $this->load->view('admin/admin-view', $data); 
              $html = ob_get_contents();
              ob_end_clean();
              
              $response = array(
                    'status'=>'sukses',
                    'html'=>$html
              );
            }else{
                $response = array(
                    'status'=>'gagal'
              );
            }

        } else if ($this->input->post('type') == 'update' ) {

            $id   = @$_POST['id'];
            $nama = @$_POST['nama'];
            $user = trim(@$_POST['user']);
            $passL= trim(@$_POST['passL']);
            $passB= trim(@$_POST['passB']);
            $mail = trim(@$_POST['mail']);

            $pass = $this->Admin_model->adminTampilID($id);

            if(password_verify($passL, $pass)){
                if($this->Admin_model->adminUbah($nama, $user, $passB, $mail, $id)){
                    ob_start();
                $data['adminTampil'] = $this->Admin_model->adminTampil();
                $this->load->view('admin/admin-view', $data); 
                  $html = ob_get_contents();
                  ob_end_clean();
          
                  $response = array(
                        'status'=>'sukses',
                        'html'=>$html
                  );
                }else{
                    $response = array(
                        'status'=>'gagal'
                  );
                }
            }else{
              $response = array(
                    'status'=>'pass'
              );
            }
        
        }

        echo json_encode($response);        
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}
