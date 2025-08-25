<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OfficialModel;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class OfficialsController extends BaseController
{
    public function index()
    {
        $officialModel = new OfficialModel();
        $data = [
            'title'     => 'Daftar Perangkat Desa',
            'officials' => $officialModel->findAll(),
        ];
        return view('dashboard/attendance/officials_index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Perangkat Desa'];
        return view('dashboard/attendance/officials_form', $data);
    }

    public function store()
    {
        $officialModel = new OfficialModel();

        $data = [
            'name'     => $this->request->getPost('name'),
            'position' => $this->request->getPost('position'),
            'address'  => $this->request->getPost('address'),
            'photo'    => 'default.jpg',
        ];

        if ($officialModel->save($data)) {
            $id = $officialModel->getInsertID();

            // Buat teks unik untuk QR
            $qrCodeValue = 'official_' . uniqid() . '_' . $id;

            // Lokasi penyimpanan file
            $folder = WRITEPATH . 'uploads/qr_officials/';
            if (!is_dir($folder)) {
                mkdir($folder, 0777, true);
            }
            $filePath = $folder . "official_{$id}.png";

            // Generate PNG langsung ke file
            $options = new QROptions([
                'outputType' => QRCode::OUTPUT_IMAGE_PNG,
                'scale'      => 6,
            ]);
            (new QRCode($options))->render($qrCodeValue, $filePath);

            // Simpan path file ke DB
            $officialModel->update($id, [
                'qr_code' => 'uploads/qr_officials/official_'.$id.'.png'
            ]);

            session()->setFlashdata('success', 'Data perangkat desa berhasil ditambahkan dengan QR Code.');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan data.');
        }

        return redirect()->to('/dashboard/officials');
    }

    public function edit($id)
    {
        $officialModel = new OfficialModel();
        $data = [
            'title'    => 'Edit Perangkat Desa',
            'official' => $officialModel->find($id)
        ];

        if (empty($data['official'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan.');
        }

        return view('dashboard/attendance/officials_form', $data);
    }

    public function update($id)
    {
        $officialModel = new OfficialModel();
        $data = [
            'name'     => $this->request->getPost('name'),
            'position' => $this->request->getPost('position'),
            'address'  => $this->request->getPost('address'),
        ];

        if ($officialModel->update($id, $data)) {
            session()->setFlashdata('success', 'Data berhasil diperbarui.');
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui data.');
        }

        return redirect()->to('/dashboard/officials');
    }

    public function delete($id)
    {
        $officialModel = new OfficialModel();
        $data = $officialModel->find($id);

        if ($data) {
            $officialModel->delete($id);

            // Hapus file QR jika ada
            if (!empty($data['qr_code']) && file_exists(FCPATH.$data['qr_code'])) {
                unlink(FCPATH.$data['qr_code']);
            }

            session()->setFlashdata('success', 'Data berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Data tidak ditemukan.');
        }

        return redirect()->to('/dashboard/officials');
    }
}
