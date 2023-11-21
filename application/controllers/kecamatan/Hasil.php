<?php

class Hasil extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role_id') !='2') {
            $this->session->set_flashdata('gagal', 'Anda Belum Melakukan Login !!!');
				redirect('login');
            }
    }
    
    public function index()
    {
        $data['title'] = "Catatan Hasil Perhitungan MBR";
        $kec=$this->session->userdata('kec');
        $data['kelurahan'] = $this->db->query("SELECT * FROM hak_akses WHERE kec = '$kec' AND kel is not NULL")->result();
        $data['laporan'] = $this->db->query("SELECT DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i') as tanggal_hitung, count(DATE_FORMAT(a.tanggal_hitung, '%d-%m-%Y %H:%i')) as jumlah_mbr
        FROM hasil as a
        LEFT JOIN data_mbr as b on a.nik = b.nik
        WHERE b.kecamatan ='$kec'
        GROUP BY DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i') ORDER BY a.tanggal_hitung DESC
        ")->result();
        $total_mbr = $this->db->query("SELECT b.nik, b.nama_mbr, a.nilai, a.status, a.tanggal_hitung, b.kecamatan, b.kelurahan
        FROM hasil as a
        LEFT JOIN data_mbr as b on a.nik = b.nik
        WHERE b.kecamatan ='$kec' ORDER BY a.nilai DESC
        ");
        $data["bulan_tahun"] = NULL;
        $data["kelurahan_dua"] = NULL;
        $data["kec"] = $kec;
        $this->load->view('templates_kecamatan/header',$data);
        $this->load->view('templates_kecamatan/sidebar');
        $this->load->view('kecamatan/hasil',$data);
        $this->load->view('templates_kecamatan/footer');
    }

    public function listHasil($tanggalHitung)
    {
        $tanggalHitung = str_replace("%20", " ", $tanggalHitung);
        $data['title'] = "Hasil Perhitungan MBR";
        $kec=$this->session->userdata('kec');
        $now = date("m-Y");
        $data['kelurahan'] = $this->db->query("SELECT * FROM hak_akses WHERE kec = '$kec' AND kel is not NULL")->result();
        $data['laporan'] = $this->db->query("SELECT b.nik, b.nama_mbr, a.nilai, a.status, DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i') as tanggal_hitung, b.kecamatan, b.kelurahan
        FROM hasil as a
        LEFT JOIN data_mbr as b on a.nik = b.nik
        WHERE DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i') = '$tanggalHitung' AND b.kecamatan ='$kec' ORDER BY a.nilai DESC, nama_mbr ASC
        ")->result();
        $data["tanggalHitung"]=$tanggalHitung;
        $data["bulan_tahun"] = NULL;
        $data["kelurahan_dua"] = NULL;
        $data["kec"] = $kec;
        $this->load->view('templates_kecamatan/header',$data);
        $this->load->view('templates_kecamatan/sidebar');
        $this->load->view('kecamatan/listHasil',$data);
        $this->load->view('templates_kecamatan/footer');
    }

    public function Filterdata()
    {
        $data['title'] = "Hasil Perhitungan MBR";
        $kec=$this->session->userdata('kec');
        $data['kelurahan'] = $this->db->query("SELECT * FROM hak_akses WHERE kec = '$kec' AND kel is not NULL")->result();
        $kel   = $this->input->post('kel');
        $tanggalHitung = $this->input->post('tanggalHitung');
        if (empty($kel)) {
            $data['laporan'] = $this->db->query("SELECT b.nik, b.nama_mbr, a.nilai, a.status, DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i') as tanggal_hitung, b.kecamatan, b.kelurahan
                FROM hasil as a
                LEFT JOIN data_mbr as b on a.nik = b.nik
                WHERE b.kecamatan ='$kec' AND DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i') = '$tanggalHitung' ORDER BY a.nilai DESC
                ")->result();
        }else {
            $data['laporan'] = $this->db->query("SELECT b.nik, b.nama_mbr, a.nilai, a.status, DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i') as tanggal_hitung, b.kecamatan, b.kelurahan
                FROM hasil as a
                LEFT JOIN data_mbr as b on a.nik = b.nik
                WHERE b.kelurahan ='$kel' AND DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i') = '$tanggalHitung' ORDER BY a.nilai DESC
                ")->result();
        }
        $data["tanggalHitung"]=$tanggalHitung;
        $data["kec"] = $kec;
        $data["kelurahan_dua"] = $kel;
        $this->load->view('templates_kecamatan/header',$data);
        $this->load->view('templates_kecamatan/sidebar');
        $this->load->view('kecamatan/listHasil',$data);
        $this->load->view('templates_kecamatan/footer');
        
    }

    public function deleteData($tanggalHitung)
    {
        $kec = $this->session->userdata('kec');
        $tanggalHitung = str_replace("%20", " ", $tanggalHitung);
        $laporans = $this->db->query("SELECT b.nik, b.nama_mbr, a.nilai, a.status, a.tanggal_hitung, b.kecamatan, b.kelurahan
                FROM hasil as a
                LEFT JOIN data_mbr as b on a.nik = b.nik
                WHERE b.kecamatan ='$kec' AND DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i') = '$tanggalHitung' ORDER BY a.nilai DESC
                ")->result();
                foreach ($laporans as $laporan) {
                    $where = array('tanggal_hitung' => $laporan->tanggal_hitung,'nik' => $laporan->nik);
                    $this->spkModel->delete_data($where, 'hasil');
                }
        redirect('kecamatan/hasil');
    }



}

?>