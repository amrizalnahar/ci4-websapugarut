<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-4">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Daftar Informasi Jaminan Persalinan</h1>
            <!-- <a href="/adminjaminanpersalinan/tambahjaminanpersalinan"><button class="btn btn-success mb-3 justify-content-md-end" type="submit">Tambah Informasi</button></a>
            <form action="" method="post">
                <div class=" shadow input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan kata pencarian.." name="keyword_jaminanpersalinan">
                    <button type="submit" class="input-group-text" name="submit">Cari</button>
                </div>
            </form> -->
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
                    <h6 class="m-0 font-weight-bold text-primary text-center">Data Informasi</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th class="align-middle">Nomor</th>
                                    <th class="align-middle">Judul</th>
                                    <th class="align-middle">Deskripsi</th>
                                    <th class="align-middle">Terakhir Update</th>
                                    <th class="align-middle">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1  + (5 * ($currentPage - 1)) ?>
                                <?php foreach ($jaminanpersalinan as $a) : ?>
                                    <tr>
                                        <td class="text-center align-middle"><?= $i++; ?></td>
                                        <td class="align-middle"><?= $a['judul_jaminanpersalinan']; ?></td>
                                        <td class="align-middle"><?= word_limiter($a['isi_jaminanpersalinan'], 20) ?></td>
                                        <td class="align-middle"><?= $a['updated_at']; ?></td>
                                        <td class="align-middle">
                                            <a href="/adminjaminanpersalinan/edit/<?= $a['slug_jaminanpersalinan']; ?>"><button class="btn btn-sm btn-secondary mb-2">Edit</button></a>

                                            <!-- <form action="/adminjaminanpersalinan/" method="post" class="d-inline">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Hapus</button>
                                            </form> -->

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?= $pager->links('tb_jaminanpersalinan', 'tabel_pagination'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>