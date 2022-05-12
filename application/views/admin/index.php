<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Dashboard</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <a href="<?= base_url('admin/slider') ?>">
                            <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                            <h6 class="text-white">Slider</h6>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-hover">
                    <div class="    box bg-success text-center">
                        <a href="<?= base_url('admin/kategori') ?>">
                            <h1 class="font-light text-white"><i class="mdi mdi-apps"></i></h1>
                            <h6 class="text-white">Kategori</h6>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-hover">
                    <div class="box bg-warning text-center">
                        <a href="<?= base_url('admin/store') ?>">
                            <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                            <h6 class="text-white">Store</h6>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-hover">
                    <div class="box bg-danger text-center">
                        <a href="<?= base_url('admin/barang') ?>">
                            <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                            <h6 class="text-white">Barang</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Log Activity</h4>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered" style="text-align: center;">
                                <thead>
                                    <tr style="color:black">
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($join_log as $a => $pecah) {
                                    ?>
                                        <tr>
                                            <td><?php echo $a + 1 ?></td>
                                            <td><?php echo $pecah->nama_user ?></td>
                                            <td><?php echo $pecah->tanggal  ?></td>
                                            <td><?php echo $pecah->keterangan  ?></td>
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