<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Kategori</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Master Data</a></li>
            <li class="breadcrumb-item active">Kategori</li>
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
        <h3 class="card-title">Daftar Kategori</h3>
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
              <th>Kategori</th>
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
                <td><?= $row['category_name'] ?></td>
                <td>
                  <?php if($row['is_active'] == '0'){ ?>
                          <a href="<?= site_url('set_approval/category/approve/'.$row['id']) ?>" onclick="return confirm('Apakah kamu yakin mengaktifkan artikel ini ?')" class="badge badge-danger">Non-Active</a>
                  <?php }else{ ?>
                          <a href="<?= site_url('set_approval/category/deny/'.$row['id']) ?>" onclick="return confirm('Apakah kamu yakin menonaktifkan artikel ini ?')" class="badge badge-success">Active</a>
                  <?php } ?>
                </td>

                <td>
                  <a href="javascript:void(0)" data-toggle="tooltip" title="Ubah" class="text-warning"
                          onclick="
                            edit(
                              '<?php echo $row['id'] ?>',
                              '<?php echo $row['category_name'] ?>'
                            )">
                      <i class="fa fa-edit"></i>
                  </a> &nbsp;

                  <a class='text-danger' href="<?= site_url('delete_category/'.$row['id']) ?>" onclick="return confirm('Apakah kamu yakin menghapus data ini ?')" data-toggle="tooltip" title="Hapus Data"><i class="fa fa-trash"></i></a>
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

  <form action="<?php echo site_url('insert_category') ?>" method="post" enctype="multipart/form-data">
     <div class="modal fade" id="modalTambahAKT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header ">
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Tambah Kategori</h4>
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
             </div>

             <div class="modal-body">

                <div class="form-group">
                   <label>Nama Kategori</label>
                   <input autocomplete="off" type="text" name="category_name" id="nama" class="form-control" placeholder="Nama Kategori..." required/>
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

   <form action="<?php echo site_url('update_category') ?>" method="post" enctype="multipart/form-data">
     <div class="modal fade" id="modalEditAKT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header ">
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Ubah Kategori</h4>
                <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
             </div>

             <input type="hidden" name="id_category" id="e_id">

             <div class="modal-body">
                <div class="form-group">
                <div class="form-group">
                   <label>Nama Kategori</label>
                   <input autocomplete="off" type="text" name="category_name" id="e_nama" class="form-control" placeholder="Nama Kategori..." required/>
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
 function edit(id, nama){
  $('#e_id').val(id);
  $('#e_nama').val(nama);

  $('#modalEditAKT').modal('show'); 
}
</script>