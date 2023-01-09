        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-code"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Halaman Admin</div>
            </a>



            <!-- Akses Admin -->
            <?php if (in_groups('admin')) : ?>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    User Management
                </div>

                <!-- Nav Item - Dashboard -->
                <li class="nav-item <?= ($currentAdminMenu == 'admin') ? 'active' : '' ?>">
                    <a class="nav-link text-left" href="<?= base_url('admin'); ?>">
                        <i class="fas fa-users"></i>
                        <span>User List</span></a>
                </li>
            <?php endif; ?>
            <!-- Akhir Akses Admin -->

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Profil Saya
            </div>
            <!-- Nav Item - Tables -->
            <li class="nav-item <?= ($currentAdminMenu == 'pengguna') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('user'); ?>">
                    <i class="fas fa-user"></i>
                    <span>My Profil</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Menu Konten
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?= ($currentAdminMenu == 'potensidesa') ? 'active' : '' ?>">
                <a class="nav-link <?= ($currentAdminMenu == 'potensidesa') ? '' : 'collapsed' ?>" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded=" <?= ($currentAdminMenu == 'potensidesa') ? 'true' : 'false' ?> " aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Potensi Desa</span>
                </a>
                <div id="collapseTwo" class=" <?= ($currentAdminMenu == 'potensidesa') ? 'collapse show' : 'collapse' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sub Menu:</h6>
                        <a class="collapse-item <?= ($currentAdminSubMenu == 'adminkomoditi') ? 'active' : '' ?>" href="<?= base_url('adminkomoditi'); ?>">Komoditi Unggulan</a>
                        <a class="collapse-item <?= ($currentAdminSubMenu == 'adminproduk') ? 'active' : '' ?>" href="<?= base_url('adminproduk'); ?>">Produk Unggulan</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item <?= ($currentAdminMenu == 'menupublik') ? 'active' : '' ?>">
                <a class="nav-link <?= ($currentAdminMenu == 'menupublik') ? '' : 'collapsed' ?>" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="<?= ($currentAdminMenu == 'menupublik') ? 'true' : 'false' ?>" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Menu Publik</span>
                </a>
                <div id="collapseUtilities" class=" <?= ($currentAdminMenu == 'menupublik') ? 'collapse show' : 'collapse' ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sub Menu:</h6>
                        <a class="collapse-item <?= ($currentAdminSubMenu == 'adminberita') ? 'active' : '' ?>" href="<?= base_url('adminberita'); ?>">Berita</a>
                        <a class="collapse-item <?= ($currentAdminSubMenu == 'admininformasi') ? 'active' : '' ?>" href="<?= base_url('admininformasi'); ?>">Informasi</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?= ($currentAdminMenu == 'pelayananmasyarakat') ? 'active' : '' ?>">
                <a class="nav-link <?= ($currentAdminMenu == 'pelayananmasyarakat') ? '' : 'collapsed' ?>" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="<?= ($currentAdminMenu == 'pelayananmasyarakat') ? 'true' : 'false' ?>" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-users-cog"></i>
                    <span>Pelayanan Masyarakat</span>
                </a>
                <div id="collapsePages" class="<?= ($currentAdminMenu == 'pelayananmasyarakat') ? 'collapse show' : 'collapse' ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sub Menu:</h6>
                        <a class="collapse-item <?= ($currentAdminSubMenu == 'adminktp') ? 'active' : '' ?>" href="<?= base_url('adminktp'); ?>">Pembuatan KTP</a>
                        <a class="collapse-item <?= ($currentAdminSubMenu == 'adminsktm') ? 'active' : '' ?>" href="<?= base_url('adminsktm'); ?>">Pembuatan SKTM</a>
                        <a class="collapse-item <?= ($currentAdminSubMenu == 'adminperkawinan') ? 'active' : '' ?>" href="<?= base_url('adminperkawinan'); ?>">Permohonan Perkawinan</a>
                        <a class="collapse-item <?= ($currentAdminSubMenu == 'adminkelahiran') ? 'active' : '' ?>" href="<?= base_url('adminkelahiran'); ?>">Surat Kelahiran</a>
                        <a class="collapse-item <?= ($currentAdminSubMenu == 'adminkematian') ? 'active' : '' ?>" href="<?= base_url('adminkematian'); ?>">Surat Kematian</a>
                        <a class="collapse-item <?= ($currentAdminSubMenu == 'adminpindahpenduduk') ? 'active' : '' ?>" href="<?= base_url('adminpindahpenduduk'); ?>">Surat Pindah Penduduk</a>
                        <a class="collapse-item <?= ($currentAdminSubMenu == 'adminjaminanpersalinan') ? 'active' : '' ?>" href="<?= base_url('adminjaminanpersalinan'); ?>">Surat Jaminan Persalinan</a>
                        <a class="collapse-item <?= ($currentAdminSubMenu == 'adminwaris') ? 'active' : '' ?>" href="<?= base_url('adminwaris'); ?>">Surat Keterangan Waris</a>
                        <a class="collapse-item <?= ($currentAdminSubMenu == 'admindomisiliusaha') ? 'active' : '' ?>" href="<?= base_url('admindomisiliusaha'); ?>">Surat Domisili Usaha</a>
                        <a class="collapse-item <?= ($currentAdminSubMenu == 'adminhargatanah') ? 'active' : '' ?>" href="<?= base_url('adminhargatanah'); ?>">Surat Harga Tanah</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Menu Pengaduan
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item <?= ($currentAdminMenu == 'pengaduanmasyarakat') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('adminpengaduanmasyarakat'); ?>">
                    <i class="fas fa-fw fa-headset"></i>
                    <span>Pengaduan Masyarakat</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Logout
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout'); ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->