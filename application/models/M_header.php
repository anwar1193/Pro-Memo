<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_header extends CI_Model {

	public function jumlah_mhs(){
		$result = $this->db->get('tbl_mhs');
		return $result->num_rows();
	}

}
