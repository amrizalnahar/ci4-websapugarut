<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-8">
      <h2 class="my-3">Form Edit Produk</h2>

      <form action="/adminproduk/update/<?= $produk['id_produk']; ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="slug_produk" value="<?= $produk['slug_produk']; ?>">
        <input type="hidden" name="foto_produkLama" value="<?= $produk['foto_produk']; ?>">

        <div class="row mb-3">
          <label for="judul_produk" class="col-sm-2 col-form-label">Judul produk</label>
          <div class="col-sm-10">
            <input type="text" class="form-control  <?= ($validation->hasError('judul_produk')) ? 'is-invalid' : ''; ?>" id="judul_produk" name="judul_produk" autofocus value="<?= (old('judul_produk')) ? old('judul_produk') : $produk['judul_produk'] ?>">
            <div id="validationServer03Feedback" class="invalid-feedback">
              <?= $validation->getError('judul_produk'); ?>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <label for="isi_produk" class="col-sm-2 col-form-label">Isi produk</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="isi_produk" name="isi_produk"><?= (old('isi_produk')) ? old('isi_produk') : $produk['isi_produk'] ?></textarea>
          </div>
        </div>
        <div class="row mb-2">
          <label for="foto_produk" class="col-sm-2 col-form-label">Foto</label>
          <div class="col-sm-2">
            <img src="/img/<?= $produk['foto_produk']; ?>" class="img-thumbnail img-preview">
          </div>
          <div class="col-sm-8">
            <div class="input-group mb-3">
              <input type="file" class="form-control  <?= ($validation->hasError('foto_produk')) ? 'is-invalid' : ''; ?>" id="foto_produk" name="foto_produk" onchange="previewImg()">
              <label class="input-group-text myPreviewgambar" for="foto_produk"><?= $produk['foto_produk']; ?></label>
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
              <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Simpan Edit Data</button>
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