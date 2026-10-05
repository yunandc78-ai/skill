<?php
/**
 * PT SKILL NUSA INFOTAMA - LAYANAN & PROGRAM LENGKAP
 * Website: www.skillnusa.co.id
 */

require_once __DIR__ . '/config/database.php';

$currentPage = 'services';
$siteSettings = getSiteSettings();
$pageTitle = 'Layanan & Program Solusi IT Terintegrasi';
$pageDescription = 'Katalog lengkap layanan PT Skill Nusa Infotama: Data Center, Jaringan Fiber Optic, Managed Service Sewa IT, Power UPS Enterprise, dan Software Consultant.';

$services = getAllServices();
$cleanWaNumber = preg_replace('/[^0-9]/', '', $siteSettings['company_whatsapp'] ?? '62811206820');

include __DIR__ . '/includes/header.php';
?>

<!-- Page Banner Header -->
<section class="page-banner">
  <div class="container text-center">
    <span class="badge-tag">Katalog Solusi Menyeluruh</span>
    <h1 class="page-banner-title">Layanan & Program Solusi IT</h1>
    <p class="page-banner-desc">
      Menjawab kebutuhan transformasi digital perusahaan Anda dengan perangkat keras berstandar internasional, integrasi sistem profesional, serta komitmen SLA terpercaya.
    </p>
  </div>
</section>

<!-- Layanan Main Content -->
<section class="section">
  <div class="container">
    
    <!-- Filter Bar / Quick Anchor Links -->
    <div class="service-category-nav">
      <a href="#data-center-turnkey" class="category-pill active">Data Center</a>
      <a href="#infrastruktur-jaringan-fo" class="category-pill">Jaringan & FO</a>
      <a href="#managed-service-it-rental" class="category-pill">Managed Service & Sewa</a>
      <a href="#power-equipment-ups" class="category-pill">Power Equipment & UPS</a>
      <a href="#virtualization-software-consultant" class="category-pill">Virtualisasi & Software</a>
      <a href="#it-hardware-devices" class="category-pill">IT Hardware Devices</a>
    </div>

    <!-- Daftar Detail Layanan -->
    <div class="services-detail-list">

      <!-- 1. Data Center Solutions -->
      <article class="service-detail-card" id="data-center-turnkey">
        <div class="service-card-header">
          <div class="service-badge-icon">
            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>
          </div>
          <div>
            <span class="service-cat-label">Pilar Solusi 01</span>
            <h2 class="service-detail-title">Data Center Infrastructure</h2>
          </div>
        </div>
        <p class="service-detail-lead">
          Solusi terpadu pembangunan ruang data center modern berstandar internasional (TIA-942), mulai dari pekerjaan arsitektur sipil, instalasi sistem pendingin presisi, rak server high-density, hingga sistem proteksi kebakaran dan monitoring terpusat.
        </p>

        <div class="service-detail-grid">
          <div class="feature-box">
            <h4>Ruang Lingkup Pekerjaan:</h4>
            <ul class="check-list">
              <li><strong>Sistem Pendingin (Cooling):</strong> Precision Air Conditioning (PAC) sistem Downflow, Uplow, dan In-Row AC dengan efisiensi energi tinggi.</li>
              <li><strong>Pekerjaan Sipil Data Center:</strong> Raised Floor anti-statis kalsium sulfat, partisi kedap api (Fire Barrier), plafon akustik tahan api, dan jalur cable tray.</li>
              <li><strong>Sistem Proteksi Kebakaran (FSS):</strong> Total flooding clean agent FM-200, Novec 1230, CO2 dengan smoke detector sensitivitas tinggi (VESDA).</li>
              <li><strong>Monitoring Terpusat (EMS):</strong> Environment Monitoring System untuk deteksi kebocoran air (water leak), suhu, kelembaban, dan status pintu.</li>
              <li><strong>Rack System:</strong> Enclosure 42U/45U, Smart PDU berdaya terukur, cable management organizer, dan KVM switch over IP.</li>
            </ul>
          </div>
          <div class="cta-sidebar-box">
            <div class="cta-box-inner">
              <span class="cta-box-badge">Rekomendasi Enterprise</span>
              <h3>Butuh Perancangan Data Center?</h3>
              <p>Tim engineer kami siap melakukan site survey, audit kelayakan beban ruangan, dan menyusun BoQ teknis detail.</p>
              <div class="cta-actions">
                <a href="https://wa.me/<?= $cleanWaNumber ?>?text=Halo%20SkillNusa,%20saya%20ingin%20konsultasi%20layanan%20Data%20Center" target="_blank" class="btn btn-primary btn-block mb-2">Konsultasi via WhatsApp</a>
                <a href="kontak.php?layanan=Data+Center" class="btn btn-outline btn-block">Kirim Permintaan (RFP)</a>
              </div>
            </div>
          </div>
        </div>
      </article>

      <!-- 2. Data Cable & Network Infrastructure -->
      <article class="service-detail-card" id="infrastruktur-jaringan-fo">
        <div class="service-card-header">
          <div class="service-badge-icon">
            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="16" y="16" width="6" height="6" rx="1"></rect><rect x="2" y="16" width="6" height="6" rx="1"></rect><rect x="9" y="2" width="6" height="6" rx="1"></rect><path d="M5 16v-3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3"></path><path d="M12 12V8"></path></svg>
          </div>
          <div>
            <span class="service-cat-label">Pilar Solusi 02</span>
            <h2 class="service-detail-title">Infrastruktur Jaringan & Kabel Fiber Optic</h2>
          </div>
        </div>
        <p class="service-detail-lead">
          Penyediaan arsitektur jaringan lokal (LAN) maupun antar-gedung (Campus Backbone) dengan kehandalan tinggi, didukung penarikan serat optik presisi, sertifikasi OTDR, serta instalasi perangkat aktif Switch dan Firewall.
        </p>

        <div class="service-detail-grid">
          <div class="feature-box">
            <h4>Ruang Lingkup Pekerjaan:</h4>
            <ul class="check-list">
              <li><strong>Fiber Optic Infrastructure:</strong> Penarikan kabel udara (aerial) dan bawah tanah (duct), fusion splicing berkehilangan rendah (< 0.02 dB), terminasi ODF/OTB.</li>
              <li><strong>Pengujian & Sertifikasi:</strong> Uji redaman dan kontinuitas menggunakan Optical Time Domain Reflectometer (OTDR) dan sertifikasi Fluke DSX.</li>
              <li><strong>Structured Cabling System:</strong> Penggelaran kabel tembaga UTP/FTP Cat5e, Cat6, dan Cat6A bersertifikasi standar EIA/TIA 568-C.</li>
              <li><strong>Perangkat Aktif Enterprise:</strong> Core, Distribution & Access Switch (Cisco, Fortinet, HPE/Aruba, Mikrotik).</li>
              <li><strong>Next-Gen Firewall (NGFW):</strong> Konfigurasi keamanan perimeter jaringan terpusat dan VPN antarkantor cabang.</li>
            </ul>
          </div>
          <div class="cta-sidebar-box">
            <div class="cta-box-inner">
              <span class="cta-box-badge">High Speed Network</span>
              <h3>Optimalkan Kecepatan Jaringan</h3>
              <p>Tingkatkan kapasitas bandwidth dan stabilitas konektivitas antar-kantor Anda dengan backbone fiber optic profesional.</p>
              <div class="cta-actions">
                <a href="https://wa.me/<?= $cleanWaNumber ?>?text=Halo%20SkillNusa,%20saya%20tertarik%20dengan%20layanan%20Infrastruktur%20Jaringan%20dan%20Fiber%20Optic" target="_blank" class="btn btn-primary btn-block mb-2">Konsultasi via WhatsApp</a>
                <a href="kontak.php?layanan=Jaringan+dan+Fiber+Optic" class="btn btn-outline btn-block">Pesan / Survey Lokasi</a>
              </div>
            </div>
          </div>
        </div>
      </article>

      <!-- 3. Managed Service & Sewa Perangkat IT -->
      <article class="service-detail-card" id="managed-service-it-rental">
        <div class="service-card-header">
          <div class="service-badge-icon">
            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
          </div>
          <div>
            <span class="service-cat-label">Pilar Solusi 03</span>
            <h2 class="service-detail-title">Managed Service (Sewa & Sewa-Beli Perangkat IT)</h2>
          </div>
        </div>
        <p class="service-detail-lead">
          Solusi cerdas bagi perusahaan yang menginginkan efisiensi operasional dengan mengalihkan beban belanja modal (CAPEX) menjadi biaya operasional (OPEX) terencana, didukung jaminan SLA dan teknisi pengganti unit langsung.
        </p>

        <div class="service-detail-grid">
          <div class="feature-box">
            <h4>Ruang Lingkup Layanan:</h4>
            <ul class="check-list">
              <li><strong>Sewa & Sewa-Beli (Rental & Lease-to-Own):</strong> Penyediaan laptop bisnis, workstation desktop, server, dan printer untuk durasi 1 hingga 5 tahun.</li>
              <li><strong>SLA Penggantian Unit Cepat:</strong> Bila terjadi kerusakan perangkat keras, unit pengganti (backup unit) disiapkan agar alur kerja kantor tidak terhenti.</li>
              <li><strong>Kontrak Pemeliharaan (Maintenance Contract):</strong> Pemeliharaan berkala secara preventif (pembersihan debu, update bios/firmware) dan kuratif on-site.</li>
              <li><strong>Dedicated Support Engineer:</strong> Opsi penempatan teknisi standby di lokasi klien untuk penanganan tiket IT harian.</li>
              <li><strong>Standardized OS & Software Deployment:</strong> Kloning dan instalasi sistem terpusat sesuai standar keamanan korporasi Anda.</li>
            </ul>
          </div>
          <div class="cta-sidebar-box">
            <div class="cta-box-inner">
              <span class="cta-box-badge">Efisiensi Anggaran</span>
              <h3>Hemat Pengeluaran CAPEX Kantor</h3>
              <p>Dapatkan penawaran sewa perangkat IT berkualitas tinggi dengan skema pembayaran bulanan atau tahunan fleksibel.</p>
              <div class="cta-actions">
                <a href="https://wa.me/<?= $cleanWaNumber ?>?text=Halo%20SkillNusa,%20kami%20ingin%20meminta%20penawaran%20Sewa%20Laptop%20dan%20Managed%20Service%20IT" target="_blank" class="btn btn-primary btn-block mb-2">Minta Penawaran Sewa</a>
                <a href="kontak.php?layanan=Managed+Service+dan+Sewa" class="btn btn-outline btn-block">Ajukan Jumlah Kebutuhan</a>
              </div>
            </div>
          </div>
        </div>
      </article>

      <!-- 4. Power Equipment & UPS Enterprise -->
      <article class="service-detail-card" id="power-equipment-ups">
        <div class="service-card-header">
          <div class="service-badge-icon">
            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
          </div>
          <div>
            <span class="service-cat-label">Pilar Solusi 04</span>
            <h2 class="service-detail-title">Power Equipment & UPS Enterprise</h2>
          </div>
        </div>
        <p class="service-detail-lead">
          Peralatan IT mission-critical membutuhkan stabilitas daya tanpa toleransi kedip (zero transfer time). Kami menyediakan solusi catu daya bebas gangguan terintegrasi dari gardu panel hingga ke stopkontak rak server.
        </p>

        <div class="service-detail-grid">
          <div class="feature-box">
            <h4>Ruang Lingkup Pekerjaan:</h4>
            <ul class="check-list">
              <li><strong>UPS Sizing & Load Analysis:</strong> Analisis kalkulasi beban daya total, power factor, dan waktu cadangan (runtime) baterai yang akurat.</li>
              <li><strong>Instalasi UPS Online Double-Conversion:</strong> Mulai dari kapasitas 1kVA hingga ratusan kVA dengan arsitektur paralel redundan N+1.</li>
              <li><strong>Preventive Maintenance UPS:</strong> Uji kapasitas baterai dengan battery tester, kalibrasi charging, dan penggantian bank baterai VRLA.</li>
              <li><strong>Panel Distribusi Listrik & ATS:</strong> Desain dan perakitan Panel Distribusi Daya (PDB), Automatic Transfer Switch (ATS), dan Surge Arrester.</li>
              <li><strong>Sistem Grounding Khusus IT:</strong> Instalasi pembumian dengan nilai resistansi rendah (< 1 Ohm) untuk perlindungan surge petir.</li>
            </ul>
          </div>
          <div class="cta-sidebar-box">
            <div class="cta-box-inner">
              <span class="cta-box-badge">Zero Downtime</span>
              <h3>Lindungi Aset Server dari Gangguan Listrik</h3>
              <p>Konsultasikan kapasitas UPS yang tepat bersama engineer kelistrikan berpengalaman kami.</p>
              <div class="cta-actions">
                <a href="https://wa.me/<?= $cleanWaNumber ?>?text=Halo%20SkillNusa,%20kami%20ingin%20konsultasi%20mengenai%20UPS%20dan%20Power%20Equipment" target="_blank" class="btn btn-primary btn-block mb-2">Konsultasi UPS via WA</a>
                <a href="kontak.php?layanan=Power+Equipment+dan+UPS" class="btn btn-outline btn-block">Jadwalkan Survey Daya</a>
              </div>
            </div>
          </div>
        </div>
      </article>

      <!-- 5. Virtualization & Software Consultant -->
      <article class="service-detail-card" id="virtualization-software-consultant">
        <div class="service-card-header">
          <div class="service-badge-icon">
            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
          </div>
          <div>
            <span class="service-cat-label">Pilar Solusi 05</span>
            <h2 class="service-detail-title">Virtualisasi, Backup & Konsultan Software</h2>
          </div>
        </div>
        <p class="service-detail-lead">
          Optimalisasi utilisasi server fisik dengan teknologi virtualisasi, perlindungan data terhadap serangan ransomware melalui backup terenkripsi, serta pembuatan sistem aplikasi yang dirancang khusus sesuai alur kerja perusahaan.
        </p>

        <div class="service-detail-grid">
          <div class="feature-box">
            <h4>Ruang Lingkup Pekerjaan:</h4>
            <ul class="check-list">
              <li><strong>Virtualisasi Server Enterprise:</strong> Konfigurasi cluster VMware vSphere, Proxmox VE, dan Microsoft Hyper-V dengan fitur High Availability.</li>
              <li><strong>Sistem Backup & Disaster Recovery:</strong> Solusi backup otomatis snapshot harian, immutable backup anti-ransomware (Veeam / Synology).</li>
              <li><strong>Software Tailor-Made Enterprise:</strong> Pembuatan aplikasi manajemen internal, portal pendaftaran, sistem inventarisasi berbasis web & database.</li>
              <li><strong>Lisensi Resmi Software:</strong> Pengadaan lisensi Microsoft Windows Server, Office 365, Oracle DB, Linux Enterprise, dan Antivirus Endpoint.</li>
              <li><strong>Konsultasi & Audit Sistem IT:</strong> Evaluasi arsitektur sistem informasi dan rekomendasi peningkatan efisiensi data.</li>
            </ul>
          </div>
          <div class="cta-sidebar-box">
            <div class="cta-box-inner">
              <span class="cta-box-badge">Digital Transformation</span>
              <h3>Butuh Software atau Virtualisasi?</h3>
              <p>Diskusikan kebutuhan aplikasi kustom atau rencana migrasi server fisik Anda bersama konsultan kami.</p>
              <div class="cta-actions">
                <a href="https://wa.me/<?= $cleanWaNumber ?>?text=Halo%20SkillNusa,%20kami%20ingin%20konsultasi%20Virtualisasi%20dan%20Software" target="_blank" class="btn btn-primary btn-block mb-2">Diskusi Software via WA</a>
                <a href="kontak.php?layanan=Software+dan+Virtualisasi" class="btn btn-outline btn-block">Kirim Brief Kebutuhan</a>
              </div>
            </div>
          </div>
        </div>
      </article>

      <!-- 6. IT Hardware Devices & Office Peripherals -->
      <article class="service-detail-card" id="it-hardware-devices">
        <div class="service-card-header">
          <div class="service-badge-icon">
            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
          </div>
          <div>
            <span class="service-cat-label">Pilar Solusi 06</span>
            <h2 class="service-detail-title">IT Hardware Devices & Office Peripherals</h2>
          </div>
        </div>
        <p class="service-detail-lead">
          Penyediaan lengkap unit perangkat keras komputasi enterprise untuk kantor, sekolah, universitas, rumah sakit, dan lembaga pemerintahan dengan garansi resmi prinsipal dan instalasi siap pakai.
        </p>

        <div class="service-detail-grid">
          <div class="feature-box">
            <h4>Ruang Lingkup Produk:</h4>
            <ul class="check-list">
              <li><strong>Enterprise Server:</strong> Rackmount Server, Tower Server, Hyper-Converged Infrastructure (Dell PowerEdge, HPE ProLiant, Lenovo).</li>
              <li><strong>Client Computing:</strong> Business Laptop, Workstation PC, All-In-One (AIO) Desktop untuk kebutuhan operasional maupun grafis berat.</li>
              <li><strong>Surveillance & Security:</strong> IP CCTV kamera resolusi tinggi, NVR storage, Door Access Control sidik jari/kartu RFID.</li>
              <li><strong>Office Display & Presentation:</strong> Proyektor laser high-lumens, Interactive Smart Board display untuk ruang rapat eksekutif.</li>
              <li><strong>Perangkat Cetak & Aksesoris:</strong> Network Multifunction Printer, Scanner berkecepatan tinggi, dan kelengkapan IT lainnya.</li>
            </ul>
          </div>
          <div class="cta-sidebar-box">
            <div class="cta-box-inner">
              <span class="cta-box-badge">Garansi Resmi Prinsipal</span>
              <h3>Pengadaan Perangkat Hardware</h3>
              <p>Minta katalog harga khusus pengadaan korporasi atau paket pengadaan kantor lengkap.</p>
              <div class="cta-actions">
                <a href="https://wa.me/<?= $cleanWaNumber ?>?text=Halo%20SkillNusa,%20kami%20ingin%20meminta%20katalog%20dan%20harga%20Pengadaan%20Hardware%20IT" target="_blank" class="btn btn-primary btn-block mb-2">Minta Brosur & Harga</a>
                <a href="kontak.php?layanan=Pengadaan+Hardware+IT" class="btn btn-outline btn-block">Kirim Daftar Kebutuhan</a>
              </div>
            </div>
          </div>
        </div>
      </article>

    </div>

  </div>
</section>

<!-- Banner Layanan Custom -->
<section class="section section-cta-banner">
  <div class="container">
    <div class="cta-banner-box">
      <div class="cta-banner-content">
        <h2 class="cta-banner-title">Punya Kebutuhan Spesifik di Luar Daftar?</h2>
        <p class="cta-banner-desc">
          Kami siap merancang solusi *tailor-made* yang disesuaikan dengan arsitektur, anggaran, dan skala bisnis Anda.
        </p>
      </div>
      <div class="cta-banner-buttons">
        <a href="kontak.php" class="btn btn-primary btn-lg">Jadwalkan Diskusi Teknis</a>
        <a href="https://wa.me/<?= $cleanWaNumber ?>?text=Halo%20SkillNusa,%20saya%20punya%20kebutuhan%20khusus%20solusi%20IT" target="_blank" class="btn btn-outline btn-lg">Chat WhatsApp Langsung</a>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
