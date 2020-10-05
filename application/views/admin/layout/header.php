<div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        <div class="search-backdrop"></div>
        <div class="search-result">
            <div class="search-header">
            Histories
            </div>
           
            <div class="search-header">
            Projects
            </div>
            <div class="search-item">
            <a href="#">
                <div class="search-icon bg-danger text-white mr-3">
                <i class="fas fa-code"></i>
                </div>
                Stisla Admin Template
            </a>
            </div>
            <div class="search-item">
            <a href="#">
                <div class="search-icon bg-primary text-white mr-3">
                <i class="fas fa-laptop"></i>
                </div>
                Create a new Homepage Design
            </a>
            </div>
        </div>
        </div>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
        <div class="dropdown-menu dropdown-list dropdown-menu-right">
            <div class="dropdown-header">Messages
            <div class="float-right">
                <a href="#">Mark All As Read</a>
            </div>
            </div>
            <div class="dropdown-list-content dropdown-list-message">
            <a href="#" class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item-avatar">
                <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle">
                <div class="is-online"></div>
                </div>
                <div class="dropdown-item-desc">
                <b>Kusnaedi</b>
                <p>Hello, Bro!</p>
                <div class="time">10 Hours Ago</div>
                </div>
            </a>
            </div>
            <div class="dropdown-footer text-center">
            <a href="#">View All <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
        </li>
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
        <div class="dropdown-menu dropdown-list dropdown-menu-right">
            <div class="dropdown-header">Notifications
            <div class="float-right">
                <a href="#">Mark All As Read</a>
            </div>
            </div>
            <div class="dropdown-list-content dropdown-list-icons">
            <a href="#" class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item-icon bg-primary text-white">
                <i class="fas fa-code"></i>
                </div>
                <div class="dropdown-item-desc">
                Template update is available now!
                <div class="time text-primary">2 Min Ago</div>
                </div>
            </a>
            </div>
            <div class="dropdown-footer text-center">
            <a href="#">View All <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="<?= base_url('assets/upload/profile/') . $this->session->userdata('image') ;?>" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block"><?= $this->session->userdata('nama');?></div></a>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title"><?= $this->session->userdata('level_akses');?> - <?= date('d M Y')?></div>
            <a href="<?= base_url('admin/user/profile') ;?>" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
            </a>

            <a href="<?= base_url('admin/konfigurasi')?>" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Settings
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('login/logout');?>" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
        </li>
    </ul>
    </nav>