<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">User</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User</li>
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
                        <h5 class="card-title">Data User</h5>
                        <a class="btn btn-info mt-1 mb-3" href="<?= base_url('admin/user/tambah') ?>">Tambah Data</a>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($user as $a => $pecah) {
                                    ?>
                                        <tr>
                                            <td><?php echo $a + 1 ?></td>
                                            <td><?php echo $pecah->nama_user ?></td>
                                            <td><?php echo $pecah->username ?></td>
                                            <td><?php echo $pecah->password ?></td>
                                            <td><?php echo $pecah->alamat_user ?></td>
                                            <td><?php echo $pecah->email_user ?></td>
                                            <td><?php echo $pecah->telp_user ?></td>
                                            <td>
                                                <a class="btn btn-warning" href="<?php echo base_url('admin/user/userEdit/') . $pecah->id_user ?>"> <i class="fas fa-edit"></i></a><br><br>
                                                <a class="btn btn-danger" href="<?php echo base_url('admin/user/delete/') . $pecah->id_user ?>"> <i class="fas fa-trash"></i></a>
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