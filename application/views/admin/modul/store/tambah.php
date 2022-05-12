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
                    <form class="form-horizontal" action="<?= base_url('admin/store/save') ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Data Store</h4>
                            <div class="form-group row">
                                <label for="nama_user" class="col-sm-3 text-right control-label col-form-label">Nama User</label>
                                <select name="id_user" id="id_user" class="col-sm-9 form-control" required>
                                    <option value="">Pilih User</option>
                                    <?php
                                    $user = $this->db->get('tb_user')->result();
                                    ?>
                                    <?php foreach ($user as $u) : ?>
                                        <option value="<?= $u->id_user ?>"><?= $u->nama_user ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="nama_store" class="col-sm-3 text-right control-label col-form-label">Nama Store</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_store" id="nama_store" placeholder="Nama Store">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat_store" class="col-sm-3 text-right control-label col-form-label">Alamat Store</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="alamat_store" id="alamat_store" placeholder="Alamat Store">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telp_store" class="col-sm-3 text-right control-label col-form-label">Telepon Store</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="telp_store" id="telp_store" placeholder="No.Telepon Store">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="wa_store" class="col-sm-3 text-right control-label col-form-label">WA Store</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="wa_store" id="wa_store" placeholder="WA Store">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ig_store" class="col-sm-3 text-right control-label col-form-label">Ig Store</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="ig_store" id="ig_store" placeholder="Ig Store">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gambar_store" class="col-sm-3 text-right control-label col-form-label">Gambar Store</label>
                                <div class="col-sm-9">
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