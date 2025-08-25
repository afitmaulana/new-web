<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Pengantar Pengurusan Dokumen</title>
    <style>body { font-family: 'Times New Roman', Times, serif; font-size: 12pt; } .container { width: 90%; margin: auto; } .kop-surat { text-align: center; border-bottom: 3px solid black; padding-bottom: 15px; margin-bottom: 30px; display: flex; align-items: center; } .kop-surat img { margin-right: 20px; max-width: 100px; height: auto; } .kop-surat .judul-kop { flex-grow: 1; text-align: center; } .kop-surat h3, .kop-surat h4 { margin: 0; } .judul-surat { text-align: center; margin-bottom: 20px; } .judul-surat h4 { text-decoration: underline; margin: 0; } .isi-surat { line-height: 1.8; text-align: justify; } .isi-surat .indent { text-indent: 50px; } .data-pemohon, .data-table { padding-left: 50px; } .penutup { margin-top: 40px; } .tanda-tangan { margin-top: 80px; width: 300px; float: right; text-align: center; }</style>
</head>
<body>
    <div class="container">
        <div class="kop-surat">
            <img src="<?= base_url('img/logo.png') ?>" alt="Logo Kabupaten Pekalongan">             <div class="judul-kop">
                <h3>PEMERINTAH KABUPATEN PEKALONGAN</h3>
                <h4>KECAMATAN PANINGGARAN</h4>
                <h4>DESA KALIBOJA</h4>
                <p style="font-size: 10pt;">Alamat: Jl. Raya Kaliboja, Paninggaran | Kode Pos: 51164</p>
            </div>
        </div>
        <div class="judul-surat">
            <h4>SURAT PENGANTAR</h4>
            <p>Nomor: <?= esc($nomor_surat) ?></p>
        </div>
        <div class="isi-surat">
            <p class="indent">Yang bertanda tangan di bawah ini Kepala Desa Kaliboja, menerangkan bahwa:</p>
            <table class="data-pemohon">
                <tr><td width="150px">NIK</td><td>:</td><td><b><?= esc($data_pemohon->nik) ?></b></td></tr>
            </table>
            <br>
            <p class="indent">Adalah benar warga kami yang memohon pengantar untuk keperluan mengurus dokumen sebagai berikut:</p>
            <table class="data-pemohon">
                <tr><td width="150px">Jenis Dokumen</td><td>:</td><td><b><?= esc($data_pemohon->jenis_dokumen) ?></b></td></tr>
                <tr><td>Keperluan</td><td>:</td><td><?= esc($data_pemohon->keperluan) ?></td></tr>
            </table>
            <p class="penutup indent">Demikian Surat Pengantar ini dibuat agar pihak yang berkepentingan dapat memberikan bantuan dan fasilitas seperlunya.</p>
        </div>
        <div class="tanda-tangan"><p>Kaliboja, <?= esc($tanggal_surat) ?></p><p>Kepala Desa Kaliboja</p><br><br><br><br><p><b><u><?= esc(strtoupper($kepala_desa)) ?></u></b></p></div>
    </div>
</body>
</html>