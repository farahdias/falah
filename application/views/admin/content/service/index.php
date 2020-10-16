<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Service</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Content</a></li>
            <li class="breadcrumb-item active">Service</li>
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
        <h3 class="card-title">Daftar Service</h3>
      </div>
      <div class="card-body">
        <a href="<?= site_url('content/page/service/tambah') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
        <br><br>

        <div class="row">
          <div class="col-md-12">
            <?= $this->session->flashdata('alert_message') ?>
          </div>
        </div>

        <table class="table datatables">
          <thead class="bg-success">
            <tr>
              <th style="width: 5%">No</th>
              <th style="width: 10%">Gambar</th>
              <th style="width: 35%">Judul Service</th>
              <th style="width: 20%">Deskripsi</th>
              <th>Kategori</th>
              <th style="width: 15%">Waktu Buat</th>
              <th>Status</th>
              <th><i class="fa fa-cog"></i></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $n = 0;
            foreach ($list as $row) { $n++; ?>
              <tr>
                <td><?= $n ?></td>
                <td><img src="<?= base_url('assets/images/content/'.$row['featured_img']) ?>" class="img-fluid"></td>
                <td><?= $row['content_header'] ?><br><small>Author : <?= $row['nama'] ?></small></td>
                <td>
                  <?php 

                    $desc = $row['content_description'];
                    if(strlen($desc) > 35){
                      $desc = substr($desc, 0, 35)."...";
                    }

                    echo $desc;

                  ?>
                </td>
                <td><?= $row['category_name'] ?></td>
                <td><?= date('d-m-Y H:i', strtotime($row['post_time'])) ?></td>
                <td>
                  <?php if($row['is_post'] == '0'){ ?>
                          <a href="<?= site_url('set_approval/content/'.$tipe.'/approve/'.$row['content_id']) ?>" onclick="return confirm('Apakah kamu yakin mengaktifkan artikel ini ?')" class="badge badge-danger">Non-Active</a>
                  <?php }else{ ?>
                          <a href="<?= site_url('set_approval/content/'.$tipe.'/deny/'.$row['content_id']) ?>" onclick="return confirm('Apakah kamu yakin menonaktifkan artikel ini ?')" class="badge badge-success">Active</a>
                  <?php } ?>
                </td>

                <td>
                  <small>
                  <a class='text-warning' data-toggle="tooltip" title="Ubah" href="<?= site_url('content/page/'.$tipe.'/edit/'.$row['content_id']) ?>"><i class="fa fa-edit"></i></a> &nbsp;
                  
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