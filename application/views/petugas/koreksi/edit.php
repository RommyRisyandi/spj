<?php
// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form Open
echo form_open(base_url('petugas/koreksi/edit/'.$penerimaan->id_penerimaan), 'class="form-horizontal"');
?>
<section class="content">
        <div class="container-fluid">
<!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Koreksi SPJ
                            </h2>
                            
                        </div>
                      <div class="body">
                        <div class="col-md-6">
                            <b>Tanggal Post</b>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">date_range</i>
                                    </span>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date" name="tanggal_post" class="datetimepicker form-control" value="<?php echo $penerimaan->tanggal_post; ?>">
                                </div>
                            </div>
                        </div>

                                </div>
                                </div>

                          <div class="col-md-12">
                            <h2 class="card-inside-title">Uraian Belanja</h2>
                            
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="uraian_belanja" class="form-control no-resize" placeholder="Masukkan Uraian Belanja..." id="editor"><?php echo $penerimaan->uraian_belanja; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                            <p>
                                <b>Kegiatan</b>
                            </p>
                            <select name="id_kegiatan" class="form-control show-tick">
                                <option disabled="disabled">Kegiatan</option>
                                <?php foreach ($kegiatan as $kegiatan) { ?>
                                    <option value="<?php echo $kegiatan->id_kegiatan; ?>" <?php if($penerimaan->id_kegiatan==$kegiatan->id_kegiatan) { echo "selected";} ?>>
                                        <?php echo $kegiatan->nama_kegiatan; ?>
                                    </option>
                                   
                                <?php } ?>
                            </select>
                            </div>
                        <div class="col-md-8">
                            <div class="form-group form-float form-group-lg">
                                <div class="form-line">
                                    <input type="number" name="jumlah" class="form-control" value="<?php echo $penerimaan->jumlah; ?>" required />
                                    <label class="form-label">Jumlah (Rp.)</label>
                                </div>
                            </div>
                        </div>

                          <div class="col-md-8">
                        <div class="form-group form-float form-group-lg">
                            
                    <input type="hidden" name="status" value="sudah dikoreksi" class="form-control" >
                      
                        
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
            
            <!-- #END# Input -->
        </div>
    </section>
<?php echo form_close(); ?>