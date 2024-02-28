<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Pengupahan | M&O</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Info Upah</h1>
        <?php
        $jml_produksi = 0;
        $progress = 0;
        $jml_selisih = 0;
        foreach ($produksi as $prd => $value) {

            $jml_produksi = $jml_produksi + $value->jml_pribadi;
            $progress = round(($jml_produksi / $value->jml_orderan) * 100);
            $jml_selisih = $jml_produksi - $orderan->jml_orderan;
        } ?>
    </div>

    <div class="section-body">
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
                                        <th width="20%">Jumlah Pribadi</th>
                                        <th width="30%%">Besar Upah</th>
                                        <th width="20%%">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($produksi as $ord => $value) : ?>
                                        <tr>
                                            <td><?= $ord + 1 ?></td>
                                            <td><?= $value->nama_pegawai; ?></td>
                                            <td>
                                                <div class="font-weight-bold mb-1">

                                                    <a><?= $value->jml_pribadi; ?> pcs</a>

                                                </div>
                                            </td>
                                            <td>Rp. <?= (number_format(($value->jml_pribadi * $value->harga_orderan), 0, ',', '.')); ?></td>
                                            <td>
                                                <?php
                                                $statusUpah = "Berjalan";
                                                foreach ($upah as $key => $uph) {
                                                    if ($value->id_produksi == $uph->id_produksi) {
                                                        if ($uph->status_upah == "Checked") {  ?>

                                                            <form action="<?= site_url('upah/' . $uph->id) ?>" method="post" class="d-inline" id="byr-<?= $uph->id ?>">
                                                                <?= csrf_field() ?>
                                                                <input type="hidden" name="_method" value="PUT">
                                                                <button class="btn btn-danger btn-sm" data-confirm="Bayar Upah?|Apakah anda yakin sudah membayar? <?= $uph->id; ?>" data-confirm-yes="btnBayar(<?= $uph->id ?>)">
                                                                    <i class="fas fa-check"></i>
                                                                </button>
                                                            </form>

                                                        <?php  } else { ?>
                                                            <span class="badge badge-success"><?= $uph->status_upah; ?></i></span>
                                                <?php  }
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
</section>

<!-- <form action="<?= site_url('upah') ?>" method="post">
    <?= csrf_field() ?>
    <div class="modal fade" id="ModalUpdateUpah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class=" modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Info Produksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="_method" value="PUT">
                    <input type="text" class="form-control id_upah" name="id_upah">
                    <input type="text" class="form-control id_produksi" name="id_produksi">
                    <input type="text" class="form-control id_orderan" name="id_orderan">
                    <input type="text" class="form-control id_user" name="id_user">
                    <input type="text" class="form-control total_upah" name="total_upah">

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
</form> -->


<?= $this->endSection() ?>