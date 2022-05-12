<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_Model', 'userModel');

        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('error', 'Anda Harus Login.');
            redirect('login');
        }
    }
    public function userIndex()
    {
        $data['user'] = $this->userModel->getAll();
        $this->load->view('admin/component/header');
        $this->load->view('admin/component/top');
        $this->load->view('admin/component/menu');
        $this->load->view('admin/modul/user/index', $data);
        $this->load->view('admin/component/footer');
    }
    public function userTambah()
    {
        $data['user'] = $this->userModel->getAll();
        $this->load->view('admin/component/header');
        $this->load->view('admin/component/top');
        $this->load->view('admin/component/menu');
        $this->load->view('admin/modul/user/tambah', $data);
        $this->load->view('admin/component/footer');
    }
    public function userSave()
    {
        $this->userModel->save($_POST);
        $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
        Data Berhasil Ditambahkan
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        // var_dump($_POST);
        // exit;
        redirect('admin/user');
    }

    public function userUpdate()
    {
        $id = $this->input->post('id_user');
        // 
        $row = $this->userModel->getById($id);
        // var_dump($row);
        // exit;
        $data = [
            'nama_user' => $this->input->post('nama_user'),
            'alamat_user' => $this->input->post('alamat_user'),
            'email_user' => $this->input->post('email_user'),
            'telp_user' => $this->input->post('telp_user'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        ];

        $this->userModel->update($id, $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
        Data Berhasil Diedit
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        // var_dump($_POST);
        // exit;
        redirect('admin/user');
    }

    public function userEdit($id)
    {

        $data['user'] = $this->userModel->getById($id);
        $this->load->view('admin/component/header');
        $this->load->view('admin/component/top');
        $this->load->view('admin/component/menu');
        $this->load->view('admin/modul/user/edit', $data);
        $this->load->view('admin/component/footer');
    }

    public function userDelete($id)
    {
        $this->userModel->delete($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data User Berhasil DiHapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/user');
    }
}
