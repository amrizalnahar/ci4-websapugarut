<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main id="main">

	<!-- ======= Breadcrumbs ======= -->
	<section id="breadcrumbs" class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<h2>Hubungi Kami</h2>
				<ol>
					<li><a href="/">Beranda</a></li>
					<li>Hubungi Kami</li>
				</ol>
			</div>

		</div>
	</section><!-- End Breadcrumbs -->

	<!-- ======= Contact Section ======= -->
	<div class="map-section">
		<iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.6023838978363!2d109.64997961345983!3d-6.9380327698411675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70215c5ef2fb0d%3A0x753c8500af95c699!2sKantor%20Kelurahan%20Sapugarut!5e0!3m2!1sid!2sid!4v1622289315808!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
	</div>

	<section id="contact" class="contact">
		<div class="container">

			<div class="row justify-content-center" data-aos="fade-up">

				<div class="col-lg-10">

					<div class="info-wrap">
						<div class="row">
							<div class="col-lg-4 info">
								<i class="bi bi-geo-alt"></i>
								<h4>Lokasi</h4>
								<p>Jl. Raya Sapugarut Gg.7 Buaran<br>Kecamatan Buaran, Jateng 51171</p>
							</div>

							<div class="col-lg-4 info mt-4 mt-lg-0">
								<i class="bi bi-envelope"></i>
								<h4>Email:</h4>
								<p>kelurahansapugarut@gmail.com</p>
							</div>

							<div class="col-lg-4 info mt-4 mt-lg-0">
								<i class="bi bi-phone"></i>
								<h4>Call:</h4>
								<p>+1 5589 55488 51<br>+1 5589 22475 14</p>
							</div>
						</div>
					</div>

				</div>

			</div>

			<div class="row mt-5 justify-content-center" data-aos="fade-up">
				<div class="col-lg-10">
					<div class="alert alert-success alert-dismissible fade show text-center my-alert d-none" role="alert">
						<strong>Terimakasih!</strong> Pesan anda sudah kami terima.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<form method="post" role="form" class="php-email-form" name="sapuragut-contact-form">
						<div class="row">
							<div class="col-md-6 form-group">
								<input type="text" name="nama" class="form-control" id="name" placeholder="Masukkan Nama Anda" required>
							</div>

							<div class="col-md-6 form-group mt-3 mt-md-0">
								<input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email Anda" required>
							</div>

							<div class="form-group mt-3">
								<textarea class="form-control" name="pesan" rows="5" placeholder="Ketikkan Pesan" required></textarea>
							</div>



							<div class="text-center">
								<button class="btn-kirim" type="submit">Kirim Pesan</button>
								<button class="btn btn-transparant btn-loading d-none" type="button" disabled>
									<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
									Loading...
								</button>
							</div>

					</form>
				</div>

			</div>

		</div>

	</section><!-- End Contact Section -->

</main><!-- End #main -->

<?= $this->endSection(); ?>