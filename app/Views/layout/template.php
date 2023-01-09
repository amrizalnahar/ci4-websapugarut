<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url(); ?>/assets/img/favicon.png" rel="icon">
  <link href="<?= base_url(); ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url(); ?>/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url(); ?>/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Company - v4.2.0
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <?= $this->include('layout/navbar'); ?>
  <?= $this->renderSection('content'); ?>

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-4 footer-contact">
            <h3>Kelurahan Sapugarut</h3>
            <p>
              Jl. Raya Sapugarut Gg.7 Buaran <br>
              Pemerintah Kabupaten Pekalongan, Kecamatan Buaran 51171<br>
              Jawa Tengah, Indonesia <br><br>
              <!-- <strong>Phone:</strong> +1 5589 55488 55<br> -->
              <strong>Email:</strong> kelurahansapugarut@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Kategori Menu</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="/">Beranda</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/kondisigeografis">Kondisi Geografis</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/komoditiunggulan">Komoditi Unggulan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/berita">Berita</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/hubungikami">Hubungi Kami</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Pelayanan Masyarakat</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="/pembuatanktp">Pembuatan KTP</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/pembuatansktm">Pembuatan SKTM</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/suratkelahiran">Surat Kelahiran</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/suratkematian">Surat Kematian</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/pelayananlainnya">Lainnya</a></li>
            </ul>
          </div>

          <!-- <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Tentang Website Kami</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div> -->

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Kelurahan Sapugarut <?= date('Y'); ?></span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/company-free-html-bootstrap-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <!-- <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a> -->
        <!-- <a href="#" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a> -->
        <!-- <!-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> -->
        <hr>
        <a href="/admin" target="_blank" class="log-in"><i class="bx bx-log-in-circle"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url(); ?>/vendor/aos/aos.js"></script>
  <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url(); ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url(); ?>/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url(); ?>/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url(); ?>/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url(); ?>/js/main.js"></script>

  <!-- Script Spreadsheet Google Sheet Hubungi Kami -->
  <script>
    const scriptURL = 'https://script.google.com/macros/s/AKfycbzDY9O3BKfFL5snJQa5-m6BRc87PtNAxqZBxC81pF4D9tvMv3g2wPi1apBw5Rqrk_vS/exec'
    const form = document.forms['sapuragut-contact-form'];
    const btnKirim = document.querySelector('.btn-kirim');
    const btnLoading = document.querySelector('.btn-loading');
    const myAlert = document.querySelector('.my-alert');

    form.addEventListener('submit', e => {
      e.preventDefault()
      //ketika tombol submit diklik
      // tampilkan tombol loading, hilangkan tombol kirim
      btnLoading.classList.toggle('d-none');
      btnKirim.classList.toggle('d-none');
      fetch(scriptURL, {
          method: 'POST',
          body: new FormData(form)
        })
        .then(response => {
          // tampilkan tombol kirim, hilangkan tombol loading
          btnLoading.classList.toggle('d-none');
          btnKirim.classList.toggle('d-none');
          // tampilkan alert
          myAlert.classList.toggle('d-none');
          // reset formnya
          form.reset();
          console.log('Success!', response)
        })
        .catch(error => console.error('Error!', error.message))
    })
  </script>
</body>

</html>