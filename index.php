<?php
/**
 * PT SKILL NUSA INFOTAMA - HOMEPAGE (BERANDA)
 * Website: www.skillnusa.co.id
 */

require_once __DIR__ . '/config/database.php';

$currentPage = 'home';
$siteSettings = getSiteSettings();
$pageTitle = 'PT Skill Nusa Infotama - Enterprise Network System Integrator & Data Center';
$pageDescription = $siteSettings['meta_description'];

// Mengambil data dinamis
$featuredServices = getFeaturedServices(4);
$statistics = getStatistics();
$testimonials = getTestimonials();
$portfolioPreview = getPortfolioItems(3);

include __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
  <div class="hero-bg-overlay"></div>
  <div class="container hero-container">
    <div class="hero-content">
      <div class="hero-badge">
        <span class="badge-dot"></span>
        <span>Trusted IT System Integrator Sejak 1999</span>
      </div>
      <h1 class="hero-title"><?= htmlspecialchars($siteSettings['hero_headline']) ?></h1>
      <p class="hero-subtitle"><?= htmlspecialchars($siteSettings['hero_subheadline']) ?></p>
      
      <div class="hero-cta-group">
        <a href="kontak.php" class="btn btn-primary btn-lg">
          Konsultasi Free
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"></path><path d="M12 5l7 7-7 7"></path></svg>
        </a>
        <a href="layanan.php" class="btn btn-secondary btn-lg">Jelajahi Layanan</a>
      </div>

      <!-- Quick Highlights -->
      <div class="hero-highlights">
        <div class="highlight-item">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent-cyan)" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
          <span>Data Center</span>
        </div>
        <div class="highlight-item">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent-cyan)" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
          <span>Managed Service & Sewa</span>
        </div>
        <div class="highlight-item">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--accent-cyan)" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
          <span>Fiber Optic & Networking</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Layanan Unggulan Section (Featured Services) -->
<section class="section section-services" id="layanan-unggulan">
  <div class="container">
    <div class="section-header text-center">
      <span class="section-subtitle">Keahlian & Portofolio Solusi</span>
      <h2 class="section-title">Layanan Unggulan Enterprise</h2>
      <p class="section-lead">
        Solusi terintegrasi dari perancangan infrastruktur fisik data center hingga pemeliharaan sistem terpadu berstandar industri.
      </p>
    </div>

    <div class="services-grid">
      <?php foreach ($featuredServices as $service): ?>
        <div class="service-card">
          <div class="service-icon-box">
            <?php if ($service['icon'] === 'server' || $service['icon'] === 'data-center'): ?>
              <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>
            <?php elseif ($service['icon'] === 'network'): ?>
              <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="16" y="16" width="6" height="6" rx="1"></rect><rect x="2" y="16" width="6" height="6" rx="1"></rect><rect x="9" y="2" width="6" height="6" rx="1"></rect><path d="M5 16v-3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3"></path><path d="M12 12V8"></path></svg>
            <?php elseif ($service['icon'] === 'support'): ?>
              <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
            <?php elseif ($service['icon'] === 'power'): ?>
              <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
            <?php else: ?>
              <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
            <?php endif; ?>
          </div>
          <h3 class="service-title"><?= htmlspecialchars($service['title']) ?></h3>
          <p class="service-desc"><?= htmlspecialchars($service['summary']) ?></p>
          
          <?php if (!empty($service['features'])): ?>
            <ul class="service-features-list">
              <?php 
                $feats = array_filter(explode("\n", $service['features']));
                $displayFeats = array_slice($feats, 0, 3);
                foreach ($displayFeats as $feat):
              ?>
                <li>
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="var(--accent-cyan)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                  <span><?= htmlspecialchars(trim($feat)) ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>

          <div class="service-action">
            <a href="layanan.php#<?= htmlspecialchars($service['slug']) ?>" class="service-link">
              Pelajari Rincian
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"></path><path d="M12 5l7 7-7 7"></path></svg>
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="text-center mt-5">
      <a href="layanan.php" class="btn btn-outline">Lihat Seluruh Layanan & Program &rarr;</a>
    </div>
  </div>
</section>

<!-- Tentang Kami (Ringkasan Profil & Keunggulan) -->
<section class="section section-about-preview">
  <div class="container about-grid">
    <div class="about-image-wrapper">
      <img src="assets/enterprise-noc.jpg" alt="Data Center & NOC PT Skill Nusa Infotama" class="about-featured-img">
      <div class="about-experience-card">
        <span class="exp-number">25+</span>
        <span class="exp-text">Tahun Melayani Solusi IT Nasional</span>
      </div>
    </div>
    
    <div class="about-text-content">
      <span class="section-subtitle">Profil Perusahaan</span>
      <h2 class="section-title">Mitra Strategis IT Sejak 1999 dengan Filosofi "Total Solution"</h2>
      <p class="section-desc">
        Dalam kurun waktu lebih dari dua dekade sejak pendirian pada tahun 1999, <strong>PT Skill Nusa Infotama</strong> berkomitmen menjadi pilar solusi dalam perkembangan pesat teknologi informasi di Indonesia.
      </p>
      <p class="section-desc">
        Kami memadukan perangkat keras berstandar global, solusi perangkat lunak yang andal, serta tim teknisi bersertifikasi untuk memberikan alternatif solusi keamanan, kestabilan, dan kenyamanan operasional korporasi Anda.
      </p>

      <!-- Poin Keunggulan Utama -->
      <div class="advantages-list">
        <div class="adv-item">
          <div class="adv-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
          </div>
          <div>
            <h4>Multi-Vendor Integration</h4>
            <p>Dukungan integrasi penuh perangkat dari Cisco, Fortinet, Dell, Schneider APC, Mikrotik, hingga HPE.</p>
          </div>
        </div>

        <div class="adv-item">
          <div class="adv-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
          </div>
          <div>
            <h4>Keamanan & Kestabilan Sistem Terjamin</h4>
            <p>Sistem dirancang aman, fleksibel, terukur, dan didukung garansi pemeliharaan berkala berstandar SLA.</p>
          </div>
        </div>

        <div class="adv-item">
          <div class="adv-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
          </div>
          <div>
            <h4>Efisiensi Investasi IT Jangka Panjang</h4>
            <p>Opsi Managed Service dan Sewa-Beli perangkat membantu mengoptimalkan anggaran belanja modal perusahaan.</p>
          </div>
        </div>
      </div>

      <div class="mt-4">
        <a href="tentang.php" class="btn btn-primary">Pelajari Visi & Profil Lengkap</a>
      </div>
    </div>
  </div>
</section>

<!-- Statistik / Angka Pencapaian Section -->
<section class="section section-stats">
  <div class="container">
    <div class="stats-grid">
      <?php foreach ($statistics as $stat): ?>
        <div class="stat-card">
          <div class="stat-icon">
            <?php if ($stat['icon'] === 'calendar'): ?>
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            <?php elseif ($stat['icon'] === 'check-circle'): ?>
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            <?php elseif ($stat['icon'] === 'building'): ?>
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect><line x1="9" y1="22" x2="9" y2="22.01"></line><line x1="15" y1="22" x2="15" y2="22.01"></line><line x1="9" y1="6" x2="9" y2="6.01"></line><line x1="15" y1="6" x2="15" y2="6.01"></line><line x1="9" y1="10" x2="9" y2="10.01"></line><line x1="15" y1="10" x2="15" y2="10.01"></line><line x1="9" y1="14" x2="9" y2="14.01"></line><line x1="15" y1="14" x2="15" y2="14.01"></line><line x1="9" y1="18" x2="9" y2="18.01"></line><line x1="15" y1="18" x2="15" y2="18.01"></line></svg>
            <?php else: ?>
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
            <?php endif; ?>
          </div>
          <div class="stat-number"><?= htmlspecialchars($stat['stat_value']) ?></div>
          <div class="stat-label"><?= htmlspecialchars($stat['stat_label']) ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Ekosistem Teknologi & Aliansi Strategis Multi-Vendor -->
<section class="section section-partners">
  <div class="container text-center">
    <span class="section-subtitle">Didukung Perangkat & Infrastruktur Enterprise Global</span>
    <h3 class="partner-heading">Ekosistem Teknologi & Aliansi Strategis Multi-Vendor</h3>
    
    <div class="partners-logos-grid">
      <!-- 1. Cisco Systems -->
      <div class="partner-logo-card" title="Cisco Systems">
        <svg width="110" height="30" viewBox="0 0 110 30" fill="none" class="vendor-svg">
          <g fill="#049fd9">
            <rect x="2" y="11" width="3" height="8" rx="1.5"/>
            <rect x="8" y="7" width="3" height="12" rx="1.5"/>
            <rect x="14" y="3" width="3" height="16" rx="1.5"/>
            <rect x="20" y="0" width="3" height="19" rx="1.5"/>
            <rect x="26" y="3" width="3" height="16" rx="1.5"/>
            <rect x="32" y="7" width="3" height="12" rx="1.5"/>
            <rect x="38" y="11" width="3" height="8" rx="1.5"/>
          </g>
          <text x="46" y="18" font-family="'Outfit', sans-serif" font-weight="800" font-size="14" fill="#049fd9" letter-spacing="1.5">CISCO</text>
        </svg>
      </div>

      <!-- 2. Dell Technologies -->
      <div class="partner-logo-card" title="Dell Technologies">
        <svg width="125" height="30" viewBox="0 0 125 30" fill="none" class="vendor-svg">
          <circle cx="15" cy="15" r="13" stroke="#007db8" stroke-width="2.2" fill="none"/>
          <text x="15" y="19.5" font-family="'Outfit', sans-serif" font-weight="900" font-size="11" fill="#007db8" text-anchor="middle" letter-spacing="-0.5">DELL</text>
          <text x="35" y="17" font-family="'Outfit', sans-serif" font-weight="800" font-size="11.5" fill="#007db8" letter-spacing="0.3">Technologies</text>
        </svg>
      </div>

      <!-- 3. HPE (Hewlett Packard Enterprise) -->
      <div class="partner-logo-card" title="Hewlett Packard Enterprise">
        <svg width="120" height="30" viewBox="0 0 120 30" fill="none" class="vendor-svg">
          <rect x="2" y="5" width="36" height="20" rx="2" stroke="#01a982" stroke-width="3" fill="none"/>
          <text x="20" y="19" font-family="'Outfit', sans-serif" font-weight="900" font-size="12" fill="#01a982" text-anchor="middle">hpe</text>
          <text x="44" y="16" font-family="'Outfit', sans-serif" font-weight="800" font-size="11.5" fill="#1e293b" letter-spacing="0.3">Enterprise</text>
        </svg>
      </div>

      <!-- 4. Fortinet -->
      <div class="partner-logo-card" title="Fortinet Cyber Security">
        <svg width="118" height="30" viewBox="0 0 118 30" fill="none" class="vendor-svg">
          <g fill="#ee2737">
            <rect x="2" y="6" width="7" height="7" rx="1.5"/>
            <rect x="11" y="6" width="7" height="7" rx="1.5"/>
            <rect x="2" y="15" width="7" height="7" rx="1.5"/>
            <rect x="11" y="15" width="7" height="7" rx="1.5"/>
          </g>
          <text x="23" y="19" font-family="'Outfit', sans-serif" font-weight="900" font-size="13" fill="#ee2737" letter-spacing="1">FORTINET</text>
        </svg>
      </div>

      <!-- 5. Schneider Electric / APC -->
      <div class="partner-logo-card" title="APC by Schneider Electric">
        <svg width="130" height="30" viewBox="0 0 130 30" fill="none" class="vendor-svg">
          <g fill="#3dcd58">
            <path d="M4 21L13 5L17 11L11 21H4Z" fill="#3dcd58"/>
            <path d="M15 21L19 15L23 21H15Z" fill="#009639"/>
          </g>
          <text x="27" y="14" font-family="'Outfit', sans-serif" font-weight="900" font-size="12" fill="#ed1c24" letter-spacing="1">APC</text>
          <text x="27" y="23" font-family="'Plus Jakarta Sans', sans-serif" font-weight="600" font-size="7" fill="#475569" letter-spacing="0.2">Schneider Electric</text>
        </svg>
      </div>

      <!-- 6. Vertiv -->
      <div class="partner-logo-card" title="Vertiv Critical Power">
        <svg width="110" height="30" viewBox="0 0 110 30" fill="none" class="vendor-svg">
          <polygon points="12,3 20,15 12,27 4,15" fill="#f58220"/>
          <polygon points="12,8 16,15 12,22 8,15" fill="#ffffff"/>
          <text x="25" y="19" font-family="'Outfit', sans-serif" font-weight="900" font-size="13.5" fill="#1e293b" letter-spacing="1.2">VERTIV</text>
        </svg>
      </div>

      <!-- 7. Lenovo -->
      <div class="partner-logo-card" title="Lenovo ThinkSystem">
        <svg width="115" height="30" viewBox="0 0 115 30" fill="none" class="vendor-svg">
          <rect x="2" y="5" width="66" height="20" rx="3" fill="#e2231a"/>
          <text x="35" y="19" font-family="'Outfit', sans-serif" font-weight="800" font-size="12" fill="#ffffff" text-anchor="middle" letter-spacing="0.3">Lenovo</text>
          <text x="74" y="19" font-family="'Outfit', sans-serif" font-weight="600" font-size="8.5" fill="#64748b" letter-spacing="0.5">ISG</text>
        </svg>
      </div>

      <!-- 8. VMware -->
      <div class="partner-logo-card" title="VMware by Broadcom">
        <svg width="115" height="30" viewBox="0 0 115 30" fill="none" class="vendor-svg">
          <text x="2" y="20" font-family="'Outfit', sans-serif" font-weight="800" font-size="14" fill="#0095d3" letter-spacing="-0.5">vm</text>
          <text x="25" y="20" font-family="'Outfit', sans-serif" font-weight="700" font-size="14" fill="#475569" letter-spacing="-0.5">ware</text>
          <text x="66" y="20" font-family="'Plus Jakarta Sans', sans-serif" font-weight="600" font-size="7.5" fill="#94a3b8">Cloud</text>
        </svg>
      </div>

      <!-- 9. Microsoft -->
      <div class="partner-logo-card" title="Microsoft Enterprise">
        <svg width="120" height="30" viewBox="0 0 120 30" fill="none" class="vendor-svg">
          <rect x="2" y="7" width="7" height="7" fill="#f25022"/>
          <rect x="11" y="7" width="7" height="7" fill="#7fba00"/>
          <rect x="2" y="16" width="7" height="7" fill="#00a4ef"/>
          <rect x="11" y="16" width="7" height="7" fill="#ffb900"/>
          <text x="23" y="19" font-family="'Segoe UI', 'Outfit', sans-serif" font-weight="700" font-size="12.5" fill="#334155" letter-spacing="0.2">Microsoft</text>
        </svg>
      </div>

      <!-- 10. MikroTik -->
      <div class="partner-logo-card" title="MikroTik RouterOS">
        <svg width="115" height="30" viewBox="0 0 115 30" fill="none" class="vendor-svg">
          <rect x="2" y="6" width="18" height="18" rx="3.5" fill="#002b49"/>
          <path d="M6 18V11L11 15.5L16 11V18" stroke="#ffffff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
          <text x="25" y="19" font-family="'Outfit', sans-serif" font-weight="800" font-size="12.5" fill="#002b49" letter-spacing="0.3">MikroTik</text>
        </svg>
      </div>

      <!-- 11. CommScope -->
      <div class="partner-logo-card" title="CommScope Systimax">
        <svg width="130" height="30" viewBox="0 0 130 30" fill="none" class="vendor-svg">
          <path d="M4 15C4 9.5 8.5 6 14 6C16.8 6 19.5 7.2 21.2 9.5L17.8 12.2C16.8 10.8 15.5 10 14 10C10.8 10 8.2 12.2 8.2 15C8.2 17.8 10.8 20 14 20C15.5 20 16.8 19.2 17.8 17.8L21.2 20.5C19.5 22.8 16.8 24 14 24C8.5 24 4 20.5 4 15Z" fill="#005596"/>
          <text x="26" y="19" font-family="'Outfit', sans-serif" font-weight="800" font-size="11" fill="#005596" letter-spacing="0.8">COMMSCOPE</text>
        </svg>
      </div>

      <!-- 12. Hikvision -->
      <div class="partner-logo-card" title="Hikvision Surveillance">
        <svg width="120" height="30" viewBox="0 0 120 30" fill="none" class="vendor-svg">
          <rect x="2" y="7" width="15" height="15" rx="2.5" fill="#e60012"/>
          <circle cx="9.5" cy="14.5" r="3" fill="#ffffff"/>
          <text x="22" y="19" font-family="'Outfit', sans-serif" font-weight="900" font-size="11.5" fill="#e60012" letter-spacing="1">HIKVISION</text>
        </svg>
      </div>
    </div>
  </div>
</section>

<!-- Testimoni / Suara Klien Section -->
<section class="section section-testimonials">
  <div class="container">
    <div class="section-header text-center">
      <span class="section-subtitle">Kepercayaan Klien</span>
      <h2 class="section-title">Testimoni & Kepuasan Mitra</h2>
      <p class="section-lead">Kepuasan para pemangku kepentingan adalah tolak ukur keberhasilan integrasi sistem kami.</p>
    </div>

    <div class="testimonials-grid">
      <?php foreach ($testimonials as $item): ?>
        <div class="testimonial-card">
          <div class="rating-stars">
            <?php for ($i = 0; $i < (int)$item['rating']; $i++): ?>
              ★
            <?php endfor; ?>
          </div>
          <p class="testimonial-quote">"<?= htmlspecialchars($item['content']) ?>"</p>
          <div class="testimonial-author">
            <div class="author-avatar"><?= mb_substr($item['client_name'], 0, 1) ?></div>
            <div>
              <h4 class="author-name"><?= htmlspecialchars($item['client_name']) ?></h4>
              <p class="author-meta"><?= htmlspecialchars($item['client_role']) ?>, <?= htmlspecialchars($item['company']) ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Final CTA Banner -->
<section class="section-cta-banner">
  <div class="container">
    <div class="cta-banner-box">
      <div class="cta-banner-content">
        <h2 class="cta-banner-title">Siap Membangun Infrastruktur IT yang Tangguh & Terintegrasi?</h2>
        <p class="cta-banner-desc">
          Konsultasikan kebutuhan data center, jaringan fiber optic, atau pengadaan sewa perangkat kantor bersama tim ahli PT Skill Nusa Infotama.
        </p>
      </div>
      <div class="cta-banner-buttons">
        <a href="kontak.php" class="btn btn-primary btn-lg">Hubungi Kami Sekarang</a>
        <a href="https://wa.me/<?= $cleanWaNumber ?>?text=Halo%20SkillNusa,%20saya%20ingin%20jadwalkan%20konsultasi%20solusi%20IT" target="_blank" class="btn btn-outline btn-lg">Chat WhatsApp Tim Ahli</a>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
