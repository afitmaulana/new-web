<?php

namespace App\Controllers;

use App\Models\OfficialModel;
use App\Models\PresensiModel;

class ScanController extends BaseController
{
    public function process()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403, 'Forbidden');
        }

        $qrCode = $this->request->getPost('qr_code');
        if (empty($qrCode)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'QR Code tidak valid.']);
        }

        $officialModel = new OfficialModel();
        $presensiModel = new PresensiModel();
        $official = $officialModel->where('qr_code', $qrCode)->first();

        if (!$official) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'QR Code tidak terdaftar.']);
        }

        $today = date('Y-m-d');
        $alreadyCheckedIn = $presensiModel->where('official_id', $official['id'])
            ->where('DATE(check_in_time)', $today)->first();

        if ($alreadyCheckedIn) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal! ' . $official['name'] . ' sudah absen hari ini.']);
        }

        $presensiData = [
            'official_id'   => $official['id'],
            'check_in_time' => date('Y-m-d H:i:s'),
            'status'        => 'Hadir'
        ];

        if ($presensiModel->save($presensiData)) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Absensi Berhasil!',
                'data'    => [
                    'name'     => $official['name'],
                    'position' => $official['position'],
                    'time'     => date('d F Y, H:i:s')
                ]
            ]);
        }
        
        return $this->response->setJSON(['status' => 'error', 'message' => 'Kesalahan Server.']);
    }
}