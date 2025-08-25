<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PopulationModel;

class PopulationController extends BaseController
{
    public function index()
    {
        $populationModel = new PopulationModel();

        // Ambil data statistik gender
        $genderData = $populationModel->getGenderStats();
        $laki_laki = 0;
        $perempuan = 0;
        foreach ($genderData as $row) {
            if ($row['gender'] == 'L') {
                $laki_laki = $row['total'];
            } elseif ($row['gender'] == 'P') {
                $perempuan = $row['total'];
            }
        }

        $data = [
            'title'       => 'Manajemen Data Penduduk',
            'populations' => $populationModel->orderBy('id', 'DESC')->findAll(),
            'stats' => [
                'total'     => $laki_laki + $perempuan,
                'laki_laki' => $laki_laki,
                'perempuan' => $perempuan,
            ]
        ];

        return view('dashboard/population/index', $data);
    }
     public function create()
    {
        $data = [
            'title' => 'Tambah Data Penduduk'
        ];

        // Tampilkan view form
        return view('dashboard/population/form', $data);
    }
    public function store()
    {
        $populationModel = new PopulationModel();

        // Aturan validasi
        $rules = [
            'name'    => 'required|min_length[3]',
            'nik'     => 'required|is_unique[populations.nik]|exact_length[16]|numeric',
            'address' => 'required',
            'gender'  => 'required|in_list[L,P]'
        ];

        if (!$this->validate($rules)) {
            // Jika validasi gagal, kembalikan ke form dengan error dan input lama
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data dari form
        $data = [
            'name'    => $this->request->getPost('name'),
            'nik'     => $this->request->getPost('nik'),
            'address' => $this->request->getPost('address'),
            'gender'  => $this->request->getPost('gender'),
        ];

        // Simpan data
        if ($populationModel->save($data)) {
            session()->setFlashdata('success', 'Data penduduk berhasil ditambahkan.');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan data.');
        }

        return redirect()->to('/dashboard/population');
    }

    // Tambahkan method untuk create, store, edit, update, dan delete
    // ... (Anda bisa menyalin pola dari ApparatusController atau controller lain yang sudah ada)
}