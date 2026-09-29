<?php
/**
 * PT SKILL NUSA INFOTAMA - TENTANG KAMI
 * Website: www.skillnusa.co.id
 */

require_once __DIR__ . '/config/database.php';

$currentPage = 'about';
$siteSettings = getSiteSettings();
$pageTitle = 'Tentang Kami - Profil, Visi, Misi & Rekam Jejak Sejak 1999';
$pageDescription = 'Profil PT Skill Nusa Infotama: Didirikan sejak 1999 di Bandung dengan komitmen menghadirkan Total Solution For Customer di bidang Network System Integration dan Data Center.';

$statistics = getStatistics();

include __DIR__ . '/includes/header.php';
?>

<!-- Page Banner Header -->
<section class="page-banner">
  <div class="container text-center">
    <span class="badge-tag">Profil Perusahaan</span>
    <h1 class="page-banner-title">Mengenal PT Skill Nusa Infotama</h1>
    <p class="page-banner-desc">
      Lebih dari dua dekade mendedikasikan keahlian dalam integrasi sistem jaringan, infrastruktur data center, dan konsultasi teknologi informasi di Indonesia.
    </p>
  </div>
</section>

<!-- Profil & Sejarah Perusahaan -->
<section class="section">
  <div class="container about-grid">
    <div class="about-image-wrapper">
      <img src="assets/hero-datacenter.jpg" alt="Data Center PT Skill Nusa Infotama" class="about-featured-img">
      <div class="about-experience-card">
        <span class="exp-number">1999</span>
        <span class="exp-text">Tahun Pendirian Perusahaan di Bandung</span>
      </div>
    </div>

    <div class="about-text-content">
      <span class="section-subtitle">Rekam Jejak & Dedikasi</span>
      <h2 class="section-title">"Total Solution For Customer"</h2>
      <p class="section-desc">
        Perkembangan teknologi informasi saat ini bergerak sangat cepat dan dinamis. Sistem yang saling terintegrasi sudah merupakan keharusan bagi korporasi atau institusi yang ingin maju, adaptif, dan berdaya saing tinggi.
      </p>
      <p class="section-desc">
        Seiring dengan perkembangan tersebut, <strong>PT Skill Nusa Infotama</strong> hadir sebagai penyedia solusi di bidang <em>Sistem Network Integration, Technology Solution Provider, & Software Consultant</em>. Kami memberikan alternatif solusi keamanan dan kenyamanan infrastruktur IT yang didukung oleh integrasi harmonis antara perangkat keras (Hardware) dan perangkat lunak (Software) berkualitas global.
      </p>
      <p class="section-desc">
        Dalam kurun waktu lebih dari 25 tahun sejak didirikan pada 16 Juli 1999, eksistensi PT Skill Nusa Infotama terbukti berkembang pesat berkat dukungan tenaga ahli bersertifikasi dan teamwork yang profesional. Kami senantiasa menempatkan kepuasan dan keberlanjutan bisnis mitra sebagai prioritas tertinggi.
      </p>
    </div>
  </div>
</section>

<!-- Visi, Misi & Nilai-Nilai Utama -->
<section class="section section-vision-mission">
  <div class="container">
    <div class="vision-mission-grid">
      
      <!-- Visi -->
      <div class="vm-card">
        <div class="vm-icon">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
        </div>
        <h3 class="vm-title">Visi Perusahaan</h3>
        <p class="vm-text">
          Menjadi perusahaan penyedia solusi integrasi sistem teknologi informasi terdepan dan tepercaya di Indonesia yang memberikan nilai tambah maksimal serta dampak strategis berkelanjutan bagi akselerasi bisnis para mitra.
        </p>
      </div>

      <!-- Misi -->
      <div class="vm-card">
        <div class="vm-icon">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
        </div>
        <h3 class="vm-title">Misi Perusahaan</h3>
        <ul class="vm-list">
          <li>Menyediakan solusi sistem jaringan dan infrastruktur data center berkualitas tinggi yang aman, simpel, dan andal.</li>
          <li>Menghadirkan pelayanan profesional dengan prinsip integritas, transparansi teknis, dan standar SLA terjamin.</li>
          <li>Mengembangkan skema kemitraan fleksibel (Managed Service & Sewa Perangkat) guna efisiensi investasi klien.</li>
          <li>Meningkatkan kapabilitas dan kompetensi sumber daya manusia teknis secara berkesinambungan.</li>
        </ul>
      </div>

    </div>
  </div>
</section>

<!-- Nilai-Nilai Inti (Core Values) -->
<section class="section">
  <div class="container">
    <div class="section-header text-center">
      <span class="section-subtitle">Budaya Kerja Kami</span>
      <h2 class="section-title">Nilai-Nilai Utama Perusahaan</h2>
      <p class="section-lead">Fondasi etika yang memandu setiap langkah pelayanan dan inovasi PT Skill Nusa Infotama.</p>
    </div>

    <div class="values-grid">
      <div class="value-item">
        <div class="value-num">01</div>
        <h4>Integritas & Kepercayaan</h4>
        <p>Menjaga kejujuran, etika bisnis profesional, dan komitmen penuh terhadap setiap kesepakatan proyek.</p>
      </div>

      <div class="value-item">
        <div class="value-num">02</div>
        <h4>Keunggulan Teknis (Excellence)</h4>
        <p>Memastikan setiap instalasi kabel, konfigurasi sistem, dan implementasi perangkat memenuhi standar terbaik industri.</p>
      </div>

      <div class="value-item">
        <div class="value-num">03</div>
        <h4>Customer Centric</h4>
        <p>Fokus mendengarkan kebutuhan spesifik pengguna untuk merancang solusi yang tepat sasaran dan berbiaya efisien.</p>
      </div>

      <div class="value-item">
        <div class="value-num">04</div>
        <h4>Responsif & Andal</h4>
        <p>Dukungan teknis yang sigap dan tanggap mengatasi setiap kendala operasional dengan waktu tanggap terukur.</p>
      </div>
    </div>
  </div>
</section>

<!-- Mengapa Memilih SkillNusa -->
<section class="section section-benefits">
  <div class="container">
    <div class="section-header text-center">
      <span class="section-subtitle">Keunggulan Solusi</span>
      <h2 class="section-title">Manfaat yang Dirasakan Pengguna</h2>
      <p class="section-lead">Sistem IT terintegrasi yang kami bangun dirancang untuk menghasilkan performa maksimal:</p>
    </div>

    <div class="benefits-grid">
      <div class="benefit-card">
        <div class="benefit-icon">✔</div>
        <h4>Multi-Brand Integration</h4>
        <p>Integrasi perangkat dari berbagai brand terkemuka dunia secara harmonis dan bebas konflik sistem.</p>
      </div>
      <div class="benefit-card">
        <div class="benefit-icon">✔</div>
        <h4>Data Akurat & Terkini</h4>
        <p>Sistem pendataan terpusat dan online yang mempermudah pemantauan operasional secara real-time.</p>
      </div>
      <div class="benefit-card">
        <div class="benefit-icon">✔</div>
        <h4>Keamanan Tingkat Tinggi</h4>
        <p>Proteksi menyeluruh terhadap ancaman siber, gangguan fisik, dan risiko kegagalan daya kelistrikan.</p>
      </div>
      <div class="benefit-card">
        <div class="benefit-icon">✔</div>
        <h4>Mudah Dioperasikan</h4>
        <p>Arsitektur sistem yang simpel, intuitif, serta didukung pelatihan komprehensif bagi tim pengguna.</p>
      </div>
      <div class="benefit-card">
        <div class="benefit-icon">✔</div>
        <h4>Investasi Efisien</h4>
        <p>Pengurangan biaya pemeliharaan tak terduga dan perlindungan nilai aset IT dalam jangka panjang.</p>
      </div>
      <div class="benefit-card">
        <div class="benefit-icon">✔</div>
        <h4>Garansi & Maintenance SLA</h4>
        <p>Jaminan purna jual resmi, ketersediaan suku cadang, dan kontrak servis berkala yang transparan.</p>
      </div>
    </div>
  </div>
</section>

<!-- Call to Action -->
<section class="section section-cta-banner">
  <div class="container">
    <div class="cta-banner-box">
      <div class="cta-banner-content">
        <h2 class="cta-banner-title">Tertarik Bermitra dengan PT Skill Nusa Infotama?</h2>
        <p class="cta-banner-desc">Kami siap menjadi mitra teknologi jangka panjang untuk akselerasi bisnis Anda.</p>
      </div>
      <div class="cta-banner-buttons">
        <a href="kontak.php" class="btn btn-primary btn-lg">Hubungi Kantor Kami</a>
        <a href="layanan.php" class="btn btn-outline btn-lg">Lihat Produk & Solusi</a>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
