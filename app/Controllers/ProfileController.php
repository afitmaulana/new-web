<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProfileController extends BaseController
{
    /**
     * Menampilkan halaman profil desa.
     */
    public function index()
    {
        // Data profil desa (sementara statis, bisa diganti ambil dari DB nanti)
        $profile = [
            'nama_desa'     => 'Desa Kaliboja',
            'kepala_desa'   => 'Bapak Affan Maulana',
            'alamat_kantor' => 'Jl. Raya Sejahtera No. 1, Kabupaten Sejahtera',
            'email'         => 'kontak@kaliboja.desa.id',
            'telepon'       => '0812-3456-7890',
            'sejarah'       => 'Desa Kaliboja didirikan pada tahun 1980 oleh para transmigran dari berbagai daerah yang bersatu padu membangun wilayah baru. Dengan semangat gotong royong, desa ini berkembang pesat menjadi pusat pertanian di wilayahnya.',
            'visi'          => 'Terwujudnya Desa Kaliboja yang Maju, Mandiri, Sejahtera, dan Berakhlak Mulia.',
            'misi'          => [
                'Meningkatkan kualitas sumber daya manusia yang cerdas dan berdaya saing.',
                'Mengembangkan perekonomian desa berbasis potensi lokal.',
                'Meningkatkan kualitas infrastruktur desa secara merata.',
                'Menciptakan tata kelola pemerintahan desa yang baik, bersih, dan transparan.'
            ]
        ];
        
        $data = [
            'title' => 'Profil Desa',
            'desa'  => $profile,
        ];

        return view('profile/index', $data);
    }
}
