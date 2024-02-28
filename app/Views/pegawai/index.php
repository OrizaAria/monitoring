<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title><?= $title; ?> | M&O</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Kelola <?= $title; ?></h1>
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
                    <table class="table table-bordered table-striped table-md" id="table-1">
                        <thead>

                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Bagian</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pegawai as $pgw => $value) : ?>
                                <tr>
                                    <td><?= $pgw + 1 ?></td>
                                    <td><?= $value->nama_pegawai; ?></td>
                                    <td><mark> <?= $value->bagian; ?> </mark></td>
                                    <td><?= $value->alamat; ?></td>
                                    <td><?= $value->telp; ?></td>
                                    <td><?= $value->name; ?></td>
                                    <td class="text-center" style="width: 15">
                                        <a href="<?= site_url('pegawai/edit/' . $value->userId) ?>" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="<?= site_url('pegawai/delete/' . $value->userId) ?>" method="post" class="d-inline" id="del-<?= $value->userId ?>">
                                            <?= csrf_field() ?>
                                            <button class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah anda yakin hapus data?" data-confirm-yes="btnHapus(<?= $value->userId ?>)">
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