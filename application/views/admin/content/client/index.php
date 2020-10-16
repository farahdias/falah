<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Client</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Content</a></li>
            <li class="breadcrumb-item active">Client</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar Client</h3>
      </div>
      <div class="card-body">
        <a href="javscript:void(0)" data-toggle="modal" data-target="#modalTambahAKT" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
        <br><br>

        <div class="row">
          <div class="col-md-12">
            <?= $this->session->flashdata('alert_message'); ?>
          </div>
        </div>

        <table class="table datatables">
          <thead class="bg-success">
            <tr>
              <th style="width: 5%">No</th>
              <th style="width: 10%">Gambar</th>
              <th>Client</th>
              <th style="width: 25%">Kategori</th>
              <th style="width: 10%">Status</th>
              <th style="width: 10%"><i class="fa fa-cog"></i></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $n = 0;
            foreach ($list as $row) { $n++; ?>
              <tr>
                <td><?= $n ?></td>
                <td><img src="<?= base_url('assets/images/content/'.$row['featured_img']) ?>" class="img-fluid"></td>
                <td><?= $row['content_header'] ?></td>
                <td><?= $row['category_name'] ?></td>
                <td>
                  <?php if($row['is_post'] == '0'){ ?>
                          <a href="<?= site_url('set_approval/content/'.$tipe.'/approve/'.$row['content_id']) ?>" onclick="return confirm('Apakah kamu yakin mengaktifkan artikel ini ?')" class="badge badge-danger">Non-Active</a>
                  <?php }else{ ?>
                          <a href="<?= site_url('set_approval/content/'.$tipe.'/deny/'.$row['content_id']) ?>" onclick="return confirm('Apakah kamu yakin menonaktifkan artikel ini ?')" class="badge badge-success">Active</a>
                  <?php } ?>
                </td>

                <td>
                  <small>
                  <a href="javascript:void(0)" data-toggle="tooltip" title="Ubah" class="text-warning"
                          onclick="
                            edit(
                              '<?php echo $row['content_id'] ?>',
                              '<?php echo $row['content_header'] ?>',
                              '<?php echo $row['featured_img'] ?>',
                              '<?php echo $row['category_id'] ?>'
                            )">
                      <i class="fa fa-edit"></i>
                  </a> &nbsp;
                  
                  <a class='text-danger' href="<?= site_url('delete/content/'.$tipe.'/'.$row['content_id']) ?>" onclick="return confirm('Apakah kamu yakin menghapus data ini ?')" data-toggle="tooltip" title="Hapus Data"><i class="fa fa-trash"></i></a></small>
                </td>

              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>

  <form enctype="multipart/form-data" method="POST" action="<?= site_url('insert_content') ?>">
    <input type="hidden" name="tipe" value="client">
     <div class="modal fade" id="modalTambahAKT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header ">
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Tambah Client</h4>
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
             </div>

             <div class="modal-body">

                <div class="form-group">
                   <label>Nama Client</label>
                   <input autocomplete="off" type="text" name="content_header" id="nama" class="form-control" placeholder="Nama Client..." required/>
                </div>

                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control" name="category_id" required="">
                    <option value="">Pilih</option>
                    <?php foreach ($category as $row) { ?>
                      <option value="<?= $row['id'] ?>"><?= $row['category_name'] ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Gambar</label><br>
                  <input type="file" required="" name="featured_img" class="btn btn-default"><br>
                  <small>Maksimal berat file 2MB</small>
                </div>

             </div>

             <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check"></i> Simpan</button>
             </div>

           </div>
        </div>
     </div>
   </form>

   <form enctype="multipart/form-data" method="POST" id="formUpdate">
     <input type="hidden" name="tipe" value="client">
     <div class="modal fade" id="modalEditAKT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header ">
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Ubah Client</h4>
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
             </div>

             <div class="modal-body">
                <div class="form-group">
                <div class="form-group">
                   <label>Nama Client</label>
                   <input autocomplete="off" type="text" name="content_header" id="e_nama" class="form-control" placeholder="Nama Client..." required/>
                </div>

                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control" name="category_id" id="category_id" required="">
                    <option value="">Pilih</option>
                    <?php foreach ($category as $row) { ?>
                      <option value="<?= $row['id'] ?>"><?= $row['category_name'] ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-3"></div>
                    <div class="col-md-6">
                      <center><img id="img-preview" class="img-fluid"></center>
                    </div>
                  </div>
                  <label>Gambar</label><br>
                  <input type="file" name="featured_img" class="btn btn-default"><br>
                  <small>Maksimal berat file 2MB</small>
                </div>

             </div>

             <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-warning btn-flat"><i class="fa fa-edit"></i> Ubah</button>
             </div>

           </div>
        </div>
     </div>
   </form>

<script type="text/javascript">
 function edit(id, nama, img, cat_id){
  $('#e_nama').val(nama);

  var img_url = "<?= base_url('assets/images/content/') ?>" + img;
  $('#img-preview').attr('src', img_url);

  $('#category_id option').removeAttr('selected', 'selected');
  $('#category_id option[value="'+ cat_id +'"]').attr('selected', 'selected');

  var post_url = "<?= site_url('update_content/') ?>" + id;
  $('#formUpdate').attr('action', post_url);

  $('#modalEditAKT').modal('show'); 
}
</script>