<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Keputusan Desa</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; font-size: 12pt; margin: 30px; }
        .container { width: 90%; margin: auto; }
        .kop-surat { display: flex; align-items: center; border-bottom: 3px solid black; padding-bottom: 15px; margin-bottom: 40px; }
        .kop-surat img { margin-right: 20px; max-width: 90px; height: auto; }
        .judul-kop { flex-grow: 1; text-align: center; }
        .judul-kop h3, .judul-kop h4, .judul-kop p { margin: 0; }
        .judul-kop p { font-size: 10pt; }
        
        .judul-surat { text-align: center; margin-bottom: 25px; }
        .judul-surat h4 { text-decoration: underline; margin: 0; font-size: 14pt; }
        .judul-surat p { margin: 5px 0; }

        .isi-surat { line-height: 1.8; text-align: justify; }
        .konsideran-title { font-weight: bold; margin-top: 15px; }
        .konsideran-body { padding-left: 30px; }
        .konsideran-body ul { margin: 5px 0; padding-left: 20px; }
        .konsideran-body li { margin-bottom: 5px; }

        .memutuskan-title { text-align: center; font-weight: bold; margin: 25px 0; font-size: 13pt; }

        .tanda-tangan { margin-top: 100px; width: 300px; float: right; text-align: center; }
        .tanda-tangan p { margin: 5px 0; }
        .tanda-tangan .nama { margin-top: 70px; font-weight: bold; text-transform: uppercase; text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <div class="kop-surat">
            <img src="<?= base_url('img/logo.png') ?>" alt="Logo Kabupaten Pekalongan">
            <div class="judul-kop">
                <h3>PEMERINTAH KABUPATEN PEKALONGAN</h3>
                <h4>KECAMATAN PANINGGARAN</h4>
                <h4>DESA KALIBOJA</h4>
                <p>Alamat: Jl. Raya Kaliboja, Paninggaran | Kode Pos: 51164</p>
            </div>
        </div>

        <div class="judul-surat">
            <h4>KEPUTUSAN KEPALA DESA KALIBOJA</h4>
            <p>NOMOR: <?= esc($nomor_surat) ?></p>
            <br>
            <p><b>TENTANG<br><?= esc(strtoupper($data_pemohon->tentang)) ?></b></p>
        </div>

        <div class="isi-surat">
            <p class="konsideran-title">Menimbang:</p>
            <div class="konsideran-body"><?= nl2br(esc($data_pemohon->menimbang)) ?></div>

            <p class="konsideran-title">Mengingat:</p>
            <div class="konsideran-body"><?= nl2br(esc($data_pemohon->mengingat)) ?></div>

            <h4 class="memutuskan-title">MEMUTUSKAN:</h4>
            <p class="konsideran-title">Menetapkan:</p>
            <div class="konsideran-body"><?= nl2br(esc($data_pemohon->memutuskan)) ?></div>
        </div>

        <div class="tanda-tangan">
            <p>Ditetapkan di: Kaliboja</p>
            <p>Pada tanggal: <?= esc($tanggal_surat) ?></p>
            <p>Kepala Desa Kaliboja</p>
            <p class="nama"><?= esc($kepala_desa) ?></p>
        </div>
    </div>
</body>
</html>
