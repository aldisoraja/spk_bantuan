<?php

class HakAkses extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role_id') !='1') {
            $this->session->set_flashdata('gagal', 'Anda Belum Melakukan Login !!!');
				redirect('login');
            }
    }
    
    public function index()
    {
        $data['title'] = "Hak Akses";
        $data['akses'] = $this->spkModel->get_data('hak_akses')->result();
        $this->load->view('templates_dp3appkb/header',$data);
        $this->load->view('templates_dp3appkb/sidebar');
        $this->load->view('dp3appkb/hakAkses',$data);
        $this->load->view('templates_dp3appkb/footer');
    }

    public function tambahDataAksi()
    {
        $this->index();
        
        $id_akses        = $this->input->post('id_akses');
        $nama_akses      = $this->input->post('nama_akses');
        $username        = $this->input->post('username');
        $password        = $this->input->post('password');
        $role_id         = $this->input->post('role_id');
        if (empty($this->input->post('kec'))) {
            $kec = NULL;
            $kel = NULL;
        }elseif (empty($this->input->post('kel'))) {
            $kec = $this->input->post('kec');
            $kel = NULL;
        }else {
            $kec = $this->input->post('kec');
            $kel = $this->input->post('kel');
        }
        
        $data = array(
            
            'id_akses'       => $id_akses,
            'nama_akses'     => $nama_akses,
            'username'       => $username,
            'password'       => $password,
            'role_id'        => $role_id,
            'kec'            => $kec,
            'kel'            => $kel,
            'status'         => "Aktif"
        );

        $this->spkModel->insert_data($data,'hak_akses');
        $this->session->set_flashdata('tambah', 'Data Hak Akses Berhasil Ditambahkan !!');
        redirect('dp3appkb/hakAkses');
    
    }

    public function updateDataAksi()
    {
        $this->index();
        
        $id              = $this->input->post('id_akses');
        $nama_akses      = $this->input->post('nama_akses');
        $username        = $this->input->post('username');
        $password        = $this->input->post('password');
        $role_id         = $this->input->post('edit_role_id');
        if (empty($this->input->post('edit_kec'))) {
            $kec = NULL;
            $kel = NULL;
        }elseif (empty($this->input->post('edit_kel'))) {
            $kec = $this->input->post('edit_kec');
            $kel = NULL;
        }else {
            $kec = $this->input->post('edit_kec');
            $kel = $this->input->post('edit_kel');
        }
        
        $data = array(
            
            'id_akses'       => $id,
            'nama_akses'     => $nama_akses,
            'username'       => $username,
            'password'       => $password,
            'role_id'        => $role_id,
            'kec'            => $kec,
            'kel'            => $kel
        );

        $where = array(
            'id_akses' => $id
        );

        $this->spkModel->update_data('hak_akses',$data,$where);
        $this->session->set_flashdata('ubah', 'Data Hak Akses Berhasil Diubah !!');
        redirect('dp3appkb/hakAkses');
        
    }

    public function deleteData($id)
    {
        $where = array('id_akses' => $id);
        $this->spkModel->delete_data($where, 'hak_akses');
        redirect('dp3appkb/hakAkses');
    }

    public function updateStatus()
    {
        $status = $this->input->post("status");
        $id_akses = $this->input->post("id_akses");
        if ($status == 'Aktif') {
            $data = array(
                
                'id_akses'       => $id_akses,
                'status'         => $status
            );

            $where = array(
                'id_akses' => $id_akses
            );

            $update = $this->spkModel->update_data('hak_akses',$data,$where);
            if ($update) {
            return $this->response($data,200);
            } else {
            return $this->response(array('status' => 'fail', 502));
            }
        }elseif ($status == 'Nonaktif') {
            $data = array(
                
                'id_akses'       => $id_akses,
                'status'         => "Tidak Aktif"
            );

            $where = array(
                'id_akses' => $id_akses
            );

            $update = $this->spkModel->update_data('hak_akses',$data,$where);
            if ($update) {
            return $this->response(array('status' => 'Success', 200));
            } else {
            return $this->response(array('status' => 'fail', 502));
            }
        }
    }

}

?>