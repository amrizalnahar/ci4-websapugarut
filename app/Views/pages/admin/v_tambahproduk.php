<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-10">
      <h2 class="my-3">Ini Form Tambah Produk</h2>

      <form action="/adminproduk/save" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="row mb-3">
          <label for="judul_produk" class="col-sm-2 col-form-label">Judul produk</label>
          <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('judul_produk')) ? 'is-invalid' : ''; ?>" id="judul_produk" name="judul_produk" autofocus value="<?= old('judul_produk'); ?>">
            <div id="validationServer03Feedback" class="invalid-feedback">
              <?= $validation->getError('judul_produk'); ?>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <label for="isi_produk" class="col-sm-2 col-form-label">Isi produk</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="isi_produk" name="isi_produk"><?= old('isi_produk'); ?></textarea>
          </div>
        </div>
        <div class="row mb-3">
          <label for="foto_produk" class="col-sm-2 col-form-label">Foto</label>
          <div class="col-sm-2">
            <img src="/img/default.png" class="img-thumbnail img-preview">
          </div>
          <div class="col-sm-8">
            <div class="input-group mb-3">
              <input type="file" class="form-control  <?= ($validation->hasError('foto_produk')) ? 'is-invalid' : ''; ?>" id="foto_produk" name="foto_produk" onchange="previewImgprd()">
              <label class="input-group-text myPreviewgambar" for="foto_produk">Pilih Gambar</label>
              <div id="validationServer03Feedback" class="invalid-feedback">
                <?= $validation->getError('foto_produk'); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 control-label text-right"></label>
          <div class="col-sm-9">
            <div class="btn-group">
              <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Simpan Data</button>
              <a href="/adminproduk" class="btn btn-secondary btn-lg" data-dismiss="modal"><i class="fa fa-times"></i> Kembali</a>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>


<?= $this->endSection(); ?>

<?= $this->section('script') ?>
<script src="<?= base_url(); ?>/vendor/ckeditor5classic/ckeditor.js"></script>
<script>
  ClassicEditor
    .create(document.querySelector('#isi_produk'), {
      toolbar: ['heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote'],
      heading: {
        options: [{
            model: 'paragraph',
            title: 'Paragraph',
            class: 'ck-heading_paragraph'
          },
          {
            model: 'heading1',
            view: 'h1',
            title: 'Heading 1',
            class: 'ck-heading_heading1'
          },
          {
            model: 'heading2',
            view: 'h2',
            title: 'Heading 2',
            class: 'ck-heading_heading2'
          },
          {
            model: 'heading3',
            view: 'h3',
            title: 'Heading 3',
            class: 'ck-heading_heading3'
          }
        ]
      }
    }).then(editor => {
      console.log(editor);
    }).catch(error => {
      console.log(error);
    });
</script>
<?= $this->endSection() ?>