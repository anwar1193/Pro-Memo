<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_level extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
		$this->load->library('libraryku');
		$this->load->model(array('M_header', 'M_master'));
	}

	public function index()
	{
		cek_belum_login();
        $data_level = $this->M_master->tampil_data_order('tbl_level', 'level')->result_array();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_master_level', array(
            'data_level' => $data_level
        ));
		$this->load->view('footer');
	}

	public function tambah_level(){
		cek_belum_login();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_tambah_level');
		$this->load->view('footer');
	}

	public function simpan_level(){
		cek_belum_login();

		$result = $this->M_master->simpan_data('tbl_level', array(
			'level' => $this->input->post('level')
		));

		if($result>0){
			echo '<script>alert("Data Level Berhasil Disimpan");window.location="index"</script>';
		}
	}


	public function edit_level($id){
		cek_belum_login();

		// Data level
		$data_level = $this->M_master->tampil_where('tbl_level', array('id'=>$id))->row_array();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_edit_level', array(
			'data_level' => $data_level
		));
		$this->load->view('footer');
	}


	public function update_level(){
		cek_belum_login();
		$id = $this->input->post('id');

		$result = $this->M_master->update_data('tbl_level', array(
			'level' => $this->input->post('level')
		), array('id' => $id));

		if($result>0){
			echo '<script>alert("Data Level Berhasil Diupdate");window.location="index"</script>';
		}
	}


	public function hapus_level($id){
		cek_belum_login();
		$result = $this->M_master->hapus_data('tbl_level', array('id'=>$id));
		if($result>0){
			echo '<script>alert("Data Level Berhasil Dihapus");window.location="../index"</script>';
		}
	}
	

}
