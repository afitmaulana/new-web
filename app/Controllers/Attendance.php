<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OfficialModel;
use App\Models\AttendanceRecordModel;
use CodeIgniter\I18n\Time;

class Attendance extends BaseController
{
    protected $officialModel;
    protected $attendanceModel;

    public function __construct()
    {
        $this->officialModel = new OfficialModel();
        $this->attendanceModel = new AttendanceRecordModel();
    }

    // --- Manajemen Perangkat Desa ---

    public function officials()
    {
        $data = [
            'title'     => 'Manajemen Perangkat Desa',
            'officials' => $this->officialModel->findAll(),
        ];
        return view('dashboard/attendance/officials_index', $data);
    }

    public function createOfficial()
    {
        $data = [
            'title' => 'Tambah Perangkat Desa',
        ];
        return view('dashboard/attendance/officials_form', $data);
    }

    public function storeOfficial()
    {
        $rules = [
            'name'     => 'required|min_length[3]',
            'position' => 'required',
            'address'  => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->officialModel->save([
            'name'        => $this->request->getPost('name'),
            'position'    => $this->request->getPost('position'),
            'address'     => $this->request->getPost('address'),
            'unique_code' => uniqid('desa_'), // Generate kode unik untuk QR
        ]);

        return redirect()->to('/dashboard/officials')->with('message', 'Data perangkat desa berhasil ditambahkan.');
    }
    
    public function showQR($id)
    {
        $official = $this->officialModel->find($id);
        if (!$official) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $qrData = json_encode([
            'code' => $official['unique_code'],
            'name' => $official['name'],
            'position' => $official['position']
        ]);

        $data = [
            'title'    => 'QR Code untuk ' . $official['name'],
            'official' => $official,
            'qrData'   => $qrData
        ];

        return view('dashboard/attendance/show_qr', $data);
    }

    // --- Logika Absensi ---

    public function record()
    {
        if ($this->request->getMethod() !== 'post') {
            return $this->response->setStatusCode(405);
        }

        $qrData = $this->request->getJsonVar('qrData');
        if (!isset($qrData->code)) {
            return $this->response->setJSON(['success' => false, 'message' => 'QR Code tidak valid.']);
        }

        $official = $this->officialModel->where('unique_code', $qrData->code)->first();
        if (!$official) {
            return $this->response->setJSON(['success' => false, 'message' => 'Perangkat Desa tidak terdaftar.']);
        }

        $today = Time::now('Asia/Jakarta')->toDateString();
        $currentTime = Time::now('Asia/Jakarta')->toTimeString();

        $record = $this->attendanceModel
            ->where('official_id', $official['id'])
            ->where('attendance_date', $today)
            ->first();

        if (!$record) {
            // Absen Masuk
            $this->attendanceModel->insert([
                'official_id'     => $official['id'],
                'attendance_date' => $today,
                'check_in'        => $currentTime,
            ]);
            return $this->response->setJSON(['success' => true, 'message' => 'Absen MASUK berhasil: ' . $official['name'] . ' pada jam ' . $currentTime]);
        }
        
        if ($record['check_in'] && !$record['check_out']) {
            // Absen Keluar
            $this->attendanceModel->update($record['id'], ['check_out' => $currentTime]);
            return $this->response->setJSON(['success' => true, 'message' => 'Absen KELUAR berhasil: ' . $official['name'] . ' pada jam ' . $currentTime]);
        }

        return $this->response->setJSON(['success' => false, 'message' => $official['name'] . ' sudah melakukan absen masuk dan keluar hari ini.']);
    }

    public function log()
    {
        $records = $this->attendanceModel
            ->select('attendance_records.*, officials.name, officials.position')
            ->join('officials', 'officials.id = attendance_records.official_id')
            ->orderBy('attendance_date', 'DESC')
            ->orderBy('check_in', 'DESC')
            ->findAll();

        $data = [
            'title'   => 'Laporan Absensi',
            'records' => $records,
        ];

        return view('dashboard/attendance/log', $data);
    }
}
