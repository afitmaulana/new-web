<?php

namespace App\Controllers;

use App\Models\PertanianModel;

class Pertanian extends BaseController
{
    protected $pertanianModel;

    public function __construct()
    {
        $this->pertanianModel = new PertanianModel();
    }
public function index()
{
    $data = [
        'title' => 'Data Pertanian Desa',
        'pertanian' => $this->pertanianModel->findAll()
    ];

    return view('dashboard/pertanian/index', $data);
}

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Pertanian',
            'validation' => \Config\Services::validation()
        ];
        return view('dashboard/pertanian/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama' => 'required',
            'luas' => 'required|numeric',
            'hasil' => 'required|numeric'
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $this->pertanianModel->save([
            'nama' => $this->request->getPost('nama'),
            'luas' => $this->request->getPost('luas'),
            'hasil' => $this->request->getPost('hasil'),
        ]);

        return redirect()->to('dashboard/pertanian');
    }


    public function statistik()
    {
        $data['title'] = 'Statistik Pertanian';
        $data['pertanian'] = $this->pertanianModel->findAll();
        return view('dashboard/pertanian/statistik', $data); // pastikan view ini ada
    }
}
