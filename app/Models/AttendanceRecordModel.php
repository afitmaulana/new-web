<?php

namespace App\Models;

use CodeIgniter\Model;

class AttendanceRecordModel extends Model
{
    protected $table            = 'attendance_records';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['official_id', 'attendance_date', 'check_in', 'check_out'];
}
