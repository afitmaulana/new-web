<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Pindah</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; font-size: 12pt; margin: 30px; }
        .container { width: 100%; margin: auto; }
        .kop-table { width: 100%; border-bottom: 3px solid black; padding-bottom: 10px; margin-bottom: 30px;}
        .kop-table td { text-align: center; vertical-align: middle; }
        .logo { width: 90px; }
        .kop-text h3, .kop-text h4, .kop-text p { margin: 0; }
        .kop-text h3 { font-size: 1.1em; }
        .kop-text h4 { font-size: 1.3em; }
        .kop-text p { font-size: 0.9em; }
        .judul-surat { text-align: center; margin-bottom: 20px; }
        .judul-surat h4 { text-decoration: underline; margin: 0; }
        .isi-surat { line-height: 1.8; text-align: justify; }
        .isi-surat .indent { text-indent: 50px; }
        .data-pemohon { padding-left: 50px; }
        .penutup { margin-top: 40px; }
        .tanda-tangan { margin-top: 80px; width: 300px; float: right; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <table class="kop-table">
            <tr>
                <td class="logo">
                    <img src="<?= esc($logo) ?>" alt="Logo Desa" width="80">
                </td>
                <td class="kop-text">
                    <h3>PEMERINTAH KABUPATEN PEKALONGAN</h3>
                    <h4>KECAMATAN PANINGGARAN</h4>
                    <h4>DESA KALIBOJA</h4>
                    <p>Alamat: Jl. Raya Kaliboja, Paninggaran | Kode Pos: 51164</p>
                </td>
            </tr>
        </table>

        <div class="judul-surat">
            <h4>SURAT KETERANGAN PINDAH</h4>
            <p>Nomor: <?= esc($nomor_surat) ?></p>
        </div>

        <div class="isi-surat">
            <p class="indent">Yang bertanda tangan di bawah ini, Kepala Desa Kaliboja, menerangkan bahwa pemohon di bawah ini:</p>
            <table class="data-pemohon">
                <tr><td width="200px">NIK Pemohon</td><td>:</td><td><b><?= esc($data_pemohon->nik_pemohon) ?></b></td></tr>
                <tr><td>Nomor KK</td><td>:</td><td><?= esc($data_pemohon->no_kk) ?></td></tr>
            </table>
            <br>
            <p class="indent">Telah mengajukan permohonan dan akan pindah domisili dari Desa Kaliboja ke alamat sebagai berikut:</p>
            <table class="data-pemohon">
                <tr><td width="200px">Alamat Tujuan</td><td>:</td><td><?= esc($data_pemohon->alamat_tujuan) ?></td></tr>
                <tr><td>Jumlah Pengikut</td><td>:</td><td><?= esc($data_pemohon->jumlah_pengikut) ?> Orang</td></tr>
            </table>
            <p class="penutup indent">Demikian Surat Keterangan ini dibuat untuk menjadi dasar proses administrasi kependudukan selanjutnya.</p>
        </div>

        <div class="tanda-tangan">
            <p>Kaliboja, <?= esc($tanggal_surat) ?></p>
            <p>Kepala Desa Kaliboja</p>
            <br><br><br><br>
            <p><b><u><?= esc(strtoupper($kepala_desa)) ?></u></b></p>
        </div>
    </div>
</body>
</html>
