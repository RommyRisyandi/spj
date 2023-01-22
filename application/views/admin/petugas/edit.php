<?php 
// Error Upload
if(isset($error)) {
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}

// Form Open
echo form_open(base_url('admin/petugas/edit/'.$petugas->id_petugas),'class="form-horizontal"');
?>
<section class="content">
        <div class="container-fluid">
<!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tambah Petugas Admin
                            </h2> 
                        </div>
                        <div class="body">
                            <?php echo validation_errors('<div class="alert alert-warning">','</div>'); ?>
                                <div class="col-md-12">
                                    <div class="form-group form-float form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="nama" class="form-control" value="<?php echo $petugas->nama; ?>" required/>
                                            <label class="form-label">Nama Petugas</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" name="email" class="form-control" value="<?php echo $petugas->email; ?>" required/>
                                            <label class="form-label">E-mail</label>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-md-8">
                                     <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="username" class="form-control" value="<?php echo $petugas->username; ?>" required>
                                            <label class="form-label">Username</label>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-md-8">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" name="password" class="form-control" value="<?php echo $petugas->password; ?>" required>
                                            <label class="form-label">Password</label>
                                        </div>
                                    </div>
                                </div>
                              
                              <div class="form-group form-float">
                                <div class="col-md-6">
                                    <p>
                                        <b>Akses Level</b>
                                    </p>
                                    <select name="akses_level" class="form-control show-tick">
                                        <option disabled>Akses Level</option>
                                        <option value="petugas">Petugas</option>
                                        <option value="petugas" <?php if($petugas->akses_level=="petugas") { echo "selected";} ?>>Petugas</option>
                                        
                                    </select>
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