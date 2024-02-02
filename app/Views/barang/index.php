<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Barang | M&O</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Kelola Barang</h1>
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
                    <a href="<?= site_url('barang/add') ?>" class="btn btn-primary btn-lg"><i class="fas fa-plus"> Tambah Data</i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Tanggal Masuk</th>
                                <th>Nama Barang</th>
                                <th>Brand</th>
                                <th>Jumlah</th>
                                <th>Proses</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($barang as $brg => $value) : ?>
                                <tr>
                                    <td><?= $brg + 1 ?></td>
                                    <td><?= date('d/m/Y', strtotime($value->created_at)) ?></td>
                                    <td><?= $value->nama_barang; ?></td>
                                    <td><?= $value->brand; ?></td>
                                    <td><?= $value->jumlah; ?></td>
                                    <td><?= $value->proses; ?></td>
                                    <td class="text-center" style="width: 15;">
                                        <a href="<?= site_url('barang/edit/' . $value->id_barang) ?>" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="<?= site_url('barang/' . $value->id_barang) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
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