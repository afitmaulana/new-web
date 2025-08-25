<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Rekomendasi</title>
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
            <h4>SURAT REKOMENDASI</h4>
            <p>Nomor: <?= esc($nomor_surat) ?></p>
        </div>
        <div class="isi-surat">
            <p class="indent">Berdasarkan permohonan yang diajukan, kami selaku Pemerintah Desa Kaliboja memberikan rekomendasi kepada warga kami:</p>
            <table class="data-pemohon">
                <tr><td width="150px">NIK</td><td>:</td><td><b><?= esc($data_pemohon->nik_pemohon) ?></b></td></tr>
            </table>
            <br>
            <p class="indent">Adapun isi rekomendasi dari pihak kami adalah sebagai berikut:</p>
            <p style="padding-left: 50px; border-left: 2px solid #ccc; font-style: italic;"><?= nl2br(esc($data_pemohon->isi_rekomendasi)) ?></p>
            <p class="penutup indent">Surat rekomendasi ini kami keluarkan dengan sesungguhnya dan penuh tanggung jawab untuk dapat dipergunakan sebagaimana mestinya.</p>
        </div>
        <div class="tanda-tangan"><p>Kaliboja, <?= esc($tanggal_surat) ?></p><p>Kepala Desa Kaliboja</p><br><br><br><br><p><b><u><?= esc(strtoupper($kepala_desa)) ?></u></b></p></div>
    </div>
</body>
</html>