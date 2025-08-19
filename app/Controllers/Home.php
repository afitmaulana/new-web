<?php

namespace App\Controllers;

use App\Models\NewsModel;
use App\Models\NewsImageModel;

class Home extends BaseController
{
    public function index()
    {
        // Muat helper yang dibutuhkan
        helper('text');

        $newsModel = new NewsModel();
        $newsImageModel = new NewsImageModel();

        // Ambil 5 berita terbaru untuk ditampilkan
        $latestNews = $newsModel->orderBy('created_at', 'DESC')->findAll(5);

        // Untuk setiap berita, ambil gambar pertamanya
        if (!empty($latestNews)) {
            foreach ($latestNews as $key => $news) {
                $image = $newsImageModel->where('news_id', $news['id'])->first();
                $latestNews[$key]['image'] = $image['image_filename'] ?? null;
            }
        }

        // Data Statistik Desa (contoh data statis)
        $villageStats = [
            ['label' => 'Jumlah Penduduk', 'value' => '1,250 Jiwa', 'icon' => 'fas fa-users'],
            ['label' => 'Luas Wilayah', 'value' => '320 Ha', 'icon' => 'fas fa-map-marked-alt'],
            ['label' => 'Jumlah KK', 'value' => '450 KK', 'icon' => 'fas fa-home'],
        ];

        // Data Aparatur Desa (contoh data statis)
        $villageOfficials = [
            ['name' => 'Afit Maulana', 'position' => 'Kepala Desa', 'photo' => 'https://ui-avatars.com/api/?name=Afit+Maulana&size=128&background=random'],
            ['name' => 'Budi Santoso', 'position' => 'Sekretaris Desa', 'photo' => 'https://ui-avatars.com/api/?name=Budi+Santoso&size=128&background=random'],
            ['name' => 'Cici Paramida', 'position' => 'Kaur Keuangan', 'photo' => 'https://ui-avatars.com/api/?name=Cici+Paramida&size=128&background=random'],
        ];

        // Data Potensi Desa (contoh data statis)
        $villagePotentials = [
            ['title' => 'Pertanian', 'description' => 'Lahan subur yang menghasilkan padi, jagung, dan sayuran berkualitas tinggi.', 'icon' => 'fas fa-leaf'],
            ['title' => 'Peternakan', 'description' => 'Pengembangan peternakan sapi dan kambing sebagai sumber pendapatan warga.', 'icon' => 'fas fa-drumstick-bite'],
            ['title' => 'Kerajinan Tangan', 'description' => 'Produksi kerajinan anyaman bambu yang unik dan memiliki nilai jual.', 'icon' => 'fas fa-pencil-ruler'],
            ['title' => 'Wisata Alam', 'description' => 'Pemandangan alam perbukitan dan air terjun yang potensial untuk dikembangkan.', 'icon' => 'fas fa-mountain'],
        ];

        $data = [
            'title'     => 'Selamat Datang di Website Desa Kaliboja',
            'news'      => $latestNews,
            'stats'     => $villageStats,
            'officials' => $villageOfficials,
            'potentials'=> $villagePotentials,
        ];
        
        return view('pages/landing', $data);
    }
}
