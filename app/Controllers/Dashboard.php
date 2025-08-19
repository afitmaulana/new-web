<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;
use App\Models\PresensiModel; // Panggil NewsModel

class Dashboard extends BaseController
{
    public function index()
    {
        // Inisialisasi model
        $newsModel = new NewsModel();
        $presensiModel = new PresensiModel();

        // Siapkan data untuk dikirim ke view
        $data = [
            'title'         => 'Dashboard',
            'total_berita'  => $newsModel->countAllResults(), // Menghitung semua baris di tabel berita
            'total_penduduk'=> 1250, // Angka statis, bisa diganti dengan model penduduk nanti
            'layanan_surat' => 25,   // Angka statis, bisa diganti dengan model surat nanti
            'presensi' => $presensiModel->getLaporanPresensi() 
        ];

        return view('dashboard/index', $data);
    }
}
