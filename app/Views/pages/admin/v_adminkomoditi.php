<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-4">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Daftar Komoditi Unggulan</h1>
            <a href="/adminkomoditi/tambahkomoditi"><button class="btn btn-success mb-3 justify-content-md-end" type="submit">Tambah Komoditi</button></a>
            <form action="" method="post">
                <div class=" shadow input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan kata pencarian.." name="keyword_komoditi">
                    <button type="submit" class="input-group-text" name="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">

            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Data komoditi</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th class="align-middle">Nomor</th>
                                    <th class="align-middle">Judul komoditi</th>
                                    <th class="align-middle">Isi komoditi</th>
                                    <th class="align-middle">Foto komoditi</th>
                                    <th class="align-middle">Terakhir Update</th>
                                    <th class="align-middle">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1  + (5 * ($currentPage - 1)) ?>
                                <?php foreach ($komoditi as $a) : ?>
                                    <tr>
                                        <td class="text-center align-middle"><?= $i++; ?></td>
                                        <td class="align-middle"><?= $a['judul_komoditi']; ?></td>
                                        <td class="align-middle"><?= word_limiter($a['isi_komoditi'], 40) ?></td>
                                        <td class="align-middle"><img src="/img/<?= $a['foto_komoditi']; ?>" alt="" class="img-fluid" width="150px"></td>
                                        <td class="align-middle"><?= $a['updated_at']; ?></td>
                                        <td class="align-middle">
                                            <a href="/adminkomoditi/edit/<?= $a['slug_komoditi']; ?>"><button class="btn btn-sm btn-secondary mb-2">Edit</button></a>

                                            <br>

                                            <form action="/adminkomoditi/<?= $a['id_komoditi']; ?>" method="post" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Hapus</button>
                                            </form>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?= $pager->links('tb_komoditi', 'tabel_pagination'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>