<?php
class Slider extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Slider_Model', 'sliderModel');

        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('error', 'Anda Harus Login.');
            redirect('login');
        }
    }
    public function sliderIndex()
    {
        $data['slider'] = $this->sliderModel->getAll();
        $this->load->view('admin/component/header');
        $this->load->view('admin/component/top');
        $this->load->view('admin/component/menu');
        $this->load->view('admin/modul/slider/index', $data);
        $this->load->view('admin/component/footer');
    }
    public function sliderTambah()
    {
        $data['slider'] = $this->sliderModel->getAll();
        $this->load->view('admin/component/header');
        $this->load->view('admin/component/top');
        $this->load->view('admin/component/menu');
        $this->load->view('admin/modul/slider/tambah', $data);
        $this->load->view('admin/component/footer');
    }


    public function sliderSave()
    {

        $img_slider = $_FILES['img_slider']['name'];
        $extensionList = array("jpg", "jpeg", "png");

        $fileName = $_FILES['img_slider']['name'];
        $pecah = explode(".", $fileName);
        $ekstensi = $pecah[1];
        if (in_array($ekstensi, $extensionList)) {
            if ($img_slider != '') {
                $img_slider = uploaddisini($_FILES['img_slider'], 'api/slider/');
                if ($img_slider == 'error') {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
                Pastikan Format File Sudah Benar
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                    redirect('admin/slider/tambah');
                }
                $data = array('img_slider'    => $img_slider);

                $this->sliderModel->save($data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
                    Data Berhasil Ditambahkan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');

                redirect('admin/slider');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
                Data Gagal Ditambahkan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');

                redirect('admin/slider');
            }
        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
            Pastikan Format File Sudah Benar
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');

        redirect('admin/slider/tambah');
    }

    public function sliderEdit($id)
    {
        $data['slider'] = $this->sliderModel->getById($id);
        $this->load->view('admin/component/header');
        $this->load->view('admin/component/top');
        $this->load->view('admin/component/menu');
        $this->load->view('admin/modul/slider/edit', $data);
        $this->load->view('admin/component/footer');
    }

    public function sliderUpdate()
    {
        $id = $this->input->post('id_slider');
        $img_slider = $_FILES['img_slider']['name'];
        $extensionList = array("jpg", "jpeg", "png");

        $fileName = $_FILES['img_slider']['name'];
        $pecah = explode(".", $fileName);
        $ekstensi = $pecah[1];

        if ($_FILES['img_slider']['name'] != '') {

            $row = $this->sliderModel->getById($id);

            if (in_array($ekstensi, $extensionList)) {
                if ($img_slider != '') {
                    unlink("api/slider/" . $row['img_slider']);
                    $img_slider = uploaddisini($_FILES['img_slider'], 'api/slider/');
                    if ($img_slider == 'error') {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
                Pastikan Format File Sudah Benar
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                        redirect('admin/slider/edit/' . $id);
                    }
                    $data = array('img_slider'    => $img_slider);

                    $this->sliderModel->update($id, $data);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
                    Data Berhasil Ditambahkan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');

                    redirect('admin/slider');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
                Data Gagal Ditambahkan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');

                    redirect('admin/slider');
                }
            }
        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
            Pastikan Format File Sudah Benar
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');

        redirect('admin/slider/edit/' . $id);
    }

    public function sliderDelete($id)
    {
        $this->sliderModel->delete($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Admin Berhasil DiHapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/slider');
    }
}
