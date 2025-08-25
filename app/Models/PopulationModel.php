<?php

namespace App\Models;

use CodeIgniter\Model;

class PopulationModel extends Model
{
    protected $table            = 'populations'; // Sesuaikan nama tabel Anda
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    // Kolom yang bisa diisi
    protected $allowedFields    = ['name', 'nik', 'address', 'gender'];

    // Timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Menghitung statistik gender
     * @return array
     */
    public function getGenderStats()
    {
        return $this->select('gender, COUNT(id) as total')
                    ->groupBy('gender')
                    ->findAll();
    }
     public function create()
    {
        $data = [
            'title' => 'Tambah Data Penduduk'
        ];

        // Tampilkan view form
        return view('dashboard/population/form', $data);
    }
}