<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Daftar Berita</h1>
      </div>
      <div class="col-sm-6">
        <div class="float-sm-right">
            <a href="/dashboard/news/create" class="btn btn-primary">
              <i class="fa fa-plus"></i> Tambah Berita Baru
            </a>
        </div>
      </div>
    </div>
    
    </div>
<?= $this->endSection() ?>