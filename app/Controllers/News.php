<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;
use App\Models\NewsImageModel; // 1. Tambahkan use statement untuk model gambar

class News extends BaseController
{
    protected $newsModel;
    protected $newsImageModel; // 2. Deklarasikan properti untuk model gambar

    public function __construct()
    {
        $this->newsModel = new NewsModel();
        $this->newsImageModel = new NewsImageModel(); // 3. Inisialisasi model gambar
    }

    public function index()
    {
        $newsData = $this->newsModel->orderBy('created_at', 'DESC')->findAll();

        // Ambil gambar untuk setiap berita
        foreach ($newsData as $key => $news) {
            $newsData[$key]['images'] = $this->newsImageModel
                                             ->where('news_id', $news['id'])
                                             ->findAll();
        }

        $data = [
            'title' => 'Manajemen Berita',
            'news' => $newsData
        ];
        return view('news/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Berita'
        ];
        return view('news/create', $data);
    }

    public function store()
    {
        // 1. Simpan data berita utama terlebih dahulu
        $this->newsModel->save([
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ]);

        // Dapatkan ID dari berita yang baru saja disimpan
        $newsId = $this->newsModel->getInsertID();

        // 2. Proses upload gambar
        $imageFiles = $this->request->getFileMultiple('images');

        // Tambahkan pengecekan untuk memastikan ada file yang diupload
        if (!empty($imageFiles)) {
            foreach ($imageFiles as $file) {
                // Cek lagi untuk memastikan file benar-benar valid
                if ($file && $file->isValid() && !$file->hasMoved()) {
                    // Buat nama file acak untuk menghindari duplikasi
                    $newFileName = $file->getRandomName();

                    // Pindahkan file ke folder public/uploads/news
                    $file->move(FCPATH . 'uploads/news', $newFileName);

                    // 3. Simpan informasi gambar ke database
                    $this->newsImageModel->save([
                        'news_id' => $newsId,
                        'image_filename' => $newFileName,
                        'uploaded_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }

        session()->setFlashdata('success', 'Berita baru dan gambar berhasil dipublikasikan!');
        return redirect()->to('/dashboard/news');
    }
    
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Berita',
            'news' => $this->newsModel->find($id)
        ];

        if (empty($data['news'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Berita tidak ditemukan.');
        }

        return view('news/edit', $data);
    }

    public function update($id)
    {
        $this->newsModel->update($id, [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ]);

        // (Catatan: Logika untuk update gambar bisa ditambahkan di sini nanti)

        session()->setFlashdata('success', 'Berita berhasil diperbarui!');
        return redirect()->to('/dashboard/news');
    }

    public function delete($id)
    {
        // (Catatan: Gambar akan terhapus otomatis karena 'ON DELETE CASCADE' di database)
        $this->newsModel->delete($id);
        session()->setFlashdata('success', 'Berita berhasil dihapus!');
        return redirect()->to('/dashboard/news');
    }
}
