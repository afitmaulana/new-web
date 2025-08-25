<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PopulationModel;
use App\Models\ProductModel; // Tambahkan ini

class DashboardController extends BaseController
{
    public function index()
    {
        $populationModel = new PopulationModel();
        $productModel = new ProductModel(); // Tambahkan ini
        
        // Statistik penduduk
        $populations = $populationModel->findAll();
        $stats = [
            'total' => count($populations),
            'laki_laki' => count(array_filter($populations, function($p) { return $p['gender'] == 'Laki-laki'; })),
            'perempuan' => count(array_filter($populations, function($p) { return $p['gender'] == 'Perempuan'; }))
        ];
        
        // Statistik produk
        $allProducts = $productModel->findAll();
        $product_stats = [
            'total_products' => count($allProducts),
            'featured_products' => count(array_filter($allProducts, function($p) { return $p['is_featured'] == 1; })),
            'total_categories' => count(array_unique(array_column($allProducts, 'category')))
        ];
        
        // Produk unggulan untuk ditampilkan di dashboard (max 4)
        $featured_products = $productModel->getFeaturedProducts(4);
        
        // Produk terbaru untuk aktivitas (max 5)
        $recent_products = $productModel->orderBy('created_at', 'DESC')->limit(5)->findAll();
        
        // Kategori produk untuk chart
        $product_categories = [];
        if (!empty($allProducts)) {
            $categories = array_count_values(array_column($allProducts, 'category'));
            foreach ($categories as $category => $count) {
                $product_categories[] = [
                    'category' => $category,
                    'count' => $count
                ];
            }
        }
        
        // Jika tidak ada kategori, buat data kosong
        if (empty($product_categories)) {
            $product_categories = [
                ['category' => 'Makanan', 'count' => 0],
                ['category' => 'Minuman', 'count' => 0],
                ['category' => 'Kerajinan', 'count' => 0],
                ['category' => 'Pertanian', 'count' => 0],
                ['category' => 'Lainnya', 'count' => 0]
            ];
        }

        $data = [
            'title' => 'Dashboard Desa Kaliboja',
            'populations' => array_slice($populations, 0, 10), // Hanya tampilkan 10 data teratas
            'stats' => $stats,
            'product_stats' => $product_stats,
            'featured_products' => $featured_products,
            'recent_products' => $recent_products,
            'product_categories' => $product_categories
        ];

        return view('dashboard/index', $data);
    }
    
    // Method lainnya tetap sama...
}