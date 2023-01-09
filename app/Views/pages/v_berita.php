<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main id="main">

	<!-- ======= Breadcrumbs ======= -->
	<section id="breadcrumbs" class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<h2>Berita</h2>
				<ol>
					<li><a href="/">Beranda</a></li>
					<li>Berita</li>
				</ol>
			</div>

		</div>
	</section><!-- End Breadcrumbs -->

	<!-- ======= Blog Section ======= -->
	<section id="blog" class="blog">
		<div class="container" data-aos="fade-up">

			<div class="row">

				<div class="col-lg-8 entries">
					<?php foreach ($berita as $a) : ?>
						<article class="entry">

							<div class="entry-img">
								<img src="/img/<?= $a['foto_berita']; ?>" alt="" class="img-fluid">
							</div>

							<h2 class="entry-title">
								<a href="berita/detail/<?= $a['slug_berita']; ?>"><?= $a['judul_berita']; ?></a>
							</h2>

							<div class="entry-meta">
								<ul>
									<li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a><time datetime="01-01-2020"><?= $a['updated_at']; ?></time></a></li>
								</ul>
							</div>

							<div class="entry-content">
								<p>
									<?= word_limiter($a['isi_berita'], 25) ?>
								</p>
								<div class="read-more">
									<a href="berita/detail/<?= $a['slug_berita']; ?>">Read More</a>
								</div>
							</div>

						</article><!-- End blog entry -->
					<?php endforeach; ?>
					<?= $pager->links('tb_berita', 'blog_pagination'); ?>
				</div><!-- End blog entries list -->

				<div class="col-lg-4">

					<div class="sidebar">
						<h3 class="sidebar-title">Search</h3>
						<div class="sidebar-item search-form">
							<form action="">
								<input type="text" name="keyword_berita">
								<button type="submit"><i class="bi bi-search"></i></button>
							</form>
						</div><!-- End sidebar search form-->

						<h3 class="sidebar-title">Kategori Menu</h3>
						<div class="sidebar-item categories">
							<ul>
								<li><a href="/komoditiunggulan">Komoditi Unggulan</a></li>
								<li><a href="/produkunggulan">Produk Unggulan</a></li>
								<li><a href="/informasi">Informasi</a></li>
								<li><a href="/hubungikami">Hubungi Kami</a></li>
								<li><a href="/pelayananlainnya">Pelayanan</a></li>
							</ul>
						</div><!-- End sidebar categories-->

						<h3 class="sidebar-title">Kejaksaan Terkini</h3>
						<div class="sidebar-item recent-posts">
							<?php foreach ($listing_berita as $berita) : ?>
								<div class="post-item clearfix">
									<img src="/img/<?= $berita['foto_berita']; ?>" alt="">
									<h4><a href="berita/detail/<?= $berita['slug_berita']; ?>"><?= word_limiter($berita['judul_berita'], 4) ?></a></h4>
									<time><?= $berita['updated_at']; ?></time>
								</div>
							<?php endforeach; ?>
						</div><!-- End sidebar recent posts-->

					</div><!-- End sidebar -->

				</div><!-- End sidebar -->

			</div><!-- End blog sidebar -->

		</div>

		</div>
	</section><!-- End Blog Section -->

</main><!-- End #main -->

<?= $this->endSection(); ?>