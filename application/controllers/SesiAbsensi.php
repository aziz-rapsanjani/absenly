<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SesiAbsensi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('SesiAbsensiModel');
    }

    public function index()
    {
        $data['sesi'] = $this->SesiAbsensiModel->getAll();
        $this->load->view('sesi_absensi/index', $data);
    }
    public function tambah()
    {
        if ($this->input->post()) {

            $ip_guru = $this->input->ip_address();

            $data = [
                'guru_id' => $this->input->post('guru_id'),
                'kelas_id' => $this->input->post('kelas_id'),
                'mapel_id' => $this->input->post('mapel_id'),
                'tanggal_sesi' => $this->input->post('tanggal_sesi'),
                'jam_mulai' => $this->input->post('jam_mulai'),

                'qr_token_aktif' => bin2hex(random_bytes(16)),

                'is_hotspot_validation' =>
                $this->input->post('is_hotspot_validation') ? 1 : 0,

                'ip_guru_aktif' => $ip_guru
            ];

            $this->db->insert('sesi_absensi', $data);

            redirect('index.php/SesiAbsensi');
        }

        $data['guru']  = $this->db->get('guru')->result();
        $data['kelas'] = $this->db->get('kelas')->result();
        $data['mapel'] = $this->db->get('mapel')->result();

        $this->load->view('sesi_absensi/tambah', $data);
    }

    public function detail($id)
    {
        $data['sesi'] = $this->SesiAbsensiModel->getById($id);

        if (!$data['sesi']) {
            show_404();
        }

        $this->load->view('sesi_absensi/detail', $data);
    }
    public function presensi($sesi_id)
    {
        $this->db->select('
            presensi.*,
            siswa.nama_siswa,
            siswa.nisn
            ');
        $this->db->from('presensi');
        $this->db->join('siswa', 'siswa.id = presensi.siswa_id');
        $this->db->where('presensi.sesi_id', $sesi_id);

        $data['presensi'] = $this->db->get()->result();

        $data['sesi'] = $this->db->get_where('sesi_absensi', [
            'id' => $sesi_id
        ])->row();

        $this->load->view('sesi_absensi/presensi', $data);
    }
    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sesi_absensi');

        redirect('index.php/SesiAbsensi');
    }

    public function generateToken($id)
    {
        $token = bin2hex(random_bytes(16));

        $this->db->where('id', $id);
        $this->db->update('sesi_absensi', [
            'qr_token_aktif' => $token
        ]);

        header('Content-Type: application/json');

        echo json_encode([
            'token' => $token
        ]);
    }
}