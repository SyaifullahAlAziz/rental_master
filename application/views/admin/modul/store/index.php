<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Data Store</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Store</li>
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
                        <h4 class="card-title">Data Store</h4>

                        <a href="<?= base_url('admin/store/tambah') ?>"><button type="button" class="btn btn-info" style="margin-bottom: 20px;">Tambah Data</button></a>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Nama Store</th>
                                        <th>Alamat Store</th>
                                        <th>No Telefon</th>
                                        <th>Whatsaap</th>
                                        <th>Instagram</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($join_store as $a => $pecah) {
                                    ?>
                                        <tr>
                                            <td><?php echo $a + 1 ?></td>
                                            <td><?php echo $pecah->nama_user ?></td>
                                            <td><?php echo $pecah->nama_store ?></td>
                                            <td><?php echo $pecah->alamat_store ?></td>
                                            <td><?php echo $pecah->telp_store ?></td>
                                            <td><?php echo $pecah->wa_store ?></td>
                                            <td><?php echo $pecah->ig_store ?></td>
                                            <td>
                                                <img src="<?php echo base_url('api/gambar_store/' . $pecah->gambar_store) ?>" alt="<?= $pecah->gambar_store ?>" style="width: 100px; height: 100px;">
                                            </td>
                                            <td>
                                                <a href="<?= base_url('admin/store/storeEdit/') . $pecah->id_store ?>"><button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button></a>
                                                <a href="<?php echo base_url('admin/store/storeDelete/') . $pecah->id_store ?>"><button style="margin-bottom: -15px;" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a>
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