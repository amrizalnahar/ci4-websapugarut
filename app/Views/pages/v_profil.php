<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container bg-info">
	<div class="row" style="padding: 20px 20px;">
		<!-- MENU UTAMA -->
		<div class="col-sm-8">


		</div>

		<!-- MENU BAR-->
		<div class="col-sm-4">
			<div class="card">
				<div class="card-header" style="text-align: center;">
					Bapak Lurah Sapugarut
				</div>
				<img src="/assets/lurah.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Card title</h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				</div>
				<div class="card-body">
					<a href="#" class="card-link">Card link</a>
					<a href="#" class="card-link">Another link</a>
				</div>
			</div>

			<br>

			<div class="d-flex flex-column bd-highlight mb-3 ">
				<h4>Informasi Terbaru</h4>
				<div class="p-2 bd-highlight border">Flex item 1</div>
				<div class="p-2 bd-highlight border">Flex item 2</div>
				<div class="p-2 bd-highlight border">Flex item 3</div>
			</div>
		</div>


	</div>
	<!-- End Row -->

</div>
<!-- End Container -->

<?= $this->endSection(); ?>