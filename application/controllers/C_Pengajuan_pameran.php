<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_Pengajuan_pameran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pengajuan_pameran');
        $this->load->model('M_Peserta_pameran');
        $this->load->model('M_DataUmkm');
        //$this->load->model('M_Pameran');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->helper('url');
        $this->load->helper('html');

    }

    /*public function read($id) 
    {
        $row = $this->M_Pengajuan_pameran->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pengajuan' => $row->id_pengajuan,
		'id_umkm' => $row->id_umkm,
		'tgl_pengajuan' => $row->tgl_pengajuan,
		'id_pameran' => $row->id_pameran,
	    );
            $this->template->display('c_pengajuan_pameran/pengajuan_pameran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_pengajuan_pameran'));
        }
    }*/

    public function create($id_pameran) 
    {
        $pengaju=$this->M_DataUmkm->get_all();
        $data = array(
            'button' => 'Create',
            'action' => site_url('c_pengajuan_pameran/create_action'),
	    'id_pengajuan' => set_value('id_pengajuan'),
	    'id_umkm' => set_value('id_umkm'),
        'pengaju'=>$pengaju,
	    'tgl_pengajuan' => set_value('tgl_pengajuan'),
	    'id_pameran' => $id_pameran,
	);
        $this->template->display('c_pengajuan_pameran/pengajuan_pameran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $id_pameran=$this->input->post('id_pameran');
            //redirect(site_url('c_datausaha/create/'.$id_umkm));
            $this->create($id_pameran);
        } 
        else {
            $data = array(
		'id_umkm' => $this->input->post('id_umkm',TRUE),
		'tgl_pengajuan' => $this->input->post('tgl_pengajuan',TRUE),
		'id_pameran' => $this->input->post('id_pameran',TRUE),
        'status' => "Ditolak",
	    );
             $cek = $this->M_Pengajuan_pameran->cek_pengajuan($data);
            if($cek > 0){
            $this->session->set_flashdata('message','(<span class="text-danger">UMKM yang anda pilih sudah mengajukan pameran)');           
            redirect(site_url('c_pameran/read/'.$data['id_pameran']));
            }
        else {
            $this->M_Pengajuan_pameran->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('c_pameran/read/'.$data['id_pameran']));
        }
    }
    }
    
    public function update_action($id_pengajuan, $id_pameran) 
    {
        $row=$this->M_Pengajuan_pameran->get_by_id_pengajuan($id_pengajuan);
        $id_umkm=$row->id_umkm;
        $id_pameran=$row->id_pameran;

		$data= array(
            'status' => "Diterima"
            );
            $this->M_Pengajuan_pameran->update($id_pengajuan, $data);
            
       $data2 = array(
        'id_umkm' => $id_umkm,
        'id_pameran' => $id_pameran,
        );
            $this->M_Peserta_pameran->insert($data2);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('c_pameran/read/'.$row->id_pameran));
        }
    public function update_action2($id_pengajuan) 
    {
        $row=$this->M_Pengajuan_pameran->get_by_id_pengajuan($id_pengajuan);
        $data= array(
            'status' => "Ditolak"
            );
        
            $this->M_Pengajuan_pameran->update($id_pengajuan, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('c_pameran/read/'.$row->id_pameran));
        }
    

    public function delete($id_pengajuan) 
    {
        $row = $this->M_Pengajuan_pameran->get_by_id_pengajuan($id_pengajuan);

        if ($row) {
            $this->M_Pengajuan_pameran->delete($id_pengajuan);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('c_pameran/read/'.$row->id_pameran));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_pengajuan_pameran'));
        }
    }

        public function riwayat_pengajuan()
    {
        $riwayat_pengajuan = $this->M_Pengajuan_pameran->get_riwayat_pengajuan();

        $data = array(
            'riwayat_pengajuan' => $riwayat_pengajuan
        );

        $this->template->display('c_pengajuan_pameran/riwayat_pengajuan', $data);
    }
    

    public function _rules() 
    {
	$this->form_validation->set_rules('id_umkm', 'id umkm', 'trim|required');
	$this->form_validation->set_rules('tgl_pengajuan', 'tgl pengajuan', 'trim|required');
	$this->form_validation->set_rules('id_pameran', 'id pameran', 'trim|required');

	$this->form_validation->set_rules('id_pengajuan', 'id_pengajuan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file C_Pengajuan_pameran.php */
/* Location: ./application/controllers/C_Pengajuan_pameran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-02 20:41:10 */
/* http://harviacode.com */