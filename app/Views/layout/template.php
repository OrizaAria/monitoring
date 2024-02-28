<?= $this->extend('layout/default'); ?>


<?= $this->section('title') ?>
<title><?= $title; ?> | M&O</title>
<?= $this->endSection() ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Kelola <?= $title; ?></h1>
    </div>
</section>
<?= $this->endSection(); ?>