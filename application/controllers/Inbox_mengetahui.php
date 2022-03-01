<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox_mengetahui extends CI_Controller {

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
        $cabang = $this->libraryku->tampil_user()->cabang;
        $nama_lengkap = $this->libraryku->tampil_user()->nama_lengkap;

		cek_belum_login();

        $data_memo = $this->M_master->tampil_inbox_mengetahui($departemen, $level, $nama_lengkap)->result_array();
        
        $jenis_memo = $this->M_master->tampil_data('tbl_jenis_memo')->result_array();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_inbox_mengetahui', array(
            'data_memo' => $data_memo,
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
            $data_memo = $this->M_master->tampil_memo_nopin_pba($nopin, $departemen, $level, $nama_lengkap)->result_array();
        }elseif($jenis_memo_cari == 'PELEPASAN BPKB LUNAS'){
            $data_memo = $this->M_master->tampil_memo_nopin_pbl($nopin, $departemen, $level, $nama_lengkap)->result_array();
        }elseif($jenis_memo_cari == 'PRIORITAS PELEPASAN BPKB'){
            $data_memo = $this->M_master->tampil_memo_nopin_ppb($nopin, $departemen, $level, $nama_lengkap)->result_array();
        }else{
            $data_memo = $this->M_master->tampil_memo_nopin_pba($nopin, $departemen, $level, $nama_lengkap)->result_array();
        }

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_inbox_mengetahui', array(
            'data_memo' => $data_memo,
            'jenis_memo' => $jenis_memo
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
		$this->load->view('v_inbox_mengetahui_detail', array(
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

    public function approve(){
        $note = $this->input->post('note_approve');
        $status_mengetahui = $this->input->post('status_mengetahui');
        $nomor_memo = $this->input->post('nomor_memo');
        $username = $this->input->post('username');
        $departemen = $this->input->post('departemen');

        // Cari Sisa Mengetahui
        $jumlah_mengetahui = $this->M_master->tampil_where('tbl_memo_mengetahui', array('nomor_memo' => $nomor_memo))->num_rows();
        $sisa_mengetahui = $jumlah_mengetahui - $status_mengetahui;

        // Update tbl_memo_mengetahui
        $result = $this->M_master->update_data('tbl_memo_mengetahui', array(
            'status' => 'done',
            'note_mengetahui' => $note
        ), array(
            'nomor_memo' => $nomor_memo,
            'username_mengetahui' => $username,
            'departemen_mengetahui' => $departemen
        ));

        if($result>0){
            // Update tbl_memo
            if($sisa_mengetahui == 0){ // jika sisa mengetahui sudah habis / ini adalah mengetahui terakhir
                $this->M_master->update_data('tbl_memo', array(
                    'status_mengetahui' => 0,
                    'status_menyetujui' => 1
                ), array('nomor_memo' => $nomor_memo));

            }else{ // jika mengetahui setelah ini masih ada
                $this->M_master->update_data('tbl_memo', array(
                    'status_mengetahui' => $status_mengetahui+1
                ), array('nomor_memo' => $nomor_memo));
            }
            

            echo '<script>
                alert("Memo Berhasil Di Approve");window.location="index";
            </script>';
        }
    }


    public function revisi(){
        date_default_timezone_set("Asia/Jakarta");
        $tanggal_sekarang = date('Y-m-d');

        $note = $this->input->post('note_revisi');
        $status_mengetahui = $this->input->post('status_mengetahui');
        $nomor_memo = $this->input->post('nomor_memo');
        $username = $this->input->post('username');
        $departemen = $this->input->post('departemen');

        // Cari Sisa Mengetahui
        $jumlah_mengetahui = $this->M_master->tampil_where('tbl_memo_mengetahui', array('nomor_memo' => $nomor_memo))->num_rows();
        $sisa_mengetahui = $jumlah_mengetahui - $status_mengetahui;

        // Update tbl_memo_mengetahui
        $result = $this->M_master->update_data('tbl_memo_mengetahui', array(
            'status' => 'revisi',
            'note_mengetahui' => $note
        ), array(
            'nomor_memo' => $nomor_memo,
            'username_mengetahui' => $username,
            'departemen_mengetahui' => $departemen
        ));

        if($result>0){
            // Update tbl_memo
            $this->M_master->update_data('tbl_memo', array(
                'status_mengetahui' => -1
            ), array('nomor_memo' => $nomor_memo));

            // Update tbl_log_revisi
            $this->M_master->simpan_data('tbl_log_revisi', array(
                'nomor_memo' => $nomor_memo,
                'tanggal_revisi' => $tanggal_sekarang,
                'pic_revisi' => $username.' ('.$departemen.')',
                'note_revisi' => $note
            ));
            

            echo '<script>
                alert("Permintaan Revisi Terkirim");window.location="index";
            </script>';
        }
    }


    public function reject(){
        $note = $this->input->post('note_reject');
        $status_mengetahui = $this->input->post('status_mengetahui');
        $nomor_memo = $this->input->post('nomor_memo');
        $username = $this->input->post('username');
        $departemen = $this->input->post('departemen');

        // Cari Sisa Mengetahui
        $jumlah_mengetahui = $this->M_master->tampil_where('tbl_memo_mengetahui', array('nomor_memo' => $nomor_memo))->num_rows();
        $sisa_mengetahui = $jumlah_mengetahui - $status_mengetahui;

        // Update tbl_memo_mengetahui
        $result = $this->M_master->update_data('tbl_memo_mengetahui', array(
            'status' => 'rejected',
            'note_mengetahui' => $note
        ), array(
            'nomor_memo' => $nomor_memo,
            'username_mengetahui' => $username,
            'departemen_mengetahui' => $departemen
        ));

        if($result>0){
            // Update tbl_memo
            $this->M_master->update_data('tbl_memo', array(
                'status_mengetahui' => -2
            ), array('nomor_memo' => $nomor_memo));
            

            echo '<script>
                alert("Memo Berhasil Di Reject");window.location="index";
            </script>';
        }
    }

    public function sumber_dana_pba(){
        $id_memo = $this->input->post('id_memo');
        $nomor_memo = $this->input->post('nomor_memo');
        $nopin = $this->input->post('nopin_pba');
        $sumber_dana = $this->input->post('sumber_dana_pba');

        // Update tbl_memo_dapin_pba
        $this->M_master->update_data('tbl_memo_dapin_pba', array(
            'sumber_dana' => $sumber_dana
        ), array('nomor_pinjaman' => $nopin));

        redirect('inbox_mengetahui/detail/'.$id_memo);
    }

    public function sumber_dana_pbl(){
        $id_memo = $this->input->post('id_memo');
        $nomor_memo = $this->input->post('nomor_memo');
        $nopin = $this->input->post('nopin_pbl');
        $sumber_dana = $this->input->post('sumber_dana_pbl');

        // Update tbl_memo_dapin_pbl
        $this->M_master->update_data('tbl_memo_dapin_pbl', array(
            'sumber_dana' => $sumber_dana
        ), array('nomor_pinjaman' => $nopin));

        redirect('inbox_mengetahui/detail/'.$id_memo);
    }

    public function sumber_dana_ppb(){
        $id_memo = $this->input->post('id_memo');
        $nomor_memo = $this->input->post('nomor_memo');
        $nopin = $this->input->post('nopin_ppb');
        $sumber_dana = $this->input->post('sumber_dana_ppb');

        // Update tbl_memo_dapin_ppb
        $this->M_master->update_data('tbl_memo_dapin_ppb', array(
            'sumber_dana' => $sumber_dana
        ), array('nomor_pinjaman' => $nopin));

        redirect('inbox_mengetahui/detail/'.$id_memo);
    }


    public function sumber_dana_pmb(){
        $id_memo = $this->input->post('id_memo');
        $nomor_memo = $this->input->post('nomor_memo');
        $nopin = $this->input->post('nopin_pmb');
        $sumber_dana = $this->input->post('sumber_dana_pmb');

        // Update tbl_memo_dapin_pmb
        $this->M_master->update_data('tbl_memo_dapin_pmb', array(
            'sumber_dana' => $sumber_dana
        ), array('nomor_pinjaman' => $nopin));

        redirect('inbox_mengetahui/detail/'.$id_memo);
    }


}
