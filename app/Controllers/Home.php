<?php

namespace App\Controllers;

use App\Models\NewsModel;

class Home extends BaseController
{
    public function index()
    {
        $newsModel = new NewsModel();
        $data['news'] = $newsModel->orderBy('created_at', 'DESC')->findAll();
        
        return view('pages/landing', $data);
    }
}