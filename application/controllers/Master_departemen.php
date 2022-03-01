<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_departemen extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
		$this->load->library('libraryku');
		$this->load->model(array('M_header', 'M_master'));
	}

	public function index()
	{
		cek_belum_login();
        $data_departemen = $this->M_master->tampil_data_order('tbl_departemen', 'kode_departemen')->result_array();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_master_departemen', array(
            'data_departemen' => $data_departemen
        ));
		$this->load->view('footer');
	}

	public function tambah_departemen(){
		cek_belum_login();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_tambah_departemen');
		$this->load->view('footer');
	}

	public function simpan_departemen(){
		cek_belum_login();

		$result = $this->M_master->simpan_data('tbl_departemen', array(
			'kode_departemen' => $this->input->post('kode_departemen'),
			'nama_departemen' => $this->input->post('nama_departemen')
		));

		if($result>0){
			echo '<script>alert("Data Departemen Berhasil Disimpan");window.location="index"</script>';
		}
	}


	public function edit_departemen($id){
		cek_belum_login();

		// Data departemen
		$data_departemen = $this->M_master->tampil_where('tbl_departemen', array('id'=>$id))->row_array();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_edit_departemen', array(
			'data_departemen' => $data_departemen
		));
		$this->load->view('footer');
	}


	public function update_departemen(){
		cek_belum_login();
		$id = $this->input->post('id');

		$result = $this->M_master->update_data('tbl_departemen', array(
			'kode_departemen' => $this->input->post('kode_departemen'),
			'nama_departemen' => $this->input->post('nama_departemen')
		), array('id' => $id));

		if($result>0){
			echo '<script>alert("Data Departemen Berhasil Diupdate");window.location="index"</script>';
		}
	}


	public function hapus_departemen($id){
		cek_belum_login();
		$result = $this->M_master->hapus_data('tbl_departemen', array('id'=>$id));
		if($result>0){
			echo '<script>alert("Data Departemen Berhasil Dihapus");window.location="../index"</script>';
		}
	}
	

}
