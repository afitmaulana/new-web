<?php

namespace App\Controllers;

// Mengimpor semua model yang dibutuhkan
use App\Models\AparaturModel;
use App\Models\ApparatusModel;
use App\Models\BeritaModel;
use App\Models\PendudukModel;
use App\Models\WisataModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Page extends BaseController
{
    protected $beritaModel;
    protected $aparaturModel;
    protected $pendudukModel;
    protected $wisataModel;

    /**
     * Constructor
     * Menginisialisasi semua model yang akan digunakan di controller ini.
     * Ini adalah praktik terbaik untuk memuat model.
     */
    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
        $this->aparaturModel = new ApparatusModel();
        $this->pendudukModel = new PendudukModel();
    $this->wisataModel = new WisataModel();
    }
public function index()
    {
        return view('pages/landing');
    }


    public function wisata()
    {
        $wisataModel = new WisataModel();
        $data['wisata'] = $wisataModel->findAll();

        return view('pages/wisata', $data);
    }

    public function potensiDetail($id)
    {
        $wisataModel = new WisataModel();
        $data['wisata'] = $wisataModel->find($id);

        return view('pages/wisata_detail', $data);
    }
    /**
     * Halaman Utama (Homepage)
     * Menampilkan data statistik, berita terbaru, dan sambutan kepala desa.
     */

    /**
     * Halaman Profil Desa
     * Menampilkan Visi, Misi, dan daftar aparatur desa.
     */
    public function profil()
    {
        $data = [
            'title'     => 'Profil Desa',
            // Mengambil semua data aparatur, diurutkan berdasarkan kolom 'urutan'
            'officials' => $this->aparaturModel->orderBy('urutan', 'ASC')->findAll(),
        ];
        return view('pages/profil', $data);
    }

    /**
     * Halaman Layanan
     * Menampilkan daftar layanan surat yang tersedia.
     */
    public function layanan()
    {
        $data = [
            'title' => 'Layanan Desa Online',
        ];
        return view('pages/layanan', $data);
    }

    /**
     * Halaman Daftar Berita
     * Menampilkan semua berita dengan paginasi.
     */
    public function berita()
    {
        $data = [
            'title' => 'Berita Desa',
            // Mengambil data berita dengan paginasi, 8 item per halaman
            'news'  => $this->beritaModel->orderBy('created_at', 'DESC')->paginate(8, 'berita'),
            'pager' => $this->beritaModel->pager,
        ];

        return view('pages/berita', $data);
    }
    
    /**
     * Halaman Detail Berita
     * Menampilkan satu artikel berita berdasarkan slug-nya.
     *
     * @param string $slug
     */
    public function detailBerita($slug = null)
    {
        $newsItem = $this->beritaModel->where('slug', $slug)->first();

        // Jika berita tidak ditemukan, tampilkan halaman error 404 yang user-friendly
        if (is_null($newsItem)) {
            throw new PageNotFoundException('Maaf, halaman berita yang Anda cari tidak dapat ditemukan.');
        }
        
        $data = [
            'title' => $newsItem['judul'], // Judul halaman browser diambil dari judul berita
            'news'  => $newsItem,
        ];

        return view('pages/detail_berita', $data);
    }
    
    /**
     * Halaman Kontak
     * Menampilkan informasi kontak dan peta lokasi.
     */
    public function kontak()
    {
        $data = [
            'title' => 'Hubungi Kami',
        ];
        return view('pages/kontak', $data);
    }

    /**
     * Halaman Login
     * Menampilkan form login untuk admin.
     */
    public function login()
    {
        // Jika user sudah login, jangan tampilkan halaman login lagi,
        // langsung arahkan ke dashboard.
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }

        $data = [
            'title' => 'Login Administrator',
        ];
        return view('auth/login', $data);
    }
}