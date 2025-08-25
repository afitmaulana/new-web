<?= $this->extend('layout/dashboard_layout'); ?>
<?= $this->section('content'); ?>
<div class="mb-3">
    <a href="<?= base_url('dashboard/wisata'); ?>" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card shadow mb-4">
    
    <div class="card-header py-3 bg-info text-white d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold">📊 Statistik Wisata Desa</h6>
        
    </div>
    <div class="card-body" style="min-height:400px;">
        <?php if (!empty($wisata)): ?>
            <canvas id="wisataChart"></canvas>
        <?php else: ?>
            <div class="alert alert-warning">Belum ada data wisata untuk ditampilkan.</div>
        <?php endif; ?>
    </div>
</div>

<?php if (!empty($wisata)): ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('wisataChart').getContext('2d');

    // Gradien warna
    const gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(54, 162, 235, 0.9)');
    gradient.addColorStop(1, 'rgba(75, 192, 192, 0.6)');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode(array_column($wisata, 'nama')); ?>,
            datasets: [{
                label: 'Jumlah Wisata',
                data: <?= json_encode(array_map(fn($w) => 1, $wisata)); ?>,
                backgroundColor: gradient,
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                borderRadius: 12,
                barThickness: 50,
                hoverBackgroundColor: 'rgba(54, 162, 235, 0.8)',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                title: {
                    display: true,
                    text: '📍 Jumlah Destinasi Wisata Berdasarkan Nama',
                    font: { size: 18, weight: 'bold' },
                    padding: { top: 10, bottom: 30 }
                },
                tooltip: {
                    backgroundColor: 'rgba(0,0,0,0.7)',
                    padding: 10,
                    callbacks: {
                        label: function(context) {
                            return context.label + ': 1 destinasi';
                        }
                    }
                }
            },
            scales: {
                x: {
                    ticks: { font: { size: 12 }, maxRotation: 30 },
                    grid: { drawOnChartArea: false }
                },
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1, font: { size: 12 } },
                    grid: { color: 'rgba(200,200,200,0.2)' }
                }
            }
        }
    });
</script>
<?php endif; ?>

<?= $this->endSection(); ?>
