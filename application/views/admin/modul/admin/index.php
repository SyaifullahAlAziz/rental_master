<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h3 class="page-title">Data Admin</h3>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Admin</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <?php echo $this->session->flashdata('pesan') ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Admin</h4>
                        <a href="<?= base_url('admin/admin/tambah') ?>"><button type="button" class="btn btn-info" style="margin-bottom: 20px;">Tambah Data</button></a>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <!-- <th>Password</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($admin as $a => $pecah) {
                                    ?>
                                        <tr>
                                            <td><?php echo $a + 1 ?></td>
                                            <td><?php echo $pecah->nama_admin ?></td>
                                            <td><?php echo $pecah->username_admin ?></td>
                                            <td><?php echo $pecah->email_admin ?></td>
                                            <!-- <td><?php echo $pecah->password_admin ?></td> -->
                                            <td>
                                                <a href="<?= base_url('admin/admin/edit/') . $pecah->id_admin ?>"><button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button></a>
                                                <a href="<?php echo base_url('admin/admin/delete/') . $pecah->id_admin ?>"><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a>
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