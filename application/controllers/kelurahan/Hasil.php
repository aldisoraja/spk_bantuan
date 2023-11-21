<?php

class Hasil extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role_id') !='3') {
            $this->session->set_flashdata('gagal', 'Anda Belum Melakukan Login !!!');
				redirect('login');
            }
    }
    
    public function index()
    {
        $data['title'] = "Catatan Hasil Perhitungan MBR";
        $kec=$this->session->userdata('kec');
        $kel=$this->session->userdata('kel');
        $data['kelurahan'] = $this->db->query("SELECT * FROM hak_akses WHERE kec = '$kec' AND kel = '$kel' ")->result();
        $data['laporan'] = $this->db->query("SELECT DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i') as tanggal_hitung, count(DATE_FORMAT(a.tanggal_hitung, '%d-%m-%Y %H:%i')) as jumlah_mbr
        FROM hasil as a
        LEFT JOIN data_mbr as b on a.nik = b.nik
        WHERE b.kecamatan ='$kec' AND b.kelurahan ='$kel'
        GROUP BY DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i') ORDER BY a.tanggal_hitung DESC
        ")->result();
        $total_mbr = $this->db->query("SELECT b.nik, b.nama_mbr, a.nilai, a.status, a.tanggal_hitung, b.kecamatan, b.kelurahan
        FROM hasil as a
        LEFT JOIN data_mbr as b on a.nik = b.nik
        WHERE b.kecamatan ='$kec' AND b.kelurahan ='$kel' ORDER BY a.nilai DESC
        ");
        $data["bulan_tahun"] = NULL;
        $data["kecamatan_dua"] = $kec;
        $data["kelurahan_dua"] = $kel;
        $this->load->view('templates_kelurahan/header',$data);
        $this->load->view('templates_kelurahan/sidebar');
        $this->load->view('kelurahan/hasil',$data);
        $this->load->view('templates_kelurahan/footer');
    }

    public function ListHasil($tanggalHitung)
    {
        $tanggalHitung = str_replace("%20", " ", $tanggalHitung);
        $data['title'] = "Hasil Perhitungan MBR";
        $kec=$this->session->userdata('kec');
        $kel=$this->session->userdata('kel');
        $data['kelurahan'] = $this->db->query("SELECT * FROM hak_akses WHERE kec = '$kec' AND kel = '$kel' ")->result();
        $data['laporan'] = $this->db->query("SELECT b.nik, b.nama_mbr, a.nilai, a.status, DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i') as tanggal_hitung, b.kecamatan, b.kelurahan
        FROM hasil as a
        LEFT JOIN data_mbr as b on a.nik = b.nik
        WHERE DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i') = '$tanggalHitung' AND b.kecamatan ='$kec' AND b.kelurahan ='$kel' ORDER BY a.nilai DESC, nama_mbr ASC
        ")->result();
        $data["tanggalHitung"]=$tanggalHitung;
        $data["bulan_tahun"] = NULL;
        $data["kecamatan_dua"] = $kec;
        $data["kelurahan_dua"] = $kel;
        $this->load->view('templates_kelurahan/header',$data);
        $this->load->view('templates_kelurahan/sidebar');
        $this->load->view('kelurahan/listHasil',$data);
        $this->load->view('templates_kelurahan/footer');
    }

}

?>