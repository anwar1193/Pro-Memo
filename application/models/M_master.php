<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_master extends CI_Model {

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

    public function jenis_memo(){
        $result = $this->db->get('tbl_jenis_memo');
        return $result;
    }

    public function jenis_memo_where($where){
        $result = $this->db->get_where('tbl_jenis_memo', $where);
        return $result;
    }

    public function tampil_master_user(){
        $result = $this->db->get('tbl_user');
        return $result;
    }

    public function tampil_format_memo(){
        $result = $this->db->get('tbl_jenis_memo');
        return $result;
    }

    public function tampil_departemen(){
        $this->db->order_by('nama_departemen', 'ASC');
        $result = $this->db->get('tbl_departemen');
        return $result;
    }

    public function tampil_user(){
        $result = $this->db->get('tbl_user');
        return $result;
    }

    public function tampil_where($tbl, $where){
        $result = $this->db->get_where($tbl, $where);
        return $result;
    }

    public function tampil_inbox_mengetahui($departemen, $level){
        $result = $this->db->query("SELECT * FROM tbl_memo_mengetahui INNER JOIN tbl_memo USING(nomor_memo) WHERE tbl_memo_mengetahui.departemen_mengetahui='$departemen' AND tbl_memo_mengetahui.jabatan_mengetahui='$level' AND tbl_memo_mengetahui.status='' AND tbl_memo_mengetahui.urutan_mengetahui=tbl_memo.status_mengetahui");
        
        return $result;
    }
    
}
