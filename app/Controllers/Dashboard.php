<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel; // Panggil NewsModel

class Dashboard extends BaseController
{
    public function index()
    {
        // Inisialisasi model
        $newsModel = new NewsModel();

        // Siapkan data untuk dikirim ke view
        $data = [
            'title'         => 'Dashboard',
            'total_berita'  => $newsModel->countAllResults(), // Menghitung semua baris di tabel berita
            'total_penduduk'=> 1250, // Angka statis, bisa diganti dengan model penduduk nanti
            'layanan_surat' => 25,   // Angka statis, bisa diganti dengan model surat nanti
        ];

        return view('dashboard/index', $data);
    }
}
