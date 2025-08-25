<?= $this->extend('layout/dashboard_layout'); ?>
<?= $this->section('content'); ?>

<div class="mb-3">
    <a href="<?= base_url('dashboard/pertanian'); ?>" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="row">
    <?php foreach($pertanian as $p): ?>
    <div class="col-md-4 mb-3">
        <div class="card shadow-sm border-start border-primary h-100">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-seedling"></i> <?= esc($p['nama']); ?></h5>
                <p class="card-text">
                    <strong>Luas:</strong> <span class="badge bg-info"><?= esc($p['luas']); ?> Ha</span><br>
                    <strong>Hasil:</strong> <span class="badge bg-success"><?= esc($p['hasil']); ?> Ton</span>
                </p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div class="card shadow mt-4">
    <div class="card-header py-3 bg-primary text-white">
        <h6 class="m-0 font-weight-bold">Grafik Pertanian Desa</h6>
    </div>
    <div class="card-body">
        <canvas id="pertanianChart" height="120"></canvas>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const labels = <?= json_encode(array_column($pertanian, 'nama')); ?>;
const luasData = <?= json_encode(array_column($pertanian, 'luas')); ?>;
const hasilData = <?= json_encode(array_column($pertanian, 'hasil')); ?>;

const ctx = document.getElementById('pertanianChart').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [
            {
                label: 'Luas (Ha)',
                data: luasData,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'Hasil (Ton)',
                data: hasilData,
                type: 'line',
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                tension: 0.4,
                fill: true,
                yAxisID: 'y'
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' },
            title: {
                display: true,
                text: 'Statistik Luas & Hasil Pertanian Desa'
            },
            tooltip: {
                mode: 'index',
                intersect: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                title: { display: true, text: 'Luas (Ha)' }
            }
        }
    }
});
</script>

<?= $this->endSection(); ?>
