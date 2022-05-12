<?php
class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_Model', 'barangModel');

        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('error', 'Anda Harus Login.');
            redirect('login');
        }
    }
    public function barangIndex()
    {
        $data['barang'] = $this->barangModel->getAll();
        $data['join_barang'] = $this->barangModel->join_all();
        // var_dump($data['join_barang']);
        // exit;
        $this->load->view('admin/component/header');
        $this->load->view('admin/component/top');
        $this->load->view('admin/component/menu');
        $this->load->view('admin/modul/barang/index', $data);
        $this->load->view('admin/component/footer');
    }
    public function barangIndexFoto($id_barang)
    {
        $data['id_barang'] = $id_barang;
        $data['tb_gambar'] = $this->db->get_where('tb_gambar', ['id_barang' => $id_barang])->result();
        // var_dump($data['join_barang']);
        // exit;
        $this->load->view('admin/component/header');
        $this->load->view('admin/component/top');
        $this->load->view('admin/component/menu');
        $this->load->view('admin/modul/barang/index_foto', $data);
        $this->load->view('admin/component/footer');
    }

    public function barangIndexFotoSave()
    {

        $upload = fileUpload($_FILES['gambar'], "api/gambar/");
        $save = $this->db->insert('tb_gambar', [
            'id_barang' => $this->input->post('id_barang'),
            'gambar'    => $upload,
        ]);

        redirect('admin/barang/barangIndexFoto/' . $this->input->post('id_barang'));
    }

    public function barangTambah()
    {
        $data['barang'] = $this->barangModel->getAll();
        $this->load->view('admin/component/header');
        $this->load->view('admin/component/top');
        $this->load->view('admin/component/menu');
        $this->load->view('admin/modul/barang/tambah', $data);
        $this->load->view('admin/component/footer');
    }

    public function barangSave()
    {

        $nama_barang = $this->input->post('nama_barang');
        $gambar_ = $_FILES['gambar_']['name'];
        $extensionList = array("jpg", "jpeg", "png");

        $fileName = $_FILES['gambar_']['name'];
        $pecah = explode(".", $fileName);
        $ekstensi = $pecah[1];
        if (in_array($ekstensi, $extensionList)) {
            if ($gambar_ != '') {
                $gambar_ = uploaddisini($_FILES['gambar_'], 'api/gambar_barang/');
                if ($gambar_ == 'error') {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
                Pastikan Format File Sudah Benar
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                    redirect('admin/barang/tambah');
                }
                $data = array(
                    'nama_barang' => $nama_barang,
                    'gambar_'    => $gambar_
                );

                // var_dump($data);
                // die();

                $this->barangModel->save($data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
                    Data Berhasil Ditambahkan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');

                redirect('admin/barang');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
                Data Gagal Ditambahkan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');

                redirect('admin/barang');
            }
        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
            Pastikan Format File Sudah Benar
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');

        redirect('admin/barang/tambah');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('id_kategori', 'ID Kategori', 'required');
        $this->form_validation->set_rules('id_store', 'ID Store', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('tarif_barang', 'Tarif Barang', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        $this->form_validation->set_rules('stok', 'stok', 'required');
    }

    public function barangUpdate()
    {
        $id = $this->input->post('id_barang');
        $filename = $_FILES['gambar_barang']['name'];

        if ($_FILES['gambar_barang']['name'] != '') {
            $row = $this->barangModel->getById($id);
            unlink("api/gambar/" . $row['gambar_barang']);

            $filename = uploaddisini($_FILES['gambar_barang'], 'api/gambar/');
            if ($filename == 'error') {
                $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
        Pastikan Format File Sudah Benar
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
                redirect('admin/barang/barangEdit/' . $id);
            }
            $data = [
                'id_user' => $this->input->post('id_user'),
                'id_kategori' => $this->input->post('id_kategori'),
                'id_store' => $this->input->post('id_store'),
                'nama_barang' => $this->input->post('nama_barang'),
                'tarif_barang' => $this->input->post('tarif_barang'),
                'deskripsi' => $this->input->post('deskripsi'),
                'stok' => $this->input->post('stok'),
                'gambar_barang' => $filename
            ];
        } else {
            $data = [
                'id_user' => $this->input->post('id_user'),
                'id_kategori' => $this->input->post('id_kategori'),
                'id_store' => $this->input->post('id_store'),
                'nama_barang' => $this->input->post('nama_barang'),
                'tarif_barang' => $this->input->post('tarif_barang'),
                'deskripsi' => $this->input->post('deskripsi'),
                'stok' => $this->input->post('stok')
            ];
        }
        $update = $this->barangModel->update($id, $data);
        if ($update == TRUE) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
                Data Berhasil Diubah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
                Data Gagal Diubah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        }
        redirect('admin/barang');
    }

    public function barangEdit($id)
    {
        $data['barang'] = $this->barangModel->getById($id);
        // var_dump($data['barang']);
        // die();
        $this->load->view('admin/component/header');
        $this->load->view('admin/component/top');
        $this->load->view('admin/component/menu');
        $this->load->view('admin/modul/barang/edit', $data);
        $this->load->view('admin/component/footer');
    }

    public function barangDelete($id)
    {

        $row = $this->barangModel->getById($id);
        unlink("api/gambar/" . $row['gambar_barang']);

        $this->barangModel->delete($id);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Admin Berhasil DiHapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/barang');
    }

    public function gambarDelete()
    {
        $id = $this->input->post('id');

        $this->db->where('id_gambar', $id);
        $query = $this->db->delete('tb_gambar');

        if ($query) {
            echo json_encode(TRUE);
        } else {
            echo json_encode(FALSE);
        }
    }
}
