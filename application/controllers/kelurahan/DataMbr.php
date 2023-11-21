<?php

class DataMbr extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role_id') !='3') {
            $this->session->set_flashdata('gagal', 'Anda Belum Melakukan Login !!!');
				redirect('login');
            }
    }
    
    public function index()
    {
        $data['title'] = "Data MBR";
        $kec=$this->session->userdata('kec');
        $kel   = (strstr($this->session->userdata('kel'), "%20"))?str_replace("%20", " ", $this->session->userdata('kel')):$this->session->userdata('kel');
        $now = date("m-Y");
        $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE DATE_FORMAT(tanggal, '%m-%Y') = '$now' AND kecamatan = '$kec' AND kelurahan = '$kel' ORDER BY nama_mbr ASC")->result();
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
        $data["bulan_tahun"] = NULL;
        $data["kecamatan_dua"] = $kec;
        $data["kelurahan_dua"] = $kel;
        $this->load->view('templates_kelurahan/header',$data);
        $this->load->view('templates_kelurahan/sidebar');
        $this->load->view('kelurahan/dataMbr',$data);
        $this->load->view('templates_kelurahan/footer');
    }

    public function tambahData()
    {
        $data['title'] = "Tambah Data MBR";
        $data['mbr'] = $this->spkModel->get_data('data_mbr')->result();
        $data['sub_pekerjaan'] = $this->db->query("SELECT * FROM sub_kriteria WHERE nama_kriteria='Pekerjaan' ORDER BY nama_sub ASC ")->result();
        $data['sub_usia'] = $this->db->query("SELECT * FROM sub_kriteria WHERE nama_kriteria='Usia'")->result();
        $data['sub_pendidikan'] = $this->db->query("SELECT * FROM sub_kriteria WHERE nama_kriteria='Pendidikan Terakhir'")->result();
        $data['sub_anak'] = $this->db->query("SELECT * FROM sub_kriteria WHERE nama_kriteria='Jumlah Anak'")->result();
        $data['sub_penghasilan'] = $this->db->query("SELECT * FROM sub_kriteria WHERE nama_kriteria='Penghasilan'")->result();
        
        $kriterias = $this->db->query("SELECT kriteria FROM tbl_kriteria")->result();
        $kriterias_with_sub = [];

        foreach($kriterias as $kriteria){
            $kriterias_with_sub[] = [
                'kriteria' => $kriteria->kriteria,
                'sub' => $this->db->query("SELECT id_sub, nama_sub FROM sub_kriteria WHERE nama_kriteria='$kriteria->kriteria'")->result()
            ];
        }

        $data['kriterias_with_sub'] = $kriterias_with_sub;

        $this->load->view('templates_kelurahan/header',$data);
        $this->load->view('templates_kelurahan/sidebar');
        $this->load->view('kelurahan/tambahDataMbr',$data);
        $this->load->view('templates_kelurahan/footer');
    }

    public function tambahDataAksi()
    {
        $data_detail = array();
        $kriteria = $this->db->query("SELECT * FROM tbl_kriteria");
        $count_kriteria=$kriteria->num_rows();
        $nik                = $this->input->post('nik');
        $nama_mbr           = $this->input->post('nama_mbr');
        $met_kontra         = $this->input->post('met_kontra');
        $kecamatan          = $this->input->post('kecamatan');
        $kelurahan          = $this->input->post('kelurahan');
        
        $kriterias = $this->db->query("SELECT kriteria FROM tbl_kriteria")->result();
        $data = array(
            
            'nik'             => $nik,
            'nama_mbr'        => $nama_mbr,
            'met_kontra'      => $met_kontra,
            'kecamatan'       => $kecamatan,
            'kelurahan'       => $kelurahan,
            'keterangan'      => 'Tidak Dipilih'
        );
        
        $this->spkModel->insert_data($data,'data_mbr');
        foreach ($kriterias as $kriteria) {
                $detail_save = array(
                'nik' => $nik,
                'id_sub' => $this->input->post(strtolower(str_replace(" ", "_", $kriteria->kriteria)))  
            );
            $this->spkModel->insert_data($detail_save,'detail_mbr');
        }

        $this->session->set_flashdata('tambah', 'Data MBR Berhasil Ditambahkan !!');
        redirect('kelurahan/dataMbr');
    }

    public function updateData($id)
    {
        $where = array('nik' => $id);
        $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE nik='$id'")->row();
        $kriterias = $this->db->query("SELECT kriteria FROM tbl_kriteria")->result();
        $id_sub_kriteria_mbrs = array();
        $sub_kriteria_mbrs = array();
        
        foreach ($kriterias as $kriteria) {
                $all_mbrs = $this->db->query("SELECT a.nik,c.id_sub ,c.nama_sub
                FROM data_mbr as a
                LEFT JOIN detail_mbr as b on a.nik = b.nik
                LEFT JOIN sub_kriteria as c on b.id_sub = c.id_sub
                LEFT JOIN tbl_kriteria as d on c.nama_kriteria = d.kriteria
                WHERE d.kriteria = '$kriteria->kriteria' AND a.nik = '$mbrs->nik'")->row();
                $sub_kriteria_mbrs[$kriteria->kriteria][$mbrs->nik] = $all_mbrs?->nama_sub;
                $id_sub_kriteria_mbrs[$kriteria->kriteria][$mbrs->nik] = $all_mbrs?->id_sub;
        }
        
        $kriterias_with_sub = [];

        foreach($kriterias as $kriteria){
            $kriterias_with_sub[] = [
                'kriteria' => $kriteria->kriteria,
                'sub' => $this->db->query("SELECT id_sub, nama_sub FROM sub_kriteria WHERE nama_kriteria='$kriteria->kriteria'")->result()
            ];
        }

        $data['kriterias'] = $kriterias;
        $data['kriterias_with_sub'] = $kriterias_with_sub;
        $data["mbrs"] = $mbrs;
        $data["sub_kriteria_mbrs"] = $sub_kriteria_mbrs;
        $data["id_sub_kriteria_mbrs"] = $id_sub_kriteria_mbrs;
        $data['title'] = "Ubah Data MBR";
        $this->load->view('templates_kelurahan/header',$data);
        $this->load->view('templates_kelurahan/sidebar');
        $this->load->view('kelurahan/ubahDataMbr',$data);
        $this->load->view('templates_kelurahan/footer');
    }

    public function updateDataAksi()
    {
        // if($this->form_validation->run() == FALSE ) {
            $this->updateData($this->input->post('nik'));
        // } else {
            $id = $this->input->post('nik');
            $data_detail = array();
            $kriteria = $this->db->query("SELECT * FROM tbl_kriteria");
            $count_kriteria=$kriteria->num_rows();
            $nik                = $this->input->post('nik');
            $nama_mbr           = $this->input->post('nama_mbr');
            $met_kontra         = $this->input->post('met_kontra');
            $kecamatan          = $this->input->post('kecamatan');
            $kelurahan          = $this->input->post('kelurahan');
            
            $data = array(
                
                'nik'             => $nik,
                'nama_mbr'        => $nama_mbr,
                'met_kontra'      => $met_kontra,
                'kecamatan'       => $kecamatan,
                'kelurahan'       => $kelurahan
            );
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE nik='$id'")->row();
            $kriterias = $this->spkModel->get_data('tbl_kriteria')->result();
            foreach ($kriterias as $kriteria) {
                    $all_mbrs = $this->db->query("SELECT a.nik, c.nama_sub,c.id_sub
                    FROM data_mbr as a
                    LEFT JOIN detail_mbr as b on a.nik = b.nik
                    LEFT JOIN sub_kriteria as c on b.id_sub = c.id_sub
                    LEFT JOIN tbl_kriteria as d on c.nama_kriteria = d.kriteria
                    WHERE d.kriteria = '$kriteria->kriteria' AND a.nik = '$mbrs->nik'")->row();
    
                    $id_sub_kriteria_mbrs[$kriteria->kriteria] = $all_mbrs?->id_sub;
            }

            $where = array(
                'nik' => $id
            );

            $this->spkModel->update_data('data_mbr',$data,$where);
           foreach ($kriterias as $kriteria) {
                if (empty($id_sub_kriteria_mbrs[$kriteria->kriteria])) {
                    $detail_save = array(
                        'nik' => $nik,
                        'id_sub' => $this->input->post(strtolower(str_replace(" ", "_", $kriteria->kriteria)))    
                    );
                    $this->spkModel->insert_data($detail_save,'detail_mbr');
                }else{
                    $where_detail = array(
                        'nik' => $id,
                        'id_sub' => $id_sub_kriteria_mbrs[$kriteria->kriteria]
                    );
                    $detail_save = array(
                        'nik' => $nik,
                        'id_sub' => $this->input->post(strtolower(str_replace(" ", "_", $kriteria->kriteria)))    
                    );
                    $this->spkModel->update_data('detail_mbr',$detail_save,$where_detail);
                } 
            }

            $this->session->set_flashdata('ubah', 'Data MBR Berhasil Diubah !!');
            redirect('kelurahan/dataMbr');
        // }
    }

    public function deleteData($id)
    {
        $where = array('nik' => $id);
        $this->spkModel->delete_data($where, 'detail_mbr');
        $this->spkModel->delete_data($where, 'data_mbr');
        redirect('kelurahan/dataMbr');
    }

    public function filterdata()
    {
        $data['title'] = "Data MBR";
        $kec   = $this->session->userdata('kec');
        $kel   = (strstr($this->session->userdata('kel'), "%20"))?str_replace("%20", " ", $this->session->userdata('kel')):$this->session->userdata('kel');
        $now = date("m-Y");
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $bulan_tahun = $bulan.'-'.$tahun;
        // var_dump($kec); die;
        if ($bulan_tahun == '-') {
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE DATE_FORMAT(tanggal, '%m-%Y') = '$now' AND kecamatan = '$kec' AND kelurahan = '$kel' ORDER BY nama_mbr ASC")->result();
        }else{
            $mbrs = $this->db->query("SELECT * FROM data_mbr WHERE kecamatan = '$kec' AND kelurahan = '$kel' AND DATE_FORMAT(tanggal, '%M-%Y') = '$bulan_tahun' ORDER BY nama_mbr ASC")->result();
        }
        // var_dump($mbrs); die;
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
        $data["kelurahan_dua"] = $kel;
        $this->load->view('templates_kelurahan/header',$data);
        $this->load->view('templates_kelurahan/sidebar');
        $this->load->view('kelurahan/dataMbr',$data);
        $this->load->view('templates_kelurahan/footer');
    }

}

?>