<?php
class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_Model', 'kategoriModel');

        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('error', 'Anda Harus Login.');
            redirect('login');
        }
    }
    public function kategoriIndex()
    {
        $data['kategori'] = $this->kategoriModel->getAll();
        $this->load->view('admin/component/header');
        $this->load->view('admin/component/top');
        $this->load->view('admin/component/menu');
        $this->load->view('admin/modul/kategori/index', $data);
        $this->load->view('admin/component/footer');
    }
    public function kategoriTambah()
    {
        $data['kategori'] = $this->kategoriModel->getAll();
        $this->load->view('admin/component/header');
        $this->load->view('admin/component/top');
        $this->load->view('admin/component/menu');
        $this->load->view('admin/modul/kategori/tambah', $data);
        $this->load->view('admin/component/footer');
    }

    public function kategoriSave()
    {

        $nama_kategori = $this->input->post('nama_kategori');
        $gambar_ = $_FILES['gambar_']['name'];
        $extensionList = array("jpg", "jpeg", "png");

        $fileName = $_FILES['gambar_']['name'];
        $pecah = explode(".", $fileName);
        $ekstensi = $pecah[1];
        if (in_array($ekstensi, $extensionList)) {
            if ($gambar_ != '') {
                $gambar_ = uploaddisini($_FILES['gambar_'], 'api/gambar_kategori/');
                if ($gambar_ == 'error') {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
                Pastikan Format File Sudah Benar
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                    redirect('admin/kategori/tambah');
                }
                $data = array(
                    'nama_kategori' => $nama_kategori,
                    'gambar_'    => $gambar_
                );

                var_dump($data);
                die();

                $this->kategoriModel->save($data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
                    Data Berhasil Ditambahkan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');

                redirect('admin/kategori');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
                Data Gagal Ditambahkan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');

                redirect('admin/kategori');
            }
        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
            Pastikan Format File Sudah Benar
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');

        redirect('admin/kategori/tambah');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
    }

    public function kategoriUpdate()
    {
        $id = $this->input->post('id_kategori');
        $nama_kategori = $this->input->post('nama_kategori');
        $gambar_ = $_FILES['gambar_']['name'];
        $extensionList = array("jpg", "jpeg", "png");

        $fileName = $_FILES['gambar_']['name'];
        $pecah = explode(".", $fileName);
        $ekstensi = $pecah[1];

        if ($_FILES['gambar_']['name'] != '') {

            $row = $this->kategoriModel->getById($id);

            if (in_array($ekstensi, $extensionList)) {
                if ($gambar_ != '') {
                    unlink("api/gambar_kategori/" . $row['gambar_']);
                    $gambar_ = uploaddisini($_FILES['gambar_'], 'api/gambar_kategori/');
                    if ($gambar_ == 'error') {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
                Pastikan Format File Sudah Benar
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                        redirect('admin/kategori/edit/' . $id);
                    }
                    $data = array(
                        'nama_kategori'    => $nama_kategori,
                        'gambar_'    => $gambar_
                    );

                    $this->kategoriModel->update($id, $data);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
                    Data Berhasil Ditambahkan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');

                    redirect('admin/kategori');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
                Data Gagal Ditambahkan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');

                    redirect('admin/kategori');
                }
            }
        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
            Pastikan Format File Sudah Benar
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');

        redirect('admin/kategori/edit/' . $id);
    }

    public function kategoriEdit($id)
    {
        $data['kategori'] = $this->kategoriModel->getById($id);
        $this->load->view('admin/component/header');
        $this->load->view('admin/component/top');
        $this->load->view('admin/component/menu');
        $this->load->view('admin/modul/kategori/edit', $data);
        $this->load->view('admin/component/footer');
    }

    public function kategoriDelete($id)
    {

        $row = $this->kategoriModel->getById($id);
        unlink("api/gambar_kategori/" . $row['gambar_']);

        $this->kategoriModel->delete($id);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Admin Berhasil DiHapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/kategori');
    }
}
