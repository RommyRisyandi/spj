<section class="content">
<div class="container-fluid">
<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Data Kegiatan SPJ
                </h2>
            </div>
            <div class="body">
                <div class="form-group">
                 <a href="<?php echo base_url('admin/kegiatan/tambah'); ?>"><button type="button" class="btn btn-success waves-effect">
                        <i class="material-icons">add</i>
                        <span>Tambah Kegiatan</span>
                </button></a>
                <br>
                <?php 
                // Notifikasi
                if($this->session->flashdata('sukses')) {
                    echo '<p class="alert alert-success">';
                    echo $this->session->flashdata('sukses');
                    echo '</p>';
                 }
                 ?>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Kegiatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($kegiatan as $kegiatan) {
                                 ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $kegiatan->nama_kegiatan; ?></td>
                                <td>
                                 <a href="<?php echo base_url('admin/kegiatan/edit/'.$kegiatan->id_kegiatan); ?>"><button type="button" class="btn btn-warning waves-effect">
                                    <i class="material-icons">edit</i>
                                </button></a>
                                 <?php include('delete.php'); ?>
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
<!-- #END# Basic Examples -->
</div>
</section>