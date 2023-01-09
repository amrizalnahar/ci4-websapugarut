<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main id="main">

	<!-- ======= Breadcrumbs ======= -->
	<section id="breadcrumbs" class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<h2>Produk Unggulan</h2>
				<ol>
					<li><a href="/">Beranda</a></li>
					<li>Produk Unggulan</li>
				</ol>
			</div>

		</div>
	</section><!-- End Breadcrumbs -->

	<!-- ======= Blog Section ======= -->
	<section id="blog" class="blog">
		<div class="container" data-aos="fade-up">

			<div class="row">

				<div class="col-lg-8 entries">
					<?php foreach ($produk as $a) : ?>
						<article class="entry">

							<div class="entry-img">
								<img src="/img/<?= $a['foto_produk']; ?>" alt="" class="img-fluid">
							</div>

							<h2 class="entry-title">
								<a href="produkunggulan/detail/<?= $a['slug_produk']; ?>"><?= $a['judul_produk']; ?></a>
							</h2>

							<div class="entry-meta">
								<ul>
									<li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a><time datetime="01-01-2020"><?= $a['updated_at']; ?></time></a></li>
								</ul>
							</div>

							<div class="entry-content">
								<p>
									<?= word_limiter($a['isi_produk'], 25) ?>
								</p>
								<div class="read-more">
									<a href="produkunggulan/detail/<?= $a['slug_produk']; ?>">Read More</a>
								</div>
							</div>

						</article><!-- End blog entry -->
					<?php endforeach; ?>
					<?= $pager->links('tb_produkunggulan', 'blog_pagination'); ?>
				</div><!-- End blog entries list -->

				<div class="col-lg-4">

					<div class="sidebar">

						<h3 class="sidebar-title">Search</h3>
						<div class="sidebar-item search-form">
							<form action="" method="POST">
								<input type="text" name="keyword_produk">
								<button type="submit"><i class="bi bi-search"></i></button>
							</form>
						</div><!-- End sidebar search formn-->

						<h3 class="sidebar-title">Kategori Menu</h3>
						<div class="sidebar-item categories">
							<ul>
								<li><a href="/komoditiunggulan">Komoditi Unggulan</a></li>
								<li><a href="/berita">Berita</a></li>
								<li><a href="/informasi">Informasi</a></li>
								<li><a href="/hubungikami">Hubungi Kami</a></li>
								<li><a href="/pelayananlainnya">Pelayanan</a></li>
							</ul>
						</div><!-- End sidebar categories-->

						<h3 class="sidebar-title">Posting Terbaru</h3>
						<div class="sidebar-item recent-posts">
							<?php foreach ($listing_produk as $a) : ?>
								<div class="post-item clearfix">
									<img src="/img/<?= $a['foto_produk']; ?>" alt="">
									<h4><a href="produkunggulan/detail/<?= $a['slug_produk']; ?>"><?= word_limiter($a['judul_produk'], 4) ?></a></h4>
									<time><?= $a['updated_at']; ?></time>
								</div>
							<?php endforeach; ?>
						</div><!-- End sidebar recent posts-->

					</div><!-- End sidebar -->

				</div><!-- End blog sidebar -->

			</div>

		</div>
	</section><!-- End Blog Section -->

</main><!-- End #main -->

<?= $this->endSection(); ?>