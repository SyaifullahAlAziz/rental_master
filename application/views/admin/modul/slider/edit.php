<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Data Slider</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Slider</li>
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
                    <form class="form-horizontal" action="<?= base_url('admin/slider/update/') . $slider['id_slider'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <h4 class="card-title">Edit Data Slider</h4>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">ICON</label>
                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" name="id_slider" value="<?php echo $slider['id_slider']  ?>">
                                    <img src="<?php echo base_url('api/slider/' . $slider['img_slider']) ?>" alt="<?= $slider['img_slider'] ?>" style="width: 100px; height: 100px;">
                                    <input type="hidden" class="form-control" name="img_slider_lama" value="<?= $slider['img_slider'] ?>">
                                    <input type="file" class="form-control" name="img_slider">
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