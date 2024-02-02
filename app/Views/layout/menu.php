<li class="menu-header">Dashboard</li>
<li class="nav-item dropdown">
    <a href="<?= site_url() ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
</li>
<li class="menu-header">Antar Muka Owner</li>
<li class="nav-item">
    <a class="nav-link" href="<?= site_url('barang') ?>">
        <i class="fas fa-business-time"></i>
        <span>Kelola Barang</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?= site_url('produksi') ?>">
        <i class="fas fa-industry"></i>
        <span>Kelola Produksi</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?= site_url('pengupahan') ?>">
        <i class="fas fa-file-invoice-dollar"></i>
        <span>Kelola Pengupahan</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?= site_url('pegawai') ?>">
        <i class="fas fa-address-book"></i>
        <span>Kelola Pegawai</span>
    </a>
</li>

<li class="menu-header">Antar Muka Operator</li>
<li class="nav-item">
    <a class="nav-link" href="dashboard">
        <i class="fas fa-fire"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
        <i class="fas fa-database"></i>
        <span>Data Kerjaan</span>
    </a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="<?= site_url('hanca') ?>"><i class="fas fa-clipboard"></i><span>Hanca</span></a></li>
        <li><a class="nav-link" href="<?= site_url('riwayat_hanca') ?>"><i class="fas fa-clock"></i><span>Riwayat</span></a></li>
    </ul>
</li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
        <i class="fas fa-money-check"></i>
        <span>Data Upah</span>
    </a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="<?= site_url('upah') ?>"><i class="fas fa-dollar-sign"></i> Upah</a></li>
        <li><a class="nav-link" href="<?= site_url('riwayat_upah') ?>"><i class="fas fa-clock"></i> Riwayat</a></li>
    </ul>
</li>