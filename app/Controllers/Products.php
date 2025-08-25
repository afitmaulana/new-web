<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Products extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    // List semua produk
    public function index()
    {
        $data = [
            'title'    => 'Manajemen Produk',
            'products' => $this->productModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('dashboard/products/index', $data);
    }

    // Form tambah
    public function create()
    {
        return view('dashboard/products/create', ['title' => 'Tambah Produk']);
    }

    // Simpan produk
    public function store()
    {
        $file = $this->request->getFile('image');
        $fileName = '';
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/products', $fileName);
        }

        $this->productModel->save([
            'name'        => $this->request->getPost('name'),
            'price'       => $this->request->getPost('price'),
            'category'    => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'image'       => $fileName,
            'contact'     => $this->request->getPost('contact'),
            'is_featured' => $this->request->getPost('is_featured') ? 1 : 0,
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('products')->with('success', 'Produk berhasil ditambahkan');
    }

    // Edit produk
    public function edit($id)
    {
        $product = $this->productModel->find($id);
        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Produk tidak ditemukan");
        }
        return view('dashboard/products/edit', [
            'title'   => 'Edit Produk',
            'product' => $product
        ]);
    }

    // Update produk
    public function update($id)
    {
        $product = $this->productModel->find($id);
        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Produk tidak ditemukan");
        }

        $file = $this->request->getFile('image');
        $fileName = $product['image'];
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/products', $fileName);
        }

        $this->productModel->update($id, [
            'name'        => $this->request->getPost('name'),
            'price'       => $this->request->getPost('price'),
            'category'    => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'image'       => $fileName,
            'contact'     => $this->request->getPost('contact'),
            'is_featured' => $this->request->getPost('is_featured') ? 1 : 0,
            'updated_at'  => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('products')->with('success', 'Produk berhasil diperbarui');
    }

    // Hapus produk
    public function delete($id)
    {
        $this->productModel->delete($id);
        return redirect()->to('products')->with('success', 'Produk berhasil dihapus');
    }
}
