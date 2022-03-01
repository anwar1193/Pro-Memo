<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Memo_final extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
		$this->load->library(array('libraryku','dompdf_gen'));
		$this->load->model(array('M_header', 'M_master'));
	}

	public function index()
	{
        $level = $this->libraryku->tampil_user()->level;
        $departemen = $this->libraryku->tampil_user()->departemen;
        $nama_lengkap = $this->libraryku->tampil_user()->nama_lengkap;

		cek_belum_login();

        $data_memo = $this->M_master->tampil_memo_final($departemen)->result_array();
        $data_memo_proses = $this->M_master->tampil_memo_proses($departemen)->result_array();

        $jenis_memo = $this->M_master->tampil_data('tbl_jenis_memo')->result_array();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_memo_final', array(
            'data_memo' => $data_memo,
            'data_memo_proses' => $data_memo_proses,
            'jenis_memo' => $jenis_memo
        ));
		$this->load->view('footer');
	}

    public function index_cari()
	{
        $level = $this->libraryku->tampil_user()->level;
        $departemen = $this->libraryku->tampil_user()->departemen;
        $cabang = $this->libraryku->tampil_user()->cabang;
        $nama_lengkap = $this->libraryku->tampil_user()->nama_lengkap;

        $nopin = $this->input->post('nopin');
        $jenis_memo = $this->M_master->tampil_data('tbl_jenis_memo')->result_array();

        $jenis_memo_cari = $this->input->post('jenis_memo');
        

		cek_belum_login();

        if($jenis_memo_cari == 'PELEPASAN BPKB AYDA'){
            $data_memo = $this->M_master->tampil_memo_final_cari_pba($departemen, $nopin)->result_array();

        }elseif($jenis_memo_cari == 'PELEPASAN BPKB LUNAS'){
            $data_memo = $this->M_master->tampil_memo_final_cari_pbl($departemen, $nopin)->result_array();

        }elseif($jenis_memo_cari == 'PRIORITAS PELEPASAN BPKB'){
            $data_memo = $this->M_master->tampil_memo_final_cari_ppb($departemen, $nopin)->result_array();

        }elseif($jenis_memo_cari == 'PEMINJAMAN BPKB'){
            $data_memo = $this->M_master->tampil_memo_final_cari_pmb($departemen, $nopin)->result_array();
        }

        $data_memo_proses = $this->M_master->tampil_memo_proses($departemen)->result_array();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_memo_final', array(
            'data_memo' => $data_memo,
            'jenis_memo' => $jenis_memo,
            'data_memo_proses' => $data_memo_proses
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
		$this->load->view('v_memo_final_detail', array(
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

    public function proses_pdf($id_memo){
		date_default_timezone_set("Asia/Jakarta");
		$result = $this->M_master->tampil_where('tbl_memo', array('id_memo' => $id_memo))->row_array();
        $nomor_memo = $result['nomor_memo'];
        
        $data_kepada = $this->M_master->tampil_where('tbl_memo_kepada', array('nomor_memo' => $nomor_memo))->result_array();
        $data_cc = $this->M_master->tampil_where('tbl_memo_cc', array('nomor_memo' => $nomor_memo))->result_array();
        $data_dapin_pba = $this->M_master->tampil_where('tbl_memo_dapin_pba', array('nomor_memo' => $nomor_memo))->result_array();
        $data_dapin_pbl = $this->M_master->tampil_where('tbl_memo_dapin_pbl', array('nomor_memo' => $nomor_memo))->result_array();
        $data_dapin_ppb = $this->M_master->tampil_where('tbl_memo_dapin_ppb', array('nomor_memo' => $nomor_memo))->result_array();
        $data_upload = $this->M_master->tampil_where('tbl_memo_upload', array('nomor_memo' => $nomor_memo))->result_array();
        $data_mengetahui = $this->M_master->tampil_where('tbl_memo_mengetahui', array('nomor_memo' => $nomor_memo))->result_array();
        $data_menyetujui = $this->M_master->tampil_where('tbl_memo_menyetujui', array('nomor_memo' => $nomor_memo))->result_array();

		$this->load->view('v_pdf_memo', array(
            'data_memo'=>$result,
            'data_kepada' => $data_kepada,
            'data_cc' => $data_cc,
            'data_dapin_pba' => $data_dapin_pba,
            'data_dapin_pbl' => $data_dapin_pbl,
            'data_dapin_ppb' => $data_dapin_ppb,
            'data_upload' => $data_upload,
            'data_mengetahui' => $data_mengetahui,
            'data_menyetujui' => $data_menyetujui
        ));

		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		
		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("cetak_memo.pdf",array('Attachment' => 0)); //Nama Hasil Export PDF
	}

}
