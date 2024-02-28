<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Produksi | M&O</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('produksi'); ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1 class="mr-3">Info Produksi</h1>

        <?php
        $jml_produksi = 0;
        $progress = 0;
        $jml_selisih = 0;
        foreach ($produksi as $prd => $value) {

            $jml_produksi = $jml_produksi + $value->jml_pribadi;
            $progress = round(($jml_produksi / $value->jml_orderan) * 100);
            $jml_selisih = $jml_produksi - $orderan->jml_orderan;
        }

        if ($orderan->status_produksi == "On Proses") { ?>
            <form action="<?= site_url('orderan/' . $orderan->id . '/selesai') ?>" method="post" enctype="multipart/form-data" id="upd-<?= $orderan->id ?>">
                <?= csrf_field() ?>

                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="jml_akhir" value="<?= $jml_produksi; ?>">
                <button type="submit" class="btn btn-danger" data-confirm="Produksi|Apakah anda yakin orderan ini telah selesai produksi?" data-confirm-yes="btnSelesai(<?= $orderan->id ?>)">Selesai <i class="bi bi-exclamation-circle"></i></button>
            </form>
        <?php } else { ?>
            <span class="badge badge-success"><?= $orderan->status_produksi; ?></span>
        <?php } ?>


    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">


                        <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="<?= $progress; ?>" aria-valuemin="0" aria-valuemax="100">

                            <div class="progress-bar progress-bar-striped progress-bar-animated <?= ($progress <= 30) ? 'bg-danger' : (($progress <= 60) ? 'bg-warning' : (($progress <= 80) ? '' : (($progress >= 90) ? 'bg-success' : 'bg-secondary'))) ?>" role="progressbar" style="width: <?= $progress ?>%" aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100"><?= $progress ?>%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Tabel Rincian Hasil Produksi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md table-hover" id="table-1">
                                <thead>
                                    <tr class="table-primary">
                                        <th><i class="fas fa-hashtag"></i></th>
                                        <th>Nama Pegawai</th>
                                        <th>Jumlah Barang Yang Dikerjakan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($produksi as $ord => $value) : ?>
                                        <tr>
                                            <td>
                                                <?php
                                                $statusUpah = "Selesai Produksi";
                                                foreach ($upah as $key => $uph) {
                                                    if ($value->id_produksi == $uph->id_produksi) {
                                                        $statusUpah = $uph->status_upah;
                                                    }
                                                }

                                                if ($statusUpah == "Selesai Produksi") {  ?>
                                                    <a href="#" class="btn btn-primary btn-sm btn-upah position-relative" data-id_produksi="<?= $value->id_produksi; ?>" data-id_orderan="<?= $value->id_orderan; ?>" data-id_user="<?= $value->id_user; ?>" data-nama_pegawai="<?= $value->nama_pegawai; ?>" data-jml_pribadi="<?= $value->jml_pribadi; ?>" data-total_upah="<?= $value->jml_pribadi * $value->harga_orderan; ?>">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                <?php  } else { ?>
                                                    <button type="button" class="btn btn-primary btn-sm" disabled>
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                <?php  } ?>

                                            </td>
                                            <td><?= $value->nama_pegawai; ?></td>
                                            <td>
                                                <div class="text-small float-right font-weight-bold text-muted">Rp. <?= (number_format(($value->jml_pribadi * $value->harga_orderan), 0, ',', '.')); ?></div>
                                                <div class="font-weight-bold mb-1">

                                                    <a><?= $value->jml_pribadi; ?> pcs</a>

                                                </div>
                                            </td>
                                            <td>

                                                <?php
                                                $statusUpah = "Selesai Produksi";
                                                foreach ($upah as $key => $uph) {
                                                    if ($value->id_produksi == $uph->id_produksi) {
                                                        $statusUpah = $uph->status_upah;
                                                        if ($uph->status_upah == "Checked") { ?>
                                                            <span class="badge badge-success"><?= $uph->status_upah ?></span>
                                                        <?php } elseif ($uph->status_upah == "On Proses") { ?>
                                                            <span class="badge badge-warning"><?= $uph->status_upah ?></span>
                                                        <?php } elseif ($uph->status_upah == "Selesai Produksi") { ?>
                                                            <span class="badge badge-primary"><?= $uph->status_upah ?></span>

                                                        <?php } else { ?>
                                                            <span class="badge badge-success">Checked</span>

                                                <?php }
                                                    }
                                                } ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col">
                        <div class="card">

                            <div class="card-header">
                                <h4>Foto Sample</h4>
                            </div>
                            <div class="card-body">
                                <img src="/img/<?= $orderan->foto; ?>" class="card-img-top mb-3" alt="">
                                <h4><?= $orderan->nama_orderan ?> | <?= $orderan->brand; ?></h4>
                                <small>Customer : <?= $orderan->customer; ?></small><br>
                                <h6 class="badge badge-success"><?= $orderan->proses ?></h6>
                                <b> | Qtty : <?= $orderan->jml_orderan; ?> pcs</b>
                                <hr>

                                <div class="accordion" id="accordionExample">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block" type="button" data-toggle="collapse" data-target="#clpsAturanProd" aria-expanded="true" aria-controls="clpsAturanProd">
                                            <h6>Keterangan</h6>
                                        </button>
                                    </h2>

                                    <div id="clpsAturanProd" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">

                                        <table class="table table-borderless">
                                            <tr>
                                                <td width="15%">Tumlah Produksi</td>
                                                <td>: <?= $jml_produksi; ?> pcs</td>
                                            </tr>
                                            <tr>
                                                <td width="15%">Jumlah Orderan</td>
                                                <td>: <?= $orderan->jml_orderan; ?> pcs</td>
                                            </tr>
                                            <tr>
                                                <td width="15%">Selisih</td>
                                                <td>: <?= $jml_selisih; ?> pcs</td>
                                            </tr>
                                            <tr>
                                                <td width="15%">Total Upah</td>
                                                <td>: Rp. <?= (number_format(($jml_produksi * $orderan->harga_orderan), 0, ',', '.')); ?></td>
                                            </tr>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>

<!-- Modal -->
<form action="<?= site_url('upah') ?>" method="post">
    <?= csrf_field() ?>
    <div class="modal fade" id="ModalInfoUpah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class=" modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Info Produksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" class="form-control id_produksi" name="id_produksi">
                    <input type="hidden" class="form-control id_orderan" name="id_orderan">
                    <input type="hidden" class="form-control id_user" name="id_user">
                    <input type="hidden" class="form-control total_upah" name="total_upah">

                    <div class="form-group">
                        <label>Nama Pegawai</label>
                        <input type="text" class="form-control nama_pegawai" name="nama_pegawai" placeholder="Nama Pegawai">
                    </div>
                    <div class="form-group">
                        <label>Jumlah pribadi</label>
                        <input type="text" class="form-control jml_pribadi" name="jml_pribadi" placeholder="Jumlah Pribadi">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="orderan_id" class="orderan_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?= $this->endSection() ?>