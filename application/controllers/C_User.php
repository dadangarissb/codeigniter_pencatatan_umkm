<?php

// if (!defined('BASEPATH'))
//     exit('No direct script access allowed');

class  C_User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_DataUmkm','M_DataUsaha','M_Jenis_Usaha','M_Kelurahan','M_Pengajuan_pameran','mupload'));
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('Simple_Login');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library(array('upload','image_lib'));
    }




    public function index()
    {
         $c_dataumkm = $this->M_DataUmkm->get_all();
         $data = array( 
             'c_dataumkm_data' => $c_dataumkm
         );

        $this->load->view('user/tampilan_awal', $data);
    }

    
/*    public function admin(){
         redirect(site_url('c_dataumkm');
    }*/

    /*public function login() 
    {
        $this->load->view('user/signin');

    }

    public function aksi_login(){
        $this->_rules();

        cek_login();

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
                'status' => "login",
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
            redirect(base_url("C_User/login"));
        }
    }
    }
    */
    public function register() 
    {
        $jenis=$this->M_Jenis_Usaha->get_all();
        $kelurahan=$this->M_Kelurahan->get_all();
        $data = array(
        'jenis'=>$jenis,
        'kelurahan'=>$kelurahan,
        );
        $this->load->view('user/register',$data);

    }

    public function register_action() 
    {
        $this->_rules2();

        $email = $this->input->post('email');
        $password = $this->input->post('pass2');
        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $nama_pimpinan = $this->input->post('nama_pimpinan');
        $no_ktp = $this->input->post('no_ktp');
        $id_kelurahan = $this->input->post('id_kelurahan');
        $id_jenis_usaha = $this->input->post('id_jenis_usaha');
        

        if ($this->form_validation->run() == TRUE) {
            $this->register();
        }
        else{

        $data = array(
            'email' => $email,
            'password' => $password,
            'nama_perusahaan' => $nama_perusahaan,
            'nama_pimpinan' => $nama_pimpinan,
            'no_ktp' => $no_ktp,
            'id_kelurahan' => $id_kelurahan,
            'id_jenis_usaha' => $id_jenis_usaha,
            'alamat' => "-",
            'no_hp' => "-",
            'spesifikasi_produk' => "-",
            'bahan_baku' =>"-",
            'permasalahan' => "-"
            );

        $cek = $this->M_DataUmkm->cek_register($data);
        if($cek > 0){
            $this->session->set_flashdata('message','(<span class="text-danger">Email ini sudah digunakan');           
            redirect(base_url("C_User/register_action"));
            }
        else {
        $this->M_DataUmkm->insert($data);
        $this->session->set_flashdata('message','(<span class="text-danger">Pendaftaran Berhasil, Silahkan Login Untuk Melengkapi Data');
         redirect(base_url("C_Login/login"));
        }

        }

        }

    public function panduan_pendaftaran() 
    {
        $this->load->view('user/panduan_pendaftaran');

    }


    public function read_user($id) 
    {   
        $data_session=$this->session->userdata('email','id_umkm');
        if (empty($data_session)){
        redirect(site_url('C_Login/login'));
        }

        $row = $this->M_DataUmkm->get_by_id($id);
        $row2 = $this->M_DataUsaha->get_by_id($id);
        $row3 = $this->M_Pengajuan_pameran->get_peserta($id);
        //$row3 = $this->M_Peserta_pameran->get_by_id($id);
        if ($row) {
            $data['dataumkm'] = array(
        'id_umkm' => $row->id_umkm,
        'nama_perusahaan' => $row->nama_perusahaan,
        'nama_pimpinan' => $row->nama_pimpinan,
        'foto_pimpinan' => $row->foto_pimpinan,
        'no_ktp' => $row->no_ktp,
        'alamat' => $row->alamat,
        'email' => $row->email,
        'no_hp' => $row->no_hp,
        'nama_kelurahan' => $row->nama_kelurahan,
        'nama_kecamatan' => $row->nama_kecamatan,
        // 'id_jenis_usaha' => $row->id_jenis_usaha,
        'nama_jenis_usaha' => $row->nama_jenis_usaha,
        'no_siup' => $row->no_siup,
        'no_npwp' => $row->no_npwp,
        'no_tdp' => $row->no_tdp,
        'pirt' => $row->pirt,
        'halal' => $row->halal,
        'hki' => $row->hki,
        //'lain1' => $row->lain1,
        'spesifikasi_produk' => $row->spesifikasi_produk,
        'bahan_baku' => $row->bahan_baku,
        'permasalahan' => $row->permasalahan,
        );
            $data['datausaha'] = array(
                'row2'=>$row2);
            $data['pengajuan_pameran'] = array(
                'row3'=>$row3);
           // $data['peserta_pameran'] = array(
            //  'row2'=>$row3);
            $this->template->user('User/data_umkm_read', $data);

        } else { 
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('c_dataumkm'));
        }
    }
    


    public function update($id) 
    {
        $row = $this->M_DataUmkm->get_by_id($id);
        $jenis=$this->M_Jenis_Usaha->get_all();
        $kelurahan=$this->M_Kelurahan->get_all();

        if ($row) {
            $data = array(
                'button' => 'Edit',
                'action' => site_url('C_User/update_action'),
        'id_umkm' => set_value('id_umkm', $row->id_umkm),
        'nama_perusahaan' => set_value('nama_perusahaan', $row->nama_perusahaan),
        'nama_pimpinan' => set_value('nama_pimpinan', $row->nama_pimpinan),
        'foto_pimpinan' => set_value('foto_pimpinan', $row->foto_pimpinan),
        'no_ktp' => set_value('no_ktp', $row->no_ktp),
        'alamat' => set_value('alamat', $row->alamat),
        'id_kelurahan' => set_value('id_kelurahan', $row->id_kelurahan),
        'email' => set_value('email', $row->email),
        'no_hp' => set_value('email', $row->no_hp),
        'id_jenis_usaha' => set_value('id_jenis_usaha', $row->id_jenis_usaha),
        'no_siup' => set_value('no_siup', $row->no_siup),
        'no_npwp' => set_value('no_npwp', $row->no_npwp),
        'no_tdp' => set_value('no_tdp', $row->no_tdp),
        'pirt' => set_value('pirt', $row->pirt),
        'halal' => set_value('halal', $row->halal),
        'hki' => set_value('hki', $row->hki),
        'spesifikasi_produk' => set_value('spesifikasi_produk', $row->spesifikasi_produk),
        'bahan_baku' => set_value('bahan_baku', $row->bahan_baku),
        'permasalahan' => set_value('permasalahan', $row->permasalahan),
        'jenis'=>$jenis,
        'kelurahan'=>$kelurahan,
        );
            $this->template->user('user/data_umkm_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('c_dataumkm/read/'.$c_dataumkm->id_umkm));
        }
    }

    
    
    public function update_action() 
    {
        $this->_rules2();

        $row = $this->M_DataUmkm->get_by_id($id);
        // $id_umkm=$row

        $config['upload_path']='./foto_pimpinan/';
        $config['allowed_types']='jpeg|gif|jpg|png';

        $this->upload->initialize($config);

        $this->upload->do_upload('foto_pimpinan');

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_umkm', TRUE));
        } else {

        $foto_lama=$this->input->post('foto_lama',TRUE);
        $nama_image=$this->upload->data();
            if($nama_image['file_name']==''){
                $nama_image['file_name']=$foto_lama;
            }
            else {
                if ($nama_image!=null || $foto_lama !='') {
                    if (file_exists('./foto_pimpinan/'.$foto_lama)) {
                       unlink('./foto_pimpinan/'.$foto_lama);
                    }
                }
            }


            $data = array(
        'id_umkm' => $this->input->post('id_umkm',TRUE),
        'nama_perusahaan' => $this->input->post('nama_perusahaan',TRUE),
        'nama_pimpinan' => $this->input->post('nama_pimpinan',TRUE),
        'no_ktp' => $this->input->post('no_ktp',TRUE),
        'alamat' => $this->input->post('alamat',TRUE),
        'foto_pimpinan' => $nama_image['file_name'],
        //'foto_pimpinan' => $this->input->post('foto_pimpinan',TRUE),
        'id_kelurahan' => $this->input->post('id_kelurahan',TRUE),
        'email' => $this->input->post('email',TRUE),
        'no_hp' => $this->input->post('no_hp',TRUE),
        'id_jenis_usaha' => $this->input->post('id_jenis_usaha',TRUE),
        'no_siup' => $this->input->post('no_siup',TRUE),
        'no_npwp' => $this->input->post('no_npwp',TRUE),
        'no_tdp' => $this->input->post('no_tdp',TRUE),
        'pirt' => $this->input->post('pirt',TRUE),
        'halal' => $this->input->post('halal',TRUE),
        'hki' => $this->input->post('hki',TRUE),
        'spesifikasi_produk' => $this->input->post('spesifikasi_produk',TRUE),
        'bahan_baku' => $this->input->post('bahan_baku',TRUE),
        'permasalahan' => $this->input->post('permasalahan',TRUE),
        );

            $this->M_DataUmkm->update($this->input->post('id_umkm', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Biodata Success');

            redirect(site_url('C_User/read_user/'.$data['id_umkm']));
        }
    }


    public function create_data_usaha($id_umkm) 
    {

        $data = array(
            'button' => 'Create',
            'action' => site_url('C_User/create_action'),
        'id_data_usaha' => set_value('id_data_usaha'),
        'id_umkm' => $id_umkm,
        'kapasitas_produk' => set_value('kapasitas_produk'),
        'asset' => set_value('asset'),
        'omset' => set_value('omset'),
        'tenaga_wanita' => set_value('tenaga_wanita'),
        'tenaga_laki' => set_value('tenaga_laki'),
        'pemasaran_dalam' => set_value('pemasaran_dalam'),
        'pemasaran_luar' => set_value('pemasaran_luar'),
        'tahun' => date('Y'),
    );
        $this->template->user('User/data_usaha_form', $data);
    }
    
    public function create_action() 
    {
        $this->rules_data_usaha();

        if ($this->form_validation->run() == FALSE) {
            $id_umkm=$this->input->post('id_umkm');
            //redirect(site_url('c_datausaha/create/'.$id_umkm));
            $this->create($id_umkm);
        } else {
            $data = array(
        'id_umkm' => $this->input->post('id_umkm',TRUE),
        'kapasitas_produk' => $this->input->post('kapasitas_produk',TRUE),
        'asset' => $this->input->post('asset',TRUE),
        'omset' => $this->input->post('omset',TRUE),
        'tenaga_wanita' => $this->input->post('tenaga_wanita',TRUE),
        'tenaga_laki' => $this->input->post('tenaga_laki',TRUE),
        'pemasaran_dalam' => $this->input->post('pemasaran_dalam',TRUE),
        'pemasaran_luar' => $this->input->post('pemasaran_luar',TRUE),
        'tahun' => $this->input->post('tahun',TRUE),
        );

            $this->M_DataUsaha->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('C_User/read_user/'.$data['id_umkm']));
        }
    }
    
    public function update_data_usaha($id_data_usaha) 
    {
        $row = $this->M_DataUsaha->get_by_id_data_usaha($id_data_usaha);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('C_User/update_data_usaha_action'),
        'id_data_usaha' => set_value('id_data_usaha', $row->id_data_usaha),
        'id_umkm' => set_value('id_umkm', $row->id_umkm),
        'kapasitas_produk' => set_value('kapasitas_produk', $row->kapasitas_produk),
        'asset' => set_value('asset', $row->asset),
        'omset' => set_value('omset', $row->omset),
        'tenaga_wanita' => set_value('tenaga_wanita', $row->tenaga_wanita),
        'tenaga_laki' => set_value('tenaga_laki', $row->tenaga_laki),
        'pemasaran_dalam' => set_value('pemasaran_dalam', $row->pemasaran_dalam),
        'pemasaran_luar' => set_value('pemasaran_luar', $row->pemasaran_luar),
        'tahun' => set_value('tahun', $row->tahun),
        );
            $this->template->user('User/data_usaha_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_datausaha'));
        }
    }

    
    public function update_data_usaha_action() 
    {
        $this->rules_data_usaha();

        if ($this->form_validation->run() == FALSE) {
            $this->update_data_usaha($this->input->post('id_data_usaha', TRUE));
        } 
        else {
            $data = array(
        'id_umkm' => $this->input->post('id_umkm',TRUE),
        'kapasitas_produk' => $this->input->post('kapasitas_produk',TRUE),
        'asset' => $this->input->post('asset',TRUE),
        'omset' => $this->input->post('omset',TRUE),
        'tenaga_wanita' => $this->input->post('tenaga_wanita',TRUE),
        'tenaga_laki' => $this->input->post('tenaga_laki',TRUE),
        'pemasaran_dalam' => $this->input->post('pemasaran_dalam',TRUE),
        'pemasaran_luar' => $this->input->post('pemasaran_luar',TRUE),
        'tahun' => $this->input->post('tahun',TRUE),
        );

            $this->M_DataUsaha->update($this->input->post('id_data_usaha', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('C_User/read_user/'.$data['id_umkm']));
        }
    }

    public function delete_data_usaha($id_data_usaha) 
    {
        $row = $this->M_DataUsaha->get_by_id_data_usaha($id_data_usaha);

        if ($row) {
            $this->M_DataUsaha->delete($id_data_usaha);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('C_DataUmkm/read/'.$row->id_umkm));
        } else {
            $this->session->set_flashdata('message', 'Delete Record Success
                ');
            redirect(site_url('C_DataUmkm'));
        }
    }

     public function show($id_umkm)
    {   
       $data['query'] = $this->mupload->get_allimage($id_umkm); //query dari model
       $data['row']=array(
            'id_umkm' => $id_umkm,
        );
        
        $this->template->user('user/v_upload',$data); //tampilan awal ketika controller upload di akses
    }

    public function add($id_umkm) {
        $data = array(
            'button' => 'Create',
            'action' => site_url('C_User/insert/'),
        'id_umkm' => $id_umkm,
    );
       
        $this->template->user('user/fupload',$data);
       
    }
    public function insert(){
        $this->load->library('upload');
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        //$config['max_size'] = '2048'; //maksimum besar file 2M
        //$config['max_width']  = '1288'; //lebar maksimum 1288 px
        //$config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        
        if($_FILES['filefoto']['name'])
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $data = array(
                'nama_foto' =>$gbr['file_name'],
                'file_foto' =>$gbr['file_type'],
                'id_umkm' =>$this->input->post('id_umkm')
                );

                $this->mupload->get_insert($data); //akses model untuk menyimpan ke database
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
                
            redirect(site_url('C_User/show/'.$data['id_umkm']));
            }
            else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('C_User/add'); //jika gagal maka akan ditampilkan form upload
            }
        }
    }
    
   
    public function delete($id) 
    {
        $row = $this->mupload->get_by_id($id);
        //$row2 = $this->M_DataUmkm->get_by_id($id);

        if ($row) {
            $this->mupload->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            //redirect(site_url('c_dataumkm'));
            //unlink('./uploads/'.$row2->nama_foto);
            redirect(site_url('C_User/show/'.$row->id_umkm));
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('C_User_Show'));
        }
    }



    public function _rules2() 
    {
    $this->form_validation->set_rules('email', 'email', 'trim|required');
    //$this->form_validation->set_rules('password', 'password', 'trim|required');
    $this->form_validation->set_rules('nama_perusahaan', 'nama_perusahaan', 'trim|required');
    $this->form_validation->set_rules('nama_pimpinan', 'nama_pimpinan', 'trim|required');
    $this->form_validation->set_rules('no_ktp', 'no_ktp', 'trim|required');
    
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

    $this->form_validation->set_rules('no_hp', 'no_hp', 'trim|required');
    //$this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim|required');
    $this->form_validation->set_rules('id_jenis_usaha', 'id_jenis usaha', 'trim|required');
    // $this->form_validation->set_rules('no_siup', 'no siup', 'trim|required');
    // $this->form_validation->set_rules('no_npwp', 'no npwp', 'trim|required');
    // $this->form_validation->set_rules('no_tdp', 'no tdp', 'trim|required');
    // $this->form_validation->set_rules('pirt', 'pirt', 'trim|required');
    // $this->form_validation->set_rules('halal', 'halal', 'trim|required');
    // $this->form_validation->set_rules('hki', 'hki', 'trim|required');
    $this->form_validation->set_rules('spesifikasi_produk', 'spesifikasi produk', 'trim|required');
    $this->form_validation->set_rules('bahan_baku', 'bahan baku', 'trim|required');
    $this->form_validation->set_rules('permasalahan', 'permasalahan', 'trim|required');


    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


    public function rules_data_usaha() 
    {
    $this->form_validation->set_rules('id_umkm', 'id umkm', 'trim|required');
    $this->form_validation->set_rules('kapasitas_produk', 'kapasitas produk', 'trim|required');
    $this->form_validation->set_rules('asset', 'asset', 'trim|required');
    $this->form_validation->set_rules('omset', 'omset', 'trim|required');
    $this->form_validation->set_rules('tenaga_wanita', 'tenaga wanita', 'trim|required');
    $this->form_validation->set_rules('tenaga_laki', 'tenaga laki', 'trim|required');
    $this->form_validation->set_rules('pemasaran_dalam', 'pemasaran dalam', 'trim|required');
    $this->form_validation->set_rules('pemasaran_luar', 'pemasaran luar', 'trim|required');
    $this->form_validation->set_rules('tahun', 'tahun', 'trim|required');

    $this->form_validation->set_rules('id_data_usaha', 'id_data_usaha', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


}

/* End of file C_DataUmkm.php */
/* Location: ./application/controllers/C_DataUmkm.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-09-23 10:54:52 */
/* http://harviacode.com */