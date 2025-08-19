<?php

namespace App\Models;

use CodeIgniter\Model;

class OfficialModel extends Model
{
    protected $table = 'officials';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'address', 'position', 'unique_code', 'created_at', 'updated_at'];
}
