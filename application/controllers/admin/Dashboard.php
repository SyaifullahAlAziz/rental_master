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

        $data['log'] = $this->logModel->getAll();
        $data['join_log'] = $this->logModel->join_all();
        $this->load->view('admin/component/header');
        $this->load->view('admin/component/top');
        $this->load->view('admin/component/menu');
        $this->load->view('admin/index', $data);
        $this->load->view('admin/component/footer');
    }
}
