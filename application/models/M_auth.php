<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

    public function cek_user_login($identifier, $role) {
        $this->db->select('users.*');
        $this->db->from('users');
        $this->db->where('users.role', $role);

        if ($role === 'Siswa') {
            $this->db->select('siswa.id as siswa_id, siswa.nama_siswa, siswa.kelas_id, siswa.nisn');
            $this->db->join('siswa', 'siswa.user_id = users.id');
            $this->db->where('siswa.nisn', $identifier); 
        } 
        elseif ($role === 'Guru') {
            $this->db->select('guru.id as guru_id, guru.nama_guru, guru.nip');
            $this->db->join('guru', 'guru.user_id = users.id');
            $this->db->where('guru.nip', $identifier); 
        } 
        else {
            $this->db->where('users.username', $identifier);
        }

        $this->db->limit(1);
        $query = $this->db->get();
        
        return $query->row_array();
    }
}