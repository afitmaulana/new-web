<?php

namespace App\Models;

use CodeIgniter\Model;

class OfficialModel extends Model
{
    protected $table = 'officials';
    protected $primaryKey = 'id';
    
    // PASTIKAN 'qr_code' ADA DI DALAM DAFTAR INI
    protected $allowedFields = ['name', 'address', 'position', 'qr_code', 'created_at', 'updated_at'];
}