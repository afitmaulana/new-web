<?php

namespace App\Controllers;

use App\Models\OfficialModel;
use App\Models\AttendanceRecordModel;
use CodeIgniter\Controller;

// ✅ Import versi v4
use Endroid\QrCode\QrCode;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;


class Attendance extends Controller
{
    protected $officialModel;
    protected $attendanceModel;

    public function __construct()
    {
        $this->officialModel = new OfficialModel();
        $this->attendanceModel = new AttendanceRecordModel();
    }

    // ===========================
    // DAFTAR APARATUR
    // ===========================
    public function officials()
    {
        $officials = $this->officialModel->findAll();
        return view('attendance/officials_list', [
            'officials' => $officials,
            'title' => 'Daftar Aparatur'
        ]);
    }

    // Form tambah aparatur
    public function addOfficial()
    {
        return view('attendance/add_official', [
            'title' => 'Tambah Aparatur'
        ]);
    }

    // Simpan data aparatur baru
    public function saveOfficial()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'position' => $this->request->getPost('position')
        ];

        if (empty($data['name']) || empty($data['position'])) {
            return redirect()->back()->with('error', 'Nama dan Jabatan wajib diisi')->withInput();
        }

        $this->officialModel->save($data);
        return redirect()->to(site_url('dashboard/officials'))->with('success', 'Aparatur berhasil ditambahkan');
    }

    // ===========================
    // QR CODE
    // ===========================
    public function qrView($id)
    {
        $official = $this->officialModel->find($id);
        if (!$official) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Official not found');
        }

        return view('attendance/qr_view', [
            'official' => $official,
            'title' => 'QR Code Absensi'
        ]);
    }

   public function qrImage($id)
    {
        $official = $this->officialModel->find($id);
        if (!$official) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Official not found');
        }

        $qrData = site_url('dashboard/attendance/checkin?official_id=' . $official['id']);

        // ✅ cara benar di v4
        $qrCode = new QrCode($qrData);
        $qrCode->setSize(300);
        $qrCode->setMargin(10);
        $qrCode->setEncoding('UTF-8');
        $qrCode->setErrorCorrectionLevel(new ErrorCorrectionLevelHigh());

        // Output langsung ke browser
        header('Content-Type: ' . $qrCode->getContentType());
        echo $qrCode->writeString();
        exit;
    }

    // ===========================
    // ABSENSI
    // ===========================
    public function scan()
    {
        return view('attendance/scan', ['title' => 'Scan Absensi']);
    }

    public function checkIn()
    {
        $officialId = $this->request->getGet('official_id');
        $official = $this->officialModel->find($officialId);

        if (!$official) {
            return redirect()->back()->with('error', 'Aparatur tidak ditemukan.');
        }

        $this->attendanceModel->save([
            'official_id' => $officialId,
            'checkin_time' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to(site_url('dashboard/attendance/success?official_id=' . $officialId));
    }

    public function success()
    {
        $officialId = $this->request->getGet('official_id');
        $official = $this->officialModel->find($officialId);

        if (!$official) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Official not found');
        }

        return view('attendance/success', [
            'official' => $official,
            'title' => 'Absensi Berhasil'
        ]);
    }
}
