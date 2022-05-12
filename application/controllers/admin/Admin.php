<?php
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Model', 'adminModel');

        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('error', 'Anda Harus Login.');
            redirect('login');
        }
    }
    public function adminIndex()
    {
        $data['admin'] = $this->adminModel->getAll();
        $this->load->view('admin/component/header');
        $this->load->view('admin/component/top');
        $this->load->view('admin/component/menu');
        $this->load->view('admin/modul/admin/index', $data);
        $this->load->view('admin/component/footer');
    }
    public function adminTambah()
    {
        $data['admin'] = $this->adminModel->getAll();
        $this->load->view('admin/component/header');
        $this->load->view('admin/component/top');
        $this->load->view('admin/component/menu');
        $this->load->view('admin/modul/admin/tambah', $data);
        $this->load->view('admin/component/footer');
    }

    public function adminSave()
    {
        $this->adminModel->save($_POST);
        $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
        Data Berhasil Ditambahkan
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        // var_dump($_POST);
        // exit;
        redirect('admin/admin');
    }
    public function adminEdit($id)
    {
        $data['admin'] = $this->adminModel->getById($id);
        $this->load->view('admin/component/header');
        $this->load->view('admin/component/top');
        $this->load->view('admin/component/menu');
        $this->load->view('admin/modul/admin/edit', $data);
        $this->load->view('admin/component/footer');
    }

    public function adminUpdate()
    {
        $this->adminModel->update($_POST);
        $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
        Data Berhasil Diedit
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        // var_dump($_POST);
        // exit;
        redirect('admin/admin');
    }
    public function adminDelete($id)
    {
        $this->adminModel->delete($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Admin Berhasil DiHapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/admin');
    }
}
