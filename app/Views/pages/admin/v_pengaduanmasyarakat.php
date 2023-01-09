<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pengaduan Masyarakat</h1>
    
    <div class="row">
        <div class="col-lg-12">
        <iframe style="border:0; width: 100%; height: 500px;" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTljPaTsVR26n1flZMkgwIcZeoSTEaujPPQtu7ylaUTJFZJOBdMkbdDeftYWEX0EuU-Se5_sZfrnvY8/pubhtml?widget=true&amp;headers=false"></iframe>
            <div class="d-grid gap-2 d-md-block">
                <a href="https://docs.google.com/spreadsheets/d/1ItKygIAQJpi3buu-AJJDP3T_souUVQVIMUQ08Am1FDQ/edit#gid=0" target="_blank"><button class="btn btn-secondary btn-sm" type="button">Buka Spreadsheet</button></a>
            </div>      
        </div>

    </div>


</div>

				
<?= $this->endSection(); ?>