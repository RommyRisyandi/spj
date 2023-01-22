<?php 
// Error Upload
if(isset($error)) {
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}

// Form Open
echo form_open(base_url('admin/koreksi/edit/'.$koreksi->id_penerimaan), 'class="form-horizontal"');
?>
<section class="content">
        <div class="container-fluid">
<!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tambah Koreksi
                            </h2>
                            
                        </div>
                        <div class="body">
                            <?php echo validation_errors('<div class="alert alert-warning">','</div>'); ?>
                            <div class="col-md-12">
                                    <div class="form-group form-float form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="id_penerimaan" class="form-control" value="<?php echo $koreksi->id_penerimaan; ?>" required/>
                                            <label class="form-label">ID Penerimaan</label>
                                        </div>
                                    </div>
                                </div>

                            <div class="col-md-12">
                            <h2 class="card-inside-title">Jenis Koreksi</h2>
                            
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="jenis_koreksi" class="form-control no-resize" placeholder="Masukkan Jenis Koreksi..." id="editor"><?php echo $koreksi->jenis_koreksi; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        

                          <div class="col-md-12">
                        <div class="form-group form-float form-group-lg">
                    <input type="hidden" name="status" value="belum diproses" class="form-control">  
                        </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-5">
                         <button type="Submit" name="Submit" class="btn bg-green waves-effect">
                                <i class="material-icons">save</i>
                                 <span>SIMPAN</span>
                        </button>
                        </div>
                        </div> 
                            </div>
                        </div>
                    </div>
                </div>
            
            <!-- #END# Input -->
        </div>
    </section>
    <?php echo form_close(); ?>