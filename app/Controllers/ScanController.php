<?php

namespace App\Controllers;

use App\Models\OfficialModel;
use CodeIgniter\Controller;

class ScanController extends Controller
{
    public function process()
    {
        $json = $this->request->getJSON();
        $qrCode = null;

        if ($json && isset($json->qr_code)) {
            $qrCode = $json->qr_code;
        }

        if (!$qrCode) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'QR Code tidak valid.']);
        }

        $model = new OfficialModel();
        $official = $model->where('qr_code', $qrCode)->first();

        if ($official) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Absensi berhasil dicatat!',
                'data' => $official
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Data tidak ditemukan di database.'
            ]);
        }
    }
}