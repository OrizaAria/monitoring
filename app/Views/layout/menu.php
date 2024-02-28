<li class="menu-header">Dashboard</li>
<li class="nav-item dropdown">
    <a href="<?= site_url('dashboard') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
</li>

<?php if (in_groups('owner')) : ?>
    <li class="menu-header">Antar Muka Owner</li>
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('orderan') ?>">
            <i class="fas fa-business-time"></i>
            <span>Kelola Orderan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('produksi') ?>">
            <i class="fas fa-industry"></i>
            <span>Kelola Produksi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('upah') ?>">
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
<?php endif; ?>

<?php if (in_groups('operator')) : ?>
    <li class="menu-header">Antar Muka Operator</li>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('produksi/' . user()->id) ?>">
            <i class="fas fa-database"></i>
            <span>Data Kerjaan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('upah/' . user()->id) ?>">
            <i class="fas fa-database"></i>
            <span>Data Upah</span>
        </a>
    </li>

<?php endif; ?>