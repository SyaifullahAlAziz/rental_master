<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h3 class="page-title">Kategori</h3>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kategori</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Kategori</h4>
                        <a href="<?= base_url('admin/kategori/tambah') ?>"><button type="button" class="btn btn-info" style="margin-bottom: 20px;">Tambah Data</button></a>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered" style="text-align: center;">
                                <thead>
                                    <tr style="color:black">
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($kategori as $a => $pecah) {
                                    ?>
                                        <tr>
                                            <td><?php echo $a + 1 ?></td>
                                            <td><?php echo $pecah->nama_kategori ?></td>
                                            <td><img src="<?php echo base_url('api/gambar_kategori/' . $pecah->gambar_) ?>" alt="<?= $pecah->gambar_ ?>" style="width: 100px; height: 100px;"></td>
                                            <td>
                                                <a href="<?= base_url('admin/kategori/edit/') . $pecah->id_kategori ?>"><button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button></a>
                                                <a href="<?php echo base_url('admin/kategori/delete/') . $pecah->id_kategori ?>"><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>