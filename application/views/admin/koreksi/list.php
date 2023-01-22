<section class="content">
<div class="container-fluid">
<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Data Koreksi SPJ
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
                                <th>ID_Penerimaan</th>
                                <th>Tanggal</th>
                                <th>Nama Petugas</th>
                                <th>Uraian Belanja</th>
                                <th>Keterangan</th>
                                <th>Jenis Koreksi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($koreksi as $koreksi) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $koreksi->id_penerimaan; ?></td>
                                <td><?php echo $koreksi->tanggal_post; ?></td>
                                <td><?php echo $koreksi->nama;?></td>
                                <td><?php echo $koreksi->uraian_belanja; ?></td>
                                <td><?php echo $koreksi->status; ?></td>
                                <td><?php echo $koreksi->jenis_koreksi; ?></td>
                                <td>
                                    <?php if($koreksi->status == "perbaiki"){ ?>
                                    <a href="<?php echo base_url('admin/koreksi/tambah/'.$koreksi->id_penerimaan); ?>"><button type="button" class="btn btn-warning waves-effect">
                                    <i class="material-icons">edit</i>
                                    </button></a>
                                <?php }else if ($koreksi->status == "perbaiki lagi"){ ?>
                                    <a href="<?php echo base_url('admin/koreksi/edit/'.$koreksi->id_penerimaan); ?>"><button type="button" class="btn btn-warning waves-effect">
                                    <i class="material-icons">edit</i>
                                </button></a>
                           <?php } ?>
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