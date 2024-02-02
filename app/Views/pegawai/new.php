<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Pegawai | M&O</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('pegawai'); ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Data Pegawai</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <form action="<?= site_url('pegawai') ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                        <?= csrf_field() ?>
                        <div class="card-body row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="nama_pegawai" class="col-sm-3 col-form-label">Nama Pegawai</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" autofocus value="<?= old('nama_pegawai'); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="30" value="<?= old('alamat'); ?>" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bagian" class="col-sm-3 col-form-label">Bagian</label>
                                    <div class="col-sm-9">
                                        <select id="bagian" class="form-control" name="bagian" value="<?= old('bagian'); ?>" required>
                                            <option selected disabled value="">Pilih Bagian...</option>
                                            <option>Full Proses</option>
                                            <option>Cutting</option>
                                            <option>Sewing</option>
                                            <option>Finishing</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="telp" class="col-sm-3 col-form-label">Telepon</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="telp" name="telp" value="<?= old('telp'); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email_pegawai" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="email_pegawai" name="email_pegawai" value="<?= old('email_pegawai'); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password_pegawai" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="password_pegawai" name="password_pegawai" value="<?= old('password_pegawai'); ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col"></div>
                                        <div class="col">
                                            <img src="/img/default/default.png" class="img-thumbnail img-preview">
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1"></div>
                                        <div class="col-10">

                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="foto" name="foto" onchange="previewFoto()">
                                                <label class="custom-file-label" for="foto">Choose file</label>
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