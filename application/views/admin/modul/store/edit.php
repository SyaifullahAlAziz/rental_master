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
                    <form class="form-horizontal" action="<?= base_url('admin/store/storeUpdate') ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <h4 class="card-title">Ubah Data Store</h4>
                            <input type="hidden" name="id_store" id="id_store" value="<?= $store['id_store'] ?>">
                            <div class="form-group row">
                                <label for="nama_store" class="col-sm-3 text-right control-label col-form-label">Nama Store</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_store" id="nama_store" value="<?= $store['nama_store'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat_store" class="col-sm-3 text-right control-label col-form-label">Alamat Store</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="alamat_store" id="alamat_store" value="<?= $store['alamat_store'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telp_store" class="col-sm-3 text-right control-label col-form-label">Telepon Store</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="telp_store" id="telp_store" value="<?= $store['telp_store'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="wa_store" class="col-sm-3 text-right control-label col-form-label">WA Store</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="wa_store" id="wa_store" value="<?= $store['wa_store'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ig_store" class="col-sm-3 text-right control-label col-form-label">Ig Store</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="ig_store" id="ig_store" value="<?= $store['ig_store'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gambar_store" class="col-sm-3 text-right control-label col-form-label">Gambar Store</label>
                                <div class="col-sm-9">
                                    <img src="<?php echo base_url('api/gambar_store/' . $store['gambar_store']) ?>" alt="<?= $store['gambar_store'] ?>" style="width: 100px; height: 100px;">
                                    <input type="file" class="form-control" name="gambar_store" id="gambar_store">
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