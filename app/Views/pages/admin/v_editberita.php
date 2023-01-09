<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-8">
      <h2 class="my-3">Form Edit Berita</h2>

      <form action="/adminberita/update/<?= $berita['id_berita']; ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="slug_berita" value="<?= $berita['slug_berita']; ?>">
        <input type="hidden" name="foto_beritaLama" value="<?= $berita['foto_berita']; ?>">

        <div class="row mb-3">
          <label for="judul_berita" class="col-sm-2 col-form-label">Judul berita</label>
          <div class="col-sm-10">
            <input type="text" class="form-control  <?= ($validation->hasError('judul_berita')) ? 'is-invalid' : ''; ?>" id="judul_berita" name="judul_berita" autofocus value="<?= (old('judul_berita')) ? old('judul_berita') : $berita['judul_berita'] ?>">
            <div id="validationServer03Feedback" class="invalid-feedback">
              <?= $validation->getError('judul_berita'); ?>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <label for="isi_berita" class="col-sm-2 col-form-label">Isi Berita</label>
          <div class="col-sm-10">
            <textarea class="form-control editable_inline" id="isi_berita" name="isi_berita"><?= (old('isi_berita')) ? old('isi_berita') : $berita['isi_berita'] ?></textarea>
          </div>
        </div>
        <div class="row mb-2">
          <label for="foto_berita" class="col-sm-2 col-form-label">Foto</label>
          <div class="col-sm-2">
            <img src="/img/<?= $berita['foto_berita']; ?>" class="img-thumbnail img-preview">
          </div>
          <div class="col-sm-8">
            <div class="input-group mb-3">
              <input type="file" class="form-control  <?= ($validation->hasError('foto_berita')) ? 'is-invalid' : ''; ?>" id="foto_berita" name="foto_berita" onchange="previewImg()">
              <label class="input-group-text myPreviewgambar" for="foto_berita"><?= $berita['foto_berita']; ?></label>

              <div id="validationServer03Feedback" class="invalid-feedback">
                <?= $validation->getError('foto_berita'); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 control-label text-right"></label>
          <div class="col-sm-9">
            <div class="btn-group">
              <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Simpan Edit Data</button>
              <a href="/adminberita" class="btn btn-secondary btn-lg" data-dismiss="modal"><i class="fa fa-times"></i> Kembali</a>
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
    .create(document.querySelector('#isi_berita'), {
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