<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Hanca | M&O</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('dashboard'); ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Info Data orderan</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <form action="<?= site_url('produksi') ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                        <?= csrf_field() ?>
                        <input type="hidden" name="fotoLama" value="<?= $orderan->foto; ?>">
                        <input type="hidden" class="form-control" id="id_orderan" name="id_orderan" value="<?= $orderan->id; ?>">

                        <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= user()->id ?>">
                        <div class="card-body row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="deadline" class="col-sm-3 col-form-label">Deadline</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="deadline" name="deadline" value="<?= $orderan->deadline; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_orderan" class="col-sm-3 col-form-label">Nama orderan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama_orderan" name="nama_orderan" value="<?= $orderan->nama_orderan; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="brand" class="col-sm-3 col-form-label">Brand</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="brand" name="brand" value="<?= $orderan->brand; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="customer" class="col-sm-3 col-form-label">Customer</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="customer" name="customer" value="<?= $orderan->customer; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jml_orderan" class="col-sm-3 col-form-label">Jumlah orderan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="jml_orderan" name="jml_orderan" value="<?= $orderan->jml_orderan; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="proses" class="col-sm-3 col-form-label">Proses</label>
                                    <div class="col-sm-9">
                                        <select id="proses" class="form-control" name="proses" disabled>
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
                                                <input type="file" class="custom-file-input" id="foto" name="foto" onchange="previewFoto()" disabled>
                                                <label class="custom-file-label" for="foto"><?= $orderan->foto; ?></label>
                                            </div>

                                        </div>
                                        <div class="col-1"></div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-greater-than"></i><i class="fas fa-greater-than"> Kerjakan</i></button>
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