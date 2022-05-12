<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Slider</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Slider</li>
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
                        <h5 class="card-title">Data Slider</h5>
                        <a href="<?= base_url('admin/slider/tambah') ?>"><button style="margin-bottom: 20px;" type="button" class="btn btn-info">Tambah Data</button></a>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($slider as $a => $pecah) {
                                    ?>
                                        <tr>
                                            <td><?php echo $a + 1 ?></td>
                                            <td>
                                                <img src="<?php echo base_url('api/slider/' . $pecah->img_slider) ?>" alt="<?= $pecah->img_slider ?>" style="width: 100px; height: 100px;">
                                            </td>
                                            <td>
                                                <a href="<?= base_url('admin/slider/edit/') . $pecah->id_slider ?>"><button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button></a>
                                                <a href="<?php echo base_url('admin/slider/delete/') . $pecah->id_slider ?>"><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a>
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