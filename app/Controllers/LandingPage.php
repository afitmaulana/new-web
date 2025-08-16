<?php

namespace App\Controllers;

use App\Models\NewsImageModel; // Gunakan model gambar

class LandingPage extends BaseController
{
    public function index()
    {
        $newsImageModel = new NewsImageModel();

        // Ambil semua gambar, diurutkan dari yang paling baru
        $data = [
            'title'  => 'Galeri Desa',
            'images' => $newsImageModel->orderBy('uploaded_at', 'DESC')->findAll(),
        ];

        return view('landing_page', $data);
    }
}