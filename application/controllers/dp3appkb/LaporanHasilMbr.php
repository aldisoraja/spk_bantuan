<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class LaporanHasilMbr extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role_id') !='1') {
            $this->session->set_flashdata('gagal', 'Anda Belum Melakukan Login !!!');
				redirect('login');
            }
    }
    
    public function HasilMbr($tanggalHitung = NULL, $kecamatan = NULL)
    {
        $tanggalHitung = str_replace("%20", " ", $tanggalHitung);
        $data['title'] = "Laporan Hasil Perhitungan MBR";
        $kec   = $kecamatan;
        $data['laporan'] = $this->db->query("SELECT b.nik, b.nama_mbr, a.nilai, a.status, DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i') as tanggal_hitung, b.kecamatan, b.kelurahan
        FROM hasil as a
        LEFT JOIN data_mbr as b on a.nik = b.nik
        WHERE DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i') = '$tanggalHitung' AND b.kecamatan ='$kec' ORDER BY a.nilai DESC, nama_mbr ASC
        ")->result();
        $data["tanggalHitung"]=$tanggalHitung;
        $data["kecamatan_dua"] = $kec;
        $this->load->view('dp3appkb/cetakHasilMbr',$data);
    }

    public function HasilMbrPdf($tanggalHitung=NULL, $kecamatan=NULL)
    {
        $this->load->library('pdf');
        $tanggalHitung = str_replace("%20", " ", $tanggalHitung);
        $data['title'] = "Laporan Hasil Perhitungan MBR";
        $kec   = $kecamatan;
        $data['laporan'] = $this->db->query("SELECT b.nik, b.nama_mbr, a.nilai, a.status, DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i') as tanggal_hitung, b.kecamatan, b.kelurahan
        FROM hasil as a
        LEFT JOIN data_mbr as b on a.nik = b.nik
        WHERE DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i') = '$tanggalHitung' AND b.kecamatan ='$kec' ORDER BY a.nilai DESC, nama_mbr ASC
        ")->result();
        $data["tanggalHitung"]=$tanggalHitung;
        $data["kecamatan_dua"] = $kec;
        $this->load->view('dp3appkb/hasil',$data);

        $this->pdf->setPaper('A4');
        $this->pdf->filename = "Laporan Hasil Perhitungan MBR.pdf";
        $this->pdf->load_view('dp3appkb/hasilPdfMbr', $data);

    }

    public function HasilMbrExcel($tanggalHitung=NULL, $kecamatan = NULL)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $tanggalHitung = str_replace("%20", " ", $tanggalHitung);
        $data['title'] = "Laporan Hasil Perhitungan MBR";
        $kec   = $kecamatan;
        $laporan = $this->db->query("SELECT b.nik, b.nama_mbr, a.nilai, a.status, DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i') as tanggal_hitung, b.kecamatan, b.kelurahan
        FROM hasil as a
        LEFT JOIN data_mbr as b on a.nik = b.nik
        WHERE DATE_FORMAT(a.tanggal_hitung,'%d-%m-%Y %H:%i') = '$tanggalHitung' AND b.kecamatan ='$kec' ORDER BY a.nilai DESC, nama_mbr ASC
        ")->result();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Tanggal Perhitungan');
        $sheet->setCellValue('C1', 'NIK');
        $sheet->setCellValue('D1', 'Nama');
        $sheet->setCellValue('E1', 'Kecamatan');
        $sheet->setCellValue('F1', 'Kelurahan');
        $sheet->setCellValue('G1', 'Nilai');
        $sheet->setCellValue('H1', 'Status');

        $num_row = 2;
        $no = 1; 
        foreach ($laporan as $l) {
            $sheet->setCellValue('A'.$num_row, $no);
            $sheet->setCellValue('B'.$num_row, $l->tanggal_hitung);
            $spreadsheet->getActiveSheet()->setCellValueExplicit(
                'C'.$num_row,
                $l->nik,
                \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING
            );
            $sheet->setCellValue('D'.$num_row, $l->nama_mbr);
            $sheet->setCellValue('E'.$num_row, $l->kecamatan);
            $sheet->setCellValue('F'.$num_row, $l->kelurahan);
            $sheet->setCellValue('G'.$num_row, $l->nilai);
            $sheet->setCellValue('H'.$num_row, $l->status);
            $num_row++;
            $no++;
        }
        foreach(range('A', 'H') as $columId){
            $sheet->getColumnDimension($columId)->setAutoSize(true);
        }
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Hasil Perhitungan Data MBR");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Hasil Perhitungan Data MBR.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    

}

?>