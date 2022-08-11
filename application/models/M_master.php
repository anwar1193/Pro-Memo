<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_master extends CI_Model {

    public function tampil_data($tbl){
        $result = $this->db->get($tbl);
        return $result;
    }

    public function tampil_data_order($tbl, $order, $jenis_order){
        $this->db->order_by($order, $jenis_order);
        $result = $this->db->get($tbl);
        return $result;
    }

    public function tampil_where($tbl, $where){
        $result = $this->db->get_where($tbl, $where);
        return $result;
    }

    public function simpan_data($tbl, $data){
        $result = $this->db->insert($tbl, $data);
        return $result;
    }

    public function update_data($tbl, $data, $where){
        $result = $this->db->update($tbl, $data, $where);
        return $result;
    }

    public function hapus_data($tbl, $where){
        $result = $this->db->delete($tbl, $where);
        return $result;
    }

    
}
