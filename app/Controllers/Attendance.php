<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OfficialModel;
use App\Models\AttendanceRecordModel;
use CodeIgniter\I18n\Time;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class Attendance extends BaseController
{
    protected $officialModel;
    protected $attendanceModel;

    public function __construct()
    {
        $this->officialModel = new OfficialModel();
        $this->attendanceModel = new AttendanceRecordModel();
    }

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
        $data = ['title' => 'Tambah Perangkat Desa'];
        return view('dashboard/attendance/officials_form', $data);
    }

    public function storeOfficial()
    {
        $qrCodeValue = uniqid('official_', true);
        $this->officialModel->save([
            'name'        => $this->request->getPost('name'),
            'position'    => $this->request->getPost('position'),
            'address'     => $this->request->getPost('address'),
            'qr_code'     => $qrCodeValue,
        ]);
        return redirect()->to('/dashboard/officials')->with('message', 'Data perangkat desa berhasil ditambahkan.');
    }
    
    public function showQR($id)
    {
        $official = $this->officialModel->find($id);
        if (!$official) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }
        $data = [
            'title'    => 'QR Code untuk ' . $official['name'],
            'official' => $official,
        ];
        return view('dashboard/attendance/show_qr', $data);
    }

    public function generateQrImage($id)
    {
        $official = $this->officialModel->find($id);
        if (!$official || empty($official['qr_code'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data QR code tidak ditemukan.');
        }

        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($official['qr_code'])
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(300)->margin(10)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())->build();

        return $this->response->setHeader('Content-Type', $result->getMimeType())->setBody($result->getString());
    }

    public function downloadQR($id)
    {
        $official = $this->officialModel->find($id);
        if (!$official || empty($official['qr_code'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $safeName = url_title($official['name'], '-', true);
        $filename = 'qr-code-' . $safeName . '.png';
        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($official['qr_code'])
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(600)->margin(20)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())->build();
        return $this->response->download($filename, $result->getString());
    }
    
    public function log()
    {
        $records = $this->attendanceModel
            ->select('attendance_records.*, officials.name, officials.position')
            ->join('officials', 'officials.id = attendance_records.official_id')
            ->orderBy('attendance_date', 'DESC')->orderBy('check_in', 'DESC')->findAll();
        $data = [
            'title'   => 'Laporan Absensi',
            'records' => $records,
        ];
        return view('dashboard/attendance/log', $data);
    }
}