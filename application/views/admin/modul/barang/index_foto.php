<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h3 class="page-title">Data Barang</h3>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
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
                        <h4 class="card-title">Gambar Barang</h4>

                        <div class="card">
                            <tr>
                                <td>
                                    <div class="row">

                                        <?php foreach ($tb_gambar as $t) : ?>
                                            <div class="col-md-3 position-relative">
                                                <i onclick='hapusFoto("<?= $t->id_gambar ?>")' class="fas fa-trash-alt" style="position: absolute; right: 18px; top: 22px; color: white; cursor: pointer;"></i>
                                                <img src="<?= base_url('api/gambar/' . $t->gambar) ?>" alt="" style="width: 100%;height: 150px;border:2px solid black;margin-top:15px">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <form method="POST" action="<?= base_url('admin/barang/barangIndexFotoSave') ?>" enctype="multipart/form-data">
                                        <input type="hidden" name="id_barang" value="<?= $id_barang ?>">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="file" name="gambar" class="form-control mt-5" required>
                                                <br>
                                            </div>
                                            <div style="margin-top: 50px;" class="col-md-3">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Upload Gambar</button>
                                            </div>
                                        </div>
                                        <div style="margin-top: 20px;" class="row">
                                            <div class="col-md-3">
                                                <a class="btn btn-dark" href="<?= base_url('admin/barang/') ?>">Kembali ke Data Barang</a>
                                            </div>

                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function hapusFoto($id) {
                if (window.confirm(
                        "Yakin akan hapus data ini ?"
                    )) {
                    $.ajax({
                            method: "POST",
                            url: "<?= base_url('admin/barang/gambarDelete') ?>",
                            dataType: "JSON",
                            data: {
                                id: $id,
                            }
                        })
                        .done(function(msg) {
                            if (msg == true) {
                                location.reload()
                            } else {
                                alert("Gambar gagal dihapus!!!")
                            }
                        });
                }
            }
        </script>