<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Pegawai | M&O</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Kelola Pegawai</h1>
    </div>


    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Success !</b>
                <?= session()->getFlashdata('success') ?>
            </div>
        </div>
    <?php endif ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Error !</b>
                <?= session()->getFlashdata('error') ?>
            </div>
        </div>
    <?php endif ?>


    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <div class="section-header-button">
                    <a href="<?= site_url('pegawai/new') ?>" class="btn btn-primary btn-lg"><i class="fas fa-plus"> Tambah Data</i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Bagian</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($pegawai as $pgw => $value) : ?>
                                <tr>
                                    <td><?= $pgw + 1 ?></td>
                                    <td><?= $value->nama_pegawai; ?></td>
                                    <td><?= $value->bagian; ?></td>
                                    <td><?= $value->alamat; ?></td>
                                    <td><?= $value->telp; ?></td>
                                    <td class="text-center" style="width: 15;">
                                        <a href="<?= site_url('pegawai/edit/' . $value->id_pegawai) ?>" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="<?= site_url('pegawai/delete/' . $value->id_pegawai) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
                                            <?= csrf_field() ?>
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>
<?= $this->endSection() ?>