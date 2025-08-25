<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;
use App\Models\PopulationModel;
use App\Models\PresensiModel;

class Dashboard extends BaseController
{
    public function index()
    {
        // Panggil semua model yang dibutuhkan
        $newsModel = new NewsModel();
        $populationModel = new PopulationModel();
        $presensiModel = new PresensiModel();

        // Siapkan data untuk dikirim ke view
        $data = [
            'title'            => 'Dashboard',
            'total_penduduk'   => $populationModel->countAllResults(),
            'total_berita'     => $newsModel->countAllResults(),
            'layanan_surat'    => 25, // Angka statis, bisa diganti dengan model surat nanti
            
            // Ambil 5 data absensi terbaru untuk ditampilkan di tabel
            'presensi'         => $presensiModel->getLogData(5) 
        ];

        return view('dashboard/index', $data);
    }
    
}