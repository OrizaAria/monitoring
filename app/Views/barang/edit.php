<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Barang | M&O</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('barang'); ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Ubah Data Barang</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <form action="<?= site_url('barang/' . $barang->id_barang) ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="fotoLama" value="<?= $barang->foto; ?>">
                        <div class="card-body row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="created_at" class="col-sm-3 col-form-label">Tanggal Masuk</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="created_at" name="created_at" value="<?= $barang->created_at; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_barang" class="col-sm-3 col-form-label">Nama Barang</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $barang->nama_barang; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="brand" class="col-sm-3 col-form-label">Brand</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="brand" name="brand" value="<?= $barang->brand; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="customer" class="col-sm-3 col-form-label">Customer</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="customer" name="customer" value="<?= $barang->customer; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= $barang->jumlah; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="proses" class="col-sm-3 col-form-label">Proses</label>
                                    <div class="col-sm-9">
                                        <select id="proses" class="form-control" name="proses" required>
                                            <option disabled>Pilih Proses...</option>
                                            <option hidden><?= $barang->proses; ?></option>
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
                                    <div class="row">
                                        <div class="col"></div>
                                        <div class="col">
                                            <img src="/img/<?= $barang->foto; ?>" class="img-thumbnail img-preview">
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1"></div>
                                        <div class="col-10">

                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="foto" name="foto" onchange="previewFoto()">
                                                <label class="custom-file-label" for="foto"><?= $barang->foto; ?></label>
                                            </div>

                                        </div>
                                        <div class="col-1"></div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-file-export"> Tambah Data</i></button>
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