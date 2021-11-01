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
        $data_format_memo = $this->M_master->tampil_format_memo()->result_array();

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
        $data_user = $this->M_master->tampil_user()->result_array();

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
            'jenis_memo_mengetahuiDepartemen' => $this->input->post('mengetahui_departemen'),
            'jenis_memo_mengetahuiJabatan' => $this->input->post('mengetahui_jabatan'),
            'jenis_memo_mengetahuiUsername' => $this->input->post('mengetahui_nama'),
            'jenis_memo_menyetujuiDepartemen' => $this->input->post('menyetujui_departemen'),
            'jenis_memo_menyetujuiJabatan' => $this->input->post('menyetujui_jabatan'),
            'jenis_memo_menyetujuiUsername' => $this->input->post('menyetujui_nama')
        ));

        if($result > 0){
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

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_edit_format_memo', array(
            'data_departemen' => $data_departemen,
            'data_user' => $data_user,
            'data_jenis_memo' => $data_jenis_memo
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
            'jenis_memo_mengetahuiDepartemen' => $this->input->post('mengetahui_departemen'),
            'jenis_memo_mengetahuiJabatan' => $this->input->post('mengetahui_jabatan'),
            'jenis_memo_mengetahuiUsername' => $this->input->post('mengetahui_nama'),
            'jenis_memo_menyetujuiDepartemen' => $this->input->post('menyetujui_departemen'),
            'jenis_memo_menyetujuiJabatan' => $this->input->post('menyetujui_jabatan'),
            'jenis_memo_menyetujuiUsername' => $this->input->post('menyetujui_nama')
        ), array('jenis_memo_id' => $id));

        if($result > 0){
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
