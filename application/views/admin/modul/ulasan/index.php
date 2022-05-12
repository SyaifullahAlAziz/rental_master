<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Data Ulasan</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Ulasan</li>
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
                        <h4 class="card-title">Data Ulasan</h4>

                        <!-- <a href="<?= base_url('admin/store/tambah') ?>"><button type="button" class="btn btn-info">Tambah Data</button></a> -->
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Nama Barang</th>
                                        <th>Review</th>
                                        <th>Bintang</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($join_ulasan as $a => $pecah) {
                                    ?>
                                        <tr>
                                            <td><?php echo $a + 1 ?></td>
                                            <td><?php echo $pecah->nama_user ?></td>
                                            <td><?php echo $pecah->nama_barang ?></td>
                                            <td><?php echo $pecah->review ?></td>
                                            <td><?php echo $pecah->bintang ?></td>
                                            <td>
                                                <a href="<?php echo base_url('admin/ulasan/delete/') . $pecah->id_ulasan ?>"><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a>
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