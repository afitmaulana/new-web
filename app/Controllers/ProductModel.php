<?php

namespace App\Controllers;

use App\Models\NewsImageModel;
use App\Models\ProductModel; // Tambahkan ini

class LandingPage extends BaseController
{
    public function index()
    {
        $newsImageModel = new NewsImageModel();
        $productModel = new ProductModel(); // Tambahkan ini

        // Ambil semua gambar, diurutkan dari yang paling baru
        $data = [
            'title'    => 'Galeri Desa',
            'images'   => $newsImageModel->orderBy('uploaded_at', 'DESC')->findAll(),
            // Ambil produk unggulan, diurutkan dari yang terbaru
            'products' => $productModel->where('is_featured', 1)->orderBy('created_at', 'DESC')->findAll(), // Tambahkan ini
        ];

        return view('landing_page', $data);
    }
}