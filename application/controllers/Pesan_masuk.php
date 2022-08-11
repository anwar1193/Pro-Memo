<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan_masuk extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
		$this->load->library('libraryku');
		$this->load->model(array('M_header', 'M_master'));
	}

	public function index()
	{
		cek_belum_login();
        $data_pesan_masuk = $this->M_master->tampil_data_order('tbl_pesan', 'id', 'DESC')->result_array();

		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_pesan_masuk', array(
            'data_pesan_masuk' => $data_pesan_masuk
        ));
		$this->load->view('admin/footer');
	}

    public function hapus_pesan($id){
        $result = $this->M_master->hapus_data('tbl_pesan', array('id' => $id));
        if($result > 0){
            echo '<script>
                alert("Pesan masuk berhasil dihapus");window.location="../index";
            </script>';
        }
    }
	

}
