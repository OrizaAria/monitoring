<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title><?= $title; ?> | M&O</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Riwayat <?= $title; ?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url('') ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Riwayat Kerjaan</div>
        </div>
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
                <h4>Data Kerjaan Diambil</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-md" id="table-1">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="20%">Tanggal Produksi</th>
                                <th width="15%">Nama orderan</th>
                                <th width="10%">Jumlah orderan</th>
                                <th width="10%">Jumlah Pribadi</th>
                                <th>Status Produksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produksi as $prd => $value) : ?>
                                <tr>
                                    <td><?= $prd + 1; ?></td>
                                    <td><?= date('d/m/Y', strtotime($value->tanggal_mulai)) ?> - <?= date('d/m/Y', strtotime($value->tanggal_mulai)) ?></td>
                                    <td><?= $value->nama_orderan; ?></td>
                                    <td><?= $value->jml_orderan; ?> pcs</td>
                                    <td><?= $value->jml_pribadi; ?> pcs</td>
                                    <td>
                                        <span class="badge <?= ($value->status_hanca == "Checked") ? 'badge-primary' : (($value->status_hanca == "On Proses") ? 'badge-warning' : 'badge-success') ?>"><?= $value->status_hanca; ?></span>
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