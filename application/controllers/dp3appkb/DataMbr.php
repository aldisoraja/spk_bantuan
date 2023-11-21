<?php

class DataMbr extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role_id') !='1') {
            $this->session->set_flashdata('gagal', 'Anda Belum Melakukan Login !!!');
                redirect('login');
            }
    }
    
    public function index()
    {
        $data['title'] = "Data MBR";
        $kec=$this->session->userdata('kec');
        $data['kecamatan'] = $this->db->query("SELECT * FROM hak_akses where kec is not NULL AND kel is NULL")->result();
        $mbrs = $this->spkModel->get_data('data_mbr')->result();
        $kriterias = $this->spkModel->get_data('tbl_kriteria')->result();
        $sub_kriteria_mbrs = array();
        foreach ($kriterias as $kriteria) {
            foreach ($mbrs as $mbr) {
                $all_mbrs = $this->db->query("SELECT a.nik, c.nama_sub
                FROM data_mbr as a
                LEFT JOIN detail_mbr as b on a.nik = b.nik
                LEFT JOIN sub_kriteria as c on b.id_sub = c.id_sub
                LEFT JOIN tbl_kriteria as d on c.nama_kriteria = d.kriteria
                WHERE d.kriteria = '$kriteria->kriteria' AND a.nik = '$mbr->nik'")->row();

                $sub_kriteria_mbrs[$kriteria->kriteria][$mbr->nik] = $all_mbrs->nama_sub;
            }
        }
        $data["kriterias"] = $kriterias;
        $data["sub_kriteria_mbrs"] = $sub_kriteria_mbrs;
        $data["kec"] = $kec;
        $data["mbrs"] = NULL;
        $now = date("m-Y");
        $data["bulan_tahun"] = NULL;
        $data["kecamatan_dua"] = NULL;
        $this->load->view('templates_dp3appkb/header',$data);
        $this->load->view('templates_dp3appkb/sidebar');
        $this->load->view('dp3appkb/dataMbr',$data);
        $this->load->view('templates_dp3appkb/footer');
    }

    public function filterdata()
    {
        $data['title'] = "Data MBR";
        $kec=$this->session->userdata('kec');
        $data['kecamatan'] = $this->db->query("SELECT * FROM hak_akses where kec is not NULL AND kel is NULL")->result();
        $kec   = $this->input->post('kec');
        $now = date("m-Y");
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $bulan_tahun = $bulan.'-'.$tahun;
        if ($bulan_tahun == '-' AND empty($kec)) {
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE kecamatan = '$kec' AND DATE_FORMAT(tanggal, '%M-%Y') = '$bulan_tahun'")->result();
        }elseif ($bulan_tahun != '-' AND !empty($kec)) {
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE Kecamatan = '$kec' AND DATE_FORMAT(tanggal, '%M-%Y') = '$bulan_tahun' ORDER BY kelurahan ASC, nama_mbr ASC")->result();
        }elseif ($bulan_tahun == '-' AND !empty($kec)) {
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE Kecamatan = '$kec' AND DATE_FORMAT(tanggal, '%m-%Y') = '$now' ORDER BY kelurahan ASC, nama_mbr ASC")->result();
        }elseif ($bulan_tahun != '-' AND empty($kec)) {
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE Kecamatan = '$kec' AND DATE_FORMAT(tanggal, '%m-%Y') = '$bulan_tahun'")->result();
        }
        $kriterias = $this->spkModel->get_data('tbl_kriteria')->result();
        $sub_kriteria_mbrs = array();
        foreach ($kriterias as $kriteria) {
            foreach ($mbrs as $mbr) {
                $all_mbrs = $this->db->query("SELECT a.nik, c.nama_sub
                FROM data_mbr as a
                LEFT JOIN detail_mbr as b on a.nik = b.nik
                LEFT JOIN sub_kriteria as c on b.id_sub = c.id_sub
                LEFT JOIN tbl_kriteria as d on c.nama_kriteria = d.kriteria
                WHERE d.kriteria = '$kriteria->kriteria' AND a.nik = '$mbr->nik'")->row();

                $sub_kriteria_mbrs[$kriteria->kriteria][$mbr->nik] = $all_mbrs->nama_sub;
            }
        }
        $data['kriterias'] = $kriterias;
        $data["sub_kriteria_mbrs"] = $sub_kriteria_mbrs;
        $data["mbrs"] = $mbrs;  
        $data["bulan_tahun"] = $bulan_tahun;
        $data["kecamatan_dua"] = $kec;
        $this->load->view('templates_dp3appkb/header',$data);
        $this->load->view('templates_dp3appkb/sidebar');
        $this->load->view('dp3appkb/dataMbr',$data);
        $this->load->view('templates_dp3appkb/footer');
    }

}

?>