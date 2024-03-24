<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <?= $this->renderSection('title'); ?>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/prismjs/themes/prism.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/bootstrap-icons/font/bootstrap-icons.min.css">


    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/components.css">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">

                    <h6 class="badge <?= (user()->bagian == "Owner") ? 'badge-danger' :  'badge-success' ?>"><?= user()->bagian; ?></h6>

                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url() ?>img/<?= user()->foto ?>" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block"><?= user()->nama_pegawai ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title"><?= user()->nama_pegawai ?></div>
                            <a href="#" class="dropdown-item has-icon btn-profile">
                                <i class="far fa-user"></i> Profile
                            </a>

                            <div class="dropdown-divider"></div>
                            <?php if (logged_in()) :  ?>
                                <a href="/logout" class="dropdown-item has-icon text-danger" id="logout" data-confirm="Logout|Yakin Logout?" data-confirm-yes="returnLogout()">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            <?php else : ?>
                                <a href="/orderan" class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-in-alt"></i> Login
                                </a>
                            <?php endif; ?>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- Modal -->
            <form action="<?= site_url('pegawai/' . user()->id . '/profile') ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                <?= csrf_field() ?>
                <div class="modal fade" id="ModalProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class=" modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="info-orderan">


                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="fotoLama" value="<?= user()->foto; ?>">

                                <div class="form-group">
                                    <img src="/img/<?= user()->foto; ?>" class="img-thumbnail img-preview">
                                    <div class="custom-file mt-3">
                                        <input type="file" class="custom-file-input" id="foto" name="foto" aria-describedby="foto" aria-label="upload" onchange="previewFoto()">
                                        <label class="custom-file-label" for="foto"><?= user()->foto; ?></label>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="nama_pegawai">Nama Pegawai</label>
                                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?= user()->nama_pegawai ?>">
                                </div>

                                <div class="form-group">
                                    <label for="bagian">Bagian</label>
                                    <input type="text" class="form-control" id="bagian" name="bagian" value="<?= user()->bagian ?>">
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= user()->alamat ?>">
                                </div>

                                <div class="form-group">
                                    <label for="telp">Telepon</label>
                                    <input type="text" class="form-control" id="telp" name="telp" value="<?= user()->telp ?>">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?= user()->email ?>">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <?php if (in_groups('owner')) { ?>
                            <img src="<?= site_url('img/Sistem Monitoring.png') ?>" class="img-fluid">
                        <?php  } elseif (in_groups('operator')) { ?>
                            <img src="<?= site_url('img/Sistem Informasi.png') ?>" class="img-fluid">
                        <?php } ?>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <img src="<?= site_url('img/M&O logo.png') ?>" class="img-fluid">
                    </div>

                    <hr>

                    <div class="sidebar-brand">
                        <div class="col-sm-12">
                            <img src="/img/<?= user()->foto ?>" class="img-thumbnail rounded-circle mb-3" type="file">
                            <h5><?= user()->nama_pegawai ?></h5>
                        </div>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <img src="/img/<?= user()->foto ?>" class="img-thumbnail rounded-circle mb-3" type="file">
                    </div>
                    <hr>
                    <ul class="sidebar-menu">
                        <?= $this->include('layout/menu'); ?>
                    </ul>

                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <?= $this->renderSection('content'); ?>
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2024 <div class="bullet"></div> Oriza Dio Aria
                </div>
            </footer>



        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url() ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/moment/min/moment.min.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url() ?>/template/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/prismjs/prism.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url() ?>/template/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url() ?>/template/assets/js/page/bootstrap-modal.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/page/modules-datatables.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/page/modules-calendar.js"></script>

    <script>
        function previewFoto() {

            const foto = document.querySelector('#foto');
            const fotoLabel = document.querySelector('.custom-file-label');
            const fotoPreview = document.querySelector('.img-preview');

            fotoLabel.textContent = foto.files[0].name;

            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(foto.files[0]);

            fileFoto.onload = function(e) {
                fotoPreview.src = e.target.result;
            }
        }

        function viewFoto() {

            const photo = document.querySelector('#photo');
            const fotoLabel = document.querySelector('.custom-photo');
            const fotoPreview = document.querySelector('.imge-preview');

            fotoLabel.textContent = photo.files[0].name;

            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(photo.files[0]);

            fileFoto.onload = function(e) {
                fotoPreview.src = e.target.result;
            }
        }
    </script>

</body>

</html>