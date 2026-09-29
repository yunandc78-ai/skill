<?php
/**
 * PT SKILL NUSA INFOTAMA - KONTAK KAMI
 * Website: www.skillnusa.co.id
 */

require_once __DIR__ . '/config/database.php';

$currentPage = 'contact';
$siteSettings = getSiteSettings();
$pageTitle = 'Kontak Kami - Konsultasi & Alamat Kantor';
$pageDescription = 'Hubungi tim ahli PT Skill Nusa Infotama untuk konsultasi data center, jaringan fiber optic, sewa laptop, dan survei teknis. Kantor di Bandung, Jawa Barat.';

$cleanWaNumber = preg_replace('/[^0-9]/', '', $siteSettings['company_whatsapp'] ?? '6282126642581');

// Menangani Pengiriman Formulir Kontak
$alert = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = sanitize($_POST['name'] ?? '');
    $email   = sanitize($_POST['email'] ?? '');
    $phone   = sanitize($_POST['phone'] ?? '');
    $subject = sanitize($_POST['subject'] ?? '');
    $message = sanitize($_POST['message'] ?? '');

    // Validasi Sederhana
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $alert = [
            'type' => 'danger',
            'message' => 'Mohon lengkapi seluruh kolom yang bertanda bintang (*).'
        ];
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $alert = [
            'type' => 'danger',
            'message' => 'Format alamat email yang Anda masukkan tidak valid.'
        ];
    } else {
        $saved = saveContactMessage($name, $email, $phone, $subject, $message);
        if ($saved) {
            $alert = [
                'type' => 'success',
                'message' => 'Terima kasih, Bapak/Ibu ' . htmlspecialchars($name) . '. Pesan Anda telah berhasil terkirim. Tim engineer/sales kami akan segera menghubungi Anda kembali.'
            ];
            // Reset fields
            $name = $email = $phone = $subject = $message = '';
        } else {
            $alert = [
                'type' => 'danger',
                'message' => 'Maaf, terjadi kendala saat menyimpan pesan Anda. Silakan coba kembali atau hubungi kami langsung via WhatsApp.'
            ];
        }
    }
}

// Prefill Subject jika datang dari halaman layanan
$prefillSubject = isset($_GET['layanan']) ? 'Konsultasi Layanan: ' . sanitize($_GET['layanan']) : '';

include __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner">
  <div class="container text-center">
    <span class="badge-tag">Pusat Layanan Pelanggan</span>
    <h1 class="page-banner-title">Hubungi Kami</h1>
    <p class="page-banner-desc">
      Kami siap mendengar kebutuhan infrastruktur teknologi informasi Anda. Diskusikan solusi terbaik bersama konsultan kami sekarang juga.
    </p>
  </div>
</section>

<!-- Content Kontak Utama -->
<section class="section">
  <div class="container">
    
    <div class="contact-layout-grid">
      
      <!-- Kolom Kiri: Informasi Kontak & Lokasi -->
      <div class="contact-info-panel">
        <span class="section-subtitle">Informasi Kontak</span>
        <h2 class="contact-info-title">Mari Berkolaborasi</h2>
        <p class="contact-info-lead">
          Kunjungi kantor kami di Bandung atau hubungi kami melalui saluran komunikasi resmi berikut untuk jadwal rapat koordinasi maupun survey lokasi:
        </p>

        <div class="contact-cards-list">
          <div class="contact-card-item">
            <div class="card-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
            </div>
            <div>
              <h4>Alamat Kantor</h4>
              <p><?= htmlspecialchars($siteSettings['company_address']) ?></p>
              <a href="https://maps.google.com/maps?q=<?= urlencode($siteSettings['company_address']) ?>" target="_blank" rel="noopener noreferrer" class="link-map-action">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
                <span>Buka Petunjuk Arah Google Maps ↗</span>
              </a>
            </div>
          </div>

          <div class="contact-card-item">
            <div class="card-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
            </div>
            <div>
              <h4>Telepon Kantor</h4>
              <p><a href="tel:<?= preg_replace('/\s+/', '', $siteSettings['company_phone']) ?>" class="link-highlight"><?= htmlspecialchars($siteSettings['company_phone']) ?></a></p>
            </div>
          </div>

          <div class="contact-card-item">
            <div class="card-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
            </div>
            <div>
              <h4>Email Dukungan & Sales</h4>
              <p><a href="mailto:<?= htmlspecialchars($siteSettings['company_email']) ?>" class="link-highlight"><?= htmlspecialchars($siteSettings['company_email']) ?></a></p>
            </div>
          </div>

          <div class="contact-card-item">
            <div class="card-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
            </div>
            <div>
              <h4>Jam Operasional</h4>
              <p>Senin - Jumat: 08:30 - 17:00 WIB<br><small class="text-muted">Layanan support darurat tersedia 24/7 untuk klien Maintenance Contract</small></p>
            </div>
          </div>
        </div>

        <!-- Mini Google Maps Embed Card -->
        <div class="office-map-card">
          <div class="office-map-header">
            <div class="office-map-title">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
              <span>Lokasi Kantor (Google Maps)</span>
            </div>
            <a href="https://maps.google.com/maps?q=<?= urlencode($siteSettings['company_address']) ?>" target="_blank" rel="noopener noreferrer" class="office-map-btn">
              Buka Peta Penuh ↗
            </a>
          </div>
          <div class="office-map-iframe-container">
            <iframe 
              src="<?= htmlspecialchars($siteSettings['company_maps_embed']) ?>" 
              width="100%" 
              height="220" 
              style="border:0;" 
              allowfullscreen="" 
              loading="lazy" 
              referrerpolicy="no-referrer-when-downgrade"
              title="Google Maps Lokasi PT Skill Nusa Infotama">
            </iframe>
          </div>
        </div>

        <!-- Tombol WhatsApp Langsung -->
        <div class="whatsapp-direct-box mt-4">
          <p class="wa-box-text">Ingin tanggapan lebih cepat secara langsung?</p>
          <a href="https://wa.me/<?= $cleanWaNumber ?>?text=Halo%20SkillNusa,%20saya%20ingin%20berkonsultasi%20mengenai%20kebutuhan%20IT" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-block">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
            Chat WhatsApp dengan Tim Konsultan
          </a>
        </div>
      </div>

      <!-- Kolom Kanan: Formulir Kontak -->
      <div class="contact-form-panel">
        <div class="form-wrapper-box">
          <h3 class="form-heading">Kirimkan Pesan atau Permintaan Solusi</h3>
          <p class="form-subheading">Isi formulir di bawah ini dan kami akan membalas dalam waktu maksimal 1x24 jam kerja.</p>

          <?php if ($alert): ?>
            <div class="alert alert-<?= $alert['type'] ?>">
              <?= $alert['message'] ?>
            </div>
          <?php endif; ?>

          <form action="kontak.php" method="POST" class="contact-form" id="contact-form">
            <div class="form-group">
              <label for="name" class="form-label">Nama Lengkap <span class="required">*</span></label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Contoh: Budi Santoso" value="<?= htmlspecialchars($name ?? '') ?>" required>
            </div>

            <div class="form-row">
              <div class="form-group form-col">
                <label for="email" class="form-label">Alamat Email Perusahaan <span class="required">*</span></label>
                <input type="email" id="email" name="email" class="form-control" placeholder="nama@perusahaan.co.id" value="<?= htmlspecialchars($email ?? '') ?>" required>
              </div>
              <div class="form-group form-col">
                <label for="phone" class="form-label">Nomor WhatsApp / Telepon</label>
                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Contoh: 081234567890" value="<?= htmlspecialchars($phone ?? '') ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="subject" class="form-label">Subjek / Kebutuhan Solusi <span class="required">*</span></label>
              <input type="text" id="subject" name="subject" class="form-control" placeholder="Contoh: Permintaan Penawaran Data Center" value="<?= htmlspecialchars($subject ?? $prefillSubject) ?>" required>
            </div>

            <div class="form-group">
              <label for="message" class="form-label">Rincian Kebutuhan atau Pesan <span class="required">*</span></label>
              <textarea id="message" name="message" rows="5" class="form-control" placeholder="Jelaskan kebutuhan teknis, lokasi proyek, estimasi jadwal pengerjaan, atau pertanyaan Anda..." required><?= htmlspecialchars($message ?? '') ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-submit">
              <span>Kirim Pesan Sekarang</span>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
            </button>
          </form>
        </div>
      </div>

    </div>

  </div>
</section>

<!-- Google Maps Embed Section -->
<section class="section section-maps">
  <div class="container">
    <div class="section-header text-center">
      <span class="section-subtitle">Lokasi Kantor Kami</span>
      <h2 class="section-title">Peta Lokasi Kantor Pusat di Bandung</h2>
      <p class="section-lead">Akses mudah di pusat Kota Bandung (<?= htmlspecialchars($siteSettings['company_address']) ?>).</p>
      <div style="margin-top: 1.25rem;">
        <a href="https://maps.google.com/maps?q=<?= urlencode($siteSettings['company_address']) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-secondary btn-sm" style="display: inline-flex; align-items: center; gap: 8px;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
          Buka Petunjuk Arah di Google Maps ↗
        </a>
      </div>
    </div>

    <div class="maps-container">
      <iframe 
        src="<?= htmlspecialchars($siteSettings['company_maps_embed']) ?>" 
        width="100%" 
        height="450" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade"
        title="Peta Kantor PT Skill Nusa Infotama">
      </iframe>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
