<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_about extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
		$this->load->library('libraryku');
		$this->load->model(array('M_header', 'M_master'));
	}

	public function index()
	{
		cek_belum_login();
		$data_about = $this->M_master->tampil_where('tbl_about', array('id' => 1))->row_array();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_admin_about', array('data_about' => $data_about));
		$this->load->view('admin/footer');
	}

	public function update(){
		$gambar_baru = $_FILES['gambar']['name'];

		if($gambar_baru != ''){ // Jika ada gambar baru

			// Hapus Gambar Lama yang Lama
			$data_lama = $this->M_master->tampil_where('tbl_about', array('id' => 1))->row_array();
			$gambar_lama = $data_lama['gambar_halaman'];
			$target_file = './assets/file_upload/'.$gambar_lama;
			unlink($target_file);

			// Upload Gambar Baru
			$config['upload_path']          = './assets/file_upload';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 10240;
			$config['file_name']			= 'logo';

			$this->load->library('upload', $config);

			if($_FILES['gambar']['name'] != null){
				if($this->upload->do_upload('gambar')){

					$_FILES['gambar'] = $this->upload->data('file_name');

					$result = $this->M_master->update_data('tbl_about',array(
						'judul_halaman' => $this->input->post('judul_halaman'),
						'isi_halaman' => trim($this->input->post('isi_halaman')),
						'gambar_halaman' => $_FILES['gambar']
					), array('id' => 1));

					if($result>0){
						echo '<script>
							alert("Halaman About Berhasil Di Update");window.location="index"
						</script>';
					}
				}else{
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					redirect('Admin_about/index');
				}
			}

		}else{ // Jika tidak ada gambar baru
			$result = $this->M_master->update_data('tbl_about', array(
				'judul_halaman' => $this->input->post('judul_halaman'),
				'isi_halaman' => trim($this->input->post('isi_halaman'))
			), array('id' => 1));

			if($result>0){
				echo '<script>
					alert("Halaman About Berhasil Di Update");window.location="index"
				</script>';
			}
		}
	}

}
