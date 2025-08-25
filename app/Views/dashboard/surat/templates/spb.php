<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Pemberitahuan</title>
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
            <h4>SURAT PEMBERITAHUAN</h4>
            <p>Nomor: <?= esc($nomor_surat) ?></p>
        </div>

        <div class="isi-surat">
            <p>Dengan hormat,</p>
            <p class="indent">Sehubungan dengan <b><?= esc($data_pemohon->perihal_pemberitahuan) ?></b>, kami dari Pemerintah Desa Kaliboja memberitahukan kepada seluruh warga bahwa:</p>
            <div style="padding: 20px; border: 1px solid #ddd; margin-top: 20px; margin-bottom: 20px;">
                <?= nl2br(esc($data_pemohon->isi_pemberitahuan)) ?>
            </div>
            <p class="penutup indent">Demikian pemberitahuan ini kami sampaikan. Atas perhatian dan kerja sama seluruh warga, kami ucapkan terima kasih.</p>
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
