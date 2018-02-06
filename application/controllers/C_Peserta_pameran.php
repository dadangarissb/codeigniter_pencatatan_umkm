<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_Peserta_pameran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Peserta_pameran');
        $this->load->model('M_Pengajuan_pameran');
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->helper('url');
        $this->load->helper('html');

    }

    // public function index()
    // {
    //     $c_peserta_pameran = $this->M_Peserta_pameran->get_all();

    //     $data = array(
    //         'c_peserta_pameran_data' => $c_peserta_pameran
    //     );

    //     $this->load->view('c_peserta_pameran/peserta_pameran_list', $data);
    // }

    public function read($id) 
    {
        $row = $this->M_Peserta_pameran->get_by_id($id);
        if ($row) {
            $data = array(
		'id_peserta' => $row->id_peserta,
		'id_umkm' => $row->id_umkm,
        'nama_umkm' => $row->nama_umkm,
		'id_pameran' => $row->id_pameran,
		'penjualan_barang' => $row->penjualan_barang,
		'order_barang' => $row->order_barang,
	    );
            $this->load->view('c_peserta_pameran/peserta_pameran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_peserta_pameran'));
        }
    }

    public function create($id_pameran) 
    {
        $peserta = $this->M_Pengajuan_pameran->get_semua($id_pameran);
        $data = array(
            'button' => 'Create',
            'action' => site_url('c_peserta_pameran/create_action'),
	    'id_peserta' => set_value('id_peserta'),
	    'id_umkm' => set_value('id_umkm'),
	    'id_pameran' => $id_pameran,
	    'penjualan_barang' => set_value('penjualan_barang'),
        'peserta'=>$peserta,
	    'order_barang' => set_value('order_barang'),
	);
        $this->template->display('c_peserta_pameran/peserta_pameran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $id_pameran=$this->input->post('id_pameran');
            //redirect(site_url('c_datausaha/create/'.$id_umkm));
            $this->create($id_pameran);
        } else {
            $data = array(
		'id_umkm' => $this->input->post('id_umkm',TRUE),
		'id_pameran' => $this->input->post('id_pameran',TRUE),
		'penjualan_barang' => $this->input->post('penjualan_barang',TRUE),
		'order_barang' => $this->input->post('order_barang',TRUE),
	    );

            $this->M_Peserta_pameran->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('c_pameran/read/'.$data['id_pameran']));
        }
    }
    
    public function update_data($id_peserta) 
    {

        $row = $this->M_Peserta_pameran->get_by_id_peserta($id_peserta);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('c_peserta_pameran/update_action'),
		'id_peserta' => set_value('id_peserta', $row->id_peserta),
		'id_umkm' => set_value('id_umkm', $row->id_umkm),
        'nama_perusahaan' => set_value('nama_perusahaan', $row->nama_perusahaan),
		'id_pameran' => set_value('id_pameran', $row->id_pameran),
		'penjualan_barang' => set_value('penjualan_barang', $row->penjualan_barang),
		'order_barang' => set_value('order_barang', $row->order_barang),
	    );
            $this->template->display('c_peserta_pameran/peserta_pameran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_peserta_pameran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update_data($this->input->post('id_peserta', TRUE));
        } else {
            $data = array(
		'id_umkm' => $this->input->post('id_umkm',TRUE),
		'id_pameran' => $this->input->post('id_pameran',TRUE),
		'penjualan_barang' => $this->input->post('penjualan_barang',TRUE),
		'order_barang' => $this->input->post('order_barang',TRUE),
	    );

            $this->M_Peserta_pameran->update($this->input->post('id_peserta', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
             redirect(site_url('c_pameran/read/'.$data['id_pameran']));
        }
    }
    
    public function delete($id_peserta) 
    {
        $row = $this->M_Peserta_pameran->get_by_id_delete($id_peserta);

        if ($row) {
            $this->M_Peserta_pameran->delete($id_peserta);
            redirect(site_url('c_pameran/read/'.$row->id_pameran));
            //$this->session->set_flashdata('message', 'Delete Record Success');
            //redirect(site_url('c_pameran/read/'.$row->id_pameran));
            //redirect(site_url('c_pameran/read/'.$row->id));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            //redirect(site_url('c_pameran'));
            redirect(site_url('c_pameran/rad/'.$row->id_pameran));
        }

        
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_umkm', 'id umkm', 'trim|required');
	$this->form_validation->set_rules('id_pameran', 'id pameran', 'trim|required');
	$this->form_validation->set_rules('penjualan_barang', 'penjualan barang', 'trim|required');
	$this->form_validation->set_rules('order_barang', 'order barang', 'trim|required');

	$this->form_validation->set_rules('id_peserta', 'id_peserta', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file C_Peserta_pameran.php */
/* Location: ./application/controllers/C_Peserta_pameran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-04 08:30:36 */
/* http://harviacode.com */