<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Form Basic</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
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
                    <form class="form-horizontal" action="<?= base_url('admin/user/save') ?>" method="POST">
                        <div class="card-body">
                            <h4 class="card-title">Data User</h4>
                            <div class="form-group row">
                                <label for="nama_user" class="col-sm-3 text-right control-label col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Isi Nama Lengkap">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat_user" class="col-sm-3 text-right control-label col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="alamat_user" id="alamat_user" placeholder="Isi Alamat">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email_user" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email_user" id="email_user" placeholder="Isi Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telp_user" class="col-sm-3 text-right control-label col-form-label">No Telepon</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="telp_user" id="telp_user" placeholder="Isi Nomor Telepon">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-3 text-right control-label col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Isi Username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password Here">
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