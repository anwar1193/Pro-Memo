<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Memo_selesai extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
		$this->load->library('libraryku');
		$this->load->model(array('M_header', 'M_master'));
	}

	public function index()
	{
        $cabang = $this->libraryku->tampil_user()->cabang;
        $level = $this->libraryku->tampil_user()->level;
        $departemen = $this->libraryku->tampil_user()->departemen;
        $nama_lengkap = $this->libraryku->tampil_user()->nama_lengkap;

        if($cabang == 'HEAD OFFICE'){
            $identitas = $departemen;
        }else{
            $identitas = $level;
        }

		cek_belum_login();

        $data_memo = $this->M_master->tampil_where_memo('tbl_memo', array(
            'cabang' => $cabang,
            'bagian' => $identitas,
            'status_mengetahui' => 0,
            'status_menyetujui' => 0
        ))->result_array();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_memo_selesai', array(
            'data_memo' => $data_memo
        ));
		$this->load->view('footer');
	}

    public function detail($id_memo){
        $data_memo = $this->M_master->tampil_where('tbl_memo', array('id_memo' => $id_memo))->row_array();
        $nomor_memo = $data_memo['nomor_memo'];
        
        $data_kepada = $this->M_master->tampil_where('tbl_memo_kepada', array('nomor_memo' => $nomor_memo))->result_array();
        $data_cc = $this->M_master->tampil_where('tbl_memo_cc', array('nomor_memo' => $nomor_memo))->result_array();
        $data_dapin_pba = $this->M_master->tampil_where('tbl_memo_dapin_pba', array('nomor_memo' => $nomor_memo))->result_array();
        $data_dapin_pbl = $this->M_master->tampil_where('tbl_memo_dapin_pbl', array('nomor_memo' => $nomor_memo))->result_array();
        $data_dapin_ppb = $this->M_master->tampil_where('tbl_memo_dapin_ppb', array('nomor_memo' => $nomor_memo))->result_array();
        $data_dapin_pmb = $this->M_master->tampil_where('tbl_memo_dapin_pmb', array('nomor_memo' => $nomor_memo))->result_array();
        $data_general = $this->M_master->tampil_where('tbl_memo_general', array('nomor_memo' => $nomor_memo))->row_array();
        $data_upload = $this->M_master->tampil_where('tbl_memo_file', array('nomor_memo' => $nomor_memo))->result_array();
        $data_mengetahui = $this->M_master->tampil_where('tbl_memo_mengetahui', array('nomor_memo' => $nomor_memo))->result_array();
        $data_menyetujui = $this->M_master->tampil_where('tbl_memo_menyetujui', array('nomor_memo' => $nomor_memo))->result_array();

        $this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_memo_selesai_detail', array(
            'data_memo' => $data_memo,
            'data_kepada' => $data_kepada,
            'data_cc' => $data_cc,
            'data_dapin_pba' => $data_dapin_pba,
            'data_dapin_pbl' => $data_dapin_pbl,
            'data_dapin_ppb' => $data_dapin_ppb,
            'data_dapin_pmb' => $data_dapin_pmb,
            'data_general' => $data_general,
            'data_upload' => $data_upload,
            'data_mengetahui' => $data_mengetahui,
            'data_menyetujui' => $data_menyetujui
        ));
		$this->load->view('footer');

    }

}
