/**
 * PT SKILL NUSA INFOTAMA - Enterprise Web Application Core Script
 * Version: 2.0 (Revamped 2026)
 * Features:
 * - Bilingual Support (Bahasa Indonesia & English)
 * - Dark / Light Mode Theme Switching with LocalStorage
 * - Tabbed Interactive Solutions Matrix
 * - Interactive IT Solution Configurator & Timeline Estimator
 * - Animated Metric Counters with IntersectionObserver
 * - Accordion FAQs
 * - Interactive RFP / Contact Form with Live Toast & Direct WhatsApp bridge
 * - Responsive Drawer Navigation
 */

// --- Bilingual Dictionary ---
const translations = {
  id: {
    nav_home: "Beranda",
    nav_solutions: "Solusi & Layanan",
    nav_configurator: "Solusi Konfigurasi",
    nav_industries: "Sektor Industri",
    nav_about: "Tentang Kami",
    nav_contact: "Hubungi Kami",
    nav_cta: "Konsultasi Free",

    hero_badge: "Leading IT System Integrator Sejak 1999",
    hero_title: "Solusi Terintegrasi Infrastruktur Jaringan & Data Center Enterprise",
    hero_lead: "PT Skill Nusa Infotama menghadirkan solusi total di bidang Network System Integration, Data Center, Managed Services (Sewa & Sewa Beli), dan Software Consultant berstandar enterprise.",
    hero_btn_explore: "Jelajahi Solusi",
    hero_btn_rfp: "Ajukan Kebutuhan (RFP)",

    stat_years: "Tahun Pengalaman",
    stat_projects: "Proyek Selesai",
    stat_sla: "Uptime SLA Support",
    stat_clients: "Mitra Korporasi & Instansi",

    partners_title: "Ekosistem Teknologi & Aliansi Strategis Multi-Vendor",

    solutions_badge: "Portfolio Layanan Komprehensif",
    solutions_title: "Solusi Terpadu Menjawab Tantangan Transformasi Digital",
    solutions_lead: "Dari perancangan infrastruktur fisik data center hingga pengembangan perangkat lunak khusus, kami menghadirkan 'Total Solution For Customer'.",

    tab_datacenter: "Data Center & Server",
    tab_network: "Jaringan & Fiber Optic",
    tab_managed: "Managed Service & Sewa",
    tab_virtualization: "Virtualisasi & Storage",
    tab_software: "Software & Konsultan",
    tab_power: "Sistem Daya & UPS",

    sol_dc_title: "Data Center & Server Infrastructure",
    sol_dc_desc: "Solusi menyeluruh pembangunan dan modernisasi ruang data center mulai dari arsitektur sipil raised floor, sistem pendingin presisi (PAC), rack system, sistem pemadam kebakaran (FSS), hingga pemantauan lingkungan real-time (EMS).",
    sol_dc_f1: "Enterprise Servers (Micro Server & High-Density Rack Servers)",
    sol_dc_f2: "Precision Air Conditioning (PAC: Uplow, Downflow & In-Row)",
    sol_dc_f3: "Fire Suppression System (FM-200, Novec 1230, Inergen)",
    sol_dc_f4: "Environment Monitoring System (Suhu, Kelembaban, Water Leak)",
    sol_dc_f5: "Raised Floor, Partisi Anti-Api & Cable Tray Distribution",
    sol_dc_f6: "PDU Cerdas, Server Rack 42U & Cable Management System",

    sol_net_title: "Infrastruktur Jaringan & Kabel Fiber Optic",
    sol_net_desc: "Perancangan topologi jaringan berkecepatan tinggi, instalasi kabel terstruktur tembaga dan serat optik, penyambungan splicing, sertifikasi OTDR, hingga implementasi switch core, routing, dan firewall generasi terbaru.",
    sol_net_f1: "Kabel Struktur Cat 5e, Cat 6, Cat 6A & Cat 7 Industrial",
    sol_net_f2: "Penyambungan Fiber Optic Splicing & Pengujian Presisi OTDR",
    sol_net_f3: "Enterprise Core Switch, Distribution & Access Layer",
    sol_net_f4: "Next-Generation Firewall (NGFW) & Unified Threat Management",
    sol_net_f5: "Enterprise Wi-Fi 6/7 Controller-based & Outdoor Mesh",
    sol_net_f6: "SD-WAN & Multi-Branch Interconnection Architecture",

    sol_mgd_title: "Managed Service & Sewa / Sewa Beli Perangkat IT",
    sol_mgd_desc: "Optimalkan belanja modal (CapEx menjadi OpEx) dengan program sewa atau sewa beli perangkat IT untuk jangka menengah dan panjang, didukung kontrak pemeliharaan berkala dan teknisi on-site siaga.",
    sol_mgd_f1: "Sewa / Sewa Beli Notebook, All-in-One PC & Workstation",
    sol_mgd_f2: "Sewa Perangkat Server & Storage Enterprise Skalabel",
    sol_mgd_f3: "Maintenance Contract dengan SLA Terjamin hingga 24/7",
    sol_mgd_f4: "Preventive Maintenance Rutin & Penggantian Unit Cepat",
    sol_mgd_f5: "Dukungan Teknisi Khusus (Resident On-site Engineer)",
    sol_mgd_f6: "Manajemen Siklus Hidup Aset (Lifecycle Asset Management)",

    sol_virt_title: "Virtualisasi, Enterprise Storage & Backup Recovery",
    sol_virt_desc: "Tingkatkan efisiensi komputasi bisnis Anda melalui konsolidasi server tervirtualisasi, arsitektur Hyper-Converged Infrastructure (HCI), penyimpanan terpusat NAS/SAN, serta disaster recovery anti-ransomware.",
    sol_virt_f1: "Solusi Virtualisasi Enterprise (VMware vSphere, Proxmox, Hyper-V)",
    sol_virt_f2: "Arsitektur Hyper-Converged Infrastructure (HCI)",
    sol_virt_f3: "Enterprise SAN / NAS Storage High Availability",
    sol_virt_f4: "Tape Backup & Immutable Cloud / On-Premise Repository",
    sol_virt_f5: "Disaster Recovery Planning (DRP) & RPO/RTO Minimal",
    sol_virt_f6: "Migrasi Beban Kerja (Workload Migration) Bebas Downtime",

    sol_soft_title: "Software Consultant & Custom Tailor-Made Development",
    sol_soft_desc: "Kami mendampingi transformasi sistem perangkat lunak Anda, mulai dari konsultasi arsitektur aplikasi, pengadaan lisensi resmi (Microsoft, Oracle, RedHat), hingga perancangan aplikasi khusus operasional bisnis.",
    sol_soft_f1: "Pengembangan Tailor-Made Apps (Web & Mobile Enterprise)",
    sol_soft_f2: "Konsultasi & Perancangan Arsitektur Basis Data (Oracle, MySQL, PostgreSQL)",
    sol_soft_f3: "Lisensi Resmi Microsoft Windows Server, Office 365, CAL",
    sol_soft_f4: "Solusi Open-Source Enterprise Linux (RedHat, Ubuntu Server)",
    sol_soft_f5: "Software Keamanan Siber, Endpoint Detection & Antivirus",
    sol_soft_f6: "Integrasi API Sistem & Modifikasi Software Eksisting",

    sol_pwr_title: "Power Equipment, UPS Backup & Grounding Khusus IT",
    sol_pwr_desc: "Kestabilan daya listrik adalah jantung keandalan pusat data. Kami menyediakan kalkulasi beban daya, instalasi UPS modular redundan, panel distribusi ATS/AMF, serta sistem pembumian (grounding) murni khusus perangkat TI.",
    sol_pwr_f1: "UPS Sizing, Beban Kalkulasi & Instalasi Turnkey (1kVA - 500kVA+)",
    sol_pwr_f2: "Preventive Maintenance Baterai & Uji Kesehatan Kapasitas UPS",
    sol_pwr_f3: "Panel Distribusi Daya Listrik & Automatic Transfer Switch (ATS)",
    sol_pwr_f4: "Sistem Grounding Khusus IT (Nilai Hambatan < 1 Ohm)",
    sol_pwr_f5: "Power Distribution Unit (PDU) Cerdas Terkoneksi Jaringan",
    sol_pwr_f6: "Instalasi Pengkabelan Daya Standar Industri Tembaga Murni",

    config_badge: "Kalkulator Interaktif",
    config_title: "Solusi Konfigurasi & Estimasi Kebutuhan IT",
    config_lead: "Pilih profil organisasi dan cakupan kebutuhan infrastruktur Anda untuk mendapatkan rekomendasi arsitektur dan estimasi waktu penerapan secara instan.",

    config_step1: "1. Pilih Profil Sektor Organisasi Anda",
    config_step2: "2. Kebutuhan Utama Infrastruktur",
    config_step3: "3. Skala & Volume Pengguna",

    config_opt_ent: "Enterprise / Perbankan",
    config_opt_gov: "Pemerintah / BUMN",
    config_opt_edu: "Kampus / Universitas",
    config_opt_hosp: "Rumah Sakit / Medis",

    config_sol_dc: "Data Center (DC)",
    config_sol_net: "Jaringan & Fiber Optic",
    config_sol_rent: "Managed Service / Sewa",
    config_sol_cloud: "Virtualisasi & Storage",

    config_scale_s: "Kecil (10-50 Node / 1-2 Rack)",
    config_scale_m: "Menengah (50-250 Node / 3-5 Rack)",
    config_scale_l: "Besar (250-1000+ Node / 6-12 Rack)",
    config_scale_campus: "Multi-Gedung / Kampus Luas",

    summary_title: "Rekomendasi Arsitektur Solusi",
    summary_subtitle: "Hasil estimasi berbasis parameter kebutuhan Anda",
    summary_label_profile: "Profil Sektor:",
    summary_label_need: "Fokus Solusi:",
    summary_label_timeline: "Estimasi Waktu:",
    summary_label_sla: "Tier Rekomendasi SLA:",
    summary_btn: "Gunakan Estimasi Ini di Form RFP",

    ind_badge: "Segmen Pasar",
    ind_title: "Dipercaya Lintas Sektor Industri",
    ind_lead: "Pengalaman lebih dari 25 tahun menjadikan kami mitra terpercaya bagi ragam institusi strategis di Indonesia.",
    ind_corp: "Korporasi & Finansial",
    ind_corp_desc: "Keandalan tinggi, arsitektur redundan tanpa celah henti (zero-downtime), dan perlindungan data ketat.",
    ind_gov: "Pemerintah & BUMN",
    ind_gov_desc: "Kepatuhan terhadap regulasi kedaulatan data, pengadaan resmi transparan, dan jaringan terdistribusi aman.",
    ind_edu: "Perguruan Tinggi / Universitas",
    ind_edu_desc: "Konektivitas serat optik antargedung kampus, akses Wi-Fi kepadatan tinggi ribuan mahasiswa, dan server e-learning.",
    ind_hosp: "Rumah Sakit & Kesehatan",
    ind_hosp_desc: "Infrastruktur SIMRS stabil 24/7, penyimpanan arsip rekam medis digital PACS/DICOM berkapasitas besar.",

    why_badge: "Nilai Tambah",
    why_title: "Mengapa Memilih PT Skill Nusa Infotama?",
    why_lead: "Komitmen kami adalah menjadi mitra jangka panjang yang menghadirkan solusi nyata dan terukur.",
    why_1_title: "Total Solution Provider",
    why_1_desc: "Pendekatan komprehensif satu atap: mulai dari konsultasi, perancangan, instalasi fisik, pengadaan, hingga pemeliharaan.",
    why_2_title: "25+ Tahun Pengalaman",
    why_2_desc: "Berdiri sejak 1999, kami telah melewati ragam dinamika teknologi dan membuktikan kehandalan di ratusan proyek berskala nasional.",
    why_3_title: "Tenaga Ahli Bersertifikasi",
    why_3_desc: "Didukung insinyur bersertifikasi resmi di bidang jaringan, server enterprise, fiber optic, dan sistem pendingin data center.",
    why_4_title: "Fleksibilitas Investasi (OpEx / CapEx)",
    why_4_desc: "Menyediakan opsi sewa atau sewa beli perangkat keras untuk meringankan arus kas dan anggaran perusahaan Anda.",
    why_5_title: "SLA Respons Cepat 24/7",
    why_5_desc: "Layanan purna jual prima dengan masa garansi terjamin dan kontrak pemeliharaan berkala untuk menjaga uptime sistem.",
    why_6_title: "Kemitraan Resmi Multi-Vendor",
    why_6_desc: "Koneksi langsung dengan prinsipal teknologi global terkemuka untuk menjamin keaslian produk dan garansi resmi.",

    faq_badge: "Pertanyaan Umum",
    faq_title: "Frequently Asked Questions",
    faq_q1: "Apakah PT Skill Nusa melayani pengadaan perangkat IT dengan sistem sewa?",
    faq_a1: "Ya, kami memiliki program Managed Service berupa Sewa dan Sewa Beli (Leasing) untuk perangkat IT seperti laptop, PC desktop, server, UPS, dan perangkat jaringan untuk jangka menengah hingga panjang. Ini membantu memangkas CapEx dan menyederhanakan manajemen aset.",
    faq_q2: "Bagaimana ketersediaan dukungan teknis dan layanan purna jual (maintenance)?",
    faq_a2: "Kami menyediakan paket Maintenance Contract fleksibel yang disesuaikan dengan kebutuhan Anda, mulai dari 8x5 Next Business Day hingga 24/7 Mission Critical dengan penempatan Resident Engineer di lokasi.",
    faq_q3: "Apakah PT Skill Nusa dapat mengerjakan turnkey project Data Center dari nol?",
    faq_a3: "Tentu. Kami berpengalaman membangun fasilitas Data Center dan Server Room terpadu, mencakup pekerjaan sipil raised floor, sistem pendingin presisi (PAC), rack server, instalasi kabel terstruktur, genset/UPS, proteksi kebakaran FM-200, dan sistem sensor EMS.",
    faq_q4: "Di mana saja cakupan area operasional PT Skill Nusa Infotama?",
    faq_a4: "Kantor operasional kami berpusat di Bandung, Jawa Barat, dengan jangkauan layanan proyek dan pemeliharaan di seluruh wilayah Jawa Barat, DKI Jakarta, Banten, dan berbagai wilayah lain di Indonesia.",

    contact_badge: "Mulai Konsultasi",
    contact_title: "Diskusikan Kebutuhan Infrastruktur TI Anda",
    contact_lead: "Tim konsultan kami siap memberikan asistensi teknis, penawaran harga, dan rancangan arsitektur terbaik.",
    contact_office_title: "Kantor Operasional Bandung",
    contact_addr: "Jl. Gajah No. 21, Kota Bandung, Jawa Barat 40264, Indonesia",
    contact_phone: "+6222-7318113",
    contact_email: "Support@skillnusa.co.id",
    contact_hours: "Senin - Jumat: 08:30 - 17:00 WIB",

    form_name: "Nama Lengkap *",
    form_company: "Nama Instansi / Perusahaan *",
    form_email: "Alamat Email Korporat *",
    form_phone: "Nomor Telepon / WhatsApp *",
    form_category: "Kategori Solusi yang Dibutuhkan *",
    form_cat_dc: "Pembangunan / Renovasi Data Center",
    form_cat_net: "Infrastruktur Jaringan & Fiber Optic",
    form_cat_rent: "Managed Service & Sewa Perangkat IT",
    form_cat_virt: "Virtualisasi, Storage & Backup Recovery",
    form_cat_soft: "Software Consultant & Custom Development",
    form_cat_pwr: "Power System UPS & Electrical Grounding",
    form_notes: "Deskripsi Singkat Kebutuhan Anda *",
    form_btn_submit: "Kirim Permintaan Proposal (RFP)",
    form_btn_wa: "Konsultasi Cepat via WhatsApp",

    footer_desc: "Penyedia solusi terkemuka di bidang Network System Integration, Data Center, Managed Services, dan Software Consultant sejak 1999.",
    footer_col_sol: "Solusi Kami",
    footer_col_comp: "Perusahaan",
    footer_col_hours: "Jam Operasional",
    footer_copy: "© 2026 PT Skill Nusa Infotama. All rights reserved. Total Solution For Customer."
  },

  en: {
    nav_home: "Home",
    nav_solutions: "Solutions & Services",
    nav_configurator: "Solution Configurator",
    nav_industries: "Industries",
    nav_about: "About Us",
    nav_contact: "Contact Us",
    nav_cta: "Free Consultation",

    hero_badge: "Leading IT System Integrator Since 1999",
    hero_title: "Integrated Enterprise Network & Data Center Infrastructure Solutions",
    hero_lead: "PT Skill Nusa Infotama delivers turnkey solutions in Network System Integration, Data Center, Managed Services (Leasing & Rental), and Enterprise Software Consulting.",
    hero_btn_explore: "Explore Solutions",
    hero_btn_rfp: "Submit RFP / Inquiry",

    stat_years: "Years of Excellence",
    stat_projects: "Projects Completed",
    stat_sla: "Uptime SLA Support",
    stat_clients: "Enterprise & Gov Clients",

    partners_title: "Multi-Vendor Strategic Alliances & Ecosystem",

    solutions_badge: "Comprehensive Service Portfolio",
    solutions_title: "Unified Engineering for Digital Transformation",
    solutions_lead: "From physical data center architecture to mission-critical software consulting, we deliver 'Total Solution For Customer'.",

    tab_datacenter: "Data Center & Server",
    tab_network: "Network & Fiber Optic",
    tab_managed: "Managed Service & Rental",
    tab_virtualization: "Virtualization & Storage",
    tab_software: "Software & Consulting",
    tab_power: "Power Systems & UPS",

    sol_dc_title: "Data Center & Server Infrastructure",
    sol_dc_desc: "End-to-end design, construction, and modernization of data center facilities including raised floor civil architecture, Precision Air Conditioning (PAC), server rack systems, Clean-Agent Fire Suppression (FSS), and real-time Environmental Monitoring (EMS).",
    sol_dc_f1: "Enterprise Servers (Micro Server & High-Density Rack Servers)",
    sol_dc_f2: "Precision Air Conditioning (PAC: Uplow, Downflow & In-Row)",
    sol_dc_f3: "Fire Suppression System (FM-200, Novec 1230, Inergen)",
    sol_dc_f4: "Environment Monitoring System (Temperature, Humidity, Water Leak)",
    sol_dc_f5: "Raised Flooring, Fire-Rated Partitioning & Overhead Cable Trays",
    sol_dc_f6: "Intelligent PDUs, 42U Server Racks & Structured Cable Management",

    sol_net_title: "Network Infrastructure & Optical Fiber Integration",
    sol_net_desc: "High-speed enterprise network design, structured copper and optical fiber cabling installation, fusion splicing, precision OTDR certification, next-gen routing, and enterprise firewall deployment.",
    sol_net_f1: "Structured Cabling Cat 5e, Cat 6, Cat 6A & Cat 7 Industrial Grade",
    sol_net_f2: "Optical Fiber Fusion Splicing & Precision OTDR Certification",
    sol_net_f3: "Enterprise Core, Distribution & Access Layer Switches",
    sol_net_f4: "Next-Generation Firewalls (NGFW) & Unified Threat Management",
    sol_net_f5: "Controller-managed Enterprise Wi-Fi 6/7 & Outdoor Mesh",
    sol_net_f6: "SD-WAN & Multi-Branch Interconnection Architecture",

    sol_mgd_title: "Managed Services & IT Hardware Rental / Lease",
    sol_mgd_desc: "Shift capital expenditure to operational flexibility (CapEx to OpEx) through medium and long-term hardware rental and lease-to-own programs, backed by proactive SLA maintenance and on-site engineering.",
    sol_mgd_f1: "Corporate Laptops, All-in-One PCs & Workstations Rental",
    sol_mgd_f2: "Scalable Enterprise Server & Storage Infrastructure Leasing",
    sol_mgd_f3: "Comprehensive Maintenance Contracts with SLA up to 24/7",
    sol_mgd_f4: "Preventive Maintenance Routines & Rapid Replacement Units",
    sol_mgd_f5: "Dedicated Resident On-Site Engineers",
    sol_mgd_f6: "Full Lifecycle Asset & Refresh Management",

    sol_virt_title: "Virtualization, Enterprise Storage & Disaster Recovery",
    sol_virt_desc: "Maximize computing efficiency through server consolidation, Hyper-Converged Infrastructure (HCI), resilient centralized SAN/NAS storage, and ransomware-proof automated disaster recovery.",
    sol_virt_f1: "Enterprise Virtualization Platforms (VMware vSphere, Proxmox, Hyper-V)",
    sol_virt_f2: "Hyper-Converged Infrastructure (HCI) Architecture",
    sol_virt_f3: "High-Availability Enterprise SAN / NAS Storage Arrays",
    sol_virt_f4: "Tape Backup & Immutable Cloud / On-Premise Repositories",
    sol_virt_f5: "Disaster Recovery Planning (DRP) with Near-Zero RPO/RTO",
    sol_virt_f6: "Zero-Downtime Workload & Cloud Migration",

    sol_soft_title: "Software Consulting & Tailor-Made Application Engineering",
    sol_soft_desc: "Guiding enterprise digital workflows through architectural consulting, authentic corporate licensing (Microsoft, Oracle, RedHat), and bespoke business application development.",
    sol_soft_f1: "Custom Web & Mobile Enterprise Business Applications",
    sol_soft_f2: "Database Architecture & Optimization (Oracle, MySQL, PostgreSQL)",
    sol_soft_f3: "Authorized Microsoft Windows Server, Office 365, CAL Licensing",
    sol_soft_f4: "Enterprise Open-Source Solutions (RedHat, Enterprise Linux)",
    sol_soft_f5: "Cybersecurity Suites, Endpoint Protection & Antivirus",
    sol_soft_f6: "Custom API Integration & Legacy Software Modernization",

    sol_pwr_title: "Power Equipment, Modular UPS & IT Clean Grounding",
    sol_pwr_desc: "Power quality is paramount for mission-critical IT uptime. We deliver power load calculations, modular redundant UPS installations, ATS/AMF distribution panels, and clean low-resistance IT grounding systems.",
    sol_pwr_f1: "UPS Sizing, Electrical Load Calculation & Turnkey Deployment (1kVA - 500kVA+)",
    sol_pwr_f2: "Battery Preventive Maintenance & Dynamic Capacity Testing",
    sol_pwr_f3: "Electrical Power Distribution Panels & Automatic Transfer Switches (ATS)",
    sol_pwr_f4: "Clean Grounding Systems Specifically Engineered for IT (< 1 Ohm)",
    sol_pwr_f5: "Network-Connected Intelligent Power Distribution Units (iPDU)",
    sol_pwr_f6: "Pure Copper Power Feeder Cabling & Industrial Trunking",

    config_badge: "Interactive Tool",
    config_title: "IT Solution Configurator & Estimator",
    config_lead: "Select your organization sector and infrastructure requirements to receive an instant architectural scope and deployment timeline estimation.",

    config_step1: "1. Select Your Organization Sector",
    config_step2: "2. Primary Infrastructure Requirement",
    config_step3: "3. User Scale & Node Volume",

    config_opt_ent: "Enterprise / Banking",
    config_opt_gov: "Government / State-Owned",
    config_opt_edu: "University / Higher Ed",
    config_opt_hosp: "Hospital / Healthcare",

    config_sol_dc: "Data Center (DC)",
    config_sol_net: "Network & Optical Fiber",
    config_sol_rent: "Managed Service / Lease",
    config_sol_cloud: "Virtualization & Storage",

    config_scale_s: "Small (10-50 Nodes / 1-2 Racks)",
    config_scale_m: "Medium (50-250 Nodes / 3-5 Racks)",
    config_scale_l: "Large (250-1000+ Nodes / 6-12 Racks)",
    config_scale_campus: "Multi-Building / Campus Wide",

    summary_title: "Recommended Architecture",
    summary_subtitle: "Instant estimation derived from your operational parameters",
    summary_label_profile: "Sector Profile:",
    summary_label_need: "Solution Focus:",
    summary_label_timeline: "Est. Deployment:",
    summary_label_sla: "Recommended SLA Tier:",
    summary_btn: "Apply This Scope into RFP Form",

    ind_badge: "Market Segments",
    ind_title: "Trusted Across Strategic Industries",
    ind_lead: "With over 25 years of proven integration experience, we are the preferred partner for prominent Indonesian organizations.",
    ind_corp: "Corporate & Financial",
    ind_corp_desc: "High-density redundancy, zero-downtime tolerance, and stringent data protection compliance.",
    ind_gov: "Government & Public Sector",
    ind_gov_desc: "Regulatory compliance, transparent public procurement standards, and sovereign network security.",
    ind_edu: "Universities & Education",
    ind_edu_desc: "High-bandwidth campus backbone fiber, high-density student Wi-Fi, and e-learning cloud platforms.",
    ind_hosp: "Hospitals & Healthcare",
    ind_hosp_desc: "24/7 mission-critical hospital management systems (SIMRS) and high-volume PACS/DICOM storage.",

    why_badge: "Why Choose Us",
    why_title: "The PT Skill Nusa Infotama Advantage",
    why_lead: "We act as your long-term technology integration partner committed to measurable operational reliability.",
    why_1_title: "Total Solution Provider",
    why_1_desc: "One-stop end-to-end delivery: architectural design, civil & cabling works, hardware procurement, and proactive maintenance.",
    why_2_title: "25+ Years Proven Track Record",
    why_2_desc: "Founded in 1999, we have navigated technological evolutions across hundreds of nationwide deployments.",
    why_3_title: "Multi-Vendor Certified Engineers",
    why_3_desc: "Certified professionals in enterprise routing, optical fusion, virtualization platforms, and precision cooling.",
    why_4_title: "Flexible Financing (CapEx to OpEx)",
    why_4_desc: "Adaptable hardware leasing and rent-to-own models that optimize your balance sheet and cash flow.",
    why_5_title: "24/7 Rapid Response SLA",
    why_5_desc: "Robust maintenance contracts and standby resident engineers ensuring maximum system uptime.",
    why_6_title: "Direct Multi-Vendor Alliances",
    why_6_desc: "Strong partnerships with global technology leaders to guarantee 100% genuine equipment and vendor warranties.",

    faq_badge: "Common Inquiries",
    faq_title: "Frequently Asked Questions",
    faq_q1: "Does PT Skill Nusa offer IT hardware procurement via rental or leasing models?",
    faq_a1: "Yes. Our Managed Service program offers flexible medium-to-long term rental and lease-to-own arrangements for laptops, desktops, enterprise servers, UPS systems, and active network gear to help lower CapEx.",
    faq_q2: "What is your maintenance contract and after-sales support coverage?",
    faq_a2: "We offer customized Maintenance Contracts tailored to your business, ranging from 8x5 Next Business Day up to 24/7 Mission-Critical SLA with dedicated on-site resident engineers.",
    faq_q3: "Can PT Skill Nusa manage complete Data Center construction?",
    faq_a3: "Absolutely. We specialize in end-to-end data center builds, including anti-static raised flooring, PAC precision air conditioning, fire-rated enclosures, FM-200 fire suppression, UPS/generators, and EMS monitoring.",
    faq_q4: "What regions does PT Skill Nusa Infotama serve?",
    faq_a4: "Our headquarters are based in Bandung, West Java, with comprehensive deployment and field engineering capabilities across West Java, Greater Jakarta (Jabodetabek), Banten, and other strategic cities throughout Indonesia.",

    contact_badge: "Get in Touch",
    contact_title: "Let's Engineer Your IT Infrastructure",
    contact_lead: "Our team of solution architects is ready to assist with technical scoping, RFP budgeting, and proof of concept.",
    contact_office_title: "Bandung Operational Headquarters",
    contact_addr: "Jl. Gajah No. 21, Kota Bandung, West Java 40264, Indonesia",
    contact_phone: "+6222-7318113",
    contact_email: "Support@skillnusa.co.id",
    contact_hours: "Monday - Friday: 08:30 - 17:00 WIB",

    form_name: "Full Name *",
    form_company: "Company / Institution *",
    form_email: "Corporate Email *",
    form_phone: "Phone / WhatsApp Number *",
    form_category: "Required Solution Category *",
    form_cat_dc: "Data Center Construction / Revamp",
    form_cat_net: "Network Infrastructure & Optical Fiber",
    form_cat_rent: "Managed Services & Hardware Leasing",
    form_cat_virt: "Virtualization, Storage & Disaster Recovery",
    form_cat_soft: "Software Consulting & Custom Development",
    form_cat_pwr: "Power Systems, UPS & Clean Grounding",
    form_notes: "Project Scope & Description *",
    form_btn_submit: "Submit Request for Proposal (RFP)",
    form_btn_wa: "Quick WhatsApp Consultation",

    footer_desc: "Indonesia's premier Network System Integrator, Data Center Provider, Managed Services, and Software Consultant since 1999.",
    footer_col_sol: "Our Solutions",
    footer_col_comp: "Company",
    footer_col_hours: "Office Hours",
    footer_copy: "© 2026 PT Skill Nusa Infotama. All rights reserved. Total Solution For Customer."
  }
};

// Application State
let currentLang = 'id';

// --- Initialization on DOM Ready ---
document.addEventListener('DOMContentLoaded', () => {
  initLanguage();
  initTheme();
  initNavbar();
  initSolutionTabs();
  initConfigurator();
  initCounters();
  initFAQ();
  initContactForm();
  initMobileDrawer();
});

// --- Language Engine ---
function initLanguage() {
  const savedLang = localStorage.getItem('skillnusa_lang');
  if (savedLang && ['id', 'en'].includes(savedLang)) {
    currentLang = savedLang;
  }

  updateLanguageUI();

  document.querySelectorAll('.lang-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
      const lang = e.target.dataset.lang;
      if (lang && lang !== currentLang) {
        currentLang = lang;
        localStorage.setItem('skillnusa_lang', currentLang);
        updateLanguageUI();
        recalculateConfigurator(); // update dynamic text inside configurator
        showToast(currentLang === 'id' ? 'Bahasa berhasil diubah ke Indonesia' : 'Language changed to English');
      }
    });
  });
}

function updateLanguageUI() {
  // Update buttons
  document.querySelectorAll('.lang-btn').forEach(btn => {
    if (btn.dataset.lang === currentLang) {
      btn.classList.add('active');
    } else {
      btn.classList.remove('active');
    }
  });

  // Update text nodes with data-i18n attribute
  document.querySelectorAll('[data-i18n]').forEach(el => {
    const key = el.dataset.i18n;
    if (translations[currentLang] && translations[currentLang][key]) {
      if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
        el.placeholder = translations[currentLang][key];
      } else {
        el.innerHTML = translations[currentLang][key];
      }
    }
  });

  // Update HTML lang attribute
  document.documentElement.lang = currentLang;
}

// --- Theme Switcher (Dark/Light) ---
function initTheme() {
  const savedTheme = localStorage.getItem('skillnusa_theme') || 'dark';
  applyTheme(savedTheme);

  const themeToggleBtn = document.getElementById('theme-toggle-btn');
  if (themeToggleBtn) {
    themeToggleBtn.addEventListener('click', () => {
      const current = document.documentElement.getAttribute('data-theme') || 'dark';
      const nextTheme = current === 'dark' ? 'light' : 'dark';
      applyTheme(nextTheme);
      localStorage.setItem('skillnusa_theme', nextTheme);
      showToast(nextTheme === 'dark' ? 'Dark theme activated' : 'Light theme activated');
    });
  }
}

function applyTheme(theme) {
  document.documentElement.setAttribute('data-theme', theme);
  const themeIcon = document.getElementById('theme-icon');
  if (themeIcon) {
    if (theme === 'light') {
      // Moon icon
      themeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />`;
    } else {
      // Sun icon
      themeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />`;
    }
  }
}

// --- Sticky Navigation & Active Links ---
function initNavbar() {
  const header = document.querySelector('.header');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 40) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  });
}

// --- Interactive Solution Tabs ---
function initSolutionTabs() {
  const tabButtons = document.querySelectorAll('.solution-tab-btn');
  const tabPanels = document.querySelectorAll('.tab-panel');

  tabButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const targetTab = btn.dataset.tab;

      tabButtons.forEach(b => b.classList.remove('active'));
      tabPanels.forEach(p => p.classList.remove('active'));

      btn.classList.add('active');
      const targetPanel = document.getElementById(`tab-${targetTab}`);
      if (targetPanel) {
        targetPanel.classList.add('active');
      }
    });
  });
}

// --- Solution Configurator & Estimator ---
let configState = {
  sector: 'enterprise',
  need: 'datacenter',
  scale: 'medium'
};

function initConfigurator() {
  const options = document.querySelectorAll('.config-option');
  options.forEach(opt => {
    opt.addEventListener('click', () => {
      const group = opt.dataset.group;
      const val = opt.dataset.val;

      document.querySelectorAll(`.config-option[data-group="${group}"]`).forEach(o => {
        o.classList.remove('selected');
      });

      opt.classList.add('selected');
      configState[group] = val;
      recalculateConfigurator();
    });
  });

  const applyBtn = document.getElementById('apply-config-btn');
  if (applyBtn) {
    applyBtn.addEventListener('click', () => {
      const notesField = document.getElementById('form-notes');
      const categoryField = document.getElementById('form-category');
      
      if (categoryField) {
        if (configState.need === 'datacenter') categoryField.value = 'dc';
        else if (configState.need === 'network') categoryField.value = 'net';
        else if (configState.need === 'rental') categoryField.value = 'rent';
        else if (configState.need === 'cloud') categoryField.value = 'virt';
      }

      if (notesField) {
        const text = currentLang === 'id' 
          ? `[Estimasi Konfigurator Online] Sektor: ${configState.sector}, Kebutuhan: ${configState.need}, Skala: ${configState.scale}. Mohon proposal & rekomendasi arsitektur.`
          : `[Online Configurator Estimate] Sector: ${configState.sector}, Requirement: ${configState.need}, Scale: ${configState.scale}. Please provide proposal & architecture specs.`;
        notesField.value = text;
      }

      // Smooth scroll to contact section
      const contactSec = document.getElementById('kontak');
      if (contactSec) {
        contactSec.scrollIntoView({ behavior: 'smooth' });
        showToast(currentLang === 'id' ? 'Hasil konfigurasi diterapkan ke form RFP' : 'Configuration applied to RFP form');
      }
    });
  }

  recalculateConfigurator();
}

function recalculateConfigurator() {
  const summaryProfile = document.getElementById('summary-profile');
  const summaryNeed = document.getElementById('summary-need');
  const summaryTimeline = document.getElementById('summary-timeline');
  const summarySla = document.getElementById('summary-sla');
  const summarySpecs = document.getElementById('summary-specs');

  // Sector labels
  const sectorNames = {
    enterprise: currentLang === 'id' ? 'Enterprise / Finansial' : 'Enterprise / Financial',
    government: currentLang === 'id' ? 'Pemerintah / BUMN' : 'Government / State-Owned',
    education: currentLang === 'id' ? 'Kampus / Pendidikan' : 'University / Education',
    hospital: currentLang === 'id' ? 'Rumah Sakit / Medis' : 'Hospital / Healthcare'
  };

  // Need labels
  const needNames = {
    datacenter: currentLang === 'id' ? 'Data Center & Server' : 'Data Center & Server',
    network: currentLang === 'id' ? 'Jaringan & Fiber Optic' : 'Enterprise Network & Fiber',
    rental: currentLang === 'id' ? 'Managed Service (Sewa Perangkat)' : 'Managed Service (Hardware Rental)',
    cloud: currentLang === 'id' ? 'Virtualisasi, Storage & DRP' : 'Virtualization, Storage & DRP'
  };

  // Calculations based on scale and need
  let timeline = "2 - 4 Minggu";
  let sla = "Tier 2 (8x5 Business Support)";
  let specs = [];

  if (currentLang === 'en') {
    timeline = "2 - 4 Weeks";
    sla = "Tier 2 (8x5 Next Business Day)";
  }

  if (configState.scale === 'large' || configState.scale === 'campus') {
    timeline = currentLang === 'id' ? "6 - 12 Minggu (Turnkey)" : "6 - 12 Weeks (Turnkey)";
    sla = currentLang === 'id' ? "Tier 1 Mission-Critical (24/7 On-Site Resident Engineer)" : "Tier 1 Mission-Critical (24/7 On-Site Resident Engineer)";
  } else if (configState.scale === 'medium') {
    timeline = currentLang === 'id' ? "3 - 6 Minggu" : "3 - 6 Weeks";
    sla = currentLang === 'id' ? "Gold SLA (24/7 Remote + 4 Jam Respons On-site)" : "Gold SLA (24/7 Remote + 4hr On-site Response)";
  }

  // Generate architectural summary
  if (configState.need === 'datacenter') {
    specs = currentLang === 'id' 
      ? ["• Raised Floor Anti-Statis & Partisi Anti-Api", "• Precision AC (PAC) Redundant N+1", "• Modular True Online UPS + Baterai Bank", "• FM-200 Clean Agent Fire Suppression", "• EMS IoT Telemetry Sensor Real-Time"]
      : ["• Anti-Static Raised Floor & Fire-Rated Partitions", "• Precision AC (PAC) Redundant N+1", "• Modular True Online UPS + Battery Bank", "• FM-200 Clean Agent Fire Suppression", "• Real-Time IoT EMS Environmental Sensors"];
  } else if (configState.need === 'network') {
    specs = currentLang === 'id'
      ? ["• Fiber Optic OM4/OS2 Backbone dengan Splicing & OTDR", "• Cat6A Shielded Structured Cabling", "• Redundant 10G/40G Enterprise Core Switches", "• Dual Next-Generation Firewall HA", "• Wi-Fi 6 Enterprise Controller-Based"]
      : ["• OM4/OS2 Fiber Backbone with Fusion Splicing & OTDR", "• Cat6A Shielded Structured Cabling", "• Redundant 10G/40G Enterprise Core Switches", "• High-Availability Next-Gen Firewalls", "• Enterprise Wi-Fi 6 Controller-Based Network"];
  } else if (configState.need === 'rental') {
    specs = currentLang === 'id'
      ? ["• Pengadaan Unit PC/Laptop Enterprise Siap Pakai", "• Opsi Sewa / Sewa Beli 12, 24, hingga 36 Bulan", "• Penggantian Unit Rusak Maks 1x24 Jam", "• Sudah Termasuk OS Resmi & Antivirus", "• Bebas Biaya Servis & Suku Cadang Selama Kontrak"]
      : ["• Enterprise Desktops/Laptops Deployment", "• Flexible Lease-to-Own (12, 24, 36 Months)", "• Next-Day Hardware Replacement Guarantee", "• Bundled Authentic OS & Antivirus", "• Zero Maintenance & Spare Parts Surcharges"];
  } else {
    specs = currentLang === 'id'
      ? ["• Cluster VMware / Proxmox HCI High Availability", "• All-Flash Enterprise SAN/NAS Storage", "• Automated Immutable Backup (Anti-Ransomware)", "• Disaster Recovery Site Replication", "• Zero Data Loss / Near-Zero RTO Target"]
      : ["• VMware / Proxmox HCI HA Cluster Architecture", "• All-Flash Enterprise SAN/NAS Storage Array", "• Immutable Automated Backup (Anti-Ransomware)", "• Disaster Recovery Site Replication", "• Near-Zero RPO / RTO Target SLA"];
  }

  if (summaryProfile) summaryProfile.textContent = sectorNames[configState.sector] || configState.sector;
  if (summaryNeed) summaryNeed.textContent = needNames[configState.need] || configState.need;
  if (summaryTimeline) summaryTimeline.textContent = timeline;
  if (summarySla) summarySla.textContent = sla;
  if (summarySpecs) summarySpecs.innerHTML = specs.map(s => `<div>${s}</div>`).join('');
}

// --- Animated Counters ---
function initCounters() {
  const counterElements = document.querySelectorAll('.counter-val');
  let hasAnimated = false;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting && !hasAnimated) {
        hasAnimated = true;
        counterElements.forEach(el => {
          const target = parseInt(el.dataset.target, 10);
          const suffix = el.dataset.suffix || '';
          let count = 0;
          const duration = 1800; // ms
          const stepTime = 25;
          const increment = target / (duration / stepTime);

          const timer = setInterval(() => {
            count += increment;
            if (count >= target) {
              el.textContent = target + suffix;
              clearInterval(timer);
            } else {
              el.textContent = Math.floor(count) + suffix;
            }
          }, stepTime);
        });
      }
    });
  }, { threshold: 0.3 });

  const statsSection = document.querySelector('.hero-stats');
  if (statsSection) {
    observer.observe(statsSection);
  }
}

// --- FAQ Accordion ---
function initFAQ() {
  const faqItems = document.querySelectorAll('.faq-item');
  faqItems.forEach(item => {
    const questionBtn = item.querySelector('.faq-question');
    questionBtn.addEventListener('click', () => {
      const isActive = item.classList.contains('active');
      faqItems.forEach(i => i.classList.remove('active'));
      if (!isActive) {
        item.classList.add('active');
      }
    });
  });
}

// --- Interactive Contact Form ---
function initContactForm() {
  const form = document.getElementById('rfp-contact-form');
  const waBtn = document.getElementById('btn-direct-wa');

  if (form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();

      const name = document.getElementById('form-name').value.trim();
      const company = document.getElementById('form-company').value.trim();
      const email = document.getElementById('form-email').value.trim();
      const phone = document.getElementById('form-phone').value.trim();
      const category = document.getElementById('form-category').value;
      const notes = document.getElementById('form-notes').value.trim();

      if (!name || !company || !email || !phone || !notes) {
        showToast(currentLang === 'id' ? 'Mohon lengkapi semua field yang berbintang (*)' : 'Please complete all required fields (*)');
        return;
      }

      // Simulate successful submission
      const successMsg = currentLang === 'id' 
        ? `Terima kasih ${name} (${company}). Permintaan proposal Anda telah diterima. Tim konsultan kami akan segera menghubungi Anda melalui email/telepon.`
        : `Thank you ${name} (${company}). Your RFP request has been recorded. Our enterprise solutions team will contact you shortly.`;

      showToast(successMsg, 5000);
      form.reset();
    });
  }

  // Direct WhatsApp Button click
  if (waBtn) {
    waBtn.addEventListener('click', () => {
      const name = document.getElementById('form-name')?.value || 'Mitra Korporasi';
      const company = document.getElementById('form-company')?.value || 'Instansi';
      const notes = document.getElementById('form-notes')?.value || 'Konsultasi Solusi IT';
      
      const phoneNum = "62811206820"; // PT Skill Nusa Business Line
      const message = encodeURIComponent(`Halo PT Skill Nusa Infotama,\nSaya *${name}* dari *${company}* ingin berkonsultasi mengenai solusi:\n\n${notes}\n\nMohon info lebih lanjut.`);
      window.open(`https://wa.me/${phoneNum}?text=${message}`, '_blank');
    });
  }

  // Floating WhatsApp button
  const floatingWa = document.getElementById('floating-wa');
  if (floatingWa) {
    floatingWa.addEventListener('click', () => {
      const phoneNum = "62811206820";
      const message = encodeURIComponent(`Halo PT Skill Nusa Infotama, saya ingin konsultasi mengenai solusi infrastruktur IT & Network System Integration.`);
      window.open(`https://wa.me/${phoneNum}?text=${message}`, '_blank');
    });
  }
}

// --- Toast Notification Helper ---
function showToast(message, duration = 3500) {
  let container = document.querySelector('.toast-container');
  if (!container) {
    container = document.createElement('div');
    container.className = 'toast-container';
    document.body.appendChild(container);
  }

  const toast = document.createElement('div');
  toast.className = 'toast';
  toast.innerHTML = `
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#00f0ff" stroke-width="2">
      <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
      <polyline points="22 4 12 14.01 9 11.01"></polyline>
    </svg>
    <span>${message}</span>
  `;

  container.appendChild(toast);

  setTimeout(() => {
    toast.style.opacity = '0';
    toast.style.transform = 'translateX(100%)';
    toast.style.transition = 'all 0.3s ease';
    setTimeout(() => toast.remove(), 300);
  }, duration);
}

// --- Mobile Navigation Drawer ---
function initMobileDrawer() {
  const hamburger = document.getElementById('hamburger-btn');
  const drawer = document.getElementById('mobile-drawer');
  const closeBtn = document.getElementById('drawer-close-btn');
  const backdrop = document.getElementById('drawer-backdrop');
  const drawerLinks = document.querySelectorAll('.drawer-link');

  function openDrawer() {
    drawer.classList.add('open');
    backdrop.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeDrawer() {
    drawer.classList.remove('open');
    backdrop.classList.remove('active');
    document.body.style.overflow = '';
  }

  if (hamburger) hamburger.addEventListener('click', openDrawer);
  if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
  if (backdrop) backdrop.addEventListener('click', closeDrawer);

  drawerLinks.forEach(link => {
    link.addEventListener('click', closeDrawer);
  });
}
