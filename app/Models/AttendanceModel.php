<?php

namespace App\Models;

use CodeIgniter\Model;

class AttendanceModel extends Model
{
    protected $table = 'attendance_records'; // sesuaikan dengan SQL kamu
    protected $primaryKey = 'id';
    protected $allowedFields = ['kode_qr', 'waktu_absen'];
    public $useTimestamps = false;
}
