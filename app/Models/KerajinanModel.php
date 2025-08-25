<?php

namespace App\Models;
use CodeIgniter\Model;

class KerajinanModel extends Model
{
    protected $table = 'kerajinan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'jenis', 'jumlah'];
    protected $useTimestamps = true;
}
