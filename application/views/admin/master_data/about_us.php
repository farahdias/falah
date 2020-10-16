<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>About Us</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Setting</a></li>
            <li class="breadcrumb-item active">About Us</li>
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
        <h3 class="card-title">Setting About Us</h3>
      </div>
      <div class="card-body">

        <div class="col-row">
          <div class="col-md-12">
            <?= $this->session->flashdata('alert_message') ?>
          </div>
        </div>

          <form enctype="multipart/form-data" method="POST" action="<?= site_url('update_about_us') ?>">
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label>Konten</label>
                  <textarea class="form-control summernote" required="" name="about_us"><?= $option['about_us'] ?></textarea>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Gambar</label><br>
                  <img src="<?= base_url('assets/images/'.$option['about_us_img']) ?>" class="img-fluid"><br><br>
                  <input type="file" name="about_us_img" class="btn btn-default">
                  <small>Maksimal berat file 2MB</small>
                </div>

                <div class="form-group text-center">
                  <button class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                </div>
              </div>
            </div>

          </form>
        
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>

  <script type="text/javascript">
    $(document).on('keyup keypress', '#content_header', function(){
      var slug = convertToSlug($(this).val());
      $('#content_slug').val(slug);
    });
  </script>