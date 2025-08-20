<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\PopulationModel;

class PopulationController extends BaseController
{
    public function index()
    {
        $populationModel = new PopulationModel();
        $data = [
            'title' => 'Data Penduduk',
            'populations' => $populationModel->findAll()
        ];
        return view('dashboard/population/index', $data);
    }
}