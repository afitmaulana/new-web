<?php

namespace App\Models;

use CodeIgniter\Model;

class PeternakanModel extends Model
{
    protected $table = 'peternakan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'jenis', 'jumlah'];
}
