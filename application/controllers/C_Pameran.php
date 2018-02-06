<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_Pameran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pameran');
        //$this->load->model('M_DataUmkm');
        $this->load->model('M_Pengajuan_Pameran');
        $this->load->model('M_Peserta_pameran');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->helper('url');
        $this->load->helper('html');
    }

    public function index()
    {
        $c_pameran = $this->M_Pameran->get_all();

        $data = array(
            'c_pameran_data' => $c_pameran
        );

        $this->template->display('c_pameran/pameran_list', $data);
    }

    public function read($id) 
    {   
        $row = $this->M_Pameran->get_by_id($id);
        $row2 = $this->M_Pengajuan_Pameran->get_by_id($id);
        $row3 = $this->M_Peserta_pameran->get_by_id($id);
        if ($row || $row2 ) {
            $data['pameran'] = array(
		'id_pameran' => $row->id_pameran,
		'nama_pameran' => $row->nama_pameran,
		'tempat' => $row->tempat,
		'tgl_pameran' => $row->tgl_pameran,
		//'kuota_peserta' => $row->kuota_peserta,
	    );
        $data['pengajuan_pameran'] = array(
                'row2'=>$row2);
        $data['peserta_pameran'] = array(
                'row3'=>$row3);
            $this->template->display('c_pameran/pameran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_pameran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('c_pameran/create_action'),
	    'id_pameran' => set_value('id_pameran'),
	    'nama_pameran' => set_value('nama_pameran'),
	    'tempat' => set_value('tempat'),
	    'tgl_pameran' => set_value('tgl_pameran'),
	    //'kuota_peserta' => set_value('kuota_peserta'),
	);
        $this->template->display('c_pameran/pameran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_pameran' => $this->input->post('nama_pameran',TRUE),
		'tempat' => $this->input->post('tempat',TRUE),
		'tgl_pameran' => $this->input->post('tgl_pameran',TRUE),
		//'kuota_peserta' => $this->input->post('kuota_peserta',TRUE),
	    );

            $this->M_Pameran->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('c_pameran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_Pameran->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('c_pameran/update_action'),
		'id_pameran' => set_value('id_pameran', $row->id_pameran),
		'nama_pameran' => set_value('nama_pameran', $row->nama_pameran),
		'tempat' => set_value('tempat', $row->tempat),
		'tgl_pameran' => set_value('tgl_pameran', $row->tgl_pameran),
		//'kuota_peserta' => set_value('kuota_peserta', $row->kuota_peserta),
	    );
            $this->template->display('c_pameran/pameran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_pameran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pameran', TRUE));
        } else {
            $data = array(
		'nama_pameran' => $this->input->post('nama_pameran',TRUE),
		'tempat' => $this->input->post('tempat',TRUE),
		'tgl_pameran' => $this->input->post('tgl_pameran',TRUE),
		//'kuota_peserta' => $this->input->post('kuota_peserta',TRUE),
	    );

            $this->M_Pameran->update($this->input->post('id_pameran', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('c_pameran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_Pameran->get_by_id($id);

        if ($row) {
            $this->M_Pameran->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('c_pameran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_pameran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_pameran', 'nama pameran', 'trim|required');
	$this->form_validation->set_rules('tempat', 'tempat', 'trim|required');
	$this->form_validation->set_rules('tgl_pameran', 'tgl pameran', 'trim|required');
	//$this->form_validation->set_rules('kuota_peserta', 'kuota peserta', 'trim|required');

	$this->form_validation->set_rules('id_pameran', 'id_pameran', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file C_Pameran.php */
/* Location: ./application/controllers/C_Pameran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-02 20:21:48 */
/* http://harviacode.com */