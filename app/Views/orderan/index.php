<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Orderan | M&O</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Kelola Orderan</h1>
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
                    <a href="<?= site_url('orderan/new') ?>" class="btn btn-primary btn-lg"><i class="fas fa-plus"> Tambah Data</i></a>

                </div>


            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-md" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal Masuk</th>
                                <th>Nama orderan</th>
                                <th>Brand</th>
                                <th>Jumlah</th>
                                <th>Proses</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orderan as $ord => $value) : ?>
                                <tr>
                                    <td><?= $ord + 1 ?></td>
                                    <td><?= date('d/m/Y', strtotime($value->tgl_masuk)) ?></td>
                                    <td><?= $value->nama_orderan; ?></td>
                                    <td><?= $value->brand; ?></td>
                                    <td><?= $value->jml_orderan; ?> pcs</td>
                                    <td class="text-primary">
                                        <h6><?= $value->proses; ?></h6>
                                    </td>
                                    <td class="text-center" style="width: 15;">

                                        <a href="<?= site_url('orderan/' . $value->id . '/edit') ?>" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>

                                        <form action="<?= site_url('orderan/' . $value->id) ?>" method="post" class="d-inline" id="del-<?= $value->id ?>">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah anda yakin hapus data?" data-confirm-yes="btnHapus(<?= $value->id ?>)">
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