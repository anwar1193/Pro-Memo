<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_cabang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
		$this->load->library('libraryku');
		$this->load->model(array('M_header', 'M_master'));
	}

	public function index()
	{
		cek_belum_login();
        $data_cabang = $this->M_master->tampil_data_order('tbl_cabang', 'id')->result_array();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_master_cabang', array(
            'data_cabang' => $data_cabang
        ));
		$this->load->view('footer');
	}

	public function tambah_cabang(){
		cek_belum_login();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_tambah_cabang');
		$this->load->view('footer');
	}

	public function simpan_cabang(){
		cek_belum_login();

		$result = $this->M_master->simpan_data('tbl_cabang', array(
			'kode_cabang' => $this->input->post('kode_cabang'),
			'nama_cabang' => $this->input->post('nama_cabang'),
			'wilayah' => $this->input->post('wilayah'),
			'no_telepon' => $this->input->post('no_telepon'),
			'alamat' => $this->input->post('alamat')
		));

		if($result>0){
			echo '<script>alert("Data Cabang Berhasil Disimpan");window.location="index"</script>';
		}
	}


	public function edit_cabang($id){
		cek_belum_login();

		// Data Cabang
		$data_cabang = $this->M_master->tampil_where('tbl_cabang', array('id'=>$id))->row_array();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_edit_cabang', array(
			'data_cabang' => $data_cabang
		));
		$this->load->view('footer');
	}


	public function update_cabang(){
		cek_belum_login();
		$id = $this->input->post('id');

		$result = $this->M_master->update_data('tbl_cabang', array(
			'kode_cabang' => $this->input->post('kode_cabang'),
			'nama_cabang' => $this->input->post('nama_cabang'),
			'wilayah' => $this->input->post('wilayah'),
			'no_telepon' => $this->input->post('no_telepon'),
			'alamat' => $this->input->post('alamat')
		), array('id' => $id));

		if($result>0){
			echo '<script>alert("Data Cabang Berhasil Diupdate");window.location="index"</script>';
		}
	}


	public function hapus_cabang($id){
		cek_belum_login();
		$result = $this->M_master->hapus_data('tbl_cabang', array('id'=>$id));
		if($result>0){
			echo '<script>alert("Data Cabang Berhasil Dihapus");window.location="../index"</script>';
		}
	}
	

}
