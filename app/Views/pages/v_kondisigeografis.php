<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main id="main">

	<!-- ======= Breadcrumbs ======= -->
	<section id="breadcrumbs" class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<h2>Kondisi Geografis</h2>
				<ol>
					<li><a href="/">Beranda</a></li>
					<li>Kondisi Geografis</li>
				</ol>
			</div>

		</div>
	</section><!-- End Breadcrumbs -->

	<!-- ======= Contact Section ======= -->
	<div class="map-section">
		<iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.6023838978363!2d109.64997961345983!3d-6.9380327698411675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70215c5ef2fb0d%3A0x753c8500af95c699!2sKantor%20Kelurahan%20Sapugarut!5e0!3m2!1sid!2sid!4v1622289315808!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
	</div>

	<!-- ======= About Us Section ======= -->
	<section id="about-us" class="about-us">
		<div class="container" data-aos="fade-up">

			<div class="row content">
				<div class="col-lg-12 pt-4 pt-lg-0" data-aos="fade-left">
					<p>
						Sapugarut adalah kelurahan di kecamatan Buaran, Pekalongan, Jawa Tengah, Indonesia. Sapugarut memiliki tiga Pedukuhan yaitu Dukuh, Pedalangan, dan Sepuran. Batas kondisi geografis dari kelurahan sapugarut adalah sebagai berikut:
					</p>
					<ul>
						<li><i class="ri-check-double-line"></i>Batas Timur : Kelurahan Bligo</li>
						<li><i class="ri-check-double-line"></i>Batas Selatan : Pekajangan</li>
						<li><i class="ri-check-double-line"></i>Batas Utara : Desa Kertijayan</li>
						<li><i class="ri-check-double-line"></i>Batas Barat : Desa Coprayan</li>
					</ul>
					<!-- <p class="fst-italic">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
						magna aliqua.
					</p> -->
				</div>
			</div>

		</div>
	</section><!-- End About Us Section -->

</main><!-- End #main -->


<?= $this->endSection(); ?>