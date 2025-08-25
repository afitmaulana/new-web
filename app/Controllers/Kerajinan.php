<?php

namespace App\Controllers;
use App\Models\KerajinanModel;

class Kerajinan extends BaseController
{
    protected $kerajinanModel;

    public function __construct()
    {
        $this->kerajinanModel = new KerajinanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Kerajinan Desa',
            'kerajinan' => $this->kerajinanModel->findAll()
        ];
        return view('dashboard/kerajinan/index', $data);
    }

    public function statistik()
    {
        $data = [
            'title' => 'Statistik Kerajinan Desa',
            'kerajinan' => $this->kerajinanModel->findAll()
        ];
        return view('dashboard/kerajinan/statistik', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Kerajinan'
        ];
        return view('dashboard/kerajinan/create', $data);
    }

    public function store()
{
    if (!$this->validate([
        'nama'   => 'required',
        'jenis'  => 'required',
        'jumlah' => 'required|numeric'
    ])) {
        return redirect()->back()->withInput()->with('validation', $this->validator);
    }

    $this->kerajinanModel->save([
        'nama'   => $this->request->getPost('nama'),
        'jenis'  => $this->request->getPost('jenis'),
        'jumlah' => $this->request->getPost('jumlah'),
    ]);

    return redirect()->to('dashboard/kerajinan');
}

}
