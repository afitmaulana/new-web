<?php

namespace App\Models;

use CodeIgniter\Model;

class PresensiModel extends Model
{
    protected $table            = 'presensi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_perangkat', 'tanggal', 'jam_masuk', 'jam_pulang', 'status_kehadiran'];
    protected $useTimestamps    = true;

    public function getLaporanPresensi()
    {
        return $this->select('presensi.*, perangkat_desa.nama, perangkat_desa.nip, perangkat_desa.jabatan')
                    ->join('perangkat_desa', 'perangkat_desa.id = presensi.id_perangkat')
                    ->orderBy('presensi.tanggal', 'DESC')
                    ->findAll();
    }
}