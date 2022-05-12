<?php
class Ulasan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ulasan_Model', 'ulasanModel');

        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('error', 'Anda Harus Login.');
            redirect('login');
        }
    }
    public function ulasanIndex()
    {
        $data['ulasan'] = $this->ulasanModel->getAll();
        $data['join_ulasan'] = $this->ulasanModel->join_all();
        $this->load->view('admin/component/header');
        $this->load->view('admin/component/top');
        $this->load->view('admin/component/menu');
        $this->load->view('admin/modul/ulasan/index', $data);
        $this->load->view('admin/component/footer');
    }

    public function ulasanDelete($id)
    {
        $this->ulasanModel->delete($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Ulasan Berhasil DiHapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('admin/ulasan');
    }
}
