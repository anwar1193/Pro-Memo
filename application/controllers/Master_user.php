<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_user extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('helperku');
		$this->load->library('libraryku');
		$this->load->model(array('M_header', 'M_master'));
	}

	public function index()
	{
		cek_belum_login();
        $data_user = $this->M_master->tampil_master_user()->result_array();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_master_user', array(
            'data_user' => $data_user
        ));
		$this->load->view('footer');
	}

}
