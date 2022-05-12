<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Data Admin</h4>
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
                    <form class="form-horizontal" action="<?= base_url('admin/admin/save') ?>" method="POST">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Data User</h4>
                            <div class="form-group row">
                                <label for="nama_admin" class="col-sm-3 text-right control-label col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_admin" id="nama_admin" placeholder="Isi Nama Lengkap">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username_admin" class="col-sm-3 text-right control-label col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username_admin" id="username_admin" placeholder="Isi Username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email_admin" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email_admin" id="email_admin" placeholder="Isi Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password_admin" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password_admin" id="password_admin" placeholder="Password Here">
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