<?php
/**
 * PT SKILL NUSA INFOTAMA - PORTOFOLIO & KLIEN
 * Website: www.skillnusa.co.id
 */

require_once __DIR__ . '/config/database.php';

$currentPage = 'portfolio';
$siteSettings = getSiteSettings();
$pageTitle = 'Portofolio Proyek & Klien Korporasi';
$pageDescription = 'Daftar rekam jejak proyek implementasi data center, jaringan fiber optic, sewa perangkat IT, dan klien korporasi PT Skill Nusa Infotama.';

$portfolioItems = getPortfolioItems(12);
$testimonials = getTestimonials();
$cleanWaNumber = preg_replace('/[^0-9]/', '', $siteSettings['company_whatsapp'] ?? '6282126642581');

include __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner">
  <div class="container text-center">
    <span class="badge-tag">Rekam Jejak Implementasi</span>
    <h1 class="page-banner-title">Portofolio & Klien Kami</h1>
    <p class="page-banner-desc">
      Keberhasilan proyek di berbagai sektor industri merupakan bukti komitmen kami dalam menghadirkan solusi teknologi informasi yang andal dan berkelanjutan.
    </p>
  </div>
</section>

<!-- Sektor Industri Yang Dilayani -->
<section class="section section-sectors">
  <div class="container">
    <div class="section-header text-center">
      <span class="section-subtitle">Cakupan Klien</span>
      <h2 class="section-title">Sektor Industri Yang Kami Layani</h2>
      <p class="section-lead">Pengalaman luas dalam menangani regulasi dan kebutuhan spesifik berbagai sektor:</p>
    </div>

    <div class="sectors-grid">
      <div class="sector-card">
        <div class="sector-icon">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18"></path><path d="M5 21V7l8-4v18"></path><path d="M19 21V11l-6-4"></path><path d="M9 9h1"></path><path d="M9 13h1"></path><path d="M9 17h1"></path></svg>
        </div>
        <h3>Instansi Pemerintahan & BUMN</h3>
        <p>Infrastruktur data center terstandar pemerintah, jaringan intranet aman antardinas, dan sistem backup terenkripsi.</p>
      </div>

      <div class="sector-card">
        <div class="sector-icon">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"></path><path d="M6 12v5c3 3 9 3 12 0v-5"></path></svg>
        </div>
        <h3>Perguruan Tinggi & Sekolah</h3>
        <p>Backbone fiber optic antar-fakultas, jaringan Wi-Fi berdaya tampung ribuan mahasiswa, dan laboratorium komputer.</p>
      </div>

      <div class="sector-card">
        <div class="sector-icon">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
        </div>
        <h3>Rumah Sakit & Fasilitas Kesehatan</h3>
        <p>Sistem kelistrikan UPS zero-downtime untuk server SIMRS dan alat medis kritis, serta penarikan kabel data terstruktur.</p>
      </div>

      <div class="sector-card">
        <div class="sector-icon">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
        </div>
        <h3>Korporasi & Lembaga Finansial</h3>
        <p>Managed Service sewa laptop berkala, proteksi firewall berlapis, dan kontrak pemeliharaan teknis responsif (SLA 24/7).</p>
      </div>
    </div>
  </div>
</section>

<!-- Grid Portofolio Proyek -->
<section class="section">
  <div class="container">
    <div class="section-header text-center">
      <span class="section-subtitle">Studi Kasus & Implementasi</span>
      <h2 class="section-title">Proyek Pilihan Terkini</h2>
      <p class="section-lead">Berikut adalah beberapa implementasi sistem IT yang telah kami selesaikan dengan sukses:</p>
    </div>

    <div class="portfolio-grid">
      <?php foreach ($portfolioItems as $item): ?>
        <div class="portfolio-card">
          <div class="portfolio-img-box">
            <img src="<?= htmlspecialchars($item['image'] ?: 'assets/hero-datacenter.jpg') ?>" alt="<?= htmlspecialchars($item['title']) ?>">
            <span class="portfolio-tag"><?= htmlspecialchars($item['category']) ?></span>
          </div>
          <div class="portfolio-body">
            <div class="portfolio-meta">
              <span class="portfolio-client"><?= htmlspecialchars($item['client_name']) ?></span>
              <span class="portfolio-year"><?= htmlspecialchars($item['year']) ?></span>
            </div>
            <h3 class="portfolio-title"><?= htmlspecialchars($item['title']) ?></h3>
            <p class="portfolio-desc"><?= htmlspecialchars($item['description']) ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Client Trust & Testimoni -->
<section class="section section-testimonials">
  <div class="container">
    <div class="section-header text-center">
      <span class="section-subtitle">Pengakuan Klien</span>
      <h2 class="section-title">Apa Kata Mereka Tentang SkillNusa</h2>
      <p class="section-lead">Kolaborasi erat dan dedikasi penuh di setiap pengerjaan proyek.</p>
    </div>

    <div class="testimonials-grid">
      <?php foreach ($testimonials as $t): ?>
        <div class="testimonial-card">
          <div class="rating-stars">
            <?php for ($i = 0; $i < (int)$t['rating']; $i++): ?>★<?php endfor; ?>
          </div>
          <p class="testimonial-quote">"<?= htmlspecialchars($t['content']) ?>"</p>
          <div class="testimonial-author">
            <div class="author-avatar"><?= mb_substr($t['client_name'], 0, 1) ?></div>
            <div>
              <h4 class="author-name"><?= htmlspecialchars($t['client_name']) ?></h4>
              <p class="author-meta"><?= htmlspecialchars($t['client_role']) ?>, <?= htmlspecialchars($t['company']) ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA Proyek Baru -->
<section class="section section-cta-banner">
  <div class="container">
    <div class="cta-banner-box">
      <div class="cta-banner-content">
        <h2 class="cta-banner-title">Ingin Menjadikan Infrastruktur IT Anda Contoh Sukses Berikutnya?</h2>
        <p class="cta-banner-desc">Diskusikan kebutuhan proyek Anda langsung dengan principal engineer kami.</p>
      </div>
      <div class="cta-banner-buttons">
        <a href="kontak.php" class="btn btn-primary btn-lg">Ajukan Permintaan Proyek (RFP)</a>
        <a href="https://wa.me/<?= $cleanWaNumber ?>?text=Halo%20SkillNusa,%20kami%20ingin%20berdiskusi%20mengenai%20proyek%20IT" target="_blank" class="btn btn-outline btn-lg">Chat Tim Sales</a>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
