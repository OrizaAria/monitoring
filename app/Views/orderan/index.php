<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Orderan | M&O</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Kelola Orderan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url('') ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Kelola Orderan</div>
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
                <div class="section-header-button">
                    <a href="#" class="btn btn-primary btn-lg position-relative btn-tambah-orderan">
                        <i class="fas fa-plus"> Tambah Data</i>
                    </a>
                </div>


            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-md" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Deadline</th>
                                <th>Nama orderan</th>
                                <th>Brand</th>
                                <th>Jumlah</th>
                                <th>Proses</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orderan as $ord => $value) : ?>
                                <tr>
                                    <td><?= $ord + 1 ?></td>
                                    <td><?= date('d/m/Y', strtotime($value->deadline)) ?></td>
                                    <td><?= $value->nama_orderan; ?></td>
                                    <td><?= $value->brand; ?></td>
                                    <td><?= $value->jml_orderan; ?> pcs</td>
                                    <td class="text-primary">
                                        <h6><?= $value->proses; ?></h6>
                                    </td>
                                    <td class="text-center" style="width: 15;">

                                        <a href="<?= site_url('orderan/' . $value->id . '/edit') ?>" class="btn btn-success btn-sm">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <form action="<?= site_url('orderan/' . $value->id) ?>" method="post" class="d-inline" id="del-<?= $value->id ?>">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah anda yakin hapus data?" data-confirm-yes="btnHapus(<?= $value->id ?>)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
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


<?= $this->endSection() ?>