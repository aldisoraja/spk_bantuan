<?php

class DataMbr extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role_id') !='2') {
            $this->session->set_flashdata('gagal', 'Anda Belum Melakukan Login !!!');
				redirect('login');
            }
    }
    
    public function index()
    {
        $data['title'] = "Data MBR";
        $kec=$this->session->userdata('kec');
        $now = date("m-Y");
        $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE DATE_FORMAT(tanggal, '%m-%Y') = '$now' AND kecamatan = '$kec'
        ORDER BY kelurahan ASC, nama_mbr ASC")->result();
        $data['kelurahan'] = $this->db->query("SELECT * FROM hak_akses WHERE kec = '$kec' AND kel is not NULL")->result();
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
        $data["kec"] = $kec;
        $data["sub_kriteria_mbrs"] = $sub_kriteria_mbrs;
        $data["mbrs"] = $mbrs;
        $data["bulan_tahun"] = NULL;
        $data["kelurahan_dua"] = NULL;
        $this->load->view('templates_kecamatan/header',$data);
        $this->load->view('templates_kecamatan/sidebar');
        $this->load->view('kecamatan/dataMbr',$data);
        $this->load->view('templates_kecamatan/footer');
    }

    public function filterdata()
    {
        $data['title'] = "Data MBR";
        $kec = $this->session->userdata('kec');
        $data['kelurahan'] = $this->db->query("SELECT * FROM hak_akses WHERE kec = '$kec' AND kel is not NULL")->result();
        $kel   = $this->input->post('kel');
        $now = date("m-Y");
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $bulan_tahun = $bulan.'-'.$tahun;
        if ($bulan_tahun == '-' AND empty($kel)) {
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE DATE_FORMAT(tanggal, '%m-%Y') = '$now' AND kecamatan = '$kec' ORDER BY kelurahan ASC, nama_mbr ASC")->result();
        }elseif ($bulan_tahun != '-' AND empty($kel)) {
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE DATE_FORMAT(tanggal, '%M-%Y') = '$bulan_tahun' ORDER BY kelurahan ASC, nama_mbr ASC")->result();
        }elseif($bulan_tahun != '-' AND !empty($kel)){
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE kelurahan = '$kel' AND DATE_FORMAT(tanggal, '%M-%Y') = '$bulan_tahun' ORDER BY kelurahan ASC, nama_mbr ASC")->result();
        }elseif($bulan_tahun == '-' AND !empty($kel)){
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE Kecamatan = '$kec' AND kelurahan = '$kel' AND DATE_FORMAT(tanggal, '%m-%Y') = '$now' ORDER BY kelurahan ASC, nama_mbr ASC")->result();
        }
        // var_dump($now); die;
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
        $data['kec'] = $kec;
        $data["sub_kriteria_mbrs"] = $sub_kriteria_mbrs;
        $data["mbrs"] = $mbrs;
        $data["bulan_tahun"] = $bulan_tahun;
        $data["kelurahan_dua"] = $kel;
        $this->load->view('templates_kecamatan/header',$data);
        $this->load->view('templates_kecamatan/sidebar');
        $this->load->view('kecamatan/dataMbr',$data);
        $this->load->view('templates_kecamatan/footer');
    }

    public function updateKeterangan()
    {
        $keterangan = $this->input->post("keterangan");
        $nik = $this->input->post("nik");
        if ($keterangan == 'Pilih') {
            $data = array(
                'keterangan'   => $keterangan
            );

            $where = array(
                'nik' => $nik
            );

            $update = $this->spkModel->update_data('data_mbr',$data,$where);
            if ($update) {
            return $this->response($data,200);
            } else {
            return $this->response(array('keterangan' => 'fail', 502));
            }
        }elseif ($keterangan == 'Tidak Dipilih') {
            $data = array(
                'keterangan'    => "Tidak Dipilih"
            );

            $where = array(
                'nik' => $nik
            );

            $update = $this->spkModel->update_data('data_mbr',$data,$where);
            if ($update) {
            return $this->response(array('keterangan' => 'Success', 200));
            } else {
            return $this->response(array('keterangan' => 'fail', 502));
            }
        }
    }

    public function updateCheckAll()
    {
        $keterangan = $this->input->post("keterangan");
        $bulan_tahun = $this->input->post("bulan_tahun");
        $kec = $this->session->userdata('kec');
        $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE DATE_FORMAT(tanggal, '%m-%Y') = '$bulan_tahun' AND kecamatan = '$kec'")->result();
        if ($keterangan == 'Pilih') {
            
            foreach ($mbrs as $mbr) {
                $data = array(
                    'keterangan'   => $keterangan
                );

                $where = array( 
                    'nik' => $mbr->nik
                );
                $update = $this->spkModel->update_data('data_mbr',$data,$where);
            }
            
            if ($update) {
            return $this->response($data,200);
            } else {
            return $this->response(array('keterangan' => 'fail', 502));
            }
        }elseif ($keterangan == 'Tidak Dipilih') {
            foreach ($mbrs as $mbr) {
                $data = array(
                    'keterangan'   => $keterangan
                );

                $where = array( 
                    'nik' => $mbr->nik
                );
                $update = $this->spkModel->update_data('data_mbr',$data,$where);
            }

            if ($update) {
            return $this->response(array('keterangan' => 'Success', 200));
            } else {
            return $this->response(array('keterangan' => 'fail', 502));
            }
        }
        
    }

}

?>