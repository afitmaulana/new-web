<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h3 class="text-center mt-4">Absensi Kehadiran</h3>
    <p class="text-center">Arahkan kamera ke QR Code</p>
    
    <div id="reader" style="width:100%; max-width:400px; margin:auto; min-height:300px;"></div>
    <div id="result" class="text-center mt-3"></div>
</div>

<script src="https://unpkg.com/html5-qrcode"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const reader = new Html5Qrcode("reader");

    const onScanSuccess = (decodedText, decodedResult) => {
        // Hentikan kamera agar tidak scan berulang kali
        reader.stop().catch(err => console.error("Gagal menghentikan kamera:", err));

        document.getElementById('result').innerHTML = `<div class="alert alert-info">Memverifikasi: <b>${decodedText}</b></div>`;

        fetch('<?= site_url('scan/process') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({ qr_code: decodedText })
        })
        .then(response => {
            // Cek jika response OK, baru coba parse JSON
            if (!response.ok) {
                // Jika server mengembalikan error seperti 404 atau 500
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json(); 
        })
        .then(data => {
            let alertClass = data.status === 'success' ? 'alert-success' : 'alert-danger';
            document.getElementById('result').innerHTML = `<div class="alert ${alertClass}">${data.message}</div>`;

            if (data.status === 'success') {
                setTimeout(() => location.reload(), 2500);
            }
        })
        .catch(error => {
            console.error('Fetch Error:', error);
            document.getElementById('result').innerHTML = `<div class="alert alert-danger">Terjadi kesalahan. Periksa console log untuk detail.</div>`;
        });
    };

    const onScanFailure = (error) => {
        // Biarkan kosong agar console tidak penuh
    };

    Html5Qrcode.getCameras().then(cameras => {
        if (cameras && cameras.length) {
            reader.start(
                { facingMode: "environment" }, 
                { fps: 10, qrbox: { width: 250, height: 250 } },
                onScanSuccess,
                onScanFailure
            );
        } else {
            document.getElementById('result').innerHTML = `<div class="alert alert-danger">Tidak ada kamera terdeteksi.</div>`;
        }
    }).catch(err => {
        document.getElementById('result').innerHTML = `<div class="alert alert-danger">Gagal akses kamera: ${err}</div>`;
    });
});
</script>
<?= $this->endSection(); ?>