<?php

if (extension_loaded('gd') && function_exists('imagepng')) {
    echo "<h1>Selamat! Ekstensi GD Aktif dan Siap Digunakan.</h1>";
    echo "<p>Server Anda bisa membuat gambar PNG.</p>";
} else {
    echo "<h1>ERROR: Ekstensi GD TIDAK AKTIF atau tidak lengkap.</h1>";
    echo "<p>Silakan periksa kembali file php.ini Anda (pastikan titik koma di depan <strong>extension=gd</strong> sudah dihapus) dan jangan lupa RESTART APACHE.</p>";
}

?>