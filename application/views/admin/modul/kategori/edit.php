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
                    <form class="form-horizontal" action="<?= base_url('admin/kategori/update/') . $kategori['id_kategori'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <h4 class="card-title">Edit Data Kategori</h4>
                            <div class="form-group row">
                                <label for="nama_kategori" class="col-sm-3 text-right control-label col-form-label">Nama Kategori</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_kategori" value="<?php echo $kategori['nama_kategori']  ?>">
                                    <input type="hidden" class="form-control" name="id_kategori" value="<?php echo $kategori['id_kategori']  ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gambar_" class="col-sm-3 text-right control-label col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                    <img src="<?php echo base_url('api/gambar_kategori/' . $kategori['gambar_']) ?>" alt="<?= $kategori['gambar_'] ?>" style="width: 100px; height: 100px;">
                                    <input type="file" class="form-control" name="gambar_" id="gambar_" placeholder="Isi Username">
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>