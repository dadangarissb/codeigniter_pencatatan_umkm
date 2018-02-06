<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller
{
    var $limit=10;
    var $offset=10;

    public function __construct() {
        parent::__construct();
        $this->load->model('mupload'); //load model mupload yang berada di folder model
        $this->load->model('M_DataUmkm');
        // $this->load->model('M_DataUsaha');
        // $this->load->model('M_Jenis_Usaha');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->helper('url');
        $this->load->helper('html');

    }

    public function show($id_umkm)
    {
        $data['titel']='Upload CodeIgniter'; //varibel title
        
       $data['query'] = $this->mupload->get_allimage($id_umkm); //query dari model
       $data['row']=array(
            'id_umkm' => $id_umkm,
        );
        
        $this->template->display('vupload',$data); //tampilan awal ketika controller upload di akses
    }
    public function add($id_umkm) {
        $data = array(
            'button' => 'Create',
            'action' => site_url('Upload/insert/'),
        'id_umkm' => $id_umkm,
    );
       
        $this->template->display('fupload',$data);
       
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
                
            redirect(site_url('Upload/show/'.$data['id_umkm']));
            }
            else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('upload/add'); //jika gagal maka akan ditampilkan form upload
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
            redirect(site_url('Upload/show/'.$row->id_umkm));
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('upload'));
        }
    }
}

/* End of file upload.php */
/* Location: ./application/controllers/upload.php */