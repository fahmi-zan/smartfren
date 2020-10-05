<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?= base_url('admin/dasbor');?>">My Smartfren</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url('admin/dasbor');?>"><small>My</small>Sf</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
              <li><a href="<?= base_url('admin/dasbor');?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>

            <li class="menu-header">Data Master</li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>Sales</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('admin/sales')?>">Data Sales</a></li>
                  <li><a class="nav-link" href="<?= base_url('admin/sales/tambah')?>">Tambah Sales</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-lightbulb"></i> <span>Barang</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('admin/barang')?>">Data Barang</a></li>
                  <li><a class="nav-link" href="<?= base_url('admin/barang/tambah')?>">Tambah Barang</a></li>
                  <li><a class="nav-link" href="<?= base_url('admin/kategori')?>">Kategori Barang</a></li>
                </ul>
              </li>

              <li><a class="nav-link" href="<?= base_url('admin/rekening')?>"><i class="far fa-square"></i> <span>Rekening</span></a></li>
             
              <li><a class="nav-link" href="<?= base_url('admin/transaksi')?>"><i class="fas fa-money-check"></i> <span>Transaksi</span></a></li>

              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Pengguna</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('admin/user')?>">Data Pengguna</a></li>
                  <li><a class="nav-link" href="<?= base_url('admin/user/tambah')?>">Tambah Pengguna</a></li>
                </ul>
              </li>


            <li class="menu-header">Tools</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cog"></i> <span>Konfigurasi</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('admin/konfigurasi')?>">Konfigurasi Home</a></li>
                  <li><a class="nav-link" href="<?= base_url('admin/konfigurasi/icon')?>">Icon</a></li>
                  <li><a class="nav-link" href="<?= base_url('admin/konfigurasi/logo')?>">Logo</a></li>
                </ul>
              </li>
        </aside>
      </div>

     