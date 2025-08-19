<?php

namespace App\Controllers;

use App\Models\OfficialModel;
use CodeIgniter\Controller;

class ScanController extends Controller
{
    public function process()
    {
        $request = service('request');
        $qrCode = $request->getPost('qr_code');

        if (!$qrCode) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'QR Code tidak ditemukan.'
            ]);
        }

        $model = new OfficialModel();
        $official = $model->where('unique_code', $qrCode)->first();

        if ($official) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Absensi berhasil dicatat!',
                'data' => [
                    'name' => $official['name'],
                    'position' => $official['position'],
                    'address' => $official['address']
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
