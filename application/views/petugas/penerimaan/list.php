<section class="content">
<div class="container-fluid">
<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Data Penerimaan SPJ
                </h2>
            </div>
            <div class="body">
                <div class="form-group">
                 <a href="<?php echo base_url('petugas/penerimaan/tambah'); ?>"><button type="button" class="btn btn-success waves-effect">
                        <i class="material-icons">add</i>
                        <span>Tambah SPJ Baru</span>
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
                                <th>Tanggal</th>
                                <th>Uraian Belanja</th>
                                <th>Kegiatan</th>
                                <th>Jumlah (Rp)</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($penerimaan as $penerimaan) {
                                 ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $penerimaan->tanggal_post; ?></td>
                                <td><?php echo $penerimaan->uraian_belanja; ?></td>
                                <td><?php echo $penerimaan->nama_kegiatan; ?></td>
                                <td>Rp.<?php echo number_format($penerimaan->jumlah,'0',',','.'); ?></td>
                                <td><?php echo $penerimaan->status; ?></td>
                                <td>
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