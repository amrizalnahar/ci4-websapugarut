<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for datatables template -->
    <link href="<?= base_url(); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?= $this->include('layout/sidebar_admin'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= $this->include('layout/topbar_admin'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?= $this->renderSection('page-content'); ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Kelurahan Sapugarut Administrator <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih Logout Untuk Keluar Dari Halaman Admin</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Script CK Editor 5 -->
    <?= $this->renderSection('script') ?>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/bootstrap/jsadmin/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

    <style>
        .editable_inline {
            min-height: 300px;
        }
    </style>

    <!-- Preview Foto di tambah/edit berita -->
    <script>
        function previewImgbrt() {
            const foto_berita = document.querySelector('#foto_berita');
            const foto_beritaLabel = document.querySelector('.input-group-text');
            const imgPreview = document.querySelector('.img-preview');

            foto_beritaLabel.textContent = foto_berita.files[0].name;

            const filefotoBerita = new FileReader();
            filefotoBerita.readAsDataURL(foto_berita.files[0]);

            filefotoBerita.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function previewImginf() {
            const foto_informasi = document.querySelector('#foto_informasi');
            const foto_informasiLabel = document.querySelector('.input-group-text');
            const imgPreview = document.querySelector('.img-preview');

            foto_informasiLabel.textContent = foto_informasi.files[0].name;

            const $fileFotoInformasi = new FileReader();
            $fileFotoInformasi.readAsDataURL(foto_informasi.files[0]);

            $fileFotoInformasi.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function previewImgkmd() {
            const foto_komoditi = document.querySelector('#foto_komoditi');
            const foto_komoditiLabel = document.querySelector('.input-group-text');
            const imgPreview = document.querySelector('.img-preview');

            foto_komoditiLabel.textContent = foto_komoditi.files[0].name;

            const $fileFotokomoditi = new FileReader();
            $fileFotokomoditi.readAsDataURL(foto_komoditi.files[0]);

            $fileFotokomoditi.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function previewImgprd() {
            const foto_produk = document.querySelector('#foto_produk');
            const foto_produkLabel = document.querySelector('.input-group-text');
            const imgPreview = document.querySelector('.img-preview');

            foto_produkLabel.textContent = foto_produk.files[0].name;

            const $fileFotoproduk = new FileReader();
            $fileFotoproduk.readAsDataURL(foto_produk.files[0]);

            $fileFotoproduk.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
    <!-- End Preview Foto di tambah/edit berita -->

</body>

</html>