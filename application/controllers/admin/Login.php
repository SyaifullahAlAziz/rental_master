<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_Model', 'loginModel');
    }

    public function loginAdmin()
    {
        if (!empty($this->session->userdata('username_admin'))) {
            redirect('admin');
        } else {
            $this->load->view('admin/login');
        }
    }

    public function loginAksi()
    {
        $username = $this->input->post('username_admin');
        $password = $this->input->post('password_admin');

        $cek = $this->loginModel->cek_login($username, $password);
        $this->session->set_userdata('id_admin', $cek->id_admin);

        if ($cek == FALSE) {
            $this->session->set_flashdata('error', 'Username / Password Salah');
            redirect('login');
        } else {
            $this->session->set_userdata('username', $cek->username_admin);
            $this->session->set_userdata('nama_admin', $cek->nama_admin);
            // var_dump($t);
            // var_dump($e);
            // exit;
            $this->session->set_flashdata('pesan', 'Anda Berhasil Masuk');
            redirect('admin/dashboard');
        }
    }

    public function logoutAksi()
    {
        $this->session->sess_destroy();        
        redirect('login');
    }
}
