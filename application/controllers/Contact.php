<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
		$this->load->library('libraryku');
		$this->load->model(array('M_header', 'M_master'));
	}

	public function index()
	{
		cek_belum_login();
		$data_kontak = $this->M_master->tampil_where('tbl_kontak', array('id' => 1))->row_array();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_kontak', array('data_kontak' => $data_kontak));
		$this->load->view('admin/footer');
	}

	public function update(){
		$result = $this->M_master->update_data('tbl_kontak', array(
            'alamat' => trim($this->input->post('alamat')),
            'email' => $this->input->post('email'),
            'nomor_telepon' => $this->input->post('nomor_telepon'),
            'link_maps' => $this->input->post('link_maps')
        ), array('id' => 1));

        if($result>0){
            echo '<script>
                alert("Data Kontak Berhasil Di Update");window.location="index"
            </script>';
        }
	}

}
