<?php

namespace App\Models;

use CodeIgniter\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_kegiatan', 'tanggal', 'tempat', 'keterangan'];
}
