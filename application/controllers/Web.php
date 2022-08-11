<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
		$this->load->library('libraryku');
		$this->load->model(array('M_header', 'M_master'));
	}

	public function index()
	{
		$data_about = $this->M_master->tampil_where('tbl_about', array('id' => 1))->row_array();
		$data_info_tambahan = $this->M_master->tampil_data('tbl_info_tambahan')->result_array();
		$data_produk = $this->M_master->tampil_data('tbl_produk')->result_array();
		$data_portfolio = $this->M_master->tampil_data('tbl_portfolio')->result_array();
		$data_team = $this->M_master->tampil_data('tbl_team')->result_array();
		$data_kontak = $this->M_master->tampil_where('tbl_kontak', array('id' => 1))->row_array();

		$this->load->view('website/v_website', array(
			'data_about' => $data_about,
			'data_info_tambahan' => $data_info_tambahan,
			'data_produk' => $data_produk,
			'data_portfolio' => $data_portfolio,
			'data_team' => $data_team,
			'data_kontak' => $data_kontak
		));
	}

	public function kirim_pesan(){
		date_default_timezone_set("Asia/Jakarta");
		$waktu = date('Y-m-d H:i:s');
		$result = $this->M_master->simpan_data('tbl_pesan', array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'subject' => $this->input->post('subject'),
			'message' => $this->input->post('message'),
			'tanggal_pesan' => $waktu
		));

		if($result > 0){
			echo '<script>
				alert("Pesan anda telah terkirim, Terimakasih !");window.location="index";
			</script>';
		}
	}

}
