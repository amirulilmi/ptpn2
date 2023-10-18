<div class="sidebar sidebar-main sidebar-fixed sidebar-res">
  <div class="sidebar-content">
    <div class="sidebar-user">
    </div>
    <div class="sidebar-category sidebar-category-visible">
      <div class="category-content no-padding sidebar-add-margin">
        <ul class="navigation navigation-main navigation-accordion">
          <li class="<?php echo menuaktif('dashboard', $aktif); ?>"><a href="<?php echo base_url('Welcome'); ?>"><i class="icon-home2"></i> <span>Dashboard</span></a></li>
          <li>
            <a href="#"><i class="icon-stack2"></i> <span>Master Data</span></a>
            <ul>
              <li class="<?php echo menuaktif('daftar_alat_berat', $aktif); ?>"><a href="<?php echo site_url('daftar_alat_berat'); ?>"><i class="icon-newspaper"></i> <span>Daftar Alat Berat</span></a></li>
              <li class="<?php echo menuaktif('alat_berat', $aktif); ?>"><a href="<?php echo site_url('Alat_Berat'); ?>"><i class="icon-sphere"></i>Spesifikasi Alat</a></li>
              <li class="<?php echo menuaktif('kebun', $aktif); ?>"><a href="<?php echo site_url('Kebun'); ?>"><i class="icon-tree6"></i>Kebun</a></li>
              <li class="<?php echo menuaktif('prestasi', $aktif); ?>"><a href="<?php echo site_url('Prestasi'); ?>"><i class="icon-list"></i>Prestasi Alat</a></li>
            </ul>
          </li>

          <!-- DOWNLOAD MASTER DATA -->
          <li>
            <a href="#"><i class="icon-folder-download"></i> <span>Download Master Data</span></a>
            <ul>
              <li class="<?php echo menuaktif('download_daftar_alat_berat', $aktif); ?>"><a href="<?php echo site_url('Laporan_Daftar_Alat'); ?>"><i class="icon-newspaper"></i> <span>Daftar Alat Berat</span></a></li>
              <li class="<?php echo menuaktif('download_alat_berat', $aktif); ?>"><a href="<?php echo site_url('Laporan_Spesifikasi_Alat'); ?>"><i class="icon-sphere"></i>Spesifikasi Alat</a></li>
              <li class="<?php echo menuaktif('download_kebun', $aktif); ?>"><a href="<?php echo site_url('Laporan_Kebun'); ?>"><i class="icon-tree6"></i>Kebun</a></li>
              <li class="<?php echo menuaktif('download_prestasi', $aktif); ?>"><a href="<?php echo site_url('Laporan_Prestasi_Alat'); ?>"><i class="icon-list"></i>Prestasi Alat</a></li>
            </ul>
          </li>
          <!-- AKHIR DOWNLOAD MASTER DATA -->

          <!-- laporan alat berat -->
          <li>
            <a href="#"><i class="icon-hammer"></i> <span>Alat Berat</span></a>
            <ul>
              <li class="<?php echo menuaktif('laporan_alat_berat', $aktif); ?>"><a href="<?php echo site_url('Laporan_Alat_Berat'); ?>"><i class="icon-newspaper"></i> <span>Laporan Alat Berat</span></a></li>
              <li class="<?php echo menuaktif('laporan', $aktif); ?>"><a href="<?php echo site_url('Laporan'); ?>"><i class="icon-file-stats"></i> <span>Laporan</span></a></li>

            </ul>
          </li>
          <!-- akhir laporan alat berat -->
          <!-- CANE HARVESTER -->
          <!-- <li>
            <a href="#"><i class="icon-cogs"></i> <span>Cane Harvester</span></a>
            <ul>
              <li class="<?php echo menuaktif('cane_harvester', $aktif); ?>"><a href="<?php echo site_url('Cane_Harvester'); ?>"><i class="icon-newspaper"></i> <span>Cane Harvester</span></a></li>
              <li class="<?php echo menuaktif('laporan_cane', $aktif); ?>"><a href="<?php echo site_url('Laporan_Cane'); ?>"><i class="icon-file-stats"></i> <span>Laporan</span></a></li>

            </ul>
          </li> -->
          <!-- AKHIR CANE HARVERSTER -->
          <!-- BELL CANE -->
          <!-- <li>
            <a href="#"><i class="icon-cog52"></i> <span>Bell Cane</span></a>
            <ul>
              <li class="<?php echo menuaktif('bell_cane', $aktif); ?>"><a href="<?php echo site_url('Bell_Cane'); ?>"><i class="icon-newspaper"></i> <span>Bell Cane</span></a></li>
              <li class="<?php echo menuaktif('laporan_bell', $aktif); ?>"><a href="<?php echo site_url('Laporan_Bell'); ?>"><i class="icon-file-stats"></i> <span>Laporan</span></a></li>
            </ul>
          </li> -->
          <!-- AKHIR BELL CANE -->

          <!-- Laporan Bulanan -->
          <!-- <li>
            <a href="#"><i class="icon-calendar"></i> <span>Laporan Bulanan</span></a>
            <ul>
              <li class="<?php echo menuaktif('hm_alat_berat', $aktif); ?>"><a href="<?php echo site_url('HM_Alat_Berat'); ?>"><i class="icon-newspaper"></i> <span>HM Alat Berat</span></a></li>
              <li class="<?php echo menuaktif('laporan_hm', $aktif); ?>"><a href="<?php echo site_url('Laporan_HM'); ?>"><i class="icon-file-stats"></i> <span>Laporan</span></a></li>
            </ul>
          </li> -->
          <!-- AKHIR Laporan Bulanan -->

          <!-- MANAJEMEN AKSES -->
          <li>
            <a href="#"><i class="icon-people"></i> <span>Manajemen Akses</span></a>
            <ul>
              <li class="<?php echo menuaktif('user', $aktif); ?>"><a href="<?php echo site_url('User'); ?>"><i class="icon-accessibility"></i> <span>Manajemen Akses</span></a></li>
              <li class="<?php echo menuaktif('tambah_user', $aktif); ?>"><a href="<?php echo site_url('Tambah_User'); ?>"><i class="icon-file-stats"></i> <span>Manajemen User</span></a></li>
            </ul>
          </li>
          <!-- AKHIR MANAJEMEN AKSES -->

          <!-- Dislokasi Alat -->
          <li>
            <a href="#"><i class="icon-cog52"></i> <span>Dislokasi Alat Berat</span></a>
            <ul>
              <li class="<?php echo menuaktif('disk', $aktif); ?>"><a href="<?php echo site_url('Dislokasi_Alat'); ?>"><i class="icon-city"></i> <span>Dislokasi Alat</span></a></li>
              <li class="<?php echo menuaktif('laporan_dislokasi', $aktif); ?>"><a href="<?php echo site_url('Laporan_Dislokasi'); ?>"><i class="icon-file-stats"></i> <span>Laporan</span></a></li>
            </ul>
          </li>
          <!-- Akhir Dislokasi Alat -->
          <li class="<?php echo menuaktif('ins', $aktif); ?>"><a href="<?php echo site_url('Ins'); ?>"><i class="icon-city"></i> <span>Manajemen Perusahaan</span></a></li>

          <li class="<?php echo menuaktif('logout', $aktif); ?> res-logout"><a href="<?php echo site_url('Welcome/logout'); ?>"><i class="icon-exit"></i> <span>Logout</span></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="out">
    <ul class="navigation navigation-main navigation-accordion">
      <li class="<?php echo menuaktif('logout', $aktif); ?>logout"><a href="<?php echo site_url('Welcome/logout'); ?>"><i class="icon-exit"></i> <span>Logout</span></a></li>
    </ul>
  </div>
</div>