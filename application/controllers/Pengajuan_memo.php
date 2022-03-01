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
		$nama_lengkap = $this->libraryku->tampil_user()->nama_lengkap;
		$level = $this->libraryku->tampil_user()->level;
		$cabang = $this->libraryku->tampil_user()->cabang;
		$departemen = $this->libraryku->tampil_user()->departemen;

		$jenis_memo = $this->input->post('jenis_memo');
		$data_jenis_memo = $this->M_master->jenis_memo_where(array('jenis_memo_perihal' => $jenis_memo))->row_array();

		// Mengetahui / Menyetujui
        $data_mengetahui = $this->M_master->tampil_where('tbl_jenis_memo_mengetahui', array('jenis_memo' => $jenis_memo))->result_array();

        $data_menyetujui = $this->M_master->tampil_where('tbl_jenis_memo_menyetujui', array('jenis_memo' => $jenis_memo))->result_array();

        $jumlah_mengetahui = $this->M_master->tampil_where('tbl_jenis_memo_mengetahui', array('jenis_memo' => $jenis_memo))->num_rows();

        $jumlah_menyetujui = $this->M_master->tampil_where('tbl_jenis_memo_menyetujui', array('jenis_memo' => $jenis_memo))->num_rows();

		// $jabatan = $data_jenis_memo['jenis_memo_mengetahuiJabatan'];
		// $jabatan2 = $data_jenis_memo['jenis_memo_menyetujuiJabatan'];

		// $data_level = $this->M_master->tampil_where('tbl_level', array('level' => $jabatan))->row_array();
		// $level_nilai = $data_level['level_nilai'];

		// $data_level2 = $this->M_master->tampil_where('tbl_level', array('level' => $jabatan2))->row_array();
		// $level_nilai2 = $data_level2['level_nilai'];

		$data_departemen = $this->M_master->tampil_departemen()->result_array();
		$data_user = $this->db->query("SELECT * FROM tbl_user INNER JOIN tbl_level USING(level) WHERE level != 'ADCO' AND level != 'ADCOLL' AND level != 'CMC' AND level != 'ADD-CABANG'")->result_array();

		$data_kacab = $this->M_master->tampil_where('tbl_user', array(
			'cabang' => $cabang,
			'level' => 'Branch Manager'
		))->row_array();

		$this->load->view('header');
		$this->load->view('sidebar');

		$this->load->view('v_pengajuan_memoPBA', array(
			'jenis_memo' => $jenis_memo,
			'data_jenis_memo' => $data_jenis_memo,
			'data_departemen' => $data_departemen,
			'data_user' => $data_user,
			'data_kacab' => $data_kacab,
			// 'level_nilai' => $level_nilai,
			// 'level_nilai2' => $level_nilai2
			'data_mengetahui' => $data_mengetahui,
			'data_menyetujui' => $data_menyetujui,
			'jumlah_mengetahui' => $jumlah_mengetahui,
			'jumlah_menyetujui' => $jumlah_menyetujui
		));
			
		$this->load->view('footer');
	}

	public function cek_nomor_memo(){
		$nomor_memo = $this->input->post('no_memo');
		$cek_nomor = $this->M_master->tampil_where('tbl_memo', array('nomor_memo' => $nomor_memo))->num_rows();

		if($cek_nomor > 0){
			echo '<span style="color:red; font-weight:bold">Nomor Memo Sudah Digunakan Sebelumnya, Ganti No.Memo !</span>';
			echo '<input type="text" value="1" id="cek_nomor_memo" hidden>';
		}else{
			echo '<input type="text" value="0" id="cek_nomor_memo" hidden>';
		}
	}


	public function kirim_laporan(){
		cek_belum_login();
		date_default_timezone_set("Asia/Jakarta");
		$tanggal_sekarang = date('Y-m-d');
		$level = $this->libraryku->tampil_user()->level;
    	$cabang = $this->libraryku->tampil_user()->cabang;
		$nomor_memo = $this->input->post('nomor_memo');

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
			'status_menyetujui' => 0,
			'note_mengetahui' => $this->input->post('note_mengetahui')
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
			for ($i=0; $i < sizeof($cc) ; $i++) { 
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

			}elseif($perihal == 'PEMINJAMAN BPKB'){
				$nomor_pinjaman = $this->input->post('nomor_pinjaman');
				for ($i=0; $i < sizeof($nomor_pinjaman) ; $i++) { 
					$this->M_master->simpan_data('tbl_memo_dapin_pmb', array(
						'nomor_memo' => $this->input->post('nomor_memo'),
						'nomor_pinjaman' => $nomor_pinjaman[$i],
						'nama_nasabah' => $this->input->post('nama_nasabah')[$i],
						'nomor_polisi' => $this->input->post('nomor_polisi')[$i],
						'nomor_bpkb' => $this->input->post('nomor_bpkb')[$i],
						'sumber_dana' => $this->input->post('sumber_dana')[$i],
						'keperluan' => $this->input->post('keperluan')[$i]
					));
				}

			}elseif($perihal == 'MEMO GENERAL'){
				$this->M_master->simpan_data('tbl_memo_general', array(
					'nomor_memo' => $this->input->post('nomor_memo'),
					'isi_memo_general' => $this->input->post('isi_memo_general')
				));
			}


			// Simpan Mengetahui--------------------------------------------------
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

			
			// Simpan File Memo
			$folderUpload = "./file_upload/".$tanggal_sekarang;

			# periksa apakah folder tersedia
			if (!is_dir($folderUpload)) {
				# jika tidak maka folder harus dibuat terlebih dahulu
				mkdir($folderUpload, 0777, $rekursif = true);
			}

			// ref_no diambil untuk nama file nya (pembeda antar pengajuan)
			$refno = $nomor_memo;

			$data = [];
			$count = count($_FILES['files']['name']);
			for($i=0; $i<$count; $i++){
				if(!empty($_FILES['files']['name'][$i])){
					$_FILES['file']['name'] = $_FILES['files']['name'][$i];
					$_FILES['file']['type'] = $_FILES['files']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['files']['error'][$i];
					$_FILES['file']['size'] = $_FILES['files']['size'][$i];

					$config['upload_path'] = $folderUpload;
					$config['allowed_types'] = 'jpg|png|jpeg|pdf';
					$config['max_size'] = 0;
					// $config['file_name'] = $_FILES['files']['name'][$i];
					$config['file_name'] = date('Y-m-d').'-'.$refno.'-'.substr(md5(rand()),0,5).'-'.$i;
					// $config['encrypt_name'] = TRUE;

					$this->load->library('upload', $config);

					if($this->upload->do_upload('file')){
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];
						$image[$i] = $filename;
						$content = [
							'nomor_memo' => $nomor_memo,
							'file' => $image[$i],
							'nama_file' => $this->input->post('nama_file')[$i]
						];
						$this->M_master->simpan_data('tbl_memo_file', $content);
					}
				}
			}

			// Alert Berhasil
			echo '<script>
				alert("Memo Berhasil Dikirim");window.location="../home";
			</script>';

		}
	}

}
