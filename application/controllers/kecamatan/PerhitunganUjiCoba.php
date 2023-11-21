<?php

class PerhitunganUjiCoba extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role_id') !='2') {
            $this->session->set_flashdata('gagal', 'Anda Belum Melakukan Login !!!');
				redirect('login');
            }
    }
    
    public function index()
    {
        $kec = $this->session->userdata('kec');
        $nilaisub = array();
        $pembagi = array();
        $normalisasi = array();
        $optimasi = array();
        $min = array();
        $max = array();
        $yi = array();
        $bobot = array();
        $bobot_fix = array();
        $sort = array();
        $number = 0;
        $rank = array();
        $nama_sub = array();
        $nama_mbr = array();

        $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE kecamatan = '$kec' AND keterangan='Pilih' ORDER BY nama_mbr ASC")->result();
        $kriterias = $this->db->query("SELECT * FROM tbl_kriteria")->result();
        foreach ($kriterias as $kriteria) {
            foreach ($mbrs as $mbr) {
                $all_mbrs = $this->db->query("SELECT a.nik, c.nama_sub, c.nilai_sub
                FROM data_mbr as a
                LEFT JOIN detail_mbr as b on a.nik = b.nik
                LEFT JOIN sub_kriteria as c on b.id_sub = c.id_sub
                LEFT JOIN tbl_kriteria as d on c.nama_kriteria = d.kriteria
                WHERE d.kriteria = '$kriteria->kriteria' AND a.nik = '$mbr->nik'")->row();

                $nilaisub[$kriteria->kriteria][$mbr->nik] = $all_mbrs->nilai_sub;
            }
        }
        
        foreach ($kriterias as $kriteria) {
                $hasil_pembagi = $this->db->query("SELECT SQRT(SUM(POW(c.nilai_sub, 2))) as pembagi
                FROM data_mbr as a
                LEFT JOIN detail_mbr as b on a.nik = b.nik
                LEFT JOIN sub_kriteria as c on b.id_sub = c.id_sub
                LEFT JOIN tbl_kriteria as d on c.nama_kriteria = d.kriteria
                WHERE d.kriteria = '$kriteria->kriteria' AND a.kecamatan = '$kec' AND keterangan='Pilih'")->row();

                $pembagi[$kriteria->kriteria] = $hasil_pembagi->pembagi;
                $bobot[$kriteria->kriteria] = $kriteria->bobot;
        }

        $bobot_fix = array();
        $jumlah_bobot = array_sum($bobot);
        foreach ($kriterias as $kriteria) {
            $bobot_fix[$kriteria->kriteria] =  $bobot[$kriteria->kriteria] / $jumlah_bobot;
        }

        foreach ($kriterias as $kriteria) {
            foreach ($mbrs as $mbr) {
                $normalisasi[$kriteria->kriteria][$mbr->nik] = $nilaisub[$kriteria->kriteria][$mbr->nik] / $pembagi[$kriteria->kriteria];
            }
        }

        foreach ($kriterias as $kriteria) {
            foreach ($mbrs as $mbr) {
               $optimasi[$kriteria->kriteria][$mbr->nik] = $normalisasi[$kriteria->kriteria][$mbr->nik] * (($kriteria->jenis == 'Benefit')?1:-1) *$bobot_fix[$kriteria->kriteria];
            }
        }

        foreach ($mbrs as $mbr) {
            $maximum = 0;
            $minimum = 0;
            foreach ($kriterias as $kriteria) {
                if ($kriteria->jenis == 'Benefit') {
                    $maximum += $optimasi[$kriteria->kriteria][$mbr->nik];
                    $max[$mbr->nik] = $maximum;
                }elseif ($kriteria->jenis == 'Cost') {
                    $minimum += $optimasi[$kriteria->kriteria][$mbr->nik];
                    $min[$mbr->nik] = $minimum;
                }
            }
        }

        foreach ($mbrs as $mbr) {
            if (empty($max)) {
                $yi[$mbr->nik] = $min[$mbr->nik];
                $sort[$mbr->nik] = $min[$mbr->nik];
                $nama_mbr[$mbr->nik] = $mbr->nama_mbr;
            }elseif (empty($min)) {
                $yi[$mbr->nik] = $max[$mbr->nik];
                $sort[$mbr->nik] = $max[$mbr->nik];
                $nama_mbr[$mbr->nik] = $mbr->nama_mbr;
            }else {
                $yi[$mbr->nik] = $max[$mbr->nik] - $min[$mbr->nik];
                $sort[$mbr->nik] = $max[$mbr->nik] - $min[$mbr->nik];
                $nama_mbr[$mbr->nik] = $mbr->nama_mbr;
            }
        }

        arsort($sort);
        foreach ($sort as $key => $value) {
            $number++;
            $rank[$key] = $number;
        }

        $data["kriterias"] = $kriterias;
        $data["nilaisub"] = $nilaisub;
        $data["pembagi"] = $pembagi;
        $data["bobot"] = $bobot;
        $data["bobot_fix"] = $bobot_fix;
        $data["mbrs"] = $mbrs;
        $data["normalisasi"] = $normalisasi;
        $data["optimasi"] = $optimasi;
        $data["max"] = $max;
        $data["min"] = $min;
        $data["yi"] = $yi;
        $data["rank"] = $rank;
        $data["sort"] = $sort;
        $data["nama_mbr"] = $nama_mbr;

        $data["kriterias_max"] = array_filter($data["kriterias"], function($val){
            return $val->jenis == "Benefit";
        });
        $data["kriterias_min"] = array_filter($data["kriterias"], function($val){
            return $val->jenis == "Cost";
        });

        $data['title'] = "Analisa Perhitungan MOORA";
        $this->load->view('templates_kecamatan/header',$data);
        $this->load->view('templates_kecamatan/sidebar');
        $this->load->view('kecamatan/perhitunganUjiCoba',$data);
        $this->load->view('templates_kecamatan/footer');
    }

}

?>