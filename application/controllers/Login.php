<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
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
		$username = $this->input->post('username');
		$pwd = $this->input->post('password');
		$password = sha1($pwd);

		$result = $this->M_login->proses('tbl_user',array(
			'username' => $username,
			'password' => $password
		));

		$cek = $result->num_rows();

		if($cek>0){	
			$row = $result->row_array();
			$data_login = array(
				'id' => $row['id'],
				'nama_lengkap' => $row['nama_lengkap'],
				'level' => $row['level']
			);
			$this->session->set_userdata($data_login);

			echo '<script>
				alert("Login Berhasil");window.location="ke_home";
			</script>';

		}else{
			echo '<script>
				alert("Kombinasi Username & Password Yang Anda Masukkan Salah");window.location="../login";
			</script>';
		}
	}

	public function logout(){
		$data_login = array('id','nama_lengkap','level');
		$this->session->unset_userdata($data_login);
		redirect('login');
	}
}
