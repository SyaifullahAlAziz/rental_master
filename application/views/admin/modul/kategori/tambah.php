<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Data Kategori</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Kategori</li>
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
                    <form class="form-horizontal" action="<?= base_url('admin/kategori/save') ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Data Kategori</h4>
                            <div class="form-group row">
                                <label for="nama_kategori" class="col-sm-3 text-right control-label col-form-label">Nama Kategori</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Isi Kategori">
                                </div>
                                <?= form_error('kode_type', '<div class="text-small text-danger">', '</div>') ?>
                            </div>
                            <div class="form-group row">
                                <label for="gambar_" class="col-sm-3 text-right control-label col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="gambar_" id="gambar_" placeholder="Isi Username">
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