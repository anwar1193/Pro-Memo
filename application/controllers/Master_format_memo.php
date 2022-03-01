<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_format_memo extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
		$this->load->library('libraryku');
		$this->load->model(array('M_header', 'M_master'));
	}

	public function index()
	{
		cek_belum_login();
        $level = $this->libraryku->tampil_user()->level;
        $departemen = $this->libraryku->tampil_user()->departemen;

        if($level == 'admin'){
            $data_format_memo = $this->M_master->tampil_format_memo()->result_array();
        }else{
            $data_format_memo = $this->M_master->tampil_where('tbl_jenis_memo', array('jenis_memo_owner' => $departemen))->result_array();
        }
        

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_master_format_memo', array(
            'data_format_memo' => $data_format_memo
        ));
		$this->load->view('footer');
	}

    public function tambah_format(){
        cek_belum_login();

        $data_departemen = $this->M_master->tampil_departemen()->result_array();
        $data_user = $this->db->query("SELECT * FROM tbl_user INNER JOIN tbl_level USING(level) WHERE level != 'ADCO' AND level != 'ADCOLL' AND level != 'CMC' AND level != 'ADD-CABANG'")->result_array();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_tambah_format_memo', array(
            'data_departemen' => $data_departemen,
            'data_user' => $data_user
        ));
		$this->load->view('footer');
    }

    public function simpan_format(){
        $result = $this->M_master->simpan_data('tbl_jenis_memo', array(
            'jenis_memo_perihal' => $this->input->post('jenis_memo'),
            'jenis_memo_text1' => $this->input->post('text1'),
            'jenis_memo_text2' => $this->input->post('text2'),
            'jenis_memo_kepada' => $this->input->post('kepada'),
            'jenis_memo_cc' => $this->input->post('cc'),
            'jenis_memo_owner' => $this->input->post('owner')
        ));

        if($result > 0){

            // Simpan Mengetahui---------------------------------------------------
			$departemen_mengetahui = $this->input->post('departemen_mengetahui');
			for ($i=0; $i < sizeof($departemen_mengetahui) ; $i++) { 
				$this->M_master->simpan_data('tbl_jenis_memo_mengetahui', array(
					'jenis_memo' => $this->input->post('jenis_memo'),
					'departemen_mengetahui' => $departemen_mengetahui[$i],
					'jabatan_mengetahui' => $this->input->post('jabatan_mengetahui')[$i],
					'username_mengetahui' => $this->input->post('username_mengetahui')[$i],
					'urutan_mengetahui' => $this->input->post('urutan_mengetahui')[$i]
				));
			}

			// hapus sampah mengetahui hasil looping
			$this->db->delete('tbl_jenis_memo_mengetahui', array('username_mengetahui' => ''));

            // Simpan Menyetujui---------------------------------------------------
			$departemen_menyetujui = $this->input->post('departemen_menyetujui');
			for ($i=0; $i < sizeof($departemen_menyetujui) ; $i++) { 
				$this->M_master->simpan_data('tbl_jenis_memo_menyetujui', array(
					'jenis_memo' => $this->input->post('jenis_memo'),
					'departemen_menyetujui' => $departemen_menyetujui[$i],
					'jabatan_menyetujui' => $this->input->post('jabatan_menyetujui')[$i],
					'username_menyetujui' => $this->input->post('username_menyetujui')[$i],
					'urutan_menyetujui' => $this->input->post('urutan_menyetujui')[$i]
				));
			}

			// hapus sampah menyetujui hasil looping
			$this->db->delete('tbl_jenis_memo_menyetujui', array('username_menyetujui' => ''));

            echo '<script>
                alert("Format Memo Tersimpan");window.location="index";
            </script>';
        }
    }


    public function edit($id){
        cek_belum_login();

        $data_departemen = $this->M_master->tampil_departemen()->result_array();
        $data_user = $this->M_master->tampil_user()->result_array();
        $data_jenis_memo = $this->M_master->jenis_memo_where(array('jenis_memo_id' => $id))->row_array();

        $jenis_memo = $data_jenis_memo['jenis_memo_perihal'];

        // Mengetahui / Menyetujui
        $data_mengetahui = $this->M_master->tampil_where('tbl_jenis_memo_mengetahui', array('jenis_memo' => $jenis_memo))->result_array();

        $data_menyetujui = $this->M_master->tampil_where('tbl_jenis_memo_menyetujui', array('jenis_memo' => $jenis_memo))->result_array();

        $jumlah_mengetahui = $this->M_master->tampil_where('tbl_jenis_memo_mengetahui', array('jenis_memo' => $jenis_memo))->num_rows();

        $jumlah_menyetujui = $this->M_master->tampil_where('tbl_jenis_memo_menyetujui', array('jenis_memo' => $jenis_memo))->num_rows();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_edit_format_memo', array(
            'data_departemen' => $data_departemen,
            'data_user' => $data_user,
            'data_jenis_memo' => $data_jenis_memo,
            'data_mengetahui' => $data_mengetahui,
			'data_menyetujui' => $data_menyetujui,
			'jumlah_mengetahui' => $jumlah_mengetahui,
			'jumlah_menyetujui' => $jumlah_menyetujui
        ));
		$this->load->view('footer');
    }

    public function update_format(){
        $id = $this->input->post('jenis_memo_id');
        $result = $this->M_master->update_data('tbl_jenis_memo', array(
            'jenis_memo_perihal' => $this->input->post('jenis_memo'),
            'jenis_memo_text1' => $this->input->post('text1'),
            'jenis_memo_text2' => $this->input->post('text2'),
            'jenis_memo_kepada' => $this->input->post('kepada'),
            'jenis_memo_cc' => $this->input->post('cc'),
            'jenis_memo_owner' => $this->input->post('owner')
        ), array('jenis_memo_id' => $id));

        if($result > 0){
            $jenis_memo = $this->input->post('jenis_memo');

            // Simpan Mengetahui------------------------------------------
            $this->M_master->hapus_data('tbl_jenis_memo_mengetahui', array('jenis_memo'=>$jenis_memo));
			
			$departemen_mengetahui = $this->input->post('departemen_mengetahui');
			for ($i=0; $i < sizeof($departemen_mengetahui) ; $i++) { 
				$this->M_master->simpan_data('tbl_jenis_memo_mengetahui', array(
					'jenis_memo' => $this->input->post('jenis_memo'),
					'departemen_mengetahui' => $departemen_mengetahui[$i],
					'jabatan_mengetahui' => $this->input->post('jabatan_mengetahui')[$i],
					'username_mengetahui' => $this->input->post('username_mengetahui')[$i],
					'urutan_mengetahui' => $this->input->post('urutan_mengetahui')[$i]
				));
			}

			// hapus sampah pengajuan hasil looping
			$this->db->delete('tbl_jenis_memo_mengetahui', array('username_mengetahui' => ''));


            // Simpan Menyetujui------------------------------------------
            $this->M_master->hapus_data('tbl_jenis_memo_menyetujui', array('jenis_memo'=>$jenis_memo));
			
			$departemen_menyetujui = $this->input->post('departemen_menyetujui');
			for ($i=0; $i < sizeof($departemen_menyetujui) ; $i++) { 
				$this->M_master->simpan_data('tbl_jenis_memo_menyetujui', array(
					'jenis_memo' => $this->input->post('jenis_memo'),
					'departemen_menyetujui' => $departemen_menyetujui[$i],
					'jabatan_menyetujui' => $this->input->post('jabatan_menyetujui')[$i],
					'username_menyetujui' => $this->input->post('username_menyetujui')[$i],
					'urutan_menyetujui' => $this->input->post('urutan_menyetujui')[$i]
				));
			}

			// hapus sampah pengajuan hasil looping
			$this->db->delete('tbl_jenis_memo_menyetujui', array('username_menyetujui' => ''));

            echo '<script>
                alert("Format Memo Berhasil Diupdate");window.location="index";
            </script>';
        }
    }

    public function hapus($id){
        $result = $this->M_master->hapus_data('tbl_jenis_memo', array('jenis_memo_id'=>$id));

        if($result > 0){
            echo '<script>
                alert("Format Memo Berhasil Dihapus");window.location="../index";
            </script>';
        }
    }

}
