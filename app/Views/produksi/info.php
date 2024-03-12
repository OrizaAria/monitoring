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
        $progress = 0;
        $jml_selisih = 0;
        $selisih = 0;
        $total = 0;
        foreach ($produksi as $prd => $value) {

            foreach ($upah as $key => $uph) {
                if ($value->id_produksi == $uph->id_produksi) {
                    $total = $total + $uph->jml_konfirmasi;
                    $statusUpah = $uph->status_upah;
                    $jml_selisih = $total - $value->jml_orderan;
                    $progress = round(($total / $value->jml_orderan) * 100);
                }
            }
        }

        if ($orderan->status_produksi == "On Proses") { ?>
            <form action="<?= site_url('orderan/' . $orderan->id . '/selesai') ?>" method="post" enctype="multipart/form-data" id="upd-<?= $orderan->id ?>">
                <?= csrf_field() ?>

                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="jml_akhir" value="<?= $total; ?>">
                <button type="submit" class="btn btn-danger" data-confirm="Produksi|Apakah anda yakin orderan ini telah selesai produksi? <?= $total; ?>" data-confirm-yes="btnSelesai(<?= $orderan->id ?>)">Selesai <i class="bi bi-exclamation-circle"></i></button>
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
                                        <th width="5%"><i class="fas fa-hashtag"></i></th>
                                        <th width="25%">Nama Pegawai</th>
                                        <th width="25%">Jumlah yang diinput</th>
                                        <th width="40%">Jumlah Koreksi</th>
                                        <th width="5%">Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($produksi as $ord => $value) : ?>
                                        <tr>
                                            <td><?= $ord + 1 ?></td>
                                            <td><?= $value->nama_pegawai; ?></td>
                                            <td><?= $value->jml_pribadi; ?> pcs</td>
                                            <td>
                                                <?php
                                                foreach ($upah as $key => $uph) {
                                                    if ($value->id_produksi == $uph->id_produksi) {
                                                        $selisih = $uph->jml_konfirmasi - $value->jml_pribadi; ?>

                                                        <div class="text-small float-right font-weight-bold text-muted">

                                                            <span class="badge <?= ($selisih > 0) ? 'badge-primary' : (($selisih < 0) ? 'badge-danger' : 'badge-succsess'); ?>"><?= $selisih; ?> pcs</span>

                                                        </div>
                                                        <div class="font-weight-bold mb-1">

                                                            <a><?= $uph->jml_konfirmasi; ?> pcs</a>

                                                        </div>

                                                <?php  }
                                                } ?>
                                            </td>
                                            <td>
                                                <?php
                                                $statusUpah = 'Selesai Produksi';
                                                foreach ($upah as $key => $uph) {
                                                    if ($value->id_produksi == $uph->id_produksi) {
                                                        $statusUpah = $uph->status_upah;
                                                    }
                                                }

                                                if ($statusUpah == "Selesai Produksi") {  ?>
                                                    <a href="#" class="btn btn-primary btn-sm btn-upah position-relative" data-id_produksi="<?= $value->id_produksi; ?>" data-id_orderan="<?= $value->id_orderan; ?>" data-id_user="<?= $value->id_user; ?>" data-nama_pegawai="<?= $value->nama_pegawai; ?>" data-jml_pribadi="<?= $value->jml_pribadi; ?>" data-harga_orderan="<?= $value->harga_orderan; ?>" data-tgl_upah="<?= date('Y-m-d') ?>">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                <?php  } else { ?>
                                                    <span class="badge badge-success">Checked</i></span>
                                                <?php  } ?>
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

                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block" type="button" data-toggle="collapse" data-target="#clpsAturanProd" aria-expanded="true" aria-controls="clpsAturanProd">
                                        <h6>Keterangan</h6>
                                    </button>
                                </h2>

                                <table class="table table-borderless">
                                    <tr>
                                        <td width="15%">Tumlah Produksi</td>
                                        <td>: <?= $total; ?> pcs</td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Jumlah Orderan</td>
                                        <td>: <?= $orderan->jml_orderan; ?> pcs</td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Selisih</td>
                                        <td>: <?= $jml_selisih; ?> pcs</td>
                                    </tr>
                                </table>

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
                    <input type="hidden" class="form-control harga_orderan" name="harga_orderan">
                    <input type="hidden" class="form-control tgl_upah" name="tgl_upah">

                    <div class="form-group">
                        <label>Nama Pegawai</label>
                        <input type="text" class="form-control nama_pegawai" name="nama_pegawai" placeholder="Nama Pegawai" disabled>
                    </div>
                    <div class="form-group">
                        <label>Jumlah pribadi</label>
                        <input type="text" class="form-control jml_konfirmasi" name="jml_konfirmasi" placeholder="Jumlah Pribadi">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="orderan_id" class="orderan_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?= $this->endSection() ?>