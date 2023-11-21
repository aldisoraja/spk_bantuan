<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class LaporanMbr extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role_id') !='2') {
            $this->session->set_flashdata('gagal', 'Anda Belum Melakukan Login !!!');
				redirect('login');
            }
    }
    
    public function LaporanMbr($tanggal = NULL, $kelurahan = NULL)
    {
        $data['title'] = "Laporan Data MBR";
        $data['kelurahan'] = $this->db->query("SELECT * FROM hak_akses WHERE kel is not NULL")->result();
        $kec = $this->session->userdata('kec');
        // var_dump($kelurahan);die;
        $kel   = (strstr($kelurahan, "%20"))?str_replace("%20", " ", $kelurahan):$kelurahan;
        $now = date("m-Y");
        $bulan_tahun = ($tanggal=='-' OR $tanggal == NULL)?NULL:$tanggal;
        $sub_kriteria_mbrs = array();
        $kriterias = $this->spkModel->get_data('tbl_kriteria')->result();
        if (empty($bulan_tahun) AND empty($kel)) {
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE kecamatan = '$kec' AND DATE_FORMAT(tanggal, '%m-%Y') = '$now' ORDER BY kelurahan ASC, nama_mbr ASC")->result();
        }elseif (!empty($bulan_tahun) AND empty($kel)) {
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE DATE_FORMAT(tanggal, '%M-%Y') = '$bulan_tahun' ORDER BY kelurahan ASC, nama_mbr ASC")->result();
        }elseif(!empty($bulan_tahun) AND !empty($kel)){
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE kelurahan = '$kel' AND DATE_FORMAT(tanggal, '%M-%Y') = '$bulan_tahun' ORDER BY kelurahan ASC, nama_mbr ASC")->result();
        }elseif(empty($bulan_tahun) AND !empty($kel)){
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE Kecamatan = '$kec' AND kelurahan = '$kel' AND DATE_FORMAT(tanggal, '%m-%Y') = '$now' ORDER BY kelurahan ASC, nama_mbr ASC")->result();
        }
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
        $data["kelurahan_dua"] = $kel;
        $data["bulan_tahun"] = $bulan_tahun;
        $this->load->view('kecamatan/cetakMbr',$data);
    }

    public function LaporanPdf($tanggal=NULL, $kelurahan=NULL)
    {
        $this->load->library('pdf');
        $data['title'] = "Laporan Data MBR";
        $data['kelurahan'] = $this->db->query("SELECT * FROM hak_akses WHERE kel is not NULL")->result();
        $kec = $this->session->userdata('kec');
        $kel   = (strstr($kelurahan, "%20"))?str_replace("%20", " ", $kelurahan):$kelurahan;
        $now = date("m-Y");
        $bulan_tahun = ($tanggal=='-' OR $tanggal == NULL)?NULL:$tanggal;
        $sub_kriteria_mbrs = array();
        $kriterias = $this->spkModel->get_data('tbl_kriteria')->result();
        if (empty($bulan_tahun) AND empty($kel)) {
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE kecamatan = '$kec' AND DATE_FORMAT(tanggal, '%m-%Y') = '$now' ORDER BY kelurahan ASC, nama_mbr ASC")->result();
        }elseif (!empty($bulan_tahun) AND empty($kel)) {
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE DATE_FORMAT(tanggal, '%M-%Y') = '$bulan_tahun' ORDER BY kelurahan ASC, nama_mbr ASC")->result();
        }elseif(!empty($bulan_tahun) AND !empty($kel)){
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE kelurahan = '$kel' AND DATE_FORMAT(tanggal, '%M-%Y') = '$bulan_tahun' ORDER BY kelurahan ASC, nama_mbr ASC")->result();
        }elseif(empty($bulan_tahun) AND !empty($kel)){
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE Kecamatan = '$kec' AND kelurahan = '$kel' AND DATE_FORMAT(tanggal, '%m-%Y') = '$now' ORDER BY kelurahan ASC, nama_mbr ASC")->result();
        }
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
        $data["kelurahan_dua"] = $kel;
        $data["bulan_tahun"] = $bulan_tahun;
        $this->load->view('kecamatan/dataMbr',$data);

        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "Laporan Data MBR.pdf";
        $this->pdf->load_view('kecamatan/laporanPdfMbr', $data);

    }

    public function LaporanExcel($tanggal=NULL, $kelurahan=NULL)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $number = 0;
        $alphabet = range('H','Z');
        
        $data['kelurahan'] = $this->db->query("SELECT * FROM hak_akses WHERE kel is not NULL")->result();
        $kec = $this->session->userdata('kec');
        $kel   = (strstr($kelurahan, "%20"))?str_replace("%20", " ", $kelurahan):$kelurahan;
        $now = date("m-Y");
        $bulan_tahun = ($tanggal=='-' OR $tanggal == NULL)?NULL:$tanggal;
        $sub_kriteria_mbrs = array();
        $kriterias = $this->spkModel->get_data('tbl_kriteria')->result();
        if (empty($bulan_tahun) AND empty($kel)) {
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE kecamatan = '$kec' AND DATE_FORMAT(tanggal, '%m-%Y') = '$now' ORDER BY kelurahan ASC, nama_mbr ASC")->result();
        }elseif (!empty($bulan_tahun) AND empty($kel)) {
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE DATE_FORMAT(tanggal, '%M-%Y') = '$bulan_tahun' ORDER BY kelurahan ASC, nama_mbr ASC")->result();
        }elseif(!empty($bulan_tahun) AND !empty($kel)){
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE kelurahan = '$kel' AND DATE_FORMAT(tanggal, '%M-%Y') = '$bulan_tahun' ORDER BY kelurahan ASC, nama_mbr ASC")->result();
        }elseif(empty($bulan_tahun) AND !empty($kel)){
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE Kecamatan = '$kec' AND kelurahan = '$kel' AND DATE_FORMAT(tanggal, '%m-%Y') = '$now' ORDER BY kelurahan ASC, nama_mbr ASC")->result();
        }
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

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'NIK');
        $sheet->setCellValue('C1', 'Tanggal');
        $sheet->setCellValue('D1', 'Nama');
        $sheet->setCellValue('E1', 'Metode Kontrasepsi');
        $sheet->setCellValue('F1', 'Kecamatan');
        $sheet->setCellValue('G1', 'Kelurahan');

        foreach ($kriterias as $kriteria) {
            $sheet->setCellValue($alphabet[$number].'1', $kriteria->kriteria);
            $number++;
        }

        $num_row = 2;
        $no = 1; 
        foreach ($mbrs as $mbr) {
            $number = 0;
            $sheet->setCellValue('A'.$num_row, $no);
            $sheet->setCellValue('B'.$num_row, $mbr->nik);
            $spreadsheet->getActiveSheet()->setCellValueExplicit(
                'B'.$num_row,
                $mbr->nik,
                \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING
            );
            $sheet->setCellValue('C'.$num_row, date("d-m-Y", strtotime($mbr->tanggal)));
            $sheet->setCellValue('D'.$num_row, $mbr->nama_mbr);
            $sheet->setCellValue('E'.$num_row, $mbr->met_kontra);
            $sheet->setCellValue('F'.$num_row, $mbr->kecamatan);
            $sheet->setCellValue('G'.$num_row, $mbr->kelurahan);
            foreach ($kriterias as $kriteria) {
                $sheet->setCellValue($alphabet[$number].$num_row, $sub_kriteria_mbrs[$kriteria->kriteria][$mbr->nik]);
                $spreadsheet->getActiveSheet()->getStyle('L'.$num_row)
                    ->getNumberFormat()
                    ->setFormatCode(
                        '00.000'
                    );
                $number++;
            }
            $num_row++;
            $no++;
        }

        foreach(range('A', 'L') as $columId){
            $sheet->getColumnDimension($columId)->setAutoSize(true);
        }

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Laporan Data MBR");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Laporan Data MBR.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

}

?>