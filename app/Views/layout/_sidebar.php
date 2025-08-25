<?php
// Logika untuk menentukan apakah salah satu menu master data sedang aktif
$masterDataPages = ['officials', 'population', 'apparatus'];
$isMasterDataActive = in_array(service('uri')->getSegment(2), $masterDataPages);
?>

<hr class="sidebar-divider">

<div class="sidebar-heading">
    Master Data
</div>

<li class="nav-item <?= $isMasterDataActive ? 'active' : '' ?>">
    <a class="nav-link <?= $isMasterDataActive ? '' : 'collapsed' ?>" href="#" data-toggle="collapse" data-target="#collapseMasterData" aria-expanded="<?= $isMasterDataActive ? 'true' : 'false' ?>" aria-controls="collapseMasterData">
        <i class="fas fa-fw fa-database"></i>
        <span>Master Data</span>
    </a>
    <div id="collapseMasterData" class="collapse <?= $isMasterDataActive ? 'show' : '' ?>" aria-labelledby="headingMasterData" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kelola Data Utama:</h6>
            
            <a class="collapse-item <?= (service('uri')->getSegment(2) == 'officials') ? 'active' : '' ?>" 
               href="<?= site_url('dashboard/officials') ?>">
               Perangkat Desa
            </a>

            <a class="collapse-item <?= (service('uri')->getSegment(2) == 'population') ? 'active' : '' ?>" 
               href="<?= site_url('dashboard/population') ?>">
               Data Penduduk
            </a>
            
            <a class="collapse-item <?= (service('uri')->getSegment(2) == 'apparatus') ? 'active' : '' ?>" 
               href="<?= site_url('dashboard/apparatus') ?>">
               Aparatur Desa
            </a>
            
            </div>
    </div>
</li>