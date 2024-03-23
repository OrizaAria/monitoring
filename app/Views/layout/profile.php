<?= $this->extend('layout/default'); ?>


<?= $this->section('title') ?>
<title><?= $title; ?> | M&O</title>
<?= $this->endSection() ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('dashboard'); ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Kelola <?= $title; ?></h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h1>Profile</h1>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col">
                                <img src="/img/<?= user()->foto; ?>" class="img-thumbnail img-preview">
                            </div>
                            <div class="col"></div>
                        </div>

                        <div class="custom-file mt-3">
                            <input type="file" class="custom-file-input" id="foto" name="foto" aria-describedby="foto" aria-label="Upload" onchange="previewFoto()">
                            <label class="custom-file-label" for="foto"><?= user()->foto ?></label>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group row">
                            <label for="nama_pegawai" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?= user()->nama_pegawai ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= user()->alamat ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telp" class="col-sm-3 col-form-label">No Telepon</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="telp" name="telp" value="<?= user()->telp ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="username" name="username" value="<?= user()->username ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>