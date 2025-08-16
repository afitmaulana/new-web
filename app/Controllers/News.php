<?php

namespace App\Controllers;

use App\Models\NewsModel;

class News extends BaseController
{
    public function index()
    {
        $model = new NewsModel();
        $data['news'] = $model->findAll();
        return view('pages/dashboard/news_list', $data);
    }

    public function create()
    {
        return view('pages/dashboard/news_create');
    }

    public function store()
    {
        $model = new NewsModel();
        
        $imageFile = $this->request->getFile('image');
        $imageName = $imageFile->getRandomName();
        $imageFile->move(ROOTPATH . 'public/uploads', $imageName);

        $data = [
            'title'   => $this->request->getVar('title'),
            'content' => $this->request->getVar('content'),
            'image'   => $imageName,
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        $model->insert($data);
        return redirect()->to('/dashboard/news');
    }
}