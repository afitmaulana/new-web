<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Pengantar Nikah</title>
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
        .data-table { padding-left: 50px; }
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
            <h4>SURAT PENGANTAR NIKAH</h4>
            <p>Nomor: <?= esc($nomor_surat) ?></p>
        </div>

        <div class="isi-surat">
            <p class="indent">Yang bertanda tangan di bawah ini, Kepala Desa Kaliboja, menerangkan bahwa nama-nama di bawah ini adalah benar warga kami dan akan melangsungkan pernikahan:</p>
            <br>
            <p><b><u>CALON MEMPELAI</u></b></p>
            <table class="data-table">
                <tr><td width="200px">Nama Lengkap</td><td>:</td><td><b><?= esc(strtoupper($data_pemohon->nama_calon)) ?></b></td></tr>
                <tr><td>NIK</td><td>:</td><td><?= esc($data_pemohon->nik_calon) ?></td></tr>
            </table>
            <br>
            <p><b><u>ORANG TUA/WALI</u></b></p>
            <table class="data-table">
                <tr><td width="200px">Nama Ayah</td><td>:</td><td><?= esc($data_pemohon->nama_ayah_calon) ?></td></tr>
                <tr><td>NIK Ayah</td><td>:</td><td><?= esc($data_pemohon->nik_ayah_calon) ?></td></tr>
                <tr><td>Nama Ibu</td><td>:</td><td><?= esc($data_pemohon->nama_ibu_calon) ?></td></tr>
                <tr><td>NIK Ibu</td><td>:</td><td><?= esc($data_pemohon->nik_ibu_calon) ?></td></tr>
            </table>
            <p class="penutup indent">Surat pengantar ini dibuat sebagai kelengkapan persyaratan administrasi pernikahan di Kantor Urusan Agama (KUA).</p>
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
