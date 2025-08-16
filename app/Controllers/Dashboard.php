<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel; // Tambahkan ini

class Dashboard extends BaseController
{
    public function index()
    {
        $newsModel = new NewsModel(); // Buat instance model

        $data = [
            'title' => 'Dashboard',
            'total_news' => $newsModel->countAllResults() // Hitung semua berita
        ];
        return view('dashboard/index', $data);
    }
}