<?php

namespace App\Controllers;

use App\Models\NewsModel;

class PublicNews extends BaseController
{
    // Halaman untuk menampilkan semua berita (arsip)
    public function index()
    {
        $newsModel = new NewsModel();
        $data = [
            'title' => 'Arsip Berita',
            'news'  => $newsModel->orderBy('created_at', 'DESC')->paginate(8), // 8 berita per halaman
            'pager' => $newsModel->pager,
        ];
        // Anda perlu membuat view untuk ini: app/Views/news_archive.php
        return view('news_archive', $data);
    }

    // Halaman untuk menampilkan satu berita
    public function detail($id)
    {
        $newsModel = new NewsModel();
        $newsItem = $newsModel->find($id);

        if (empty($newsItem)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => $newsItem['title'],
            'news'  => $newsItem,
        ];
        // Anda perlu membuat view untuk ini: app/Views/news_detail.php
        return view('news_detail', $data);
    }
}