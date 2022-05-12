<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Data Barang</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <?php echo $this->session->flashdata('pesan') ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form class="form-horizontal" action="<?= base_url('admin/barang/barangUpdate') ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Data Barang</h4>
                            <input type="hidden" name="id_barang" id="id_barang" value="<?= $barang['id_barang'] ?>">
                            <div class="form-group row">
                                <label for="nama_user" class="col-sm-3 text-right control-label col-form-label">Nama User</label>
                                <select style="margin-left: 10px;" name="id_user" id="id_user" class="col-sm-3 form-control" required>
                                    <option value="">Pilih Nama User</option>
                                    <?php
                                    $user = $this->db->get('tb_user')->result_array();
                                    ?>
                                    <?php foreach ($user as $u) : ?>
                                        <option value="<?= $u['id_user'] ?>" <?= $u['id_user'] == $barang['id_user'] ? 'selected' : '' ?>><?= $u['nama_user'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="nama_kategori" class="col-sm-3 text-right control-label col-form-label">Nama Kategori</label>
                                <select style="margin-left: 10px;" name="id_kategori" id="id_kategori" class="col-sm-3 form-control" required>
                                    <option value="">Pilih Nama Kategori</option>
                                    <?php
                                    $kategori = $this->db->get('tb_kategori')->result_array();
                                    ?>
                                    <?php foreach ($kategori as $k) : ?>
                                        <option value="<?= $k['id_kategori'] ?>" <?= $k['id_kategori'] == $barang['id_kategori'] ? 'selected' : '' ?>><?= $k['nama_kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group row">
                                <label for="nama_barang" class="col-sm-3 text-right control-label col-form-label">Nama Barang</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?= $barang['nama_barang'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tarif_barang" class="col-sm-3 text-right control-label col-form-label">Tarif Barang</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tarif_barang" id="tarif_barang" placeholder="Tarif Barang" value="<?= $barang['tarif_barang'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi" class="col-sm-3 text-right control-label col-form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" value="<?= $barang['deskripsi'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="stok" class="col-sm-3 text-right control-label col-form-label">Stok</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="stok" id="stok" placeholder="Stok" value="<?= $barang['stok'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gambar_barang" class="col-sm-3 text-right control-label col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                    <img src="<?php echo base_url('api/gambar/' . $barang['gambar_barang']) ?>" alt="<?= $barang['gambar_barang'] ?>" style="width: 100px; height: 100px;">
                                    <input type="file" class="form-control" name="gambar_barang" id="gambar_barang">
                                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>