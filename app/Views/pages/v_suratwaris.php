<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main">
	<!-- ======= Breadcrumbs ======= -->
	<section id="breadcrumbs" class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<h2>Pembuatan Surat Waris</h2>
				<ol>
					<li><a href="/">Beranda</a></li>
					<li>Pembuatan Surat Waris</li>
				</ol>
			</div>

		</div>
	</section><!-- End Breadcrumbs -->

	<!-- ======= Blog Single Section ======= -->
	<section id="blog" class="blog">
		<div class="container" data-aos="fade-up">
			<div class="row">
				<div class="col-lg-8 entries">
					<?php foreach ($waris as $waris) : ?>
						<article class="entry entry-single">

							<h2 class="entry-title">
								<a><?= $waris['judul_waris']; ?></a>
							</h2>

							<div class="entry-meta">
								<ul>
									<li class="d-flex align-items-center"><i class="bi bi-clock"></i><?= $waris['updated_at']; ?></li>
								</ul>
							</div>

							<div class="entry-content">
								<?= $waris['isi_waris']; ?>
							</div>

						</article><!-- End blog entry -->
					<?php endforeach; ?>
				</div><!-- End blog entries list -->

				<div class="col-lg-4">

					<div class="sidebar">
						<h3 class="sidebar-title">Kategori Menu</h3>
						<div class="sidebar-item categories">
							<ul>
								<li><a href="/komoditiunggulan">Komoditi Unggulan</a></li>
								<li><a href="/produkunggulan">Produk Unggulan</a></li>
								<li><a href="/berita">Berita</a></li>
								<li><a href="/informasi">Informasi</a></li>
								<li><a href="/hubungikami">Hubungi Kami</a></li>
								<li><a href="/pelayananlainnya">Pelayanan</a></li>
							</ul>
						</div><!-- End sidebar categories-->
					</div><!-- End sidebar -->
				</div><!-- End sidebar -->

			</div>

		</div>
	</section><!-- End Blog Single Section -->

</main><!-- End #main -->

<?= $this->endSection(); ?>