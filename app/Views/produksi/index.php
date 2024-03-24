<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Produksi | M&O</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Kelola Produksi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url('') ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Kelola Produksi</div>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tabel Produksi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-md table-hover" id="table-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Proses</th>
                                        <th>Nama orderan</th>
                                        <th>Customer</th>
                                        <th>Jumlah</th>
                                        <th>Progress</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($orderan as $ord => $value) : ?>
                                        <tr>
                                            <th><?= $ord + 1; ?></th>
                                            <td class="text-primary">
                                                <h6><?= $value->proses; ?></h6>
                                            </td>
                                            <td><?= $value->nama_orderan; ?></td>
                                            <td><?= $value->customer; ?></td>
                                            <td><?= $value->jml_orderan; ?> pcs</td>
                                            <td>
                                                <?php
                                                $total = 0;
                                                $progress = 0;
                                                foreach ($produksi as $key => $prd) {
                                                    if ($value->id == $prd->id_orderan) {
                                                        $total = $total + $prd->jml_pribadi;
                                                    }
                                                }
                                                $progress = floor(($total / $value->jml_orderan) * 100);
                                                ?>
                                                <a class="progress" data-toggle="tooltip" data-placement="top" title="<?= $progress ?> %">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated <?= ($progress <= 30) ? 'bg-danger' : (($progress <= 60) ? 'bg-warning' : (($progress <= 80) ? '' : (($progress = 100) ? 'bg-success' : 'bg-secondary'))) ?>" role="progressbar" style="width: <?= $progress ?>%" aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </a>
                                            </td>
                                            <td>
                                                <span class="badge <?= ($value->status_produksi == "On Proses") ? 'badge-warning' : (($value->status_produksi == "Selesai") ? 'badge-success' : 'badge-secondary') ?>"><?= $value->status_produksi; ?></span>

                                            </td>
                                            <td class="text-center" style="width: 15;">


                                                <a href="<?= site_url('produksi/' . $value->id . '/edit') ?>" class="btn btn-info btn-sm"><i class="fas fa-info"></i></a>

                                            </td>
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

</section>


<!-- Modal -->
<!-- <form action="/product/update" method="post">
    <div class="modal fade" id="ModalInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class=" modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Orderan</label>
                        <input type="text" class="form-control nama_orderan" name="nama_orderan" placeholder="Nama Orderan">
                    </div>
                    <div class="form-group">
                        <label>customer</label>
                        <input type="text" class="form-control customer" name="customer" placeholder="customer">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="orderan_id" class="orderan_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form> -->

<?= $this->endSection() ?>