<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PeternakanModel;

class Peternakan extends BaseController
{
    protected $peternakanModel;

    public function __construct()
    {
        $this->peternakanModel = new PeternakanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Peternakan Desa',
            'peternakan' => $this->peternakanModel->findAll()
        ];
        return view('dashboard/peternakan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Peternakan',
            'validation' => \Config\Services::validation()
        ];
        return view('dashboard/peternakan/create', $data);
    }

    public function store()
    {
        $this->peternakanModel->save([
            'nama' => $this->request->getPost('nama'),
            'jenis' => $this->request->getPost('jenis'),
            'jumlah' => $this->request->getPost('jumlah')
        ]);

        return redirect()->to('dashboard/peternakan');
    }

    public function statistik()
    {
        $data = [
            'title' => 'Statistik Peternakan Desa',
            'peternakan' => $this->peternakanModel->findAll()
        ];
        return view('dashboard/peternakan/statistik', $data);
    }
}
