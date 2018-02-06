<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends CI_Controller {
	
	// Index login
	function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_Login'));
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('html');
    }

    public function login() 
    {
        $this->load->view('user/signin');

    }

    public function aksi_login(){
        $this->_rules();

        $email = $this->input->post('email');
        $password = $this->input->post('password');


        if ($this->form_validation->run() == FALSE) {
            $this->login();
        }
        else{

        $data = array(
            'email' => $email,
            'password' => $password
            );

        $cek = $this->M_Login->cek_login($data);
        if($cek > 0){
            $cek_id = $this->M_Login->cek_id($data);
            $id_umkm = $cek_id->id_umkm;
            $no_hp = $cek_id->no_hp;
            $alamat = $cek_id->alamat;
            $spesifikasi = $cek_id->spesifikasi_produk;
            $bahan = $cek_id->bahan_baku;



            $data_session = array(
                'email' => $email,
                'id_umkm' => $cek_id->id_umkm
                );

            $this->session->set_userdata($data_session);

            if($no_hp == "-" || $alamat == "-" || $spesifikasi == "-" || $bahan == "-") {

                $this->session->set_flashdata('message','(Silahkan Lengkapi Data Terlebih Dahulu)');

                redirect(base_url("C_User/update/".$id_umkm));

                
            }

            else{
            redirect(base_url("C_User/read_user/".$id_umkm));
        }

        }
        else{
            $this->session->set_flashdata('message','(<span class="text-danger">Email atau Password anda salah ! ) <br> Silahkan Coba Lagi');
            redirect(base_url("C_Login/login"));
        }
    }
    }

    
	
	// Logout di sini
	public function logout() {
		session_destroy();
        redirect(base_url("C_User")); 
	}	



    public function _rules() 
    {
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


}