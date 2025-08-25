<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Kelahiran</title>
    <style>
        body { 
            font-family: 'Times New Roman', Times, serif; 
            font-size: 12pt; 
            margin: 40px 60px; 
            line-height: 1.6;
        }
        .container { width: 100%; margin: auto; }

        /* KOP SURAT */
        .kop-surat { text-align: center; border-bottom: 3px double #000; padding-bottom: 8px; margin-bottom: 25px; }
        .kop-surat img { position: absolute; left: 60px; top: 40px; width: 80px; }
        .kop-surat h3, .kop-surat h4, .kop-surat p { margin: 0; }
        .kop-surat h3 { font-size: 14pt; font-weight: normal; }
        .kop-surat h4 { font-size: 16pt; font-weight: bold; }
        .kop-surat p  { font-size: 11pt; }

        /* Judul Surat */
        .judul-surat { text-align: center; margin-bottom: 20px; }
        .judul-surat h4 { text-decoration: underline; margin: 0; font-size: 14pt; }
        .judul-surat p { margin: 4px 0 0; font-size: 12pt; }

        /* Isi Surat */
        .isi-surat { text-align: justify; }
        .isi-surat .indent { text-indent: 50px; }
        .data-pemohon { margin-left: 60px; }
        .data-pemohon td { padding: 2px 6px; vertical-align: top; }

        /* Penutup & TTD */
        .penutup { margin-top: 20px; }
        .tanda-tangan { margin-top: 50px; width: 300px; float: right; text-align: center; }
        .tanda-tangan p { margin: 4px 0; }
    </style>
</head>
<body>
    <div class="container">

        <!-- Kop Surat -->
        <div class="kop-surat">
            <img src="<?= esc($logo) ?>" alt="Logo Desa">
            <h3>PEMERINTAH KABUPATEN PEKALONGAN</h3>
            <h4>KECAMATAN PANINGGARAN</h4>
            <h4>DESA KALIBOJA</h4>
            <p>Alamat: Jl. Raya Kaliboja, Paninggaran | Kode Pos: 51164</p>
        </div>

        <!-- Judul Surat -->
        <div class="judul-surat">
            <h4>SURAT KETERANGAN KELAHIRAN</h4>
            <p>Nomor: <?= esc($nomor_surat) ?></p>
        </div>

        <!-- Isi Surat -->
        <div class="isi-surat">
            <p class="indent">
                Yang bertanda tangan di bawah ini, Kepala Desa Kaliboja, menerangkan bahwa telah lahir seorang anak:
            </p>
            <table class="data-pemohon">
                <tr><td width="180px">Nama Bayi</td><td>:</td><td><b><?= esc(strtoupper($data_pemohon->nama_bayi)) ?></b></td></tr>
                <tr><td>Tanggal Lahir</td><td>:</td><td><?= \CodeIgniter\I18n\Time::parse($data_pemohon->tanggal_lahir)->toLocalizedString('d MMMM yyyy') ?></td></tr>
                <tr><td>Tempat Lahir</td><td>:</td><td><?= esc($data_pemohon->tempat_lahir) ?></td></tr>
                <tr><td>Jenis Kelamin</td><td>:</td><td><?= esc($data_pemohon->jenis_kelamin_bayi) ?></td></tr>
            </table>
            <br>
            <p>Dari pasangan suami-istri:</p>
            <table class="data-pemohon">
                <tr><td width="180px">Nama Ayah</td><td>:</td><td><?= esc($data_pemohon->nama_ayah) ?></td></tr>
                <tr><td>NIK Ayah</td><td>:</td><td><?= esc($data_pemohon->nik_ayah) ?></td></tr>
                <tr><td>Nama Ibu</td><td>:</td><td><?= esc($data_pemohon->nama_ibu) ?></td></tr>
                <tr><td>NIK Ibu</td><td>:</td><td><?= esc($data_pemohon->nik_ibu) ?></td></tr>
            </table>

            <p class="penutup indent">
                Demikian Surat Keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
            </p>
        </div>

        <!-- Tanda Tangan -->
        <div class="tanda-tangan">
            <p>Kaliboja, <?= esc($tanggal_surat) ?></p>
            <p>Kepala Desa Kaliboja</p>
            <br><br><br><br>
            <p><b><u><?= esc(strtoupper($kepala_desa)) ?></u></b></p>
        </div>
    </div>
</body>
</html>
