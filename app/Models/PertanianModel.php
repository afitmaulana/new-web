<?php

namespace App\Models;

use CodeIgniter\Model;

class PertanianModel extends Model
{
    protected $table = 'pertanian';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'luas', 'hasil'];
}
