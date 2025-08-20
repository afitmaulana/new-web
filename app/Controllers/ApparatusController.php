<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ApparatusModel;

class ApparatusController extends BaseController
{
    public function index()
    {
        $apparatusModel = new ApparatusModel();
        $data = [
            'title' => 'Aparatur Desa',
            'apparatuses' => $apparatusModel->findAll()
        ];
        return view('dashboard/apparatus/index', $data);
    }
}