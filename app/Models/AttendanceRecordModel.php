<?php

namespace App\Models;

use CodeIgniter\Model;

class AttendanceRecordModel extends Model
{
    protected $table = 'attendance_records';
    protected $primaryKey = 'id';
    protected $allowedFields = ['official_id', 'checkin_time'];
}
