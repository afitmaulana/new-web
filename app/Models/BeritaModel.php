<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    // Nama tabel di database Anda untuk berita
    protected $table            = 'berita';
    protected $primaryKey       = 'id';

    // Izinkan field ini untuk diisi
    protected $allowedFields    = ['judul', 'slug', 'konten', 'gambar', 'penulis', 'created_at'];

    // Menggunakan created_at dan updated_at
    protected $useTimestamps = true;

    /**
     * Fungsi untuk membuat slug unik secara otomatis sebelum insert
     */
    protected function setSlug(array $data)
    {
        if (!isset($data['data']['slug'])) {
            $slug = url_title($data['data']['judul'], '-', true);
            $i = 1;
            $uniqueSlug = $slug;
            while ($this->where('slug', $uniqueSlug)->countAllResults() > 0) {
                $uniqueSlug = $slug . '-' . $i++;
            }
            $data['data']['slug'] = $uniqueSlug;
        }
        return $data;
    }
}