<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info_tambahan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
		$this->load->library('libraryku');
		$this->load->model(array('M_header', 'M_master'));
	}

	public function index()
	{
		cek_belum_login();
        $data_info_tambahan = $this->M_master->tampil_data('tbl_info_tambahan')->result_array();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_info_tambahan', array('data_info_tambahan' => $data_info_tambahan));
		$this->load->view('admin/footer');
	}

    public function tambah(){
        cek_belum_login();
        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_info_tambahan_add');
		$this->load->view('admin/footer');
    }

    public function simpan(){
        cek_belum_login();
        $result = $this->M_master->simpan_data('tbl_info_tambahan', array(
            'judul' => $this->input->post('judul'),
            'sub_judul' => $this->input->post('sub_judul'),
            'keterangan' => $this->input->post('keterangan')
        ));

        if($result > 0){
            echo '<script>
                alert("Info Tambahan Berhasil Disimpan");window.location="index";
            </script>';
        }
    }


    public function hapus($id){
        $result = $this->M_master->hapus_data('tbl_info_tambahan', array('id' => $id));
        if($result > 0){
            echo '<script>
                alert("Info Tambahan berhasil dihapus");window.location="../index";
            </script>';
        }
    }


    public function edit($id){
        cek_belum_login();
        $data_info = $this->M_master->tampil_where('tbl_info_tambahan', array('id' => $id))->row_array();

        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_info_tambahan_edit', array('data_info' => $data_info));
		$this->load->view('admin/footer');
    }


    public function update(){
        cek_belum_login();
        $id = $this->input->post('id'); 
        $result = $this->M_master->update_data('tbl_info_tambahan', array(
            'judul' => $this->input->post('judul'),
            'sub_judul' => $this->input->post('sub_judul'),
            'keterangan' => trim($this->input->post('keterangan'))
        ), array('id' => $id));

        if($result > 0){
            echo '<script>
                alert("Info Tambahan Berhasil Diupdate");window.location="index";
            </script>';
        }
    }
	

}
