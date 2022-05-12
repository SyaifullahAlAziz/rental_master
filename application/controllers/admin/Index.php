<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Log_Model', 'logModel');

        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('error', 'Anda Harus Login.');
            redirect('login');
        }
    }

    public function index()
    {
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('error', 'Anda Harus Login.');
            redirect('admin/login');
        } else {
            // $this->load->view('admin/login');
            redirect('admin/dashboard');
        }
    }
}
