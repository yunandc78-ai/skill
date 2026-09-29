<?php
/**
 * PT SKILL NUSA INFOTAMA - FOOTER COMPONENT
 * Website: www.skillnusa.co.id
 */

$cleanWaNumber = preg_replace('/[^0-9]/', '', $siteSettings['company_whatsapp'] ?? '6282126642581');
?>
  <!-- Footer Utama -->
  <footer class="footer">
    <div class="container footer-grid">
      
      <!-- Kolom 1: Profil Ringkas Perusahaan -->
      <div class="footer-col footer-about">
        <div class="footer-brand">
          <img src="assets/logo-original.png" alt="SkillNusa Logo" class="footer-logo">
          <span class="footer-brand-title">SKILL NUSA INFOTAMA</span>
        </div>
        <p class="footer-desc">
          Penyedia solusi terkemuka di bidang Sistem Network Integration, Data Center Solutions, Managed Services (Sewa & Pemeliharaan IT), dan Konsultan Software sejak tahun 1999.
        </p>
        <div class="footer-slogan">
          <strong>"Total Solution For Customer"</strong>
        </div>
      </div>

      <!-- Kolom 2: Link Navigasi Cepat -->
      <div class="footer-col">
        <h4 class="footer-title">Navigasi Cepat</h4>
        <ul class="footer-links">
          <li><a href="index.php">Beranda</a></li>
          <li><a href="tentang.php">Tentang Kami</a></li>
          <li><a href="layanan.php">Layanan / Program</a></li>
          <li><a href="portofolio.php">Portofolio & Klien</a></li>
          <li><a href="kontak.php">Hubungi Kami</a></li>
          <li><a href="admin/login.php" class="text-muted">Panel Admin</a></li>
        </ul>
      </div>

      <!-- Kolom 3: Layanan Unggulan -->
      <div class="footer-col">
        <h4 class="footer-title">Layanan Unggulan</h4>
        <ul class="footer-links">
          <li><a href="layanan.php#data-center-turnkey">Data Center</a></li>
          <li><a href="layanan.php#infrastruktur-jaringan-fo">Jaringan & Fiber Optic</a></li>
          <li><a href="layanan.php#managed-service-it-rental">Managed Service & Sewa IT</a></li>
          <li><a href="layanan.php#power-equipment-ups">Power UPS Enterprise</a></li>
          <li><a href="layanan.php#virtualization-software-consultant">Virtualisasi & Software</a></li>
        </ul>
      </div>

      <!-- Kolom 4: Info Kontak & Alamat -->
      <div class="footer-col">
        <h4 class="footer-title">Kontak & Lokasi</h4>
        <ul class="footer-contact-list">
          <li>
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
            <a href="https://maps.google.com/maps?q=<?= urlencode($siteSettings['company_address']) ?>" target="_blank" rel="noopener noreferrer" title="Buka Petunjuk Arah di Google Maps"><?= htmlspecialchars($siteSettings['company_address']) ?></a>
          </li>
          <li>
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
            <a href="tel:<?= preg_replace('/\s+/', '', $siteSettings['company_phone']) ?>"><?= htmlspecialchars($siteSettings['company_phone']) ?></a>
          </li>
          <li>
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
            <a href="mailto:<?= htmlspecialchars($siteSettings['company_email']) ?>"><?= htmlspecialchars($siteSettings['company_email']) ?></a>
          </li>
          <li>
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
            <span>Senin - Jumat: 08:30 - 17:00 WIB</span>
          </li>
        </ul>

        <!-- Ikon Media Sosial -->
        <div class="social-links">
          <a href="https://wa.me/<?= $cleanWaNumber ?>" target="_blank" rel="noopener noreferrer" class="social-icon" title="WhatsApp Chat" aria-label="WhatsApp">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
          </a>
          <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="social-icon" title="LinkedIn" aria-label="LinkedIn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
          </a>
          <a href="mailto:<?= htmlspecialchars($siteSettings['company_email']) ?>" class="social-icon" title="Email" aria-label="Email Kami">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
          </a>
        </div>
      </div>

    </div>

    <!-- Copyright Bar -->
    <div class="footer-bottom">
      <div class="container footer-bottom-inner">
        <p>&copy; <?= date('Y') ?> <strong><?= htmlspecialchars($siteSettings['site_name']) ?></strong>. Hak Cipta Dilindungi Undang-Undang.</p>
        <p class="footer-bottom-meta">Bandung, Jawa Barat, Indonesia • System Integrator Since 1999</p>
      </div>
    </div>
  </footer>

  <!-- Floating Direct WhatsApp Button -->
  <a href="https://wa.me/<?= $cleanWaNumber ?>?text=Halo%20SkillNusa,%20saya%20ingin%20berkonsultasi%20mengenai%20solusi%20IT" class="floating-wa" target="_blank" rel="noopener noreferrer" aria-label="Chat WhatsApp Konsultasi">
    <svg width="28" height="28" viewBox="0 0 24 24" fill="white"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
    <span class="floating-wa-label">Konsultasi WhatsApp</span>
  </a>

  <!-- Main JavaScript File -->
  <script src="js/main.js"></script>
</body>
</html>
