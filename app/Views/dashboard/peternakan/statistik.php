<?= $this->extend('layout/dashboard_layout'); ?>
<?= $this->section('content'); ?>

<div class="mb-3">
    <a href="<?= base_url('dashboard/peternakan'); ?>" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="row">
    <?php foreach($peternakan as $p): ?>
        <?php
            // Tentukan ikon sesuai nama ternak
            switch(strtolower($p['nama'])) {
                case 'sapi': $icon = '🐄'; break;
                case 'ayam': $icon = '🐓'; break;
                case 'kambing': $icon = '🐐'; break;
                case 'bebek': $icon = '🦆'; break;
                case 'kerbau': $icon = '🐃'; break;
                default: $icon = '🐾'; break;
            }
        ?>
    <div class="col-md-4 mb-3">
        <div class="card shadow-sm border-start border-info h-100">
            <div class="card-body">
                <h5 class="card-title"><?= $icon ?> <?= esc($p['nama']); ?></h5>
                <p class="card-text">
                    <strong>Jenis Ternak:</strong> <span class="badge bg-warning"><?= esc($p['jenis']); ?></span><br>
                    <strong>Jumlah:</strong> <span class="badge bg-success"><?= esc($p['jumlah']); ?></span>
                </p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div class="card shadow mt-4">
    <div class="card-header py-3 bg-info text-white">
        <h6 class="m-0 font-weight-bold">Grafik Peternakan Desa</h6>
    </div>
    <div class="card-body">
        <canvas id="peternakanChart" height="120"></canvas>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const labels = <?= json_encode(array_column($peternakan, 'nama')); ?>;
const jumlahData = <?= json_encode(array_column($peternakan, 'jumlah')); ?>;

const ctx = document.getElementById('peternakanChart').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Jumlah Ternak',
            data: jumlahData,
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' },
            title: {
                display: true,
                text: 'Statistik Jumlah Ternak Desa'
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                title: { display: true, text: 'Jumlah Ternak' }
            }
        }
    }
});
</script>

<?= $this->endSection(); ?>
