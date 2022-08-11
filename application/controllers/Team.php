<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
		$this->load->library('libraryku');
		$this->load->model(array('M_header', 'M_master'));
	}

	public function index()
	{
		cek_belum_login();
        $data_team = $this->M_master->tampil_data('tbl_team')->result_array();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_team', array('data_team' => $data_team));
		$this->load->view('admin/footer');
	}

    public function tambah(){
        cek_belum_login();
        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_team_add');
		$this->load->view('admin/footer');
    }

    public function simpan(){
        cek_belum_login();
        date_default_timezone_set("Asia/Jakarta");
        $nama_gambar = 'team-'.date("Ymd").'-'.rand();
        
        // Upload Gambar Baru
        $config['upload_path']          = './assets/file_upload/team';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10240;
        $config['file_name']			= $nama_gambar;

        $this->load->library('upload', $config);

        if($_FILES['gambar']['name'] != null){
            if($this->upload->do_upload('gambar')){

                $_FILES['gambar'] = $this->upload->data('file_name');

                $result = $this->M_master->simpan_data('tbl_team',array(
                    'nama' => $this->input->post('nama'),
                    'jabatan' => $this->input->post('jabatan'),
                    'keterangan' => trim($this->input->post('keterangan')),
                    'gambar' => $_FILES['gambar']
                ));

                if($result>0){
                    echo '<script>
                        alert("Team Berhasil Ditambahkan !");window.location="index"
                    </script>';
                }
            }else{
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('team/index');
            }
        }

    }


    public function hapus($id){
        // Hapus Gambar Lama yang Lama dari folder
        $data_lama = $this->M_master->tampil_where('tbl_team', array('id' => $id))->row_array();
        $gambar_lama = $data_lama['gambar'];
        $target_file = './assets/file_upload/team/'.$gambar_lama;
        unlink($target_file);

        $result = $this->M_master->hapus_data('tbl_team', array('id' => $id));
        if($result > 0){
            echo '<script>
                alert("Data Team berhasil dihapus");window.location="../index";
            </script>';
        }
    }


    public function edit($id){
        cek_belum_login();
        $data_team = $this->M_master->tampil_where('tbl_team', array('id' => $id))->row_array();

        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_team_edit', array('data_team' => $data_team));
		$this->load->view('admin/footer');
    }


    public function update(){
		$gambar_baru = $_FILES['gambar']['name'];
        $id = $this->input->post('id');
        $nama_gambar = 'team-'.date("Ymd").'-'.rand();

		if($gambar_baru != ''){ // Jika ada gambar baru

			// Hapus Gambar Lama yang Lama
			$data_lama = $this->M_master->tampil_where('tbl_team', array('id' => $id))->row_array();
			$gambar_lama = $data_lama['gambar'];
			$target_file = './assets/file_upload/team/'.$gambar_lama;
			unlink($target_file);

			// Upload Gambar Baru
			$config['upload_path']          = './assets/file_upload/team';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 10240;
			$config['file_name']			= $nama_gambar;

			$this->load->library('upload', $config);

			if($_FILES['gambar']['name'] != null){
				if($this->upload->do_upload('gambar')){

					$_FILES['gambar'] = $this->upload->data('file_name');

					$result = $this->M_master->update_data('tbl_team',array(
						'nama' => $this->input->post('nama'),
						'jabatan' => $this->input->post('jabatan'),
						'keterangan' => trim($this->input->post('keterangan')),
						'gambar' => $_FILES['gambar']
					), array('id' => $id));

					if($result>0){
						echo '<script>
							alert("Data Team Berhasil Di Update");window.location="index"
						</script>';
					}
				}else{
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					redirect('team/index');
				}
			}

		}else{ // Jika tidak ada gambar baru
			$result = $this->M_master->update_data('tbl_team', array(
				'nama' => $this->input->post('nama'),
				'jabatan' => $this->input->post('jabatan'),
				'keterangan' => trim($this->input->post('keterangan'))
			), array('id' => $id));

			if($result>0){
				echo '<script>
					alert("Data Team Berhasil Di Update");window.location="index"
				</script>';
			}
		}
	}
	

}
