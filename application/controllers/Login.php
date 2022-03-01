<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
		$this->load->library('libraryku');
		$this->load->model('M_login');
	}

	public function index()
	{
		cek_sudah_login();
		$this->load->view('v_login');
	}

	public function ke_home(){
		redirect('home');
	}

	public function proses(){
		date_default_timezone_set("Asia/Jakarta");
		$username = $this->input->post('username');
		$pwd = $this->input->post('password');
		$password = sha1($pwd);

		$result = $this->M_login->proses('tbl_user',array(
			'username' => $username,
			'password' => $password
		));

		$cek = $result->num_rows();
		$row = $result->row_array();
		$sedang_login = $row['sedang_login'];
		$id_user = $row['id'];

		if($sedang_login == 'ya'){ // Jika user tsb sedang login

			echo '<script>alert("Akun Anda Sedang Login Di Device Lain atau Lupa Logout, Silahkan Hubungi Tim Aplikasi");window.location="index"</script>';

		}else{ // jika user tidak sedang login, lanjut proses

			if($cek>0){	
				$data_login = array(
					'id' => $row['id'],
					'nama_lengkap' => $row['nama_lengkap'],
					'level' => $row['level']
				);
				$this->session->set_userdata($data_login);

				// Ubah status jadi sedang login
				$this->db->query("UPDATE tbl_user SET sedang_login='ya' WHERE id=$id_user");
	
				echo '<script>
					alert("Login Berhasil");window.location="ke_home";
				</script>';
	
			}else{
				echo '<script>
					alert("Kombinasi Username & Password Yang Anda Masukkan Salah");window.location="../login";
				</script>';
			}

		}

		
	}

	public function logout(){
		$data_login = array('id','nama_lengkap','level');

		// Ubah status sedang_login di tbl_user
		$id_user = $this->libraryku->tampil_user()->id;
		$this->db->query("UPDATE tbl_user SET sedang_login='' WHERE id=$id_user");

		$this->session->unset_userdata($data_login);
		redirect('login');
	}


	public function hapus_session(){
		date_default_timezone_set("Asia/Jakarta");
		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		$password = sha1($pass);

		$result = $this->M_login->proses('tbl_user',array(
			'username' => $username,
			'password' => $password
		));

		$cek = $result->num_rows();
		$row_login = $result->row_array();

		$sedang_login = $row_login['sedang_login'];
		$id_user = $row_login['id'];

		if($cek>0){ //jika username & password benar

			if($sedang_login == 'ya'){ //jika user tsb sedang login

				// UPDATE tbl_user
				$this->db->query("UPDATE tbl_user SET sedang_login='' WHERE username='$username'");

				echo '<script>alert("Hapus Session Login Berhasil, Silahkan Login Kembali");window.location="index"</script>';

			}else{ //jika user tsb tidak sedang login
				echo '<script>alert("Akun Anda Tidak Sedang Login, Silahkan Login Kembali");window.location="index"</script>';
			}	


		}else{ //jika username & password salah

			echo '<script>alert("Kombinasi Username & Password Yang Anda Masukan Salah");window.location="index"</script>';
			
		}

	}

}
