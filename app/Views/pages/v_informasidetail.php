<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main">
	<!-- ======= Breadcrumbs ======= -->
	<section id="breadcrumbs" class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<h2><?= word_limiter($informasi['judul_informasi'], 4) ?></h2>
				<ol>
					<li><a href="/">Beranda</a></li>
					<li><a href="/informasi">Informasi</a></li>
					<li>Detail</li>
				</ol>
			</div>

		</div>
	</section><!-- End Breadcrumbs -->

	<!-- ======= Blog Single Section ======= -->
	<section id="blog" class="blog">
		<div class="container" data-aos="fade-up">
			<div class="row">
				<div class="col-lg-8 entries">
					<article class="entry entry-single">

						<div class="entry-img">
							<img src="/img/<?= $informasi['foto_informasi']; ?>" alt="" class="img-fluid">
						</div>

						<h2 class="entry-title">
							<a><?= $informasi['judul_informasi']; ?></a>
						</h2>

						<div class="entry-meta">
							<ul>
								<li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a><time datetime="01-01-2020"><?= $informasi['updated_at']; ?></time></a></li>
							</ul>
						</div>

						<div class="entry-content">
							<?= $informasi['isi_informasi']; ?>
						</div>

					</article><!-- End blog entry -->

				</div><!-- End blog entries list -->

				<div class="col-lg-4">

					<div class="sidebar">

						<h3 class="sidebar-title">Kategori Menu</h3>
						<div class="sidebar-item categories">
							<ul>
								<li><a href="/komoditiunggulan">Komoditi Unggulan</a></li>
								<li><a href="/produkunggulan">Produk Unggulan</a></li>
								<li><a href="/berita">Berita</a></li>
								<li><a href="/hubungikami">Hubungi Kami</a></li>
								<li><a href="/pelayananlainnya">Pelayanan</a></li>
							</ul>
						</div><!-- End sidebar categories-->

						<h3 class="sidebar-title">Posting Informasi Terbaru</h3>
						<div class="sidebar-item recent-posts">
							<?php foreach ($list_informasi as $a) : ?>
								<div class="post-item clearfix">
									<img src="/img/<?= $a['foto_informasi']; ?>" alt="">
									<h4><a href="<?= $a['slug_informasi']; ?>"><?= word_limiter($a['judul_informasi'], 4) ?></a></h4>
									<time><?= $a['updated_at']; ?></time>
								</div>
							<?php endforeach; ?>
						</div><!-- End sidebar recent posts-->
					</div><!-- End sidebar -->
				</div><!-- End sidebar -->

			</div>

		</div>
	</section><!-- End Blog Single Section -->

</main><!-- End #main -->

<?= $this->endSection(); ?>