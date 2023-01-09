<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main id="main">

	<!-- ======= Breadcrumbs ======= -->
	<section id="breadcrumbs" class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<h2>Info Pelayanan</h2>
				<ol>
					<li><a href="index.html">Home</a></li>
					<li>Info Pelayanan</li>
				</ol>
			</div>

		</div>
	</section><!-- End Breadcrumbs -->

	<!-- ======= Features Section ======= -->
	<section id="features" class="features">
		<div class="container" data-aos="fade-up">

			<div class="section-title">
				<h2>Informasi Pelayanan Masyarakat</h2>
				<p>Berikut adalah informasi mengenai pelayanan kelurahan yang ditujukan kepada masyarakat kelurahan sapugarut</p>
			</div>

			<div class="row">
				<div class="col-lg-3 col-md-4">
					<div class="icon-box">
						<i class="ri-file-list-3-line" style="color: #ffbb2c;"></i>
						<h3><a href="/pembuatanktp">Pembuatan KTP</a></h3>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 mt-4 mt-md-0">
					<div class="icon-box">
						<i class="ri-file-list-3-line" style="color: #5578ff;"></i>
						<h3><a href="/pembuatansktm">Pembuatan SKTM</a></h3>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 mt-4 mt-md-0">
					<div class="icon-box">
						<i class="ri-file-list-3-line" style="color: #e80368;"></i>
						<h3><a href="/permohonanperkawinan">Permohonan Perkawinan</a></h3>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
					<div class="icon-box">
						<i class="ri-file-list-3-line" style="color: #e361ff;"></i>
						<h3><a href="/suratkelahiran">Surat Kelahiran</a></h3>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 mt-4">
					<div class="icon-box">
						<i class="ri-file-list-3-line" style="color: #47aeff;"></i>
						<h3><a href="/suratkematian">Surat Kematian</a></h3>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 mt-4">
					<div class="icon-box">
						<i class="ri-file-list-3-line" style="color: #ffa76e;"></i>
						<h3><a href="/suratpindahpenduduk">Surat Pindah Penduduk</a></h3>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 mt-4">
					<div class="icon-box">
						<i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
						<h3><a href="/suratjaminanpersalinan">Surat Jaminan Persalinan</a></h3>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 mt-4">
					<div class="icon-box">
						<i class="ri-file-list-3-line" style="color: #4233ff;"></i>
						<h3><a href="/suratketeranganwaris">Surat Keterangan Waris</a></h3>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 mt-4">
					<div class="icon-box">
						<i class="ri-file-list-3-line" style="color: #b2904f;"></i>
						<h3><a href="/suratdomisiliusaha">Surat Domisili Usaha</a></h3>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 mt-4">
					<div class="icon-box">
						<i class="ri-file-list-3-line" style="color: #b20969;"></i>
						<h3><a href="/surathargatanah">Surat Harga Tanah</a></h3>
					</div>
				</div>

			</div>
		</div>

		</div>
	</section><!-- End Features Section -->

</main><!-- End #main -->

<?= $this->endSection(); ?>