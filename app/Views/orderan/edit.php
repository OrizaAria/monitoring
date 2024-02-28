<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Orderan | M&O</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('orderan'); ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Ubah Data Orderan</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <form action="<?= site_url('orderan/' . $orderan->id) ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="fotoLama" value="<?= $orderan->foto; ?>">
                        <div class="card-body row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="tgl_masuk" class="col-sm-3 col-form-label">Tanggal Masuk</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" value="<?= $orderan->tgl_masuk; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_orderan" class="col-sm-3 col-form-label">Nama orderan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama_orderan" name="nama_orderan" value="<?= $orderan->nama_orderan; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="brand" class="col-sm-3 col-form-label">Brand</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="brand" name="brand" value="<?= $orderan->brand; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="customer" class="col-sm-3 col-form-label">Customer</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="customer" name="customer" value="<?= $orderan->customer; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jml_orderan" class="col-sm-3 col-form-label">Jumlah orderan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="jml_orderan" name="jml_orderan" value="<?= $orderan->jml_orderan; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga_orderan" class="col-sm-3 col-form-label">Harga</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="harga_orderan" name="harga_orderan" value="<?= $orderan->harga_orderan; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="proses" class="col-sm-3 col-form-label">Proses</label>
                                    <div class="col-sm-9">
                                        <select id="proses" class="form-control" name="proses" required>
                                            <option disabled>Pilih Proses...</option>
                                            <option hidden><?= $orderan->proses; ?></option>
                                            <option>Full Proses</option>
                                            <option>Cutting</option>
                                            <option>Sewing</option>
                                            <option>Finishing</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <div class="row mb-3">
                                        <div class="col"></div>
                                        <div class="col">
                                            <img src="/img/<?= $orderan->foto; ?>" class="img-thumbnail img-preview">
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1"></div>
                                        <div class="col-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="foto" name="foto" aria-describedby="foto" aria-label="Upload" onchange="previewFoto()">
                                                <label class="custom-file-label" for="foto"><?= $orderan->foto; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-1"></div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-pen"> Ubah Data</i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>