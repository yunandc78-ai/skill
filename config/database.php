<?php
/**
 * PT SKILL NUSA INFOTAMA - DATABASE CONFIGURATION & DATA HELPERS
 * Architecture: PHP 8.x PDO with Resilient Fallback Mode
 * Website: www.skillnusa.co.id
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Konfigurasi Database MySQL
define('DB_HOST', '127.0.0.1');
define('DB_PORT', '3306');
define('DB_NAME', 'skillnusa_db');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

/**
 * Mendapatkan koneksi PDO MySQL.
 * Mengembalikan objek PDO jika berhasil, atau null jika MySQL belum aktif/terkonfigurasi.
 */
function getDbConnection(): ?PDO {
    static $pdo = null;
    static $attempted = false;

    if ($pdo !== null) {
        return $pdo;
    }

    if ($attempted) {
        return null;
    }

    $attempted = true;

    try {
        $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::ATTR_TIMEOUT            => 2,
        ];
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        return $pdo;
    } catch (PDOException $e) {
        // Log ke error log tanpa menghentikan eksekusi publik
        error_log("Database Connection Notice: " . $e->getMessage());
        return null;
    }
}

/**
 * Helper sanitasi input pengguna
 */
function sanitize(string $data): string {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

/**
 * Mengambil seluruh pengaturan situs (site_settings)
 */
function getSiteSettings(): array {
    $defaultSettings = [
        'site_name'          => 'PT Skill Nusa Infotama',
        'site_tagline'       => 'Total Solution For Customer - Enterprise Network System Integrator & Data Center',
        'company_address'    => 'Jl. Gajah No. 21, Kota Bandung, Jawa Barat 40264, Indonesia',
        'company_phone'      => '+6222-7318113',
        'company_email'      => 'Support@skillnusa.co.id',
        'company_whatsapp'   => '62811206820',
        'company_maps_embed' => 'https://maps.google.com/maps?q=Jl.+Gajah+No.+21,+Kota+Bandung,+Jawa+Barat+40264&t=&z=16&ie=UTF8&iwloc=&output=embed',
        'hero_headline'      => 'Solusi Terintegrasi Jaringan Enterprise & Data Center',
        'hero_subheadline'   => 'PT Skill Nusa Infotama menghadirkan solusi total di bidang Network System Integration, Data Center, Managed Services (Sewa Perangkat IT), dan Konsultan Software sejak 1999.',
        'meta_description'   => 'PT Skill Nusa Infotama: Solusi Network Integration, Data Center, Managed Service Sewa Perangkat IT & Software Consultant sejak 1999.'
    ];

    $db = getDbConnection();
    if (!$db) {
        return $defaultSettings;
    }

    try {
        $stmt = $db->query("SELECT setting_key, setting_value FROM site_settings");
        $dbSettings = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
        return array_merge($defaultSettings, $dbSettings ?: []);
    } catch (Exception $e) {
        return $defaultSettings;
    }
}

/**
 * Mengambil daftar layanan unggulan (featured) untuk Beranda
 */
function getFeaturedServices(int $limit = 4): array {
    $db = getDbConnection();
    if ($db) {
        try {
            $stmt = $db->prepare("SELECT * FROM services WHERE is_featured = 1 ORDER BY display_order ASC, id ASC LIMIT :limit");
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetchAll();
            if (!empty($data)) {
                return $data;
            }
        } catch (Exception $e) {}
    }

    // Fallback Seed Data
    return [
        [
            'id' => 1,
            'title' => 'Data Center Solutions',
            'slug' => 'data-center-turnkey',
            'summary' => 'Pembangunan ruang data center berstandar enterprise dari arsitektur fisik hingga pemantauan real-time.',
            'description' => 'Solusi menyeluruh pembangunan ruang data center mulai dari arsitektur sipil raised floor, sistem pendingin presisi (PAC), rack system, sistem pemadam kebakaran (FSS), hingga pemantauan lingkungan real-time (EMS).',
            'features' => "Raised Floor & Fire Barrier\nPrecision Air Conditioning (PAC)\nFire Suppression System FM-200\nEnvironment Monitoring System (EMS)\nServer Rack 42U & Smart PDU",
            'icon' => 'server'
        ],
        [
            'id' => 2,
            'title' => 'Infrastruktur Jaringan & Fiber Optic',
            'slug' => 'infrastruktur-jaringan-fo',
            'summary' => 'Perancangan topologi jaringan berkecepatan tinggi, fiber optic splicing, OTDR test, dan switching routing.',
            'description' => 'Layanan komprehensif rancang bangun jaringan data kabel terstruktur tembaga dan serat optik berkecepatan tinggi, fusion splicing presisi, sertifikasi OTDR, serta instalasi core switch & firewall.',
            'features' => "Instalasi & Splicing Fiber Optic\nSertifikasi Fluke OTDR Testing\nStructured Cabling Cat6 / Cat6A\nCore Switch, Router & Wi-Fi Enterprise\nNext-Gen Firewall Security",
            'icon' => 'network'
        ],
        [
            'id' => 3,
            'title' => 'Managed Service & IT Rental',
            'slug' => 'managed-service-it-rental',
            'summary' => 'Solusi sewa dan sewa-beli perangkat IT, kontrak pemeliharaan berkala, serta dukungan teknis on-site.',
            'description' => 'Layanan pemeliharaan sistem terpadu (Maintenance Contract) dengan jaminan SLA tinggi, serta skema Sewa / Sewa-Beli perangkat IT enterprise untuk efisiensi anggaran belanja modal.',
            'features' => "Sewa Laptop & PC Workstation Kantor\nSistem Sewa-Beli (Lease-to-Own) IT\nKontrak Pemeliharaan SLA Terjamin\nTechnical Support & Engineer On-Site\nPreventive & Corrective Maintenance",
            'icon' => 'support'
        ],
        [
            'id' => 4,
            'title' => 'Power Equipment & UPS Enterprise',
            'slug' => 'power-equipment-ups',
            'summary' => 'Penyediaan, sizing daya, instalasi sistem kelistrikan khusus IT dan backup daya UPS tanpa jeda.',
            'description' => 'Solusi ketahanan catu daya komprehensif untuk peralatan mission-critical IT. Meliputi perhitungan sizing daya, instalasi UPS online double-conversion, perakitan panel distribusi, dan grounding khusus.',
            'features' => "Sizing & Instalasi UPS Online Enterprise\nPreventive Maintenance & Penggantian Baterai\nPanel Distribusi Listrik & ATS\nSistem Grounding Khusus IT Equipment\nDistribusi Kabel Daya Standar Industri",
            'icon' => 'power'
        ]
    ];
}

/**
 * Mengambil semua daftar layanan
 */
function getAllServices(): array {
    $db = getDbConnection();
    if ($db) {
        try {
            $stmt = $db->query("SELECT * FROM services ORDER BY display_order ASC, id ASC");
            $data = $stmt->fetchAll();
            if (!empty($data)) {
                return $data;
            }
        } catch (Exception $e) {}
    }

    $featured = getFeaturedServices(10);
    $extra = [
        [
            'id' => 5,
            'title' => 'Virtualization & Software Consultant',
            'slug' => 'virtualization-software-consultant',
            'summary' => 'Implementasi virtualisasi server, solusi backup pemulihan bencana, dan pengembangan software tailor-made.',
            'description' => 'Membantu transformasi digital perusahaan melalui konsolidasi server dengan platform virtualisasi, perancangan sistem backup otomatis, serta lisensi resmi dan pembuatan software kustom.',
            'features' => "Solusi Virtualisasi Server (VMware & Proxmox)\nSistem Disaster Recovery & Backup Terpadu\nPengembangan Software Tailor-Made Enterprise\nLisensi Resmi OS & Database (Linux, MS, Oracle, MySQL)\nIntegrasi API & Modifikasi Sistem Informasi",
            'icon' => 'code'
        ],
        [
            'id' => 6,
            'title' => 'IT Hardware Devices & Office Peripherals',
            'slug' => 'it-hardware-devices',
            'summary' => 'Penyediaan perangkat keras komputasi enterprise: Server, PC Desktop, All-In-One, Printer, dan CCTV.',
            'description' => 'Penyediaan menyeluruh perangkat keras IT untuk skala perkantoran, korporasi swasta, BUMN, perguruan tinggi, hingga rumah sakit dengan garansi resmi dan dukungan purna jual profesional.',
            'features' => "Enterprise Server & Micro Server\nPC Workstation & All-In-One High Spec\nBusiness Laptop & Ultrabook\nCCTV & Surveillance System Terintegrasi\nProjector & Smart Presentation Board",
            'icon' => 'hardware'
        ]
    ];
    return array_merge($featured, $extra);
}

/**
 * Mengambil satu layanan berdasarkan slug
 */
function getServiceBySlug(string $slug): ?array {
    $services = getAllServices();
    foreach ($services as $srv) {
        if ($srv['slug'] === $slug) {
            return $srv;
        }
    }
    return null;
}

/**
 * Mengambil data portofolio
 */
function getPortfolioItems(int $limit = 6): array {
    $db = getDbConnection();
    if ($db) {
        try {
            $stmt = $db->prepare("SELECT * FROM portfolio ORDER BY display_order ASC, id ASC LIMIT :limit");
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetchAll();
            if (!empty($data)) {
                return $data;
            }
        } catch (Exception $e) {}
    }

    return [
        [
            'title' => 'Pembangunan Turnkey Data Center & Precision Cooling',
            'category' => 'Data Center',
            'client_name' => 'Instansi Pemerintahan Provinsi Jawa Barat',
            'year' => '2023',
            'image' => 'assets/hero-datacenter.jpg',
            'description' => 'Implementasi ruang data center baru meliputi raised floor 600m2, Precision AC downflow 2x40kW, sistem pencegah kebakaran FM-200, dan pemantauan suhu lingkungan EMS.'
        ],
        [
            'title' => 'Revitalisasi Jaringan Kampus & Fiber Optic Backbone',
            'category' => 'Jaringan',
            'client_name' => 'Perguruan Tinggi Terkemuka Bandung',
            'year' => '2023',
            'image' => 'assets/network-infra.jpg',
            'description' => 'Penggelaran kabel backbone fiber optic 10G antar-fakultas sepanjang 12 km, instalasi core switch redundant, dan deployment 150 titik access point Wi-Fi 6.'
        ],
        [
            'title' => 'Pengadaan & Managed Service 350 Unit Laptop Kantor',
            'category' => 'Managed Service',
            'client_name' => 'Korporasi Manufaktur Nasional',
            'year' => '2024',
            'image' => 'assets/enterprise-noc.jpg',
            'description' => 'Penyediaan sewa perangkat laptop bisnis dengan manajemen berkala, instalasi sistem terpusat, dan tim teknisi pendukung on-site berkala.'
        ],
        [
            'title' => 'Implementasi High-Availability UPS 120kVA & ATS Panel',
            'category' => 'Power Equipment',
            'client_name' => 'Rumah Sakit Umum Daerah',
            'year' => '2022',
            'image' => 'assets/hero-datacenter.jpg',
            'description' => 'Pemasangan UPS redundan modular 120kVA lengkap dengan Automatic Transfer Switch (ATS) untuk menjamin kelangsungan daya ruang server dan peralatan medis kritis.'
        ],
        [
            'title' => 'Modernisasi Server Virtualisasi & Disaster Recovery',
            'category' => 'Software & IT',
            'client_name' => 'BUMD Keuangan & Investasi',
            'year' => '2024',
            'image' => 'assets/network-infra.jpg',
            'description' => 'Migrasi server fisik ke lingkungan virtualisasi cluster terintegrasi storage SAN dengan replikasi otomatis ke secondary disaster recovery site.'
        ]
    ];
}

/**
 * Mengambil data testimoni
 */
function getTestimonials(): array {
    $db = getDbConnection();
    if ($db) {
        try {
            $stmt = $db->query("SELECT * FROM testimonials WHERE is_active = 1 ORDER BY display_order ASC, id ASC");
            $data = $stmt->fetchAll();
            if (!empty($data)) {
                return $data;
            }
        } catch (Exception $e) {}
    }

    return [
        [
            'client_name' => 'Bambang Sutrisno, S.T.',
            'client_role' => 'Head of IT Infrastructure',
            'company' => 'Perusahaan Manufaktur Otomotif',
            'content' => 'SkillNusa telah menjadi mitra tepercaya kami selama lebih dari 8 tahun. Solusi turnkey data center dan UPS backup yang dibangun bekerja tanpa gangguan, SLA respons teknisi sangat cepat.',
            'rating' => 5
        ],
        [
            'client_name' => 'Dr. Ir. Hendra Gunawan',
            'client_role' => 'Direktur Sistem Informasi',
            'company' => 'Universitas Swasta Terakreditasi Unggul',
            'content' => 'Implementasi jaringan fiber optic antar-gedung dan Wi-Fi enterprise dari tim SkillNusa sangat rapi dan terdokumentasi dengan baik. Komunikasi tim engineer sangat komunikatif dan solutif.',
            'rating' => 5
        ],
        [
            'client_name' => 'Siti Rahmawati, M.M.',
            'client_role' => 'General Manager Operasional',
            'company' => 'Lembaga Keuangan & Pembiayaan',
            'content' => 'Skema Managed Service sewa perangkat laptop dan maintenance contract dari SkillNusa sangat membantu efisiensi anggaran belanja IT kami. Penggantian unit bila ada kendala ditangani di hari yang sama.',
            'rating' => 5
        ]
    ];
}

/**
 * Mengambil data statistik angka pencapaian
 */
function getStatistics(): array {
    $db = getDbConnection();
    if ($db) {
        try {
            $stmt = $db->query("SELECT * FROM statistics ORDER BY display_order ASC, id ASC");
            $data = $stmt->fetchAll();
            if (!empty($data)) {
                return $data;
            }
        } catch (Exception $e) {}
    }

    return [
        ['stat_key' => 'years', 'stat_value' => '25+', 'stat_label' => 'Tahun Pengalaman (Est. 1999)', 'icon' => 'calendar'],
        ['stat_key' => 'projects', 'stat_value' => '500+', 'stat_label' => 'Proyek IT Sukses Dikerjakan', 'icon' => 'check-circle'],
        ['stat_key' => 'clients', 'stat_value' => '150+', 'stat_label' => 'Klien Korporat & Lembaga', 'icon' => 'building'],
        ['stat_key' => 'sla', 'stat_value' => '99.9%', 'stat_label' => 'Komitmen Uptime & SLA Layanan', 'icon' => 'shield']
    ];
}

/**
 * Menyimpan pesan kontak dari form pengunjung
 */
function saveContactMessage(string $name, string $email, string $phone, string $subject, string $message): bool {
    $db = getDbConnection();
    if (!$db) {
        // Fallback: simpan ke file log teks jika MySQL sedang offline
        $logFile = __DIR__ . '/../contact_messages_backup.log';
        $entry = sprintf(
            "[%s] Name: %s | Email: %s | Phone: %s | Subject: %s | Message: %s\n",
            date('Y-m-d H:i:s'),
            $name,
            $email,
            $phone,
            $subject,
            str_replace(["\r", "\n"], ' ', $message)
        );
        file_put_contents($logFile, $entry, FILE_APPEND | LOCK_EX);
        return true;
    }

    try {
        $stmt = $db->prepare("INSERT INTO contact_messages (name, email, phone, subject, message, is_read, created_at) VALUES (:name, :email, :phone, :subject, :message, 0, NOW())");
        return $stmt->execute([
            ':name'    => $name,
            ':email'   => $email,
            ':phone'   => $phone,
            ':subject' => $subject,
            ':message' => $message
        ]);
    } catch (Exception $e) {
        error_log("Failed to insert contact message: " . $e->getMessage());
        return false;
    }
}
