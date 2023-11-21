<?php

class Kriteria extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role_id') !='1') {
            $this->session->set_flashdata('gagal', 'Anda Belum Melakukan Login !!!');
				redirect('login');
            }
    }
    
    public function index()
    {
        $data['title'] = "Data Kriteria";
        $data['kriteria'] = $this->spkModel->get_data('tbl_kriteria')->result();
        $this->load->view('templates_dp3appkb/header',$data);
        $this->load->view('templates_dp3appkb/sidebar');
        $this->load->view('dp3appkb/kriteria',$data);
        $this->load->view('templates_dp3appkb/footer');
    }

    public function tambahDataAksi()
    {
        $this->index();

        $kode_kriteria   = $this->input->post('kode_kriteria');
        $kriteria        = $this->input->post('kriteria');
        if ($this->input->post('bobot')  > 100 OR $this->input->post('bobot') <= 0) {
            $this->session->set_flashdata('info', 'Bobot tidak boleh kurang dari 1 dan tidak boleh melebihi 100 !!');
            redirect('dp3appkb/kriteria');
        }
        $find_koma = strpos($this->input->post('bobot'), '.');
        if ($find_koma == true) {
            $bobot           = $this->input->post('bobot');
        } else {
            $bobot           = $this->input->post('bobot')/100;
        }
        
        $jenis           = $this->input->post('jenis');
        
        $data = array(
            
            'kode_kriteria'    => $kode_kriteria,
            'kriteria'         => $kriteria,
            'bobot'            => $bobot,
            'jenis'            => $jenis
        );

        $this->spkModel->insert_data($data,'tbl_kriteria');
        $this->session->set_flashdata('tambah', 'Data Kriteria Berhasil Ditambahkan !!');
        redirect('dp3appkb/kriteria');
        
    }

    public function updateDataAksi()
    {
        $this->index();

        $id            = $this->input->post('id_kriteria');
        $kode_kriteria = $this->input->post('kode_kriteria');
        $kriteria      = $this->input->post('kriteria');
        if ($this->input->post('bobot')  > 100 OR $this->input->post('bobot') <= 0) {
            $this->session->set_flashdata('info', 'Bobot tidak boleh kurang dari 1 dan tidak boleh melebihi 100 !!');
            redirect('dp3appkb/kriteria');
        }

        $find_koma = strpos($this->input->post('bobot'), '.');
        if ($find_koma == true) {
            $bobot           = $this->input->post('bobot');
        } else {
            $bobot           = $this->input->post('bobot')/100;
        }
        
        $jenis         = $this->input->post('jenis');
        
        $data = array(
            
            'kode_kriteria'  => $kode_kriteria,
            'kriteria'       => $kriteria,
            'bobot'          => $bobot,
            'jenis'          => $jenis
        );

        $where = array(
            'id_kriteria' => $id
        );

        $this->spkModel->update_data('tbl_kriteria',$data,$where);
        $this->session->set_flashdata('ubah', 'Data Kriteria Berhasil Diubah !!');
        redirect('dp3appkb/kriteria');
        
    }

    public function deleteData($id)
    {
        $kriteria = $this->db->query("SELECT * FROM tbl_kriteria WHERE id_kriteria = '$id'")->row();
        $sub_kriterias = $this->db->query("SELECT * FROM sub_kriteria WHERE nama_kriteria = '$kriteria->kriteria'")->result();
        $where_id_kriteria = array('id_kriteria' => $id);
        foreach ($sub_kriterias as $sub_kriteria) {
            $where_id_sub = array('id_sub' => $sub_kriteria->id_sub);
            $this->spkModel->delete_data($where_id_sub, 'detail_mbr');
        }
        $where_nama_sub = array('nama_kriteria' => $kriteria->kriteria);
        
        $this->spkModel->delete_data($where_nama_sub, 'sub_kriteria');
        $this->spkModel->delete_data($where_id_kriteria, 'tbl_kriteria');
        
        redirect('dp3appkb/kriteria');
    }

}

?>