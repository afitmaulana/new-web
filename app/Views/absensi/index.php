<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h3 class="text-center mt-4">Absensi Kehadiran</h3>
    <p class="text-center">Arahkan kamera ke QR Code</p>
    
    <!-- Tempat kamera -->
    <div id="reader" style="width:100%; max-width:400px; margin:auto; min-height:300px;"></div>
    <div id="result" class="text-center mt-3"></div>
</div>

<!-- Load library html5-qrcode -->
<script src="https://unpkg.com/html5-qrcode"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const reader = new Html5Qrcode("reader");

    function onScanSuccess(decodedText, decodedResult) {
        document.getElementById('result').innerHTML = `
            <div class="alert alert-success">
                QR Code Terdeteksi: <b>${decodedText}</b>
            </div>
        `;
        // Stop kamera setelah berhasil scan
        reader.stop().then(() => {
            console.log("Kamera dihentikan.");
        }).catch(err => {
            console.error("Error stop kamera: ", err);
        });
    }

    function onScanFailure(error) {
        console.warn(`Scan gagal: ${error}`);
    }

    Html5Qrcode.getCameras().then(cameras => {
        if (cameras && cameras.length) {
            // Pakai kamera pertama
            reader.start(
                { facingMode: "environment" }, 
                { fps: 10, qrbox: 250 }, 
                onScanSuccess, 
                onScanFailure
            );
        } else {
            document.getElementById('result').innerHTML = `
                <div class="alert alert-danger">Tidak ada kamera terdeteksi.</div>
            `;
        }
    }).catch(err => {
        document.getElementById('result').innerHTML = `
            <div class="alert alert-danger">Gagal akses kamera: ${err}</div>
        `;
    });
});
</script>
<?= $this->endSection(); ?>
