-- ==========================================================
-- PT SKILL NUSA INFOTAMA - DATABASE SCHEMA & SEED DATA
-- Version: 2.0 (PHP & MySQL Revamp)
-- Website: www.skillnusa.co.id
-- ==========================================================

CREATE DATABASE IF NOT EXISTS `skillnusa_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `skillnusa_db`;

-- 1. Tabel Konfigurasi / Pengaturan Situs
DROP TABLE IF EXISTS `site_settings`;
CREATE TABLE `site_settings` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `setting_key` VARCHAR(100) NOT NULL UNIQUE,
  `setting_value` TEXT NULL,
  `description` VARCHAR(255) NULL,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data Konfigurasi Situs
INSERT INTO `site_settings` (`setting_key`, `setting_value`, `description`) VALUES
('site_name', 'PT Skill Nusa Infotama', 'Nama Perusahaan Resmi'),
('site_tagline', 'Total Solution For Customer - Enterprise Network System Integrator & Data Center', 'Slogan Perusahaan'),
('company_address', 'Jl. Gajah No. 21, Kota Bandung, Jawa Barat 40264, Indonesia', 'Alamat Kantor Utama'),
('company_phone', '+6222-7318113', 'Nomor Telepon Kantor'),
('company_email', 'Support@skillnusa.co.id', 'Email Dukungan / Layanan'),
('company_whatsapp', '6282126642581', 'Nomor WhatsApp Hotline (tanpa tanda + atau spasi)'),
('company_maps_embed', 'https://maps.google.com/maps?q=Jl.+Gajah+No.+21,+Kota+Bandung,+Jawa+Barat+40264&t=&z=16&ie=UTF8&iwloc=&output=embed', 'URL Embed Google Maps'),
('hero_headline', 'Solusi Terintegrasi Jaringan Enterprise & Data Center', 'Headline Banner Utama'),
('hero_subheadline', 'PT Skill Nusa Infotama menghadirkan solusi total di bidang Network System Integration, Data Center, Managed Services (Sewa Perangkat IT), dan Konsultan Software sejak 1999.', 'Subheadline Banner Utama'),
('meta_description', 'PT Skill Nusa Infotama: Penyedia solusi Network Integration, Data Center, Managed Service sewa perangkat IT, Virtualisasi & Software Consultant di Indonesia sejak 1999.', 'SEO Meta Description');

-- 2. Tabel Layanan & Program
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(200) NOT NULL,
  `slug` VARCHAR(200) NOT NULL UNIQUE,
  `summary` VARCHAR(300) NOT NULL,
  `description` TEXT NOT NULL,
  `features` TEXT NULL,
  `icon` VARCHAR(100) NOT NULL DEFAULT 'server',
  `is_featured` TINYINT(1) NOT NULL DEFAULT 1,
  `display_order` INT NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data Layanan SkillNusa
INSERT INTO `services` (`title`, `slug`, `summary`, `description`, `features`, `icon`, `is_featured`, `display_order`) VALUES
('Data Center Solutions', 'data-center-turnkey', 'Pembangunan ruang data center berstandar enterprise dari arsitektur fisik hingga pemantauan real-time.', 'Solusi menyeluruh pembangunan dan modernisasi ruang data center mulai dari arsitektur sipil raised floor, sistem pendingin presisi (PAC), rack system, sistem pemadam kebakaran (FSS), hingga pemantauan lingkungan real-time (EMS).', 'Raised Floor & Fire Barrier Partition\nPrecision Air Conditioning (PAC Downflow/In-row)\nFire Suppression System (FM-200 / Novec 1230)\nEnvironment Monitoring System (EMS Leak & Temp)\nServer Rack 42U & Smart PDU Outlet', 'data-center', 1, 1),

('Infrastruktur Jaringan & Fiber Optic', 'infrastruktur-jaringan-fo', 'Perancangan topologi jaringan berkecepatan tinggi, fiber optic splicing, OTDR test, dan switching routing.', 'Layanan komprehensif rancang bangun jaringan data kabel terstruktur tembaga (Cat5e, Cat6, Cat6A) dan serat optik berkecepatan tinggi, penyambungan fusion splicing akurat, pengujian OTDR, serta instalasi perangkat enterprise Switch, Router, dan Next-Gen Firewall.', 'Instalasi & Splicing Kabel Fiber Optic\nPengujian & Sertifikasi Fluke OTDR\nStructured Cabling Cat6 / Cat6A\nCore Switch, Router & Wi-Fi Enterprise\nNext-Generation Firewall Security', 'network', 1, 2),

('Managed Service & IT Rental', 'managed-service-it-rental', 'Solusi sewa dan sewa-beli perangkat IT, kontrak pemeliharaan berkala, serta dukungan teknis on-site.', 'Layanan pemeliharaan sistem terpadu (Maintenance Contract) dengan jaminan SLA tinggi, serta skema Sewa / Sewa-Beli (Operating/Finance Lease) perangkat IT enterprise jangka menengah dan panjang untuk efisiensi belanja modal (CAPEX ke OPEX).', 'Sewa Laptop, PC Workstation & Server\nSistem Sewa-Beli (Lease-to-Own) Perangkat IT\nKontrak Pemeliharaan SLA Terjamin\nTechnical Support & Engineer On-Site 24/7\nPreventive & Corrective Maintenance', 'support', 1, 3),

('Power Equipment & UPS Enterprise', 'power-equipment-ups', 'Penyediaan, sizing daya, instalasi sistem kelistrikan khusus IT dan backup daya UPS tanpa jeda.', 'Solusi ketahanan catu daya komprehensif untuk peralatan mission-critical IT. Meliputi sizing perhitungan daya, instalasi dan peremajaan UPS online double-conversion, perakitan panel distribusi, grounding khusus IT, serta kabel distribusi daya standar industri.', 'Perhitungan Sizing & Instalasi UPS Online\nPreventive Maintenance & Penggantian Baterai\nPanel Distribusi Listrik & ATS\nSistem Grounding Khusus IT Equipment\nDistribusi Kabel Daya Standar Industri', 'power', 1, 4),

('Virtualization & Software Consultant', 'virtualization-software-consultant', 'Implementasi virtualisasi server, solusi backup pemulihan bencana, dan pengembangan software tailor-made.', 'Membantu transformasi digital perusahaan melalui konsolidasi server dengan platform virtualisasi, perancangan sistem backup & recovery otomatis, serta penyediaan dan pengembangan aplikasi kustom yang terintegrasi untuk kebutuhan manajerial.', 'Solusi Virtualisasi Server (VMware & Proxmox)\nSistem Disaster Recovery & Backup Terpadu\nPengembangan Software Tailor-Made Enterprise\nLisensi Resmi OS & Database (Linux, MS, Oracle, MySQL)\nIntegrasi API & Modifikasi Sistem Informasi', 'code', 0, 5),

('IT Hardware Devices & Office Peripherals', 'it-hardware-devices', 'Penyediaan perangkat keras komputasi enterprise: Server, PC Desktop, All-In-One, Printer, dan CCTV.', 'Penyediaan menyeluruh perangkat keras IT untuk skala perkantoran, korporasi swasta, BUMN, perguruan tinggi, hingga rumah sakit dengan garansi resmi dan dukungan purna jual profesional.', 'Enterprise Server & Micro Server\nPC Workstation & All-In-One High Spec\nBusiness Laptop & Ultrabook\nCCTV & Surveillance System Terintegrasi\nProjector & Smart Presentation Board', 'hardware', 0, 6);

-- 3. Tabel Portofolio & Klien
DROP TABLE IF EXISTS `portfolio`;
CREATE TABLE `portfolio` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `category` VARCHAR(100) NOT NULL,
  `client_name` VARCHAR(200) NOT NULL,
  `year` VARCHAR(10) NOT NULL,
  `image` VARCHAR(255) NULL,
  `description` TEXT NOT NULL,
  `display_order` INT NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data Portofolio
INSERT INTO `portfolio` (`title`, `category`, `client_name`, `year`, `image`, `description`, `display_order`) VALUES
('Pembangunan Data Center & Precision Cooling', 'Data Center', 'Instansi Pemerintahan Provinsi Jawa Barat', '2023', 'assets/hero-datacenter.jpg', 'Implementasi ruang data center baru meliputi raised floor 600m2, Precision AC downflow 2x40kW, sistem pencegah kebakaran FM-200, dan pemantauan suhu lingkungan EMS.', 1),
('Revitalisasi Jaringan Kampus & Fiber Optic Backbone', 'Jaringan', 'Perguruan Tinggi Terkemuka Bandung', '2023', 'assets/network-infra.jpg', 'Penggelaran kabel backbone fiber optic 10G antar-fakultas sepanjang 12 km, instalasi core switch redundant, dan deployment 150 titik access point Wi-Fi 6.', 2),
('Pengadaan & Managed Service 350 Unit Laptop Kantor', 'Managed Service', 'Korporasi Manufaktur Nasional', '2024', 'assets/enterprise-noc.jpg', 'Penyediaan sewa perangkat laptop bisnis dengan manajemen berkala, instalasi sistem terpusat, dan tim teknisi pendukung on-site berkala.', 3),
('Implementasi High-Availability UPS 120kVA & ATS Panel', 'Power Equipment', 'Rumah Sakit Umum Daerah', '2022', 'assets/hero-datacenter.jpg', 'Pemasangan UPS redundan modular 120kVA lengkap dengan Automatic Transfer Switch (ATS) untuk menjamin kelangsungan daya ruang server dan peralatan medis kritis.', 4),
('Modernisasi Server Virtualisasi & Disaster Recovery', 'Software & IT', 'BUMD Keuangan & Investasi', '2024', 'assets/network-infra.jpg', 'Migrasi server fisik ke lingkungan virtualisasi cluster terintegrasi storage SAN dengan replikasi otomatis ke secondary disaster recovery site.', 5);

-- 4. Tabel Testimoni
DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE `testimonials` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `client_name` VARCHAR(150) NOT NULL,
  `client_role` VARCHAR(150) NOT NULL,
  `company` VARCHAR(150) NOT NULL,
  `content` TEXT NOT NULL,
  `rating` INT NOT NULL DEFAULT 5,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `display_order` INT NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data Testimoni
INSERT INTO `testimonials` (`client_name`, `client_role`, `company`, `content`, `rating`, `is_active`, `display_order`) VALUES
('Bambang Sutrisno, S.T.', 'Head of IT Infrastructure', 'Perusahaan Manufaktur Otomotif', 'SkillNusa telah menjadi mitra tepercaya kami selama lebih dari 8 tahun. Solusi data center dan UPS backup yang dibangun bekerja tanpa gangguan, SLA respons teknisi sangat cepat.', 5, 1, 1),
('Dr. Ir. Hendra Gunawan', 'Direktur Sistem Informasi', 'Universitas Swasta Terakreditasi Unggul', 'Implementasi jaringan fiber optic antar-gedung dan Wi-Fi enterprise dari tim SkillNusa sangat rapi dan terdokumentasi dengan baik. Komunikasi tim engineer sangat komunikatif dan solutif.', 5, 1, 2),
('Siti Rahmawati, M.M.', 'General Manager Operasional', 'Lembaga Keuangan & Pembiayaan', 'Skema Managed Service sewa perangkat laptop dan maintenance contract dari SkillNusa sangat membantu efisiensi anggaran belanja IT kami. Penggantian unit bila ada kendala ditangani di hari yang sama.', 5, 1, 3);

-- 5. Tabel Statistik Pencapaian
DROP TABLE IF EXISTS `statistics`;
CREATE TABLE `statistics` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `stat_key` VARCHAR(50) NOT NULL UNIQUE,
  `stat_value` VARCHAR(50) NOT NULL,
  `stat_label` VARCHAR(100) NOT NULL,
  `icon` VARCHAR(50) NOT NULL DEFAULT 'award',
  `display_order` INT NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data Statistik
INSERT INTO `statistics` (`stat_key`, `stat_value`, `stat_label`, `icon`, `display_order`) VALUES
('years_experience', '25+', 'Tahun Pengalaman (Est. 1999)', 'calendar', 1),
('projects_completed', '500+', 'Proyek IT Berhasil Diselesaikan', 'check-circle', 2),
('enterprise_clients', '150+', 'Klien Korporasi & Instansi', 'building', 3),
('uptime_sla', '99.9%', 'Komitmen Kualitas & SLA Layanan', 'shield', 4);

-- 6. Tabel Pesan Masuk Formulir Kontak
DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE `contact_messages` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(150) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `phone` VARCHAR(50) NULL,
  `subject` VARCHAR(255) NOT NULL,
  `message` TEXT NOT NULL,
  `is_read` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Sample Data Pesan Kontak
INSERT INTO `contact_messages` (`name`, `email`, `phone`, `subject`, `message`, `is_read`) VALUES
('Rizky Pratama', 'rizky.pratama@enterprise.co.id', '081234567890', 'Konsultasi Penataan Ruang Data Center & PAC', 'Halo tim SkillNusa, kami berencana melakukan peremajaan ruang server kantor kami di kawasan Pasteur Bandung. Mohon info untuk jadwal survey dan estimasi solusi PAC & UPS.', 1),
('Dewi Anggraini', 'dewi.a@rsud-jabar.go.id', '085678901234', 'Pengadaan Sewa Perangkat PC & Laptop Kantor', 'Selamat siang, kami memerlukan penawaran sewa perangkat kerja laptop dan desktop 50 unit untuk masa sewa 2 tahun. Mohon hubungi kami melalui email atau nomor terlampir.', 0);

-- 7. Tabel Akun Administrator Panel
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `password_hash` VARCHAR(255) NOT NULL,
  `full_name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `last_login` DATETIME NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Default Admin: username 'admin', password 'admin123'
-- Hashed using password_hash('admin123', PASSWORD_BCRYPT)
INSERT INTO `admins` (`username`, `password_hash`, `full_name`, `email`) VALUES
('admin', '$2y$10$w09uV54j2T5lHw6M1oE06.i38hG3Q9b5bFmZ3aQ.kC17f.Z1UuUe.', 'Administrator SkillNusa', 'Support@skillnusa.co.id');
