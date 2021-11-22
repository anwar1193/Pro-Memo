<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approved_history_menyetujui extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
		$this->load->library('libraryku');
		$this->load->model(array('M_header', 'M_master'));
	}

	public function index()
	{
        $level = $this->libraryku->tampil_user()->level;
        $departemen = $this->libraryku->tampil_user()->departemen;
        $nama_lengkap = $this->libraryku->tampil_user()->nama_lengkap;

		cek_belum_login();

        $data_memo = $this->M_master->tampil_inbox_menyetujui_history($departemen, $level, $nama_lengkap)->result_array();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_approved_history_menyetujui', array(
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
        $data_upload = $this->M_master->tampil_where('tbl_memo_upload', array('nomor_memo' => $nomor_memo))->result_array();
        $data_mengetahui = $this->M_master->tampil_where('tbl_memo_mengetahui', array('nomor_memo' => $nomor_memo))->result_array();
        $data_menyetujui = $this->M_master->tampil_where('tbl_memo_menyetujui', array('nomor_memo' => $nomor_memo))->result_array();

        $this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_approved_history_menyetujui_d', array(
            'data_memo' => $data_memo,
            'data_kepada' => $data_kepada,
            'data_cc' => $data_cc,
            'data_dapin_pba' => $data_dapin_pba,
            'data_dapin_pbl' => $data_dapin_pbl,
            'data_dapin_ppb' => $data_dapin_ppb,
            'data_upload' => $data_upload,
            'data_mengetahui' => $data_mengetahui,
            'data_menyetujui' => $data_menyetujui
        ));
		$this->load->view('footer');

    }

    public function approve(){
        $note = $this->input->post('note_approve');
        $status_menyetujui = $this->input->post('status_menyetujui');
        $nomor_memo = $this->input->post('nomor_memo');
        $username = $this->input->post('username');
        $departemen = $this->input->post('departemen');

        // Cari Sisa Menyetujui
        $jumlah_menyetujui = $this->M_master->tampil_where('tbl_memo_menyetujui', array('nomor_memo' => $nomor_memo))->num_rows();
        $sisa_menyetujui = $jumlah_menyetujui - $status_menyetujui;

        // Update tbl_memo_menyetujui
        $result = $this->M_master->update_data('tbl_memo_menyetujui', array(
            'status' => 'done',
            'note_menyetujui' => $note
        ), array(
            'nomor_memo' => $nomor_memo,
            'username_menyetujui' => $username,
            'departemen_menyetujui' => $departemen
        ));

        if($result>0){
            // Update tbl_memo
            if($sisa_menyetujui == 0){ // jika sisa menyetujui sudah habis / ini adalah menyetujui terakhir
                $this->M_master->update_data('tbl_memo', array(
                    'status_menyetujui' => 0
                ), array('nomor_memo' => $nomor_memo));

            }else{ // jika menyetujui setelah ini masih ada
                $this->M_master->update_data('tbl_memo', array(
                    'status_menyetujui' => $status_menyetujui+1
                ), array('nomor_memo' => $nomor_memo));
            }
            

            echo '<script>
                alert("Memo Berhasil Di Approve");window.location="index";
            </script>';
        }
    }

}
