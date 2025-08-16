<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $newsModel = new \App\Models\NewsModel();
        $data['total_news'] = $newsModel->countAllResults();
        
        return view('pages/dashboard/overview', $data);
    }
}