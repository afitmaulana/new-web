<?= $this->extend('/layout/dashboard_layout'); ?>
<?= $this->section('content'); ?>

<h3>Manajemen Produk</h3>
<a href="<?= site_url('dashboard/products/create') ?>" class="btn btn-primary mb-3">Tambah Produk</a>

 <table class="table table-bordered table-striped mt-3 align-middle">
                <thead class="table-dark text-center">
                    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Kategori</th>
      <th>Harga</th>
      <th>Gambar</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($products as $i => $p): ?>
      <tr>
        <td><?= $i+1 ?></td>
        <td><?= esc($p['name']) ?></td>
        <td><?= esc($p['category']) ?></td>
        <td>Rp<?= number_format($p['price'],0,',','.') ?></td>
        <td>
          <?php if($p['image']): ?>
            <img src="<?= base_url('uploads/products/'.$p['image']) ?>" width="80">
          <?php endif; ?>
        </td>
        <td>
          <a href="<?= site_url('dashboard/products/edit/'.$p['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="<?= site_url('dashboard/products/delete/'.$p['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?= $this->endSection(); ?>
