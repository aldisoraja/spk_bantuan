<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->_rules();

		if($this->form_validation->run()==FALSE) {
			$data['title'] = "Login";
			$this->load->view('templates_dp3appkb/header',$data);
			$this->load->view('login');
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$cek = $this->spkModel->cek_login($username, $password);

			if($cek == FALSE) {
				$this->session->set_flashdata('error', 'Username atau Password Salah atau Akun Sedang Tidak Aktif !!!');
				redirect('login');
			}else{
				$this->session->set_userdata('id_akses',$cek->id_akses);
				$this->session->set_userdata('role_id',$cek->role_id);
				$this->session->set_userdata('nama_akses',$cek->nama_akses);
				$this->session->set_userdata('kec',$cek->kec);
				$this->session->set_userdata('kel',$cek->kel);
				switch ($cek->role_id) {
					case 1 :		$this->session->set_flashdata('sukses', 'Sebagai Koordinator KB Tingkat Kota !!');
									redirect('dp3appkb/dashboard');
									break;
					case 2 :		$this->session->set_flashdata('sukses', 'Sebagai Koordinator KB Tingkat Kecamatan !!');
									redirect('kecamatan/dashboard');
									break;
					case 3 :		$this->session->set_flashdata('sukses', 'Sebagai Koordinator KB Tingkat Kelurahan !!');
									redirect('kelurahan/dashboard');
									break;
					default:		break;
				}
			}
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }

}
