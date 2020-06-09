<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calon extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model(array('Calon_model', 'Users_model', 'Admin_model', 'Data_model'));
    }

	public function index(){
        if (!$this->session->userdata('login') == true) {
            redirect('admin/login');
        }
        
        $data['admin'] = $this->Admin_model->show($this->session->userdata('admin'));
        $data['calonTampil'] = $this->Calon_model->get()->result_array();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/calon', $data);
        $this->load->view('admin/template/footer', $data);
	}

    public function action(){
        $nama       = @$_POST['nama'];
        $jns_kelamin = @$_POST['jns_kelamin'];
        $kelas      = @$_POST['kelas'];
        $organisasi = @$_POST['organisasi'];
        $visi       = @$_POST['visi'];
        $misi       = @$_POST['misi'];

        $foto     = @$_FILES['foto']['name'];
        $tmp      = @$_FILES['foto']['tmp_name'];
        $fotobaru = date('dmYHis').$foto;
        $path       = 'assets/img/Calon/'.$fotobaru;

        if ($this->input->post('type') == 'insert' ) {

            if ($this->Calon_model->calonTambah($nama, $jns_kelamin, $kelas, $organisasi, $visi, $misi, $fotobaru)) {
                move_uploaded_file($tmp, $path);

                ob_start();
                $data['calonTampil'] = $this->Calon_model->get()->result_array();
                $this->load->view('admin/calon-view', $data);
                $html = ob_get_contents();
                ob_end_clean();
        
                $response = array(
                'status' => 'sukses',
                'html' => $html
                );
            } else {
                $response = array(
                'status' => 'gagal'
                );
            }

        } else if($this->input->post('type') == 'update' ) {
        
            $_id   = @$_POST['data-id'];
            $_foto = @$_POST['data-foto'];
        
            if (!empty($foto)) {
                if ($this->Calon_model->calonEdit1($nama, $jns_kelamin, $kelas, $organisasi, $visi, $misi, $fotobaru, $_id)) {
                    $file = 'assets/img/Calon/'.$_foto;
                    if (is_file($file)) unlink($file);
                    move_uploaded_file($tmp, $path);
        
                    ob_start();
                    $data['calonTampil'] = $this->Calon_model->get()->result_array();
                    $this->load->view('admin/calon-view', $data);
                    $html = ob_get_contents();
                    ob_end_clean();
            
                    $response = array(
                    'status' => 'sukses',
                    'html' => $html
                    );
                } else {
                    $response = array(
                    'status '=> 'gagal'
                    );
                }
            } else {
                if ($this->Calon_model->calonEdit2($nama, $jns_kelamin, $kelas, $organisasi, $visi, $misi, $_id)) {
                    ob_start();
                    $data['calonTampil'] = $this->Calon_model->get()->result_array();
                    $this->load->view('admin/calon-view', $data);
                    $html = ob_get_contents();
                    ob_end_clean();
            
                    $response = array(
                    'status' => 'sukses',
                    'html' => $html
                    );
                } else {
                    $response = array(
                    'status '=> 'gagal'
                    );
                }
            }

        } else if ($this->input->post('type') == 'delete' ){
            
                $_id   = @$_POST['data-id'];
                $_foto = @$_POST['data-foto'];
            
                if ($this->Calon_model->calonHapus($_id)) {
                    $file = 'assets/img/Calon/'.$_foto;
                    if(is_file($file)) unlink($file);
            
                    ob_start();
                    $data['calonTampil'] = $this->Calon_model->get()->result_array();
                    $this->load->view('admin/calon-view', $data);
                    $html = ob_get_contents();
                    ob_end_clean();
        
                    $response = array(
                    'status'=>'sukses',
                    'html'=>$html
                    );
                }

        } else if($this->input->post('type') == 'deleteAll' ){

            if($this->Calon_model->calonHapusSemua()){
                $files = glob('assets/img/Calon/*');

                foreach ($files as $file) {
                    if(is_file($file)) unlink($file);
                }

                ob_start();
                $data['calonTampil'] = $this->Calon_model->get()->result_array();
                $this->load->view('admin/calon-view', $data);
                $html = ob_get_contents();
                ob_end_clean();
        
                $response = array(
                'status' => 'sukses',
                'html' => $html
                );
            }

        }

        echo json_encode($response);
    }
}
