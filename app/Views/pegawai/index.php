<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title><?= $title; ?> | M&O</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Kelola <?= $title; ?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url('') ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Kelola Pegawai</div>
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
                    <a href="#" class="btn btn-primary btn-lg position-relative btn-tambah-pegawai">
                        <i class="fas fa-plus"> Tambah Data</i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-md" id="table-1">
                        <thead>

                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Bagian</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pegawai as $pgw => $value) : ?>
                                <tr>
                                    <td><?= $pgw + 1 ?></td>
                                    <td><?= $value->nama_pegawai; ?></td>
                                    <td><mark> <?= $value->bagian; ?> </mark></td>
                                    <td><?= $value->alamat; ?></td>
                                    <td><?= $value->telp; ?></td>
                                    <td><?= $value->name; ?></td>
                                    <td class="text-center" style="width: 15">
                                        <a href="<?= site_url('pegawai/' . $value->userId . '/edit') ?>" class="btn btn-success btn-sm">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="<?= site_url('pegawai/delete/' . $value->userId) ?>" method="post" class="d-inline" id="del-<?= $value->userId ?>">
                                            <?= csrf_field() ?>
                                            <button class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah anda yakin hapus data?" data-confirm-yes="btnHapus(<?= $value->userId ?>)">
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


<!-- Modal Tambah Pegawai -->
<form action="<?= site_url('register') ?>" method="post" enctype="multipart/form-data" autocomplete="off">
    <?= csrf_field() ?>
    <div class="modal fade" id="ModalTambahPegawai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class=" modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

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
                            <option selected disabled>Pilih Bagian...</option>
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


                </div>
                <div class="modal-footer">
                    <input type="hidden" name="orderan_id" class="orderan_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">
                        <?= lang('Auth.register') ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>


<?= $this->endSection() ?>