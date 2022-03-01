<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_user_memo extends CI_Controller {

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

        $user = $this->db->query("SELECT DISTINCT user FROM tbl_user_memo")->result_array();
        

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_master_user_memo', array('data_user' => $user));
		$this->load->view('footer');
	}

    public function tambah_user_memo(){
        cek_belum_login();

        $data_departemen = $this->M_master->tampil_departemen()->result_array();
        $data_jenis_memo = $this->M_master->tampil_data('tbl_jenis_memo')->result_array();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_tambah_user_memo', array(
            'data_departemen' => $data_departemen,
            'data_jenis_memo' => $data_jenis_memo
        ));
		$this->load->view('footer');
    }

    
    public function simpan(){

        // Cek Apakah User Sudah di daftarkan sebelumnya
        $user = $this->input->post('user');
        $cek_user = $this->M_master->tampil_where('tbl_user_memo', array('user' => $user))->num_rows();

        if($cek_user > 0){
            echo '<script>
                alert("Maaf user ini telah terdaftar ! Jika ingin menambahkan akses memo pada user ini, silahkan gunakan fitur edit");window.location="index";
            </script>';

            exit;
        }

        // Simpan Multiple
        $jenis_memo = $this->input->post('jenis_memo');

        for ($i=0; $i<sizeof($jenis_memo); $i++) { 
            $this->M_master->simpan_data('tbl_user_memo', array(
                'user' => $this->input->post('user'),
                'jenis_memo' => $jenis_memo[$i]
            ));
        }

        echo '<script>
                alert("Relasi User-Memo Tersimpan");window.location="index";
            </script>';
	}


    public function edit($user){
        cek_belum_login();

        $data_departemen = $this->M_master->tampil_departemen()->result_array();
        $data_jenis_memo = $this->M_master->tampil_data('tbl_jenis_memo')->result_array();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_edit_user_memo', array(
            'data_departemen' => $data_departemen,
            'data_jenis_memo' => $data_jenis_memo,
            'user' => $user
        ));
		$this->load->view('footer');
    }


    public function update(){

        // Hapus Relasi Memo Sebelumnya
        $user = $this->input->post('user');
        $this->M_master->hapus_data('tbl_user_memo', array('user' => $user));

		// Simpan Multiple
        $jenis_memo = $this->input->post('jenis_memo');

        for ($i=0; $i<sizeof($jenis_memo); $i++) { 
            $this->M_master->simpan_data('tbl_user_memo', array(
                'user' => $this->input->post('user'),
                'jenis_memo' => $jenis_memo[$i]
            ));
        }

        echo '<script>
                alert("Relasi User-Memo Berhasil Di-Update");window.location="index";
            </script>';
	}


    public function hapus($user){
        $result = $this->M_master->hapus_data('tbl_user_memo', array('user'=>$user));

        if($result > 0){
            echo '<script>
                alert("Relasi Memo-User Berhasil Dihapus");window.location="../index";
            </script>';
        }
    }

}
