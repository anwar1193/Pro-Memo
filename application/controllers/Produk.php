<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
		$this->load->library('libraryku');
		$this->load->model(array('M_header', 'M_master'));
	}

	public function index()
	{
		cek_belum_login();
        $data_produk = $this->M_master->tampil_data('tbl_produk')->result_array();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_produk', array('data_produk' => $data_produk));
		$this->load->view('admin/footer');
	}

    public function tambah(){
        cek_belum_login();
        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_produk_add');
		$this->load->view('admin/footer');
    }

    public function simpan(){
        cek_belum_login();
        $result = $this->M_master->simpan_data('tbl_produk', array(
            'nama_produk' => $this->input->post('nama_produk'),
            'deskripsi' => $this->input->post('deskripsi'),
            'icon' => $this->input->post('icon')
        ));

        if($result > 0){
            echo '<script>
                alert("Produk Berhasil Disimpan");window.location="index";
            </script>';
        }
    }


    public function hapus($id){
        $result = $this->M_master->hapus_data('tbl_produk', array('id' => $id));
        if($result > 0){
            echo '<script>
                alert("Produk berhasil dihapus");window.location="../index";
            </script>';
        }
    }


    public function edit($id){
        cek_belum_login();
        $data_produk = $this->M_master->tampil_where('tbl_produk', array('id' => $id))->row_array();

        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_produk_edit', array('data_produk' => $data_produk));
		$this->load->view('admin/footer');
    }


    public function update(){
        cek_belum_login();
        $id = $this->input->post('id'); 
        $result = $this->M_master->update_data('tbl_produk', array(
            'nama_produk' => $this->input->post('nama_produk'),
            'deskripsi' => $this->input->post('deskripsi'),
            'icon' => $this->input->post('icon')
        ), array('id' => $id));

        if($result > 0){
            echo '<script>
                alert("Produk Berhasil Diupdate");window.location="index";
            </script>';
        }
    }
	

}
