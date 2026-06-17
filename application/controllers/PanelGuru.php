<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PanelGuru extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('PanelGuruModel');
    }

    public function index() {
        $data['siswa'] = $this->PanelGuruModel->getAll();
        $this->load->view('panelguru/index', $data);
    }

    public function edit($id) {
        $data['siswa'] = $this->PanelGuruModel->getById($id);

        if (!$data['siswa']) {
            show_404();
        }

        $this->load->view('panelguru/form', $data);
    }

    public function update() {
        $siswa_id   = $this->input->post('siswa_id'); 
        $status     = $this->input->post('status');
        $keterangan = $this->input->post('keterangan');

        if (empty($siswa_id)) {
            $siswa_id = $this->input->post('presensi_id');
        }

        $this->PanelGuruModel->update_presensi($siswa_id, $status, $keterangan);
        redirect('panelguru');
    }
}