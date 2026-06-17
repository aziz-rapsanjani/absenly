<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaModel extends CI_Model{
    
    public function get_profil_siswa($user_id){
        $this->db->select('siswa.*, kelas.nama_kelas, kelas.jurusan');
        $this->db->from('siswa');
        $this->db->join('kelas', 'kelas.id = siswa.kelas_id', 'left');
        $this->db->where('siswa.user_id', $user_id);
        return $this->db->get()->row_array();
    }

    public function cek_sesi_aktif_by_token($token, $kelas_id){
        $this->db->from('sesi_absensi');
        $this->db->where('qr_token_aktif', $token);
        $this->db->where('kelas_id', $kelas_id);
        $this->db->where('tanggal_sesi', date('Y-m-d'));
        return $this->db->get()->row_array();
    }

    public function cek_double_input($sesi_id, $siswa_id){
        $this->db->from('presensi');
        $this->db->where('sesi_id', $sesi_id);
        $this->db->where('siswa_id', $siswa_id);
        return $this->db->get()->num_rows();
    }

    public function insert_presensi($data){
        return $this->db->insert('presensi', $data);
    }
}