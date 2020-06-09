<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_guru extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model(array('Admin_model', 'Guru_model'));
    }

	public function index(){
        if (!$this->session->userdata('login') == true) {
            redirect('admin/login');
        }
        
        $data['admin'] = $this->Admin_model->show($this->session->userdata('admin'));
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/data-guru-pemilih', $data);
        $this->load->view('admin/template/footer', $data);
	}

    public function data_view(){
        if (!$this->session->userdata('login') == true) {
            redirect('admin/login');
        }
        
        $data['admin'] = $this->Admin_model->show($this->session->userdata('admin'));
        $data['dataTampil'] = $this->Guru_model->dataTampil()->result_array();
        $this->load->view('admin/data-guru-view', $data);
    }

    public function action(){
        $type = $this->input->post('type', true);

        if ( $type == 'insert' ) {

            $name   = $_FILES["file"]["name"];
            $lokasi = $_FILES["file"]["tmp_name"];
            $upload = move_uploaded_file($_FILES["file"]["tmp_name"],$name);
            if($upload){
                set_include_path(get_include_path() . PATH_SEPARATOR . '../Classes/');
                require_once APPPATH.'libraries/PHPExcel/IOFactory.php';


                // This is the file path to be uploaded.
                $inputFileName = $name; 
                try {
                    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                } catch(Exception $e) {
                    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
                }


                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                $arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet


                for($i=2;$i<=$arrayCount;$i++){
                    $a = ($allDataInSheet[$i]["A"]);
                    $b = ($allDataInSheet[$i]["B"]);
                    $c = ($allDataInSheet[$i]["C"]);
                    $d = ($allDataInSheet[$i]["D"]);
                    $e = ($allDataInSheet[$i]["E"]);

                    if ($this->Guru_model->dataTambahExcel($a, $b, $c, $d, $e)) {
                        @unlink ("$inputFileName");

                      ob_start();
                      $data['dataTampil'] = $this->Guru_model->dataTampil()->result_array();
                      $this->load->view('admin/data-guru-view', $data);
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
                }
            }

        } else if ( $type == 'insert-manual' ) {

        $a = @$_POST['username'];
        $b = @$_POST['password'];
        $c = @$_POST['nama'];
        $d = @$_POST['jns_kelamin'];
        $e = @$_POST['jabatan'];

            if ($this->Guru_model->dataTambahManual($a, $b, $c, $d, $e)) {

                ob_start();
                $data['dataTampil'] = $this->Guru_model->dataTampil()->result_array();
                $this->load->view('admin/data-guru-view', $data);
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


        } else if ($type == 'delete' ) {

            if($this->Guru_model->dataHapus() ){
        
                ob_start();
                $data['dataTampil'] = $this->Guru_model->dataTampil()->result_array();
                $this->load->view('admin/data-guru-view', $data);
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
