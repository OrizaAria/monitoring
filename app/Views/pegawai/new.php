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

                    <div class="card-body">
                        <?= view('Myth\Auth\Views\_message_block') ?>
                        <form action="<?= url_to('register') ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                            <?= csrf_field() ?>


                            <div class="form-group">
                                <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" autofocus value="<?= old('nama_pegawai'); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="30" value="<?= old('alamat'); ?>" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="bagian" class="form-label">Bagian</label>
                                <select id="bagian" class="form-control" name="bagian" value="<?= old('bagian'); ?>" required>
                                    <option selected disabled value="">Pilih Bagian...</option>
                                    <option>Full Proses</option>
                                    <option>Cutting</option>
                                    <option>Sewing</option>
                                    <option>Finishing</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="telp" class="form-label">Telepon</label>
                                <input type="text" class="form-control" id="telp" name="telp" value="<?= old('telp'); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="username" class="form-label"><?= lang('Auth.username') ?></label>
                                <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label"><?= lang('Auth.email') ?></label>
                                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="password"><?= lang('Auth.password') ?></label>
                                    <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                                    <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col"></div>
                                    <div class="col">
                                        <img src="/img/default_user.png" class="img-thumbnail img-preview">
                                    </div>
                                    <div class="col"></div>
                                </div>
                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-10">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="foto" name="foto" aria-describedby="foto" aria-label="upload" onchange="previewFoto()" value="">
                                            <label class="custom-file-label" for="foto">Choose File..</label>
                                        </div>
                                    </div>
                                    <div class="col-1"></div>
                                </div>

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    <?= lang('Auth.register') ?>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>