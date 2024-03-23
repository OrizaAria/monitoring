<?= $this->extend('layout/default'); ?>

<?= $this->section('title') ?>
<title><?= $title; ?> | M&O</title>
<?= $this->endSection() ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1><?= $title ?> </h1>
    </div>

    <?php

    if (in_groups('owner')) : ?>
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h4>Progress Produksi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-md" id="table-1" width="100%">
                                <thead>

                                    <tr class="table-primary">
                                        <th width="5%" class="text-center">#</th>
                                        <th width="15%">Nama Orderan</th>
                                        <th>Progress</th>
                                        <th width="15%">status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($progressProduksi as $ord => $order) : ?>
                                        <tr>
                                            <td class="text-center"><?= $ord + 1; ?></td>
                                            <td>
                                                <b><?= $order->nama_orderan; ?></b>
                                                <small><?= $order->brand; ?></small>
                                            </td>
                                            <td>
                                                <?php
                                                $total = 0;
                                                foreach ($produksi as $key => $prod) {
                                                    if ($order->id == $prod->id_orderan) {

                                                        $total = $total + $prod->jml_pribadi;
                                                    }
                                                }
                                                $progress = round(($total / $order->jml_orderan) * 100);
                                                if ($progress > 100) {
                                                    $progress = 100;
                                                }
                                                ?>

                                                <div class="mb-4">
                                                    <div class="text-small float-right font-weight-bold text-muted"><?= $progress; ?> %</div>
                                                    <div class="font-weight-bold mb-1">

                                                        <a><?= $order->customer; ?></a>
                                                        <div class="bullet"></div>
                                                        <a href="#"> <?= $order->jml_orderan; ?> pcs</a>

                                                    </div>
                                                    <a class="progress" data-toggle="tooltip" data-placement="top" title="<?= $progress ?> %">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated <?= ($progress <= 30) ? 'bg-danger' : (($progress <= 60) ? 'bg-warning' : (($progress <= 80) ? '' : (($progress = 100) ? 'bg-success' : 'bg-secondary'))) ?>" role="progressbar" style="width: <?= $progress ?>%" aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </a>
                                                </div>



                                            </td>
                                            <td>
                                                <span class="badge <?= ($order->status_produksi == "On Proses") ? 'badge-warning' : (($order->status_produksi == "Selesai") ? 'badge-success' : 'badge-secondary') ?>"><?= $order->status_produksi; ?></span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-5">
                <div class="card card-statistic-1">
                    <a href="<?= site_url('orderan') ?>" class="bg-primary card-icon">
                        <i class="fas fa-business-time"></i>
                    </a>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Tambah Orderan Baru</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-7">
                                    <?php $jmlOrderan = 0;
                                    foreach ($orderan as $key => $value) {
                                        $jmlOrderan = $jmlOrderan + 1;
                                    }
                                    echo $jmlOrderan ?>
                                </div>
                                <a href="#" class="btn btn-primary btn-sm position-relative btn-tambah-orderan">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-statistic-1">
                    <a href="<?= site_url('produksi') ?>" class="bg-primary card-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </a>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Barang Yang Perlu Dikirim</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7">
                                    <?php $jmlProduksiSelesai = 0;
                                    foreach ($produksiSelesai as $key => $value) {
                                        $jmlProduksiSelesai = $jmlProduksiSelesai + 1;
                                    }
                                    echo $jmlProduksiSelesai ?>
                                </div>
                                <a href="" class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#clpProduksiSelesai" aria-expanded="false" aria-controls="clpProduksiSelesai">
                                    <i class="fas fa-angle-double-down"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="collapse" id="clpProduksiSelesai">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-md" id="table-1">
                                <thead>
                                    <tr class="text-center">
                                        <th>Nama Orderan</th>
                                        <th>Customer</th>
                                        <th>Jumlah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($produksiSelesai as $key => $value) { ?>
                                        <tr>
                                            <td><?= $value->nama_orderan; ?></td>
                                            <td><?= $value->customer; ?></td>
                                            <td><?= $value->jml_akhir; ?></td>
                                            <td>
                                                <form action="<?= site_url('orderan/' . $value->id . '/kirim') ?>" method="post" enctype="multipart/form-data" id="krm-<?= $value->id ?>">
                                                    <?= csrf_field() ?>

                                                    <input type="hidden" name="_method" value="PUT">
                                                    <button type="submit" class="btn btn-success btn-sm" data-confirm="Pengiriman|Apakah anda yakin orderan ini telah terkirim?<?= $value->id ?>" data-confirm-yes="btnKirim(<?= $value->id ?>)">Kirim</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Card Upah Perlu Dibayar -->
                <div class="card card-statistic-1">
                    <a href="" class="bg-primary card-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </a>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Upah yang perlu dibayar</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7">
                                    <?php
                                    $jmlUpah = 0;
                                    foreach ($monitoringUpah as $key => $value) {
                                        $jmlUpah = $jmlUpah + $value->total_upah;
                                    } ?>
                                    Rp. <?= (number_format(($jmlUpah), 0, ',', '.')); ?>
                                </div>
                                <a href="" class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#clpUpahPerluBayar" aria-expanded="false" aria-controls="clpUpahPerluBayar">
                                    <i class="fas fa-angle-double-down"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="collapse" id="clpUpahPerluBayar">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-md">
                                    <thead>
                                        <tr class="text-center">
                                            <th width="40%">Nama Operator</th>
                                            <th width="50%">Upah</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($monitoringUpah as $key => $value) { ?>
                                            <tr>
                                                <td><?= $value->nama_pegawai; ?></td>
                                                <td>Rp. <?= (number_format(($value->total_upah), 0, ',', '.')); ?></td>
                                                <td>
                                                    <form action="<?= site_url('upah/' . $value->id_upah . '/bayar') ?>" method="post" class="d-inline" id="byr-<?= $value->id_upah ?>">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="_method" value="PUT">
                                                        <button class="btn btn-danger btn-sm" data-confirm="Bayar Upah?|Apakah anda yakin sudah membayar?" data-confirm-yes="btnBayar(<?= $value->id_upah ?>)">Bayar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Card Upah Perlu Dibayar -->

            </div>
        </div>
    <?php endif; ?>

    <?php if (in_groups('operator')) : ?>
        <div class="row">
            <!-- keterangan produksi yang sedang dikerjakan -->
            <div class="col-lg-5">
                <div class="card">

                    <div class="card-header">
                        <h4>Foto Sample</h4>
                    </div>
                    <div class="card-body">

                        <?php foreach ($prosesProduksi as $key => $value) : ?>

                            <img src="/img/<?= $value->foto_orderan; ?>" class="card-img-top mb-3" alt="">
                            <h4><?= $value->nama_orderan; ?></h4>
                            <h6 class="badge badge-success"><?= user()->bagian ?></h6>
                            <b> | Qtty : <?= $value->jml_orderan; ?> pcs</b>
                            <form id="formD" name="formD" action="<?= site_url('produksi/' . $value->id_produksi) ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="status_hanca" value="Selesai">
                                <input type="hidden" name="id_orderan" value="<?= $value->id_orderan; ?>">
                                <input type="hidden" name="jml_orderan" value="<?= $value->jml_orderan; ?>">
                                <div class="form-group mt-2">
                                    <label for="jml_pribadi">Jumlah Pribadi</label>
                                    <div class="input-group mb-2">
                                        <input type="number" class="form-control" placeholder="0" aria-label="" id="jml_pribadi" name="jml_pribadi" required>

                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="fas fa-paper-plane"></i></button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                            <hr>

                            <div class="accordion" id="accordionExample">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block" type="button" data-toggle="collapse" data-target="#clpsAturanProd" aria-expanded="true" aria-controls="clpsAturanProd">
                                        <h6>Aturan Produksi</h6>
                                    </button>
                                </h2>

                                <div id="clpsAturanProd" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">

                                    <textarea name="aturan" class="form-control" id="" cols="30" rows="10"><?= $value->aturan; ?></textarea>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card card-statistic-1">
                    <a href="<?= site_url('upah/' . user()->id) ?>" class="bg-primary card-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </a>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Upah Minggu Ini</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7">
                                    <?php
                                    $totalUpah = 0;
                                    foreach ($upahBerjalan as $key => $value) {
                                        $totalUpah = $totalUpah + ($value->jml_pribadi * $value->harga_orderan);
                                    } ?>
                                    Rp. <?= number_format(($totalUpah), 0, ',', '.'); ?>

                                </div>
                                <a href="" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#clpUpah" aria-expanded="false" aria-controls="clpUpah">
                                    More <i class="fas fa-angle-double-down"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="collapse" id="clpUpah">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-md" id="table-1">
                                <thead>
                                    <tr class="text-center">
                                        <th>Nama Orderan</th>
                                        <th>Jumlah Pribadi</th>
                                        <th>Upah</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($upahBerjalan as $upr => $value) : ?>

                                        <tr>
                                            <td style="width: 30%"><?= $value->nama_orderan; ?></td>
                                            <td style="width: 25%"><?= $value->jml_pribadi; ?> pcs</td>
                                            <td>Rp. <?= number_format(($value->total_upah), 0, ',', '.'); ?></td>

                                        </tr>

                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card card-statistic-1">
                    <a href="<?= site_url('produksi/' . user()->id) ?>" class="card-icon bg-danger">
                        <i class="fas fa-cogs"></i>
                    </a>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Riwayat Kerjaan</h4>
                        </div>
                        <div class="card-body">
                            <?php $prd = 0;
                            foreach ($getHanca as $prd => $value) {
                                $prd = $prd + 1;
                            } ?>
                            <span><?= $prd; ?> Kerjaan</span>
                        </div>
                    </div>
                </div>

                <div class="card card-statistic-1">
                    <a class="card-icon bg-success">
                        <i class="fas fa-clipboard-list"></i>
                    </a>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Kerjaan Yang Tersedia</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-7">
                                    <?php $ord = 0;
                                    foreach ($orderan as $ord => $value) {
                                        $ord = $ord + 1;
                                    } ?>
                                    <span><?= $ord; ?> Orderan</span>
                                </div>
                                <a href="" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    More <i class="fas fa-angle-double-down"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="collapse" id="collapseExample">
                    <div class="card">
                        <div class="card-header">
                            <div class="media-body">
                                <li class="media">
                                    <div class="media-body">
                                        <div class="media-right"><?= date('l, d / m / Y'); ?></div>
                                        <div class="media-title">
                                            <h4>Tabel Kerjaan Yang Tersedia</h4>
                                        </div>
                                    </div>
                                </li>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-md" id="table-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Action</th>
                                            <th>Nama Orderan</th>
                                            <th>Jumlah</th>
                                            <th>Deadline</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($orderan as $ord => $value) : ?>

                                            <tr>
                                                <td class="text-center" style="width: 5%">

                                                    <!-- <a href="#" class="btn btn-primary btn-sm btn-info-orederan position-relative" data-id_orderan="<?= $value->id; ?>" data-nama_orderan="<?= $value->nama_orderan; ?>" data-proses="<?= $value->proses; ?>" data-jml_orderan="<?= $value->jml_orderan; ?>" data-harga_orderan="<?= $value->harga_orderan; ?>" data-deadline="<?= $value->deadline; ?>" data-aturan="<?= $value->aturan; ?>" data-foto="<?= $value->foto; ?>">
                                                        <i class="fas fa-plus"></i>
                                                    </a> -->
                                                    <a href="<?= site_url('orderan/' . $value->id) ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>
                                                </td>
                                                <td style="width: 15%"><?= $value->nama_orderan; ?></td>
                                                <td style="width: 10%"><?= $value->jml_orderan; ?> pcs</td>
                                                <td class="text-center"><?= date('d/m/Y', strtotime($value->deadline)) ?></td>

                                            </tr>

                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    <?php endif; ?>

</section>


<?php if (in_groups('operator')) : ?>
    <!-- Modal -->
    <form action="<?= site_url('produksi') ?>" method="post">
        <?= csrf_field() ?>
        <div class="modal fade" id="ModalInfoOrderan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class=" modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Info Produksi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="info-orderan">

                        <input type="hidden" class="form-control" id="id_orderan" name="id_orderan">
                        <input type="hidden" class="form-control" name="id_user" value="<?= user()->id ?>">

                        <img src="" class="card-img-top mb-3" id="fotoOrderan">

                        <div class="form-group">
                            <label for="nama_orderan">Nama Orderan</label>
                            <input type="text" class="form-control" id="nama_orderan" disabled>
                        </div>

                        <div class="form-group">
                            <label for="jml_orderan">Jumlah Orderan</label>
                            <input type="text" class="form-control" id="jml_orderan" disabled>
                        </div>

                        <div class="form-group">
                            <label for="deadline">Deadline</label>
                            <input type="text" class="form-control" id="deadline" disabled>
                        </div>

                        <div class="form-group">
                            <label for="proses">Proses</label>
                            <input type="text" class="form-control" id="proses" disabled>
                        </div>

                        <label for="harga_orderan">Harga</label>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" class="form-control" id="harga_orderan" disabled>
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>

                        <hr>

                        <h2 class="mb-3" style="text-align: center;">Aturan Produksi</h2>

                        <textarea name="aturan" id="aturan" cols="63" rows="30" disabled><?= $value->aturan; ?></textarea>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Kerjakan >></button>
                    </div>
                </div>
            </div>
        </div>
    </form>

<?php endif; ?>


<?php if (in_groups('owner')) : ?>
    <!-- Modal Tambah Orderan -->
    <form action="<?= site_url('orderan') ?>" method="post" enctype="multipart/form-data" autocomplete="off">
        <?= csrf_field() ?>
        <div class="modal fade" id="ModalTambahOrderan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class=" modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="deadline" class="col-sm-3 col-form-label">Deadline</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="deadline" name="deadline" autofocus value="<?= old('deadline'); ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_orderan" class="col-sm-3 col-form-label">Nama Orderan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_orderan" name="nama_orderan" autofocus value="<?= old('nama_orderan'); ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="brand" class="col-sm-3 col-form-label">Brand</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="brand" name="brand" value="<?= old('brand'); ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="customer" class="col-sm-3 col-form-label">Customer</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="customer" name="customer" value="<?= old('customer'); ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jml_orderan" class="col-sm-3 col-form-label">Jumlah orderan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="jml_orderan" name="jml_orderan" value="<?= old('jml_orderan'); ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga_orderan" class="col-sm-3 col-form-label">Harga</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="harga_orderan" name="harga_orderan" value="<?= old('harga_orderan'); ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="proses" class="col-sm-3 col-form-label">Proses</label>
                            <div class="col-sm-9">
                                <select id="proses" class="form-control" name="proses" value="<?= old('proses'); ?>" required>
                                    <option selected disabled value="">Pilih Proses...</option>
                                    <option>Full Proses</option>
                                    <option>Cutting</option>
                                    <option>Sewing</option>
                                    <option>Finishing</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row mb-3">
                                <div class="col"></div>
                                <div class="col">
                                    <img src="/img/default_shirt.png" class="img-thumbnail img-preview">
                                </div>
                                <div class="col"></div>
                            </div>
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-10">

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto" name="foto" aria-describedby="foto" aria-label="Upload" onchange="previewFoto()">
                                        <label class="custom-file-label" for="foto">Choose file..</label>
                                    </div>
                                </div>
                                <div class="col-1"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="aturan" class="col-sm-3 col-form-label">Aturan Produksi</label>
                            <div class="col-sm-9">

                                <textarea class="form-control" name="aturan" id="aturan" value="<?= old('aturan'); ?>" required></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php endif; ?>
<?= $this->endSection(); ?>