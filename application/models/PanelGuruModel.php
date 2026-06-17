<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PanelGuruModel extends CI_Model {

    public function getAll() {
        $this->db->select('
            siswa.id as siswa_id,
            siswa.nisn,
            siswa.nama_siswa,
            kelas.nama_kelas,
            presensi.id as presensi_id,
            IFNULL(presensi.status, "Belum Absen") as status,
            IFNULL(presensi.keterangan, "-") as keterangan
        ');
        $this->db->from('siswa');
        $this->db->join('kelas', 'kelas.id = siswa.kelas_id', 'left');
        $this->db->join('presensi', 'presensi.siswa_id = siswa.id', 'left');
        
        return $this->db->get()->result();
    }

    public function getById($id) {
        $this->db->select('
            siswa.id as siswa_id,
            siswa.nisn,
            siswa.nama_siswa,
            siswa.kelas_id,
            kelas.nama_kelas,
            IFNULL(presensi.status, "Belum Absen") as status,
            IFNULL(presensi.keterangan, "") as keterangan
        ');
        $this->db->from('siswa');
        $this->db->join('kelas', 'kelas.id = siswa.kelas_id', 'left');
        $this->db->join('presensi', 'presensi.siswa_id = siswa.id', 'left');
        $this->db->where('siswa.id', $id);

        return $this->db->get()->row();
    }

    public function update_presensi($siswa_id, $status, $keterangan) {
        $siswa = $this->db->get_where('siswa', ['id' => $siswa_id])->row();
        $kelas_id = ($siswa) ? $siswa->kelas_id : 1;

        $sesi = $this->db->get_where('sesi_absensi', ['kelas_id' => $kelas_id])->row();
        
        if ($sesi) {
            $sesi_id = $sesi->id;
        } else {
            $data_sesi_otomatis = [
                'guru_id' => 1, 
                'kelas_id' => $kelas_id,
                'mapel_id' => 1, 
                'tanggal_sesi' => date('Y-m-d'),
                'jam_mulai' => date('H:i:s')
            ];
            $this->db->insert('sesi_absensi', $data_sesi_otomatis);
            $sesi_id = $this->db->insert_id();
        }

        $cek_presensi = $this->db->get_where('presensi', ['siswa_id' => $siswa_id])->row();

        $data_absen = [
            'status'     => $status,
            'keterangan' => $keterangan,
            'waktu_scan' => date('Y-m-d H:i:s')
        ];

        if ($cek_presensi) {
            $this->db->where('siswa_id', $siswa_id);
            return $this->db->update('presensi', $data_absen);
        } else {
            $data_absen['siswa_id'] = $siswa_id;
            $data_absen['sesi_id']  = $sesi_id;
            $data_absen['kelas_id'] = $kelas_id;
            return $this->db->insert('presensi', $data_absen);
        }
    }
}