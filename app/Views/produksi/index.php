<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Produksi | M&O</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Kelola Produksi</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Advanced Table</h4>
                        <div class="card-header-form">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <!-- <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                            </div> -->
                                            #
                                        </th>
                                        <th>Nama Barang</th>
                                        <th>Progress</th>
                                        <th>Customer</th>
                                        <th>Nama Pegawai</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($produksi as $prd => $value) : ?>
                                        <tr>

                                            <td><?= $prd + 1 ?></td>
                                            <td><?= $value->nama_barang; ?></td>

                                            <td class="align-middle">
                                                <div class="progress" role="progressbar" aria-label="Success striped example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar progress-bar-striped bg-success" style="width: 77%"></div>
                                                </div>
                                            </td>
                                            <td><?= $value->customer; ?></td>
                                            <td><?= $value->nama_pegawai; ?></td>
                                            <td><?= $value->status_produksi; ?></td>
                                            <td class="text-center" style="width: 15;">
                                                <a href="" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="" method="post" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
                                                    <?= csrf_field() ?>
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>



                                            <!-- <td class="p-0 text-center">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>Create a mobile app</td>
                                        <td class="align-middle">
                                            <div class="progress" data-height="4" data-toggle="tooltip" title="100%" style="height: 4px;">
                                                <div class="progress-bar bg-success" data-width="100" style="width: 100px;"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                                        </td>
                                        <td>2018-01-20</td>
                                        <td>
                                            <div class="badge badge-success">Completed</div>
                                        </td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td> -->
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
<?= $this->endSection() ?>