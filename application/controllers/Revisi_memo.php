<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Revisi_memo extends CI_Controller {

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
            'bagian' => $identitas
        ))->result_array();

        $data_memo = $this->db->query("SELECT * FROM tbl_memo WHERE cabang='$cabang' AND bagian='$identitas' AND status_mengetahui=-1")->result_array();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_revisi_memo', array(
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
		$this->load->view('v_revisi_memo_d', array(
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

    public function edit($id_memo){
        cek_belum_login();
		$nama_lengkap = $this->libraryku->tampil_user()->nama_lengkap;
		$level = $this->libraryku->tampil_user()->level;
		$cabang = $this->libraryku->tampil_user()->cabang;
		$departemen = $this->libraryku->tampil_user()->departemen;

        $data_memo = $this->M_master->tampil_where('tbl_memo', array('id_memo' => $id_memo))->row_array();

		$jenis_memo = $data_memo['perihal'];
        $nomor_memo = $data_memo['nomor_memo'];

        $data_memo_kepada = $this->M_master->tampil_where('tbl_memo_kepada', array('nomor_memo'=>$nomor_memo))->result_array();
        $data_memo_cc = $this->M_master->tampil_where('tbl_memo_cc', array('nomor_memo'=>$nomor_memo))->result_array();

        // Data Pinjaman
        $data_dapin_pba = $this->M_master->tampil_where('tbl_memo_dapin_pba', array('nomor_memo'=>$nomor_memo))->result_array();
        $data_dapin_pbl = $this->M_master->tampil_where('tbl_memo_dapin_pbl', array('nomor_memo'=>$nomor_memo))->result_array();
        $data_dapin_ppb = $this->M_master->tampil_where('tbl_memo_dapin_ppb', array('nomor_memo'=>$nomor_memo))->result_array();

        // Mengetahui / Menyetujui
        $data_mengetahui = $this->M_master->tampil_where('tbl_memo_mengetahui', array('nomor_memo' => $nomor_memo))->result_array();
        $data_menyetujui = $this->M_master->tampil_where('tbl_memo_menyetujui', array('nomor_memo' => $nomor_memo))->result_array();
        $jumlah_mengetahui = $this->M_master->tampil_where('tbl_memo_mengetahui', array('nomor_memo' => $nomor_memo))->num_rows();
        $jumlah_menyetujui = $this->M_master->tampil_where('tbl_memo_menyetujui', array('nomor_memo' => $nomor_memo))->num_rows();

		$data_jenis_memo = $this->M_master->jenis_memo_where(array('jenis_memo_perihal' => $jenis_memo))->row_array();
		$data_departemen = $this->M_master->tampil_departemen()->result_array();
		$data_user = $this->M_master->tampil_user()->result_array();

		$data_kacab = $this->M_master->tampil_where('tbl_user', array(
			'cabang' => $cabang,
			'level' => 'Branch Manager'
		))->row_array();

		$this->load->view('header');
		$this->load->view('sidebar');

		if($jenis_memo == 'MEMO GENERAL'){
			$this->load->view('v_pengajuan_memoGeneral', array(
				'jenis_memo' => $jenis_memo,
				'data_jenis_memo' => $data_jenis_memo,
				'data_departemen' => $data_departemen,
				'data_user' => $data_user,
				'data_memo' => $data_memo,
				'data_memo_kepada' => $data_memo_kepada,
				'data_memo_cc' => $data_memo_cc,
				'data_dapin_pba' => $data_dapin_pba,
				'data_dapin_pbl' => $data_dapin_pbl,
				'data_dapin_ppb' => $data_dapin_ppb,
				'data_mengetahui' => $data_mengetahui,
				'data_menyetujui' => $data_menyetujui,
                'jumlah_mengetahui' => $jumlah_mengetahui,
				'jumlah_menyetujui' => $jumlah_menyetujui
			));
		}else{
			$this->load->view('v_revisi_memoPBA', array(
				'jenis_memo' => $jenis_memo,
				'data_jenis_memo' => $data_jenis_memo,
				'data_departemen' => $data_departemen,
				'data_user' => $data_user,
				'data_kacab' => $data_kacab,
				'data_memo' => $data_memo,
				'data_memo_kepada' => $data_memo_kepada,
				'data_memo_cc' => $data_memo_cc,
				'data_dapin_pba' => $data_dapin_pba,
				'data_dapin_pbl' => $data_dapin_pbl,
				'data_dapin_ppb' => $data_dapin_ppb,
				'data_mengetahui' => $data_mengetahui,
				'data_menyetujui' => $data_menyetujui,
                'jumlah_mengetahui' => $jumlah_mengetahui,
				'jumlah_menyetujui' => $jumlah_menyetujui
			));
		}
			
		$this->load->view('footer');
    }

    public function update(){
		cek_belum_login();
		date_default_timezone_set("Asia/Jakarta");
		$tanggal_sekarang = date('Y-m-d');
		$level = $this->libraryku->tampil_user()->level;
    	$cabang = $this->libraryku->tampil_user()->cabang;

        $id_memo = $this->input->post('id_memo');
        $nomor_memo = $this->input->post('nomor_memo');

		// Update Memo Utama
		$result = $this->M_master->update_data('tbl_memo', array(
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
		), array('id_memo' => $id_memo));

		if($result > 0){

			// Simpan Kepada ---------------------------------------------------------------------------------
            $this->M_master->hapus_data('tbl_memo_kepada', array('nomor_memo'=>$nomor_memo));
			$kepada = $this->input->post('kepada');
			for ($i=0; $i < sizeof($kepada) ; $i++) { 
				$this->M_master->simpan_data('tbl_memo_kepada', array(
					'nomor_memo' => $this->input->post('nomor_memo'),
					'kepada' => $kepada[$i]
				));
			}

			// Simpan CC ---------------------------------------------------------------------------------
            $this->M_master->hapus_data('tbl_memo_cc', array('nomor_memo'=>$nomor_memo));
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
                $this->M_master->hapus_data('tbl_memo_dapin_pba', array('nomor_memo'=>$nomor_memo));
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
                $this->M_master->hapus_data('tbl_memo_dapin_pbl', array('nomor_memo'=>$nomor_memo));
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
                $this->M_master->hapus_data('tbl_memo_dapin_ppb', array('nomor_memo'=>$nomor_memo));
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
            $this->M_master->hapus_data('tbl_memo_mengetahui', array('nomor_memo'=>$nomor_memo));
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
            $this->M_master->hapus_data('tbl_memo_menyetujui', array('nomor_memo'=>$nomor_memo));
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
				alert("Memo Berhasil Diupdate");window.location="../memo_terkirim";
			</script>';

		}
	}

}
