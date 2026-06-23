<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SesiAbsensiModel extends CI_Model {

    public function getAll()
    {
        $this->db->select('
            sesi_absensi.*,
            guru.nama_guru,
            kelas.nama_kelas,
            mapel.nama_mapel
        ');

        $this->db->from('sesi_absensi');

        $this->db->join(
            'guru',
            'guru.id = sesi_absensi.guru_id',
            'left'
        );

        $this->db->join(
            'kelas',
            'kelas.id = sesi_absensi.kelas_id',
            'left'
        );

        $this->db->join(
            'mapel',
            'mapel.id = sesi_absensi.mapel_id',
            'left'
        );

        $this->db->order_by('sesi_absensi.id', 'DESC');

        return $this->db->get()->result();
    }


    public function getById($id)
    {
        $this->db->select('
            sesi_absensi.*,
            guru.nama_guru,
            kelas.nama_kelas,
            mapel.nama_mapel
        ');

        $this->db->from('sesi_absensi');

        $this->db->join(
            'guru',
            'guru.id = sesi_absensi.guru_id',
            'left'
        );

        $this->db->join(
            'kelas',
            'kelas.id = sesi_absensi.kelas_id',
            'left'
        );

        $this->db->join(
            'mapel',
            'mapel.id = sesi_absensi.mapel_id',
            'left'
        );

        $this->db->where('sesi_absensi.id', $id);

        return $this->db->get()->row();
    }

    public function insert($data)
    {
        return $this->db->insert('sesi_absensi', $data);
    }
}