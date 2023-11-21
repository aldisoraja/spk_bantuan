<?php

class Dashboard extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role_id') !='1') {
            $this->session->set_flashdata('gagal', 'Anda Belum Melakukan Login !!!');
				redirect('login');
            }
    }
    
    public function index()
    {
        $data['title'] = "Dashboard";
        $akses = $this->db->query("SELECT * FROM hak_akses");
        $kriteria = $this->db->query("SELECT * FROM tbl_kriteria");
        $sub_kriteria = $this->db->query("SELECT * FROM sub_kriteria");
        $mbr = $this->db->query("SELECT * FROM data_mbr");
        $data['akses']=$akses->num_rows();
        $data['kriteria']=$kriteria->num_rows();
        $data['sub_kriteria']=$sub_kriteria->num_rows();
        $data['mbr']=$mbr->num_rows();
        $this->load->view('templates_dp3appkb/header',$data);
        $this->load->view('templates_dp3appkb/sidebar');
        $this->load->view('dp3appkb/dashboard',$data);
        $this->load->view('templates_dp3appkb/footer');
    }

}

?>