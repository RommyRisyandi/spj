<section class="content">
<div class="container-fluid">
<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Data Perbaikan SPJ
                </h2>
            </div>
            <div class="body">
                <div class="form-group">
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
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($perbaikan as $perbaikan) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $perbaikan->tanggal_post; ?></td>
                                <td><?php echo $perbaikan->uraian_belanja; ?></td>
                                <td><?php echo $perbaikan->jumlah; ?></td>
                                <td><?php echo $perbaikan->status; ?></td>
                                <td>
                                    
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