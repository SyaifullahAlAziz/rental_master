<?php
class Store extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Store_Model', 'storeModel');

        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('error', 'Anda Harus Login.');
            redirect('login');
        }
    }
    public function storeIndex()
    {
        $data['store'] = $this->storeModel->getAll();
        $data['join_store'] = $this->storeModel->join_all();
        $this->load->view('admin/component/header');
        $this->load->view('admin/component/top');
        $this->load->view('admin/component/menu');
        $this->load->view('admin/modul/store/index', $data);
        $this->load->view('admin/component/footer');
    }
    public function storeTambah()
    {
        $data['store'] = $this->storeModel->getAll();
        $this->load->view('admin/component/header');
        $this->load->view('admin/component/top');
        $this->load->view('admin/component/menu');
        $this->load->view('admin/modul/store/tambah', $data);
        $this->load->view('admin/component/footer');
    }

    public function storeSave()
    {

        $id_user = $this->input->post('id_user');
        $nama_store = $this->input->post('nama_store');
        $alamat_store = $this->input->post('alamat_store');
        $telp_store = $this->input->post('telp_store');
        $wa_store = $this->input->post('wa_store');
        $ig_store = $this->input->post('ig_store');
        $gambar_store = $_FILES['gambar_store']['name'];
        $extensionList = array("jpg", "jpeg", "png");

        $this->db->select('*');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('tb_store');
        $num = $query->num_rows();

        if ($num > 0) {
            // $this->storeTambah();
            echo "<script> alert('User Yang Dipilih Sudah Memiliki Toko ')
                                window.location.href='" . base_url('admin/store/tambah') . "' </script>";
        } else {

            $fileName = $_FILES['gambar_']['name'];
            $pecah = explode(".", $fileName);
            $ekstensi = $pecah[1];
            if (in_array($ekstensi, $extensionList)) {
                if ($gambar_store != '') {
                    $gambar_store = uploaddisini($_FILES['gambar_store'], 'api/gambar_store/');
                    if ($gambar_store == 'error') {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
            Pastikan Format File Sudah Benar
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
                        redirect('admin/store/tambah');
                    }
                }

                $data = array(
                    'id_user' => $id_user,
                    'nama_store'     => $nama_store,
                    'alamat_store'   => $alamat_store,
                    'telp_store'     => $telp_store,
                    'wa_store'     => $wa_store,
                    'ig_store'    => $ig_store,
                    'gambar_store'    => $gambar_store
                );

                $this->storeModel->save($data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
            Data Berhasil Ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');

                redirect('admin/store');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
                Pastikan Format File Sudah Benar
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');

                redirect('admin/store/tambah');
            }
        }
    }

    public function storeUpdate()
    {
        $id = $this->input->post('id_store');
        $id_user = $this->input->post('id_user');
        $nama_store = $this->input->post('nama_store');
        $alamat_store = $this->input->post('alamat_store');
        $telp_store = $this->input->post('telp_store');
        $wa_store = $this->input->post('wa_store');
        $ig_store = $this->input->post('ig_store');
        $gambar_store = $_FILES['gambar_store']['name'];
        $extensionList = array("jpg", "jpeg", "png");

        $this->db->select('*');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('tb_store');
        $num = $query->num_rows();

        if ($num > 0) {
            echo "<script> alert('User Yang Dipilih Sudah Memiliki Toko ')
                                window.location.href='" . base_url('admin/store/storeedit') . "' </script>";
        } else {

            $fileName = $_FILES['gambar_store']['name'];
            $pecah = explode(".", $fileName);
            $ekstensi = $pecah[1];
            if (in_array($ekstensi, $extensionList)) {
                if ($gambar_store != '') {
                    $gambar_store = uploaddisini($_FILES['gambar_store'], 'api/gambar_store/');
                    if ($gambar_store == 'error') {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
            Pastikan Format File Sudah Benar
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
                        redirect('admin/store/storeedit');
                    }
                }
                $data = array(
                    'id_user'    => $id_user,
                    'nama_store'    => $nama_store,
                    'alamat_store'    => $alamat_store,
                    'telp_store'    => $telp_store,
                    'wa_store'    => $wa_store,
                    'ig_store'    => $ig_store,
                    'gambar_store'    => $gambar_store
                );

                $this->storeModel->update($id, $data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
                    Data Berhasil Diubah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');

                redirect('admin/store');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
                Data Gagal Diubah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');

                redirect('admin/store');
            }
        }


        $this->session->set_flashdata('pesan', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
            Pastikan Format File Sudah Benar
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');

        redirect('admin/store/storeedit/' . $id);
    }

    public function storeEdit($id)
    {
        $data['store'] = $this->storeModel->getById($id);
        // var_dump($data['store']);
        // die();
        $this->load->view('admin/component/header');
        $this->load->view('admin/component/top');
        $this->load->view('admin/component/menu');
        $this->load->view('admin/modul/store/edit', $data);
        $this->load->view('admin/component/footer');
    }

    public function storeDelete($id)
    {

        $row = $this->storeModel->getById($id);
        unlink("api/gambar_store/" . $row['gambar_store']);

        $this->storeModel->delete($id);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Admin Berhasil DiHapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/store');
    }
}
