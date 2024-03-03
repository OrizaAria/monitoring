<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title><?= $title; ?> | M&O</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Riwayat <?= $title; ?></h1>
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
                <h4>Tabel Data Upah</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-md" id="table-1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="20%">Tanggal Produksi</th>
                                <th width="15%">Nama orderan</th>
                                <th width="10%">Jumlah orderan</th>
                                <th width="10%">Jumlah Pribadi</th>
                                <th>Upah</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($upah as $key => $value) : ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><?= date('d/m/Y', strtotime($value->tanggal_mulai)) ?> - <?= date('d/m/Y', strtotime($value->tanggal_mulai)) ?></td>
                                    <td><?= $value->nama_orderan; ?></td>
                                    <td><?= $value->jml_orderan; ?> pcs</td>
                                    <td><?= $value->jml_konfirmasi; ?> pcs</td>
                                    <td>Rp. <?= (number_format(($value->jml_pribadi * $value->harga_orderan), 0, ',', '.')); ?></td>
                                    <td>
                                        <span class="badge <?= ($value->status_upah == "Checked") ? 'badge-primary' : 'badge-success' ?>"><?= $value->status_upah; ?></span>
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