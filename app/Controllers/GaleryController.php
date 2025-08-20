<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GalleryModel; // Pastikan Model dipanggil

class GalleryController extends BaseController
{
    public function index()
    {
        $galleryModel = new GalleryModel();
        $data = [
            'title'   => 'Galeri Desa',
            'gallery' => $galleryModel->orderBy('uploaded_at', 'DESC')->findAll()
        ];
        return view('dashboard/gallery/index', $data);
    }

    public function store()
    {
        $imageFile = $this->request->getFile('image');
        
        // Validasi dasar
        $validationRules = [
            'title' => 'required|min_length[3]',
            'image' => 'uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/dashboard/gallery')->withInput()->with('error', $this->validator->listErrors());
        }

        if ($imageFile->isValid() && !$imageFile->hasMoved()) {
            $newName = $imageFile->getRandomName();
            // Pastikan folder uploads/gallery ada dan bisa ditulis
            $imageFile->move(ROOTPATH . 'public/uploads/gallery', $newName);

            $galleryModel = new GalleryModel();
            $galleryModel->save([
                'title'       => $this->request->getPost('title'),
                'caption'     => $this->request->getPost('caption'),
                'image'       => $newName,
                'uploaded_at' => date('Y-m-d H:i:s')
            ]);

            return redirect()->to('/dashboard/gallery')->with('success', 'Gambar berhasil ditambahkan.');
        }

        return redirect()->to('/dashboard/gallery')->with('error', 'Gagal mengunggah gambar. Pastikan file valid.');
    }

    public function delete($id)
    {
        $galleryModel = new GalleryModel();
        $image = $galleryModel->find($id);
        if ($image) {
            // Hapus file fisik dari server
            $filePath = ROOTPATH . 'public/uploads/gallery/' . $image['image'];
            if (file_exists($filePath) && $image['image'] != 'default.jpg') {
                unlink($filePath);
            }
            // Hapus data dari database
            $galleryModel->delete($id);
            return redirect()->to('/dashboard/gallery')->with('success', 'Gambar berhasil dihapus.');
        }
        return redirect()->to('/dashboard/gallery')->with('error', 'Gambar tidak ditemukan.');
    }
}