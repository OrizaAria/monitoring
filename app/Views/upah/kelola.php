<?= $this->extend('layout/default'); ?>


<?= $this->section('title') ?>
<title><?= $title; ?> | M&O</title>
<?= $this->endSection() ?>

<?= $this->section('content'); ?>
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
                <h4>Tabel Orderan</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-md" id="table1">
                        <thead>
                            <tr>

                                <th width="5%">#</th>
                                <th width="10%">Proses</th>
                                <th width="20%">Nama orderan</th>
                                <th width="20%">Customer</th>
                                <th width="10%">Jumlah</th>
                                <th width="20%">Total Upah</th>
                                <th width="10%">status Upah</th>
                                <th width="5%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orderan as $ord => $value) : ?>
                                <tr>
                                    <td><?= $ord + 1 ?></td>
                                    <td class="text-primary">
                                        <h6><?= $value->proses; ?></h6>
                                    </td>
                                    <td><?= $value->nama_orderan; ?></td>
                                    <td><?= $value->customer; ?></td>
                                    <td><?= $value->jml_orderan; ?> pcs</td>
                                    <td>
                                        <?php
                                        $total = 0;
                                        foreach ($upah as $key => $uph) {
                                            if ($value->id == $uph->id_orderan) {
                                                $total = $total + $uph->total_upah;
                                            }
                                        } ?>
                                        Rp. <?= number_format(($total), 0, ',', '.'); ?>
                                    </td>
                                    <td></td>
                                    <td class="text-center" style="width: 15;">
                                        <a href="<?= site_url('upah/' . $value->id . '/info') ?>" class="btn btn-info btn-sm"><i class="fas fa-info"></i></a>
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
<?= $this->endSection(); ?>