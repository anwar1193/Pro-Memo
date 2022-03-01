<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_user extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
		$this->load->library('libraryku');
		$this->load->model(array('M_header', 'M_master'));
	}

	public function index()
	{
		cek_belum_login();
        $data_user = $this->M_master->tampil_master_user()->result_array();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_master_user', array(
            'data_user' => $data_user
        ));
		$this->load->view('footer');
	}

	public function tambah_user(){
		cek_belum_login();

		// Data Master
		$data_level = $this->M_master->tampil_data_order('tbl_level', 'level')->result_array();
		$data_cabang = $this->M_master->tampil_data_order('tbl_cabang', 'nama_cabang')->result_array();
		$data_departemen = $this->M_master->tampil_data_order('tbl_departemen', 'nama_departemen')->result_array();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_tambah_user', array(
			'data_level' => $data_level,
			'data_cabang' => $data_cabang,
			'data_departemen' => $data_departemen
		));
		$this->load->view('footer');
	}

	public function simpan_user(){
		cek_belum_login();

		$result = $this->M_master->simpan_data('tbl_user', array(
			'level' => $this->input->post('level'),
			'nik' => $this->input->post('nik'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'cabang' => $this->input->post('cabang'),
			'departemen' => $this->input->post('departemen'),
			'username' => $this->input->post('username'),
			'password' => sha1($this->input->post('password'))
		));

		if($result>0){
			echo '<script>alert("Data User Berhasil Disimpan");window.location="index"</script>';
		}
	}


	public function edit_user($id){
		cek_belum_login();

		// Data User
		$data_user = $this->M_master->tampil_where('tbl_user', array('id'=>$id))->row_array();

		// Data Master
		$data_level = $this->M_master->tampil_data_order('tbl_level', 'level')->result_array();
		$data_cabang = $this->M_master->tampil_data_order('tbl_cabang', 'nama_cabang')->result_array();
		$data_departemen = $this->M_master->tampil_data_order('tbl_departemen', 'nama_departemen')->result_array();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_edit_user', array(
			'data_user' => $data_user,
			'data_level' => $data_level,
			'data_cabang' => $data_cabang,
			'data_departemen' => $data_departemen
		));
		$this->load->view('footer');
	}


	public function update_user(){
		cek_belum_login();
		$id_user = $this->input->post('id_user');

		$result = $this->M_master->update_data('tbl_user', array(
			'level' => $this->input->post('level'),
			'nik' => $this->input->post('nik'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'cabang' => $this->input->post('cabang'),
			'departemen' => $this->input->post('departemen'),
			'username' => $this->input->post('username')
		), array('id' => $id_user));

		if($result>0){
			echo '<script>alert("Data User Berhasil Diupdate");window.location="index"</script>';
		}
	}


	public function hapus_user($id){
		cek_belum_login();
		$result = $this->M_master->hapus_data('tbl_user', array('id'=>$id));
		if($result>0){
			echo '<script>alert("Data User Berhasil Dihapus");window.location="../index"</script>';
		}
	}

	public function reset_password($id){
		cek_belum_login();
		$result = $this->M_master->update_data('tbl_user', array(
			'password' => sha1('Profi@123')
		), array('id'=>$id));
		
		if($result>0){
			echo '<script>alert("Password Berhasil Di-Reset : Profi@123");window.location="../index"</script>';
		}
	}
	

}
