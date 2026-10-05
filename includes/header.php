<?php
/**
 * PT SKILL NUSA INFOTAMA - HEADER & NAVIGATION
 * Website: www.skillnusa.co.id
 */

if (!isset($siteSettings)) {
    require_once __DIR__ . '/../config/database.php';
    $siteSettings = getSiteSettings();
}

$pageTitle = isset($pageTitle) 
    ? $pageTitle . ' - ' . $siteSettings['site_name'] 
    : $siteSettings['site_name'] . ' - Enterprise Network System Integrator & Data Center';

$currentPage = $currentPage ?? 'home';
$cleanWaNumber = preg_replace('/[^0-9]/', '', $siteSettings['company_whatsapp'] ?? '62811206820');
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  
  <!-- SEO & Meta Tags -->
  <meta name="description" content="<?= htmlspecialchars($pageDescription ?? $siteSettings['meta_description']) ?>">
  <meta name="keywords" content="SkillNusa, PT Skill Nusa Infotama, System Integrator Bandung, Data Center, Sewa Laptop Kantor, Managed Service IT, Fiber Optic Splicing, UPS Enterprise">
  <meta name="author" content="PT Skill Nusa Infotama">
  
  <!-- Open Graph -->
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($pageDescription ?? $siteSettings['meta_description']) ?>">
  <meta property="og:image" content="assets/hero-datacenter.jpg">
  <meta property="og:type" content="website">

  <!-- Favicon -->
  <link rel="icon" href="assets/logo-original.png" type="image/png">

  <!-- Google Fonts: Plus Jakarta Sans & Outfit -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

  <!-- Top Bar Ringkas Info Kontak -->
  <div class="top-bar">
    <div class="container top-bar-inner">
      <div class="top-contact">
        <span class="top-item">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
          <a href="tel:<?= preg_replace('/\s+/', '', $siteSettings['company_phone']) ?>"><?= htmlspecialchars($siteSettings['company_phone']) ?></a>
        </span>
        <span class="top-item d-none-sm">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
          <a href="mailto:<?= htmlspecialchars($siteSettings['company_email']) ?>"><?= htmlspecialchars($siteSettings['company_email']) ?></a>
        </span>
      </div>
      <div class="top-badge">
        <span>Total Solution For Customer • Est. 1999</span>
      </div>
    </div>
  </div>

  <!-- Header Navigasi Utama -->
  <header class="header" id="header">
    <div class="container nav-container">
      
      <!-- Brand Logo -->
      <a href="index.php" class="brand" aria-label="Beranda SkillNusa">
        <div class="brand-badge">
          <img src="assets/logo-original.png" alt="Logo PT Skill Nusa Infotama" class="brand-logo-img">
        </div>
        <div class="brand-text">
          <span class="brand-title">SKILL NUSA INFOTAMA</span>
          <span class="brand-sub">ENTERPRISE SYSTEM INTEGRATOR</span>
        </div>
      </a>

      <!-- Desktop Navigation Menu -->
      <nav class="desktop-nav" aria-label="Navigasi Utama">
        <ul class="nav-menu">
          <li><a href="index.php" class="nav-link <?= ($currentPage === 'home') ? 'active' : '' ?>">Beranda</a></li>
          <li><a href="tentang.php" class="nav-link <?= ($currentPage === 'about') ? 'active' : '' ?>">Tentang Kami</a></li>
          <li><a href="layanan.php" class="nav-link <?= ($currentPage === 'services') ? 'active' : '' ?>">Layanan / Program</a></li>
          <li><a href="portofolio.php" class="nav-link <?= ($currentPage === 'portfolio') ? 'active' : '' ?>">Portofolio / Klien</a></li>
          <li><a href="kontak.php" class="nav-link <?= ($currentPage === 'contact') ? 'active' : '' ?>">Kontak</a></li>
        </ul>
      </nav>

      <!-- Action Button CTA & Hamburger -->
      <div class="header-actions">
        <a href="https://wa.me/<?= $cleanWaNumber ?>?text=Halo%20SkillNusa,%20saya%20ingin%20konsultasi%20layanan%20IT%20system%20integrator" target="_blank" rel="noopener noreferrer" class="btn btn-outline btn-sm d-none-md" title="Chat WhatsApp Sales & Konsultasi">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
          WhatsApp
        </a>
        <a href="kontak.php" class="btn btn-primary btn-sm header-cta">Konsultasi Free</a>
        
        <!-- Hamburger Menu Button -->
        <button class="hamburger-btn" id="mobile-toggle-btn" aria-label="Buka Menu Navigasi" aria-expanded="false">
          <span class="ham-bar"></span>
          <span class="ham-bar"></span>
          <span class="ham-bar"></span>
        </button>
      </div>

    </div>
  </header>

  <!-- Mobile Drawer Menu -->
  <div class="mobile-drawer" id="mobile-drawer">
    <div class="drawer-header">
      <span class="brand-title">SKILL NUSA <span class="text-cyan">INFOTAMA</span></span>
      <button class="drawer-close-btn" id="drawer-close-btn" aria-label="Tutup Menu">&times;</button>
    </div>
    <ul class="drawer-menu">
      <li><a href="index.php" class="drawer-link <?= ($currentPage === 'home') ? 'active' : '' ?>">Beranda</a></li>
      <li><a href="tentang.php" class="drawer-link <?= ($currentPage === 'about') ? 'active' : '' ?>">Tentang Kami</a></li>
      <li><a href="layanan.php" class="drawer-link <?= ($currentPage === 'services') ? 'active' : '' ?>">Layanan / Program</a></li>
      <li><a href="portofolio.php" class="drawer-link <?= ($currentPage === 'portfolio') ? 'active' : '' ?>">Portofolio / Klien</a></li>
      <li><a href="kontak.php" class="drawer-link <?= ($currentPage === 'contact') ? 'active' : '' ?>">Kontak</a></li>
    </ul>
    <div class="drawer-footer">
      <a href="kontak.php" class="btn btn-primary btn-block mb-3">Konsultasi Free</a>
      <a href="https://wa.me/<?= $cleanWaNumber ?>" target="_blank" class="btn btn-outline btn-block">Hubungi via WhatsApp</a>
    </div>
  </div>
  <div class="drawer-backdrop" id="drawer-backdrop"></div>
