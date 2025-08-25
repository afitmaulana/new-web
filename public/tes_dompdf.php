<?php

// Memuat autoloader Composer secara manual
require __DIR__ . '/../vendor/autoload.php';

// Coba panggil class Dompdf
use Dompdf\Dompdf;

// Cek apakah class-nya ada
// PERBAIKI DI SINI: ganti dompdf menjadi Dompdf
if (class_exists(Dompdf::class)) {
    echo "<h1>BERHASIL!</h1>";
    echo "<p>Class Dompdf berhasil ditemukan oleh autoloader Composer.</p>";
    echo "<p>Masalahnya kemungkinan ada pada konfigurasi CodeIgniter, bukan pada instalasi Composer.</p>";
} else {
    echo "<h1>GAGAL!</h1>";
    echo "<p>Class Dompdf TIDAK DAPAT ditemukan.</p>";
    echo "<p>Ini berarti ada masalah serius dengan instalasi Composer Anda atau struktur folder proyek.</p>";
    echo "<p>Pastikan folder 'vendor' ada di direktori utama proyek Anda.</p>";
}