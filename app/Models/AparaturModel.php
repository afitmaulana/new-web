<?php

namespace App\Models;

use CodeIgniter\Model;

class ApparatusModel extends Model
{
    protected $table            = 'apparatus'; // Sesuaikan dengan nama tabel Anda
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    // Kolom yang diizinkan untuk diisi
    protected $allowedFields    = ['name', 'position', 'photo'];

    // Timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}