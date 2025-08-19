<?php

namespace App\Controllers;

use App\Models\OfficialModel;
use CodeIgniter\Controller;

class Scan extends Controller
{
    public function process()
    {
        $request = service('request');
        $qrCode = $request->getJSON(true)['qr_code'] ?? null;

        if (!$qrCode) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'QR Code tidak valid.'
            ]);
        }

        // Ambil data dari tabel officials
        $officialModel = new OfficialModel();
        $official = $officialModel->where('qr_code', $qrCode)->first();

        if ($official) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Absensi berhasil dicatat.',
                'data' => [
                    'name'     => $official['name'],
                    'position' => $official['position'],
                    'address'  => $official['address']
                ]
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Data tidak ditemukan di database.'
            ]);
        }
    }
}
