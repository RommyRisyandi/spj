<button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#delete-<?php echo $kegiatan->id_kegiatan; ?> ">
        <i class="material-icons">delete</i>
       </button>


<div class="modal fade" id="delete-<?php echo $kegiatan->id_kegiatan; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">Hapus Kegiatan</h4>
      </div>
      <div class="modal-body">
        <div class="callout callout-warning">
        <h4>Peringatan!</h4>
        Apakah anda yakin ingin menghapus kegiatan ini ? data yang sudah dihapus tidak dapat dikembalikan.
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success waves-effect" data-dismiss="modal"><i class="material-icons">clear</i> Tidak</button>
        <a href="<?php echo base_url('admin/kegiatan/delete/'.$kegiatan->id_kegiatan) ?> " class="btn btn-danger waves-effect"><i class="material-icons">delete</i> Ya</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->