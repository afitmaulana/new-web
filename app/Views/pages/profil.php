<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<style>
    .profil-content img {
        max-width: 100%;
        height: auto;
        border-radius: 1rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .official-card img {
        width: 150px; height: 150px; object-fit: cover; border-radius: 50%;
        border: 5px solid white; box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    .official-card:hover img { transform: scale(1.08); }
</style>

<div class="page-header">
    <div class="container">
        <h1 data-aos="fade-up">Profil Desa Kaliboja</h1>
        <p class="lead" data-aos="fade-up" data-aos-delay="100">Mengenal lebih dekat Desa Kaliboja, dari sejarah hingga tatanan pemerintahan.</p>
    </div>
</div>

<div class="container my-5 py-5">
    <section class="mb-5 pb-5">
        <div class="row align-items-center profil-content">
            <div class="col-lg-6" data-aos="fade-right">
                <img src="https://images.unsplash.com/photo-1599056976487-73a69a163a0a?q=80&w=2070" alt="Visi Misi Desa">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <h2 class="section-title text-start mb-4" style="margin-left: -25px !important;">Visi & Misi</h2>
                <h4 class="fw-bold">Visi</h4>
                <p class="text-muted fst-italic">"Terwujudnya masyarakat Desa Kaliboja yang adil, makmur, sejahtera, dan berakhlak mulia melalui pembangunan yang merata dan berkelanjutan."</p>
                <h4 class="fw-bold mt-4">Misi</h4>
                <ol class="text-muted ps-3">
                    <li>Meningkatkan kualitas sumber daya manusia yang beriman dan bertaqwa.</li>
                    <li>Mewujudkan pemerintahan desa yang bersih, transparan, dan akuntabel.</li>
                    <li>Meningkatkan pembangunan infrastruktur yang merata dan berkualitas.</li>
                    <li>Memberdayakan ekonomi masyarakat melalui pengembangan potensi lokal.</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="pt-5">
        <h2 class="text-center section-title" data-aos="fade-up">Aparatur Desa</h2>
        <div class="row text-center justify-content-center">
            <div class="col-lg-3 col-md-6 mb-5">
                <div class="official-card" data-aos="zoom-in">
                    <img src="/img/kades.jpg" class="mb-3" alt="Nama Aparatur">
                    <h5 class="mb-1 fw-bold">Nama Kepala Desa</h5>
                    <p class="text-muted fst-italic">Kepala Desa</p>
                </div>
            </div>
             <div class="col-lg-3 col-md-6 mb-5">
                <div class="official-card" data-aos="zoom-in" data-aos-delay="100">
                    <img src="/img/sekdes.jpg" class="mb-3" alt="Nama Aparatur">
                    <h5 class="mb-1 fw-bold">public function publicIndex()
{
    $wisata = $this->wisataModel->findAll();

    return view('pages/landing_wisata', [
        'wisata' => $wisata
    ]);
}

public function detail($id)
{
    $wisata = $this->wisataModel->find($id);

    if (!$wisata) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Wisata tidak ditemukan");
    }

    return view('pages/wisata_detail', [
        'wisata' => $wisata
    ]);
}
Nama Sekretaris Desa</h5>
                    <p class="text-muted fst-italic">Sekretaris Desa</p>
                </div>
            </div>
            </div>
    </section>
</div>

<?= $this->endSection() ?>