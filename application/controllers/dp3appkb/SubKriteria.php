<?php

class SubKriteria extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role_id') !='1') {
            $this->session->set_flashdata('gagal', 'Anda Belum Melakukan Login !!!');
				redirect('login');
            }
    }
    
    public function index()
    {
        $data['title'] = "Data Sub Kriteria";
        $data['sub_kriteria'] = $this->spkModel->get_data('sub_kriteria')->result();
        // $data['sub_kriteria'] = $this->db->query("SELECT * FROM sub_kriteria ORDER BY nama_kriteria ASC, nilai_sub ASC, nama_sub ASC")->result();
        $data['kriteria'] = $this->spkModel->get_data('tbl_kriteria')->result();
        $this->load->view('templates_dp3appkb/header',$data);
        $this->load->view('templates_dp3appkb/sidebar');
        $this->load->view('dp3appkb/subKriteria',$data);
        $this->load->view('templates_dp3appkb/footer');
    }

    public function tambahDataAksi()
    {
        $this->index();

        $nama_kriteria     = $this->input->post('nama_kriteria');
        $nama_sub          = $this->input->post('nama_sub');
        $nilai_sub         = $this->input->post('nilai_sub');
        
        $data = array(
            
            'nama_kriteria'     => $nama_kriteria,
            'nama_sub'          => $nama_sub,
            'nilai_sub'         => $nilai_sub
        );

        $this->spkModel->insert_data($data,'sub_kriteria');
        $this->session->set_flashdata('tambah', 'Data Sub-Kriteria Berhasil Ditambahkan !!');
        redirect('dp3appkb/subKriteria');
        
    }

    public function updateDataAksi()
    {
        $this->index();

        $id                 = $this->input->post('id_sub');
        $nama_kriteria      = $this->input->post('nama_kriteria');
        $nama_sub           = $this->input->post('nama_sub');
        $nilai_sub          = $this->input->post('nilai_sub');
        
        $data = array(
            
            'nama_kriteria'     => $nama_kriteria,
            'nama_sub'          => $nama_sub,
            'nilai_sub'         => $nilai_sub
        );

        $where = array(
            'id_sub' => $id
        );

        $this->spkModel->update_data('sub_kriteria',$data,$where);
        $this->session->set_flashdata('ubah', 'Data Sub-Kriteria Berhasil Diubah !!');
        redirect('dp3appkb/subKriteria');
        
    }

    public function deleteData($id)
    {
        $where = array('id_sub' => $id);
        $this->spkModel->delete_data($where, 'detail_mbr');
        $this->spkModel->delete_data($where, 'sub_kriteria');
        redirect('dp3appkb/subKriteria');
    }

}

?>