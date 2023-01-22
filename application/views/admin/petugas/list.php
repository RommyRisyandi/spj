<section class="content">
<div class="container-fluid">
<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Data Petugas
                </h2>
            </div>
            <div class="body">
                <div class="form-group">
                 <a href="<?php echo base_url('admin/petugas/tambah'); ?>"><button type="button" class="btn btn-success waves-effect">
                        <i class="material-icons">add</i>
                        <span>Tambah Petugas</span>
                </button>
                </a>
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
                                <th>Nama Petugas</th>
                                <th>Posisi/Akses Level</th>
                                <th>E-Mail</th>
                                <th>Username</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($petugas as $petugas) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $petugas->nama; ?></td>
                                <td><?php echo $petugas->akses_level; ?></td>
                                <td><?php echo $petugas->email; ?></td>
                                <td><?php echo $petugas->username; ?></td>
                                <td> 
                                    <a href="<?php echo base_url('admin/petugas/edit/'.$petugas->id_petugas); ?>"><button type="button" class="btn btn-warning waves-effect">
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