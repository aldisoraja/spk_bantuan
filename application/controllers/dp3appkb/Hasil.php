<?php

class Hasil extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role_id') !='1') {
            $this->session->set_flashdata('gagal', 'Anda Belum Melakukan Login !!!');
				redirect('login');
            }
    }
    
    public function index()
    {
        $data['title'] = "Catatan Hasil Perhitungan MBR";
        $kec=$this->session->userdata('kec');
        $data['kecamatan'] = $this->db->query("SELECT DISTINCT kec FROM hak_akses where kec is not NULL")->result();
        $data['laporan'] = $this->db->query("SELECT DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i') as tanggal_hitung, count(DATE_FORMAT(a.tanggal_hitung, '%d-%m-%Y %H:%i')) as jumlah_mbr, b.kecamatan
        FROM hasil as a
        LEFT JOIN data_mbr as b on a.nik = b.nik
        GROUP BY DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i'), b.kecamatan ORDER BY a.tanggal_hitung DESC
        ")->result();
        $this->load->view('templates_dp3appkb/header',$data);
        $this->load->view('templates_dp3appkb/sidebar');
        $this->load->view('dp3appkb/hasil',$data);
        $this->load->view('templates_dp3appkb/footer');
    }

    public function listHasil($tanggalHitung, $kecamatan)
    {
        $tanggalHitung = str_replace("%20", " ", $tanggalHitung);
        $data['title'] = "Hasil Perhitungan MBR";
        $kec=$kecamatan;
        $now = date("m-Y");
        $data['laporan'] = $this->db->query("SELECT b.nik, b.nama_mbr, a.nilai, a.status, DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i') as tanggal_hitung, b.kecamatan, b.kelurahan
        FROM hasil as a
        LEFT JOIN data_mbr as b on a.nik = b.nik
        WHERE DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i') = '$tanggalHitung' AND b.kecamatan ='$kec' ORDER BY a.nilai DESC, nama_mbr ASC
        ")->result();
        $data["tanggalHitung"]=$tanggalHitung;
        $data["kecamatan_dua"] = $kec;
        $this->load->view('templates_dp3appkb/header',$data);
        $this->load->view('templates_dp3appkb/sidebar');
        $this->load->view('dp3appkb/listHasil',$data);
        $this->load->view('templates_dp3appkb/footer');
    }

}

?>