<?php

namespace App\Models;

use CodeIgniter\Model;

class PresensiModel extends Model
{
    protected $table            = 'presensi_log';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['official_id', 'check_in_time', 'status'];

    /**
     * Mengambil laporan presensi untuk dashboard.
     * @return array
     */
    public function getLaporanPresensi()
    {
        $today = date('Y-m-d');
        $hadir = $this->where('status', 'Hadir')
                      ->where("DATE(check_in_time)", $today)
                      ->countAllResults();
        
        // Ganti dengan model yang sesuai jika ada
        $totalPerangkat = new OfficialModel();
        $total = $totalPerangkat->countAllResults();

        return [
            'hadir' => $hadir,
            'total' => $total,
            'persentase' => ($total > 0) ? round(($hadir / $total) * 100) : 0,
        ];
    }

    /**
     * Mengambil semua data log absensi dengan join ke tabel officials.
     * @return array
     */
    // app/Models/PresensiModel.php

public function getLogData($limit = null)
    {
        $builder = $this->select('presensi_log.*, officials.name as nama, officials.position as jabatan, officials.id as nip')
                        ->join('officials', 'officials.id = presensi_log.official_id')
                        ->orderBy('presensi_log.check_in_time', 'DESC');
        
        if ($limit) {
            $builder->limit($limit);
        }

        return $builder->findAll();
    }
}