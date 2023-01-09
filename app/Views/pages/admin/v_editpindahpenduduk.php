<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-8">
      <h2 class="my-3">Form Edit Informasi</h2>

      <form action="/adminpindahpenduduk/update/<?= $pindahpenduduk['id_pindahpenduduk']; ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="slug_pindahpenduduk" value="<?= $pindahpenduduk['slug_pindahpenduduk']; ?>">

        <div class="row mb-3">
          <label for="judul_pindahpenduduk" class="col-sm-2 col-form-label">Judul</label>
          <div class="col-sm-10">
            <input type="text" class="form-control  <?= ($validation->hasError('judul_pindahpenduduk')) ? 'is-invalid' : ''; ?>" id="judul_pindahpenduduk" name="judul_pindahpenduduk" autofocus value="<?= (old('judul_pindahpenduduk')) ? old('judul_pindahpenduduk') : $pindahpenduduk['judul_pindahpenduduk'] ?>">
            <div id="validationServer03Feedback" class="invalid-feedback">
              <?= $validation->getError('judul_pindahpenduduk'); ?>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <label for="isi_pindahpenduduk" class="col-sm-2 col-form-label">Deskripsi</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="isi_pindahpenduduk" name="isi_pindahpenduduk"><?= (old('isi_pindahpenduduk')) ? old('isi_pindahpenduduk') : $pindahpenduduk['isi_pindahpenduduk'] ?></textarea>

          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 control-label text-right"></label>
          <div class="col-sm-9">
            <div class="btn-group">
              <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Simpan Edit Data</button>
              <a href="/adminpindahpenduduk" class="btn btn-secondary btn-lg" data-dismiss="modal"><i class="fa fa-times"></i> Kembali</a>
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
    .create(document.querySelector('#isi_pindahpenduduk'), {
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