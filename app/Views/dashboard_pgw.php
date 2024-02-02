<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Dashboard | M&O</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Dashboard Pegawai</h1>
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
                <h4>Tabel Barang</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tbody>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Deadline</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Proses</th>
                                <th>Action</th>
                            </tr>

                            <?php foreach ($barang as $brg => $value) : ?>

                                <tr>
                                    <td><?= $brg + 1 ?></td>
                                    <td class="text-center"><?= date('d/m/Y', strtotime($value->created_at)) ?></td>
                                    <td><?= $value->nama_barang; ?></td>
                                    <td><?= $value->jumlah; ?></td>
                                    <td><?= $value->proses; ?></td>
                                    <td class="text-center" style="width: 15;">
                                        <a href="<?= site_url('hanca/edit/' . $value->id_barang) ?>" class="btn btn-info btn-sm"><i class="fas fa-info"></i></a>
                                        <a href="<?= site_url('hanca/edit/' . $value->id_barang) ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer text-right">
                <nav class="d-inline-block">
                    <ul class="pagination mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</section>
<?= $this->endSection() ?>