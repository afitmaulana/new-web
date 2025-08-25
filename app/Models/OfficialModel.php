<?php

namespace App\Models;

use CodeIgniter\Model;

class OfficialModel extends Model
{
    protected $table = 'officials';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'position'];
}
