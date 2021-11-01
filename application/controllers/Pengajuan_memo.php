<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_memo extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model(array('M_header', 'M_master'));
        $this->load->library('Libraryku');
        $this->load->helper('helperku');
    }

	public function index()
	{
		cek_belum_login();
		$jenis_memo = $this->input->post('jenis_memo');
		$data_jenis_memo = $this->M_master->jenis_memo_where(array('jenis_memo_perihal' => $jenis_memo))->row_array();
		$data_departemen = $this->M_master->tampil_departemen()->result_array();
		$data_user = $this->M_master->tampil_user()->result_array();

		$this->load->view('header');
		$this->load->view('sidebar');

		if($jenis_memo == 'MEMO GENERAL'){
			$this->load->view('v_pengajuan_memoGeneral', array(
				'jenis_memo' => $jenis_memo,
				'data_jenis_memo' => $data_jenis_memo,
				'data_departemen' => $data_departemen,
				'data_user' => $data_user
			));
		}else{
			$this->load->view('v_pengajuan_memoPBA', array(
				'jenis_memo' => $jenis_memo,
				'data_jenis_memo' => $data_jenis_memo,
				'data_departemen' => $data_departemen,
				'data_user' => $data_user
			));
		}
			
		$this->load->view('footer');
	}


	public function kirim_laporan(){
		cek_belum_login();
		date_default_timezone_set("Asia/Jakarta");
		$tanggal_sekarang = date('Y-m-d');
		$level = $this->libraryku->tampil_user()->level;
    	$cabang = $this->libraryku->tampil_user()->cabang;

		// Simpan Memo Utama
		$result = $this->M_master->simpan_data('tbl_memo', array(
			'nomor_memo' => $this->input->post('nomor_memo'),
			'cabang' => $cabang,
			'bagian' => $level,
			'tanggal' => $tanggal_sekarang,
			'perihal' => $this->input->post('perihal'),
			'text1' => $this->input->post('text1'),
			'text2' => $this->input->post('text2'),
			'dibuat_oleh' => $this->input->post('dibuat_oleh'),
			'status_mengetahui' => 1,
			'status_menyetujui' => 0
		));

		if($result > 0){

			// Simpan Kepada ---------------------------------------------------------------------------------
			$kepada = $this->input->post('kepada');
			for ($i=0; $i < sizeof($kepada) ; $i++) { 
				$this->M_master->simpan_data('tbl_memo_kepada', array(
					'nomor_memo' => $this->input->post('nomor_memo'),
					'kepada' => $kepada[$i]
				));
			}

			// Simpan CC ---------------------------------------------------------------------------------
			$cc = $this->input->post('cc');
			for ($i=0; $i < sizeof($kepada) ; $i++) { 
				$this->M_master->simpan_data('tbl_memo_cc', array(
					'nomor_memo' => $this->input->post('nomor_memo'),
					'cc' => $cc[$i]
				));
			}

			// Simpan Data Pinjaman ---------------------------------------------------------------------------------
			$perihal = $this->input->post('perihal');

			if($perihal == 'PELEPASAN BPKB AYDA'){
				$nomor_pinjaman = $this->input->post('nomor_pinjaman');
				for ($i=0; $i < sizeof($nomor_pinjaman) ; $i++) { 
					$this->M_master->simpan_data('tbl_memo_dapin_pba', array(
						'nomor_memo' => $this->input->post('nomor_memo'),
						'nomor_pinjaman' => $nomor_pinjaman[$i],
						'nama_nasabah' => $this->input->post('nama_nasabah')[$i],
						'status_pinjaman' => $this->input->post('status_pinjaman')[$i],
						'sumber_dana' => $this->input->post('sumber_dana')[$i],
						'keterangan' => $this->input->post('keterangan')[$i]
					));
				}

			}elseif($perihal == 'PELEPASAN BPKB LUNAS'){
				$nomor_pinjaman = $this->input->post('nomor_pinjaman');
				for ($i=0; $i < sizeof($nomor_pinjaman) ; $i++) { 
					$this->M_master->simpan_data('tbl_memo_dapin_pbl', array(
						'nomor_memo' => $this->input->post('nomor_memo'),
						'nomor_pinjaman' => $nomor_pinjaman[$i],
						'nama_nasabah' => $this->input->post('nama_nasabah')[$i],
						'tanggal_lunas' => $this->input->post('tanggal_lunas')[$i],
						'status_lunas' => $this->input->post('status_lunas')[$i],
						'status_hold_denda' => $this->input->post('status_hold_denda')[$i],
						'sumber_dana' => $this->input->post('sumber_dana')[$i],
						'keterangan' => $this->input->post('keterangan')[$i]
					));
				}

			}elseif($perihal == 'PRIORITAS PELEPASAN BPKB'){
				$nomor_pinjaman = $this->input->post('nomor_pinjaman');
				for ($i=0; $i < sizeof($nomor_pinjaman) ; $i++) { 
					$this->M_master->simpan_data('tbl_memo_dapin_ppb', array(
						'nomor_memo' => $this->input->post('nomor_memo'),
						'nomor_pinjaman' => $nomor_pinjaman[$i],
						'nama_nasabah' => $this->input->post('nama_nasabah')[$i],
						'os_pokok' => $this->input->post('os_pokok')[$i],
						'parameter' => $this->input->post('parameter')[$i],
						'sumber_dana' => $this->input->post('sumber_dana')[$i],
						'keterangan' => $this->input->post('keterangan')[$i]
					));
				}
			}


			// Simpan Mengetahui--------------------------------------------------------------------------
			$departemen_mengetahui = $this->input->post('departemen_mengetahui');
			for ($i=0; $i < sizeof($departemen_mengetahui) ; $i++) { 
				$this->M_master->simpan_data('tbl_memo_mengetahui', array(
					'nomor_memo' => $this->input->post('nomor_memo'),
					'departemen_mengetahui' => $departemen_mengetahui[$i],
					'jabatan_mengetahui' => $this->input->post('jabatan_mengetahui')[$i],
					'username_mengetahui' => $this->input->post('username_mengetahui')[$i],
					'urutan_mengetahui' => $this->input->post('urutan_mengetahui')[$i],
					'status' => ''
				));
			}

			// hapus sampah pengajuan hasil looping
			$this->db->delete('tbl_memo_mengetahui', array('username_mengetahui' => ''));


			// Simpan Menyetujui--------------------------------------------------------------------------
			$departemen_menyetujui = $this->input->post('departemen_menyetujui');
			for ($i=0; $i < sizeof($departemen_menyetujui) ; $i++) { 
				$this->M_master->simpan_data('tbl_memo_menyetujui', array(
					'nomor_memo' => $this->input->post('nomor_memo'),
					'departemen_menyetujui' => $departemen_menyetujui[$i],
					'jabatan_menyetujui' => $this->input->post('jabatan_menyetujui')[$i],
					'username_menyetujui' => $this->input->post('username_menyetujui')[$i],
					'urutan_menyetujui' => $this->input->post('urutan_menyetujui')[$i],
					'status' => ''
				));
			}

			// hapus sampah pengajuan hasil looping
			$this->db->delete('tbl_memo_menyetujui', array('username_menyetujui' => ''));


			// Alert Berhasil
			echo '<script>
				alert("Memo Berhasil Dikirim");window.location="../home";
			</script>';

		}
	}

}
