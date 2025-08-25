<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Pernyataan</title>
    <style>body { font-family: 'Times New Roman', Times, serif; font-size: 12pt; } .container { width: 90%; margin: auto; } .kop-surat { text-align: center; border-bottom: 3px solid black; padding-bottom: 15px; margin-bottom: 30px; display: flex; align-items: center; } .kop-surat img { margin-right: 20px; max-width: 100px; height: auto; } .kop-surat .judul-kop { flex-grow: 1; text-align: center; } .kop-surat h3, .kop-surat h4 { margin: 0; } .judul-surat { text-align: center; margin-bottom: 20px; } .judul-surat h4 { text-decoration: underline; margin: 0; } .isi-surat { line-height: 1.8; text-align: justify; } .isi-surat .indent { text-indent: 50px; } .data-pemohon, .data-table { padding-left: 50px; } .penutup { margin-top: 40px; } .signature-wrapper { margin-top: 80px; overflow: hidden; } .signature { float: left; width: 45%; text-align: center; } .signature.right { float: right; }</style>
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
            <br><br>
            <h4>SURAT PERNYATAAN</h4>
        </div>
        <div class="isi-surat">
            <p class="indent">Saya yang bertanda tangan di bawah ini:</p>
            <table class="data-pemohon">
                <tr><td width="150px">NIK</td><td>:</td><td><b><?= esc($data_pemohon->nik_pernyataan) ?></b></td></tr>
                <tr><td width="150px">Nama</td><td>:</td><td><b><?= esc($data_pemohon->nama_pemohon ?? '[NAMA TIDAK DITEMUKAN]') ?></b></td></tr>
            </table>
            <br>
            <p class="indent">Dengan ini menyatakan dengan sesungguhnya bahwa:</p>
            <div style="padding: 20px; border: 1px solid #ddd; margin-top: 20px; margin-bottom: 20px; min-height: 150px;">
                <?= nl2br(esc($data_pemohon->isi_pernyataan)) ?>
            </div>
            <p class="penutup indent">Demikian surat pernyataan ini saya buat dengan sadar dan tanpa ada paksaan dari pihak manapun untuk dapat dipergunakan sebagaimana mestinya. Apabila di kemudian hari pernyataan ini tidak benar, maka saya bersedia menerima sanksi sesuai dengan peraturan yang berlaku.</p>
        </div>
        <div class="signature-wrapper">
             <div class="signature">
                <p>Mengetahui,</p>
                <p>Kepala Desa Kaliboja</p>
                <br><br><br><br>
                <p><b><u><?= esc(strtoupper($kepala_desa)) ?></u></b></p>
            </div>
            <div class="signature right">
                <p>Kaliboja, <?= esc($tanggal_surat) ?></p>
                <p>Yang Membuat Pernyataan,</p>
                <br><br><br><br>
                <p><b><u><?= esc(strtoupper($data_pemohon->nama_pemohon ?? '[NAMA PEMBUAT PERNYATAAN]')) ?></u></b></p>
            </div>
        </div>
    </div>
</body>
</html>