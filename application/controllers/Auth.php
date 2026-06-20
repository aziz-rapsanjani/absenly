<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_auth');
    }

    public function index() {
        $this->load->view('login');
    }

    public function login() {
        $identifier = $this->input->post('username', TRUE); 
        $password   = $this->input->post('password', TRUE);
        $role_form  = $this->input->post('role', TRUE); 

        $user = $this->M_auth->cek_user_login($identifier, $role_form);

        if ($user) {
            if ($password === $user['password']) {
                
                $session_data = [
                    'user_id'   => $user['id'],
                    'username'  => $user['username'],
                    'role'      => $user['role'],
                    'logged_in' => TRUE
                ];

                if ($user['role'] === 'Siswa') {
                    $session_data['siswa_id']   = $user['siswa_id'];
                    $session_data['nama_user']  = $user['nama_siswa'];
                    $session_data['kelas_id']   = $user['kelas_id'];
                } elseif ($user['role'] === 'Guru') {
                    $session_data['guru_id']    = $user['guru_id'];
                    $session_data['nama_user']  = $user['nama_guru'];
                } else {
                    $session_data['nama_user']  = 'Administrator Sekolah';
                }

                $this->session->set_userdata($session_data);
                $this->redirect_by_role($user['role']);

            } else {
                $this->session->set_flashdata('error', 'Kata sandi salah!');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('error', 'Akun tidak ditemukan atau salah memilih mode masuk!');
            redirect('auth');
        }
    }

    private function redirect_by_role($role) {
        if ($role === 'Admin Sekolah') {
            redirect('admin');
        } elseif ($role === 'Guru') {
            redirect('guru');
        } else {
            redirect('siswa');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}