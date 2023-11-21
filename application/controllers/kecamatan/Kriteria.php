<?php

class Kriteria extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role_id') !='2') {
            $this->session->set_flashdata('gagal', 'Anda Belum Melakukan Login !!!');
				redirect('login');
            }
    }
    
    public function index()
    {
        $data['title'] = "Data Kriteria";
        $data['kriteria'] = $this->spkModel->get_data('tbl_kriteria')->result();
        $this->load->view('templates_kecamatan/header',$data);
        $this->load->view('templates_kecamatan/sidebar');
        $this->load->view('kecamatan/kriteria',$data);
        $this->load->view('templates_kecamatan/footer');
    }

}

?>