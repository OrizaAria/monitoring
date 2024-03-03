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
            <div class="col-lg-8">
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

                                    <?php foreach ($orderan as $ord => $order) : ?>
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
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h1>Calendar</h1>
                        </div>

                        <div class="fc-overflow">
                            <div id="myEvent"></div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    <?php endif; ?>

    <?php if (in_groups('operator')) : ?>
        <div class="row">
            <div class="col-lg-5">
                <div class="row">
                    <div class="col">

                        <div class="card">


                            <div class="card-header">
                                <h4>Foto Sample</h4>
                            </div>
                            <div class="card-body">

                                <?php foreach ($prosesProduksi as $key => $value) : ?>

                                    <img src="/img/default_shirt.png" class="card-img-top mb-3" alt="">
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
                                                <input type="text" class="form-control" placeholder="0" aria-label="" id="jml_pribadi" name="jml_pribadi">

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

                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio minus quae nesciunt molestias, accusamus quam voluptas ex reprehenderit culpa quisquam illum recusandae. Illo enim aliquam ipsam? Nisi ex quasi rem!</p>
                                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi totam voluptate sequi cumque illo! Doloremque quasi, praesentium eos aliquid unde voluptate cumque recusandae esse iusto neque magni quidem et tempora!</p>

                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
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
                                                    <!-- <a href="<?= site_url('orderan/' . $value->id) ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a> -->

                                                    <a href="#" class="btn btn-primary btn-sm btn-info-orederan position-relative">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                </td>
                                                <td style="width: 15%"><?= $value->nama_orderan; ?></td>
                                                <td style="width: 10%"><?= $value->jml_orderan; ?> pcs</td>
                                                <td class="text-center"><?= date('d/m/Y', strtotime($value->tgl_masuk)) ?></td>

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
                <div class="modal-body">

                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $value->id; ?>">
                    <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= user()->id ?>">

                    <img src="/img/<?= $value->foto; ?>" class="card-img-top mb-3" alt="">

                    <h4><?= $value->nama_orderan; ?></h4>
                    <div class="float-right font-weight-bold">

                        <b>Deadline : <?= $value->tgl_masuk; ?></b>
                    </div>
                    <div class="font-weight-bold mb-1">
                        <h6 class="badge badge-success"><?= user()->bagian ?></h6>
                        <b> | Qtty : <?= $value->jml_orderan; ?> pcs</b>
                    </div>

                    <hr>

                    <h2 class="mb-0">Aturan Produksi</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio minus quae nesciunt molestias, accusamus quam voluptas ex reprehenderit culpa quisquam illum recusandae. Illo enim aliquam ipsam? Nisi ex quasi rem!</p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi totam voluptate sequi cumque illo! Doloremque quasi, praesentium eos aliquid unde voluptate cumque recusandae esse iusto neque magni quidem et tempora!</p>


                </div>
                <div class="modal-footer">
                    <input type="hidden" name="orderan_id" class="orderan_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kerjakan >></button>
                </div>
            </div>
        </div>
    </div>
</form>

<?= $this->endSection(); ?>