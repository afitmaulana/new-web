<?= $this->extend('layout/dashboard_layout'); ?>
<?= $this->section('content'); ?>

<div class="mb-3">
    <a href="<?= base_url('dashboard/kerajinan'); ?>" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="row">
    <?php foreach($kerajinan as $k): ?>
        <?php
            // Tentukan ikon sesuai jenis kerajinan
            $icon = '<i class="fas fa-gem text-primary"></i>'; // default
            switch(strtolower($k['jenis'])) {
                case 'batik': $icon = '<i class="fas fa-tshirt text-primary"></i>'; break;
                case 'anyaman': $icon = '<i class="fas fa-feather text-primary"></i>'; break;
                case 'keramik': $icon = '<i class="fas fa-cube text-primary"></i>'; break;
                case 'ukiran kayu': $icon = '<i class="fas fa-tree text-primary"></i>'; break;
            }
        ?>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-start border-primary h-100">
                <div class="card-body">
                    <h5 class="card-title"><?= $icon ?> <?= esc($k['nama']); ?></h5>
                    <p class="card-text">
                        <strong>Jenis:</strong> <span class="badge bg-info"><?= esc($k['jenis']); ?></span><br>
                        <strong>Jumlah Produk:</strong> <span class="badge bg-success"><?= esc($k['jumlah']); ?></span>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="card shadow mt-4">
    <div class="card-header py-3 bg-primary text-white">
        <h6 class="m-0 font-weight-bold">Grafik Kerajinan Desa</h6>
    </div>
    <div class="card-body">
        <canvas id="kerajinanChart" height="120"></canvas>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const labels = <?= json_encode(array_column($kerajinan, 'nama')); ?>;
const jumlahData = <?= json_encode(array_column($kerajinan, 'jumlah')); ?>;

const ctx = document.getElementById('kerajinanChart').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [
            {
                label: 'Jumlah Produk',
                data: jumlahData,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' },
            title: {
                display: true,
                text: 'Statistik Jumlah Kerajinan Desa'
            },
            tooltip: {
                mode: 'index',
                intersect: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                title: { display: true, text: 'Jumlah Produk' }
            }
        }
    }
});
</script>

<?= $this->endSection(); ?>
