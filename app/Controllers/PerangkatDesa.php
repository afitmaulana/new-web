<?php

namespace App\Controllers;

use App\Models\PerangkatDesaModel;

class PerangkatDesa extends BaseController
{
    protected $perangkatModel;

    public function __construct()
    {
        $this->perangkatModel = new PerangkatDesaModel();
    }

    // Menampilkan daftar perangkat desa
    public function index()
    {
        $data = [
            'title' => 'Data Perangkat Desa',
            'perangkat' => $this->perangkatModel->findAll()
        ];
        return view('perangkat/index', $data);
    }

    // Menyimpan data perangkat baru
    public function store()
    {
        $nip = $this->request->getPost('nip');
        $this->perangkatModel->save([
            'nip' => $nip,
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
            'qr_code' => $nip, // Menggunakan NIP sebagai data QR Code
        ]);

        return redirect()->to('/perangkat-desa')->with('success', 'Data berhasil ditambahkan.');
    }

    // Menghapus data
    public function delete($id)
    {
        $this->perangkatModel->delete($id);
        return redirect()->to('/perangkat-desa')->with('success', 'Data berhasil dihapus.');
    }
}