<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_DataUsaha extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //$this->load->model('M_DataUmkm');
        $this->load->model('M_DataUsaha');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->helper('url');
        $this->load->helper('html');
    }

    public function read($id) 
    {
        $row = $this->M_DataUsaha->get_by_id($id);
        if ($row) {
            $data = array(
		'id_data_usaha' => $row->id_data_usaha,
		'id_umkm' => $row->id_umkm,
		'kapasitas_produk' => $row->kapasitas_produk,
		'asset' => $row->asset,
		'omset' => $row->omset,
		'tenaga_wanita' => $row->tenaga_wanita,
		'tenaga_laki' => $row->tenaga_laki,
		'pemasaran_dalam' => $row->pemasaran_dalam,
		'pemasaran_luar' => $row->pemasaran_luar,
		'tahun' => $row->tahun,
	    );
            $this->template->display('c_datausaha/data_usaha_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_datausaha'));
        }
    }

public function create($id_umkm) 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('C_DataUsaha/create_action'),
        'id_data_usaha' => set_value('id_data_usaha'),
        'id_umkm' => $id_umkm,
        'kapasitas_produk' => set_value('kapasitas_produk'),
        'asset' => set_value('asset'),
        'omset' => set_value('omset'),
        'tenaga_wanita' => set_value('tenaga_wanita'),
        'tenaga_laki' => set_value('tenaga_laki'),
        'pemasaran_dalam' => set_value('pemasaran_dalam'),
        'pemasaran_luar' => set_value('pemasaran_luar'),
        'tahun' => set_value('tahun'),
    );
        $this->template->display('c_datausaha/data_usaha_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules2();

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
            redirect(site_url('C_DataUmkm/read/'.$data['id_umkm']));
        }
    }

    
    public function update_data_usaha($id_data_usaha) 
    {
        $row = $this->M_DataUsaha->get_by_id_data_usaha($id_data_usaha);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('C_DataUsaha/update_data_usaha_action'),
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
            $this->template->display('c_datausaha/data_usaha_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_datausaha'));
        }
    }

    
    public function update_data_usaha_action() 
    {
        $this->_rules2();

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
             redirect(site_url('C_DataUmkm/read/'.$data['id_umkm']));
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

    public function _rules2() 
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

/* End of file C_DataUsaha.php */
/* Location: ./application/controllers/C_DataUsaha.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-09-23 10:56:36 */
/* http://harviacode.com */