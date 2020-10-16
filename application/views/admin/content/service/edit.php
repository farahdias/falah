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
        <h3 class="card-title">Ubah Service</h3>
      </div>
      <div class="card-body">
        <a href="<?= site_url('content/page/'.$tipe.'/list') ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>
        <br><br>

        <div class="col-row">
          <div class="col-md-12">
            <?= $this->session->flashdata('alert_message') ?>
          </div>
        </div>

          <form enctype="multipart/form-data" method="POST" action="<?= site_url('update_content/'.$content['content_id']) ?>">
            <div class="row">
              <input type="hidden" name="tipe" value="<?= $tipe ?>">
              <div class="col-md-8">
                <div class="form-group">
                  <label>Judul Slider</label>
                  <input type="text" class="form-control" name="content_header" autocomplete="off" placeholder="Judul slider..." required="" id="content_header" value="<?= $content['content_header'] ?>">
                </div>

                <div class="form-group">
                  <label>Slug</label>
                  <input type="text" class="form-control" name="content_slug" autocomplete="off" placeholder="Slug..." required="" readonly="" id="content_slug" value="<?= $content['content_slug'] ?>">
                </div>

                <div class="form-group">
                  <label>Deskripsi</label>
                  <input type="text" class="form-control" name="content_description" autocomplete="off" placeholder="Deskripsi..." required="" value="<?= $content['content_description'] ?>">
                </div>

              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control" name="category_id" required="">
                    <option value="">Pilih</option>
                    <?php foreach ($category as $row) { ?>
                      <option <?php if($row['id'] == $content['category_id']){ echo "selected='selected'"; } ?> value="<?= $row['id'] ?>"><?= $row['category_name'] ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Gambar</label><br>
                  <img src="<?= base_url('assets/images/content/'.$content['featured_img']) ?>" class="img-fluid">
                  <input type="file" name="featured_img" class="btn btn-default mt-3">
                  <small>Maksimal berat file 2MB</small>
                </div>

                <div class="form-group">
                  <button class="btn btn-warning"><i class="fa fa-edit"></i> Ubah</button>
                </div>

              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Konten</label>
                  <textarea class="form-control summernote" required="" name="content_value"><?= $content['content_value'] ?></textarea>
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