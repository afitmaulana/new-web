<?php

namespace App\Controllers;

use App\Controllers\BaseController;

// Pastikan semua method berada di dalam class Profile
class Profile extends BaseController
{
    /**
     * Menampilkan halaman profil desa.
     */
    public function index()
    {
        // Data profil desa bisa diambil dari database di kemudian hari.
        // Untuk saat ini, kita gunakan data statis sebagai contoh.
        $villageProfile = [
            'nama_desa'       => 'Desa Kaliboja',
            'kepala_desa'     => 'Bapak Affan Maulana',
            'alamat_kantor'   => 'Jl. Raya Sejahtera No. 1, Kabupaten Sejahtera',
            'email'           => 'kontak@kaliboja.desa.id',
            'telepon'         => '0812-3456-7890',
            'sejarah'         => 'Desa Kaliboja didirikan pada tahun 1980 oleh para transmigran dari berbagai daerah yang bersatu padu membangun wilayah baru. Dengan semangat gotong royong, desa ini berkembang pesat menjadi pusat pertanian di wilayahnya.',
            'visi'            => 'Terwujudnya Desa Kaliboja yang Maju, Mandiri, Sejahtera, dan Berakhlak Mulia.',
            'misi'            => "1. Meningkatkan kualitas sumber daya manusia yang cerdas dan berdaya saing.\n2. Mengembangkan perekonomian desa berbasis potensi lokal.\n3. Meningkatkan kualitas infrastruktur desa secara merata.\n4. Menciptakan tata kelola pemerintahan desa yang baik, bersih, dan transparan."
        ];
        
        $data = [
            'title'   => 'Profil Desa',
            'desa'    => $villageProfile, // Mengirim data desa ke view
        ];

        // Mengarahkan ke view profil
        return view('profile/index', $data);
    }
}
