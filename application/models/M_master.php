<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_master extends CI_Model {

    public function tampil_data($tbl){
        $result = $this->db->get($tbl);
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

    public function tampil_where_memo($tbl, $where){
        $this->db->order_by('id_memo', 'DESC');
        $result = $this->db->get_where($tbl, $where);
        return $result;
    }

    public function tampil_inbox_mengetahui($departemen, $level, $nama_lengkap){
        $result = $this->db->query("SELECT * FROM tbl_memo_mengetahui INNER JOIN tbl_memo USING(nomor_memo) WHERE tbl_memo_mengetahui.departemen_mengetahui='$departemen' AND tbl_memo_mengetahui.jabatan_mengetahui='$level' AND tbl_memo_mengetahui.username_mengetahui='$nama_lengkap' AND tbl_memo_mengetahui.status='' AND tbl_memo_mengetahui.urutan_mengetahui=tbl_memo.status_mengetahui");
        
        return $result;
    }

    public function tampil_inbox_mengetahui_history($departemen, $level, $nama_lengkap){
        $result = $this->db->query("SELECT * FROM tbl_memo_mengetahui INNER JOIN tbl_memo USING(nomor_memo) WHERE tbl_memo_mengetahui.departemen_mengetahui='$departemen' AND tbl_memo_mengetahui.jabatan_mengetahui='$level' AND tbl_memo_mengetahui.username_mengetahui='$nama_lengkap' AND tbl_memo_mengetahui.status='done'");
        
        return $result;
    }

    public function tampil_inbox_menyetujui($departemen, $level, $nama_lengkap){
        $result = $this->db->query("SELECT * FROM tbl_memo_menyetujui INNER JOIN tbl_memo USING(nomor_memo) WHERE tbl_memo_menyetujui.departemen_menyetujui='$departemen' AND tbl_memo_menyetujui.jabatan_menyetujui='$level' AND tbl_memo_menyetujui.username_menyetujui='$nama_lengkap' AND tbl_memo_menyetujui.status='' AND tbl_memo_menyetujui.urutan_menyetujui=tbl_memo.status_menyetujui");
        
        return $result;
    }

    public function tampil_inbox_menyetujui_history($departemen, $level, $nama_lengkap){
        $result = $this->db->query("SELECT * FROM tbl_memo_menyetujui INNER JOIN tbl_memo USING(nomor_memo) WHERE tbl_memo_menyetujui.departemen_menyetujui='$departemen' AND tbl_memo_menyetujui.jabatan_menyetujui='$level' AND tbl_memo_menyetujui.username_menyetujui='$nama_lengkap' AND tbl_memo_menyetujui.status='done'");
        
        return $result;
    }

    public function tampil_memo_final($departemen){
        $result = $this->db->query("SELECT * FROM tbl_memo_kepada INNER JOIN tbl_memo_cc USING(nomor_memo) INNER JOIN tbl_memo USING(nomor_memo) WHERE (tbl_memo_kepada.kepada='$departemen' OR tbl_memo_cc.cc='$departemen') AND tbl_memo.status_mengetahui=0 AND tbl_memo.status_menyetujui=0 ORDER BY tbl_memo.id_memo DESC");
        
        return $result;
    }

    public function tampil_memo_proses($departemen){
        $result = $this->db->query("SELECT * FROM tbl_memo_kepada INNER JOIN tbl_memo_cc USING(nomor_memo) INNER JOIN tbl_memo USING(nomor_memo) WHERE 
            (tbl_memo_kepada.kepada='$departemen' OR tbl_memo_cc.cc='$departemen') AND tbl_memo.status_mengetahui!=0 AND tbl_memo.status_menyetujui=0 
            OR
            (tbl_memo_kepada.kepada='$departemen' OR tbl_memo_cc.cc='$departemen') AND tbl_memo.status_mengetahui=0 AND tbl_memo.status_menyetujui!=0
        ORDER BY tbl_memo.id_memo DESC");
        
        return $result;
    }

    public function tampil_memo_nopin_pba($nopin, $departemen, $level, $nama_lengkap){
        $result = $this->db->query("SELECT * FROM tbl_memo_mengetahui
                                        INNER JOIN tbl_memo USING(nomor_memo)
                                        INNER JOIN tbl_memo_dapin_pba USING(nomor_memo)
                                        WHERE
                                            tbl_memo_dapin_pba.nomor_pinjaman = '$nopin'
                                        AND
                                            tbl_memo_mengetahui.departemen_mengetahui='$departemen' 
                                        AND 
                                            tbl_memo_mengetahui.jabatan_mengetahui='$level' 
                                        AND 
                                            tbl_memo_mengetahui.username_mengetahui='$nama_lengkap' 
                                        AND 
                                            tbl_memo_mengetahui.status='' 
                                        AND 
                                            tbl_memo_mengetahui.urutan_mengetahui=tbl_memo.status_mengetahui
                                            
                                    ");
        return $result;
    }


    public function tampil_memo_nopin_pbl($nopin, $departemen, $level, $nama_lengkap){
        $result = $this->db->query("SELECT * FROM tbl_memo_mengetahui
                                        INNER JOIN tbl_memo USING(nomor_memo)
                                        INNER JOIN tbl_memo_dapin_pbl USING(nomor_memo)
                                        WHERE
                                            tbl_memo_dapin_pbl.nomor_pinjaman = '$nopin'
                                        AND
                                            tbl_memo_mengetahui.departemen_mengetahui='$departemen' 
                                        AND 
                                            tbl_memo_mengetahui.jabatan_mengetahui='$level' 
                                        AND 
                                            tbl_memo_mengetahui.username_mengetahui='$nama_lengkap' 
                                        AND 
                                            tbl_memo_mengetahui.status='' 
                                        AND 
                                            tbl_memo_mengetahui.urutan_mengetahui=tbl_memo.status_mengetahui
                                            
                                    ");
        return $result;
    }


    public function tampil_memo_nopin_ppb($nopin, $departemen, $level, $nama_lengkap){
        $result = $this->db->query("SELECT * FROM tbl_memo_mengetahui
                                        INNER JOIN tbl_memo USING(nomor_memo)
                                        INNER JOIN tbl_memo_dapin_ppb USING(nomor_memo)
                                        WHERE
                                            tbl_memo_dapin_ppb.nomor_pinjaman = '$nopin'
                                        AND
                                            tbl_memo_mengetahui.departemen_mengetahui='$departemen' 
                                        AND 
                                            tbl_memo_mengetahui.jabatan_mengetahui='$level' 
                                        AND 
                                            tbl_memo_mengetahui.username_mengetahui='$nama_lengkap' 

                                        AND 
                                            tbl_memo_mengetahui.status='' 
                                        AND 
                                            tbl_memo_mengetahui.urutan_mengetahui=tbl_memo.status_mengetahui
                                            
                                    ");
        return $result;
    }

    
}
