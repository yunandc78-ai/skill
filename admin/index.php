<?php
/**
 * PT SKILL NUSA INFOTAMA - ADMIN DASHBOARD
 */

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/auth_check.php';

$db = getDbConnection();
$dbConnected = ($db !== null);

$unreadCount = 0;
$totalServices = 6;
$recentMessages = [];

if ($dbConnected) {
    try {
        // Hitung pesan belum dibaca
        $unreadStmt = $db->query("SELECT COUNT(*) FROM contact_messages WHERE is_read = 0");
        $unreadCount = (int)$unreadStmt->fetchColumn();

        // Hitung jumlah layanan
        $srvStmt = $db->query("SELECT COUNT(*) FROM services");
        $totalServices = (int)$srvStmt->fetchColumn();

        // Ambil 5 pesan terbaru
        $msgStmt = $db->query("SELECT * FROM contact_messages ORDER BY id DESC LIMIT 5");
        $recentMessages = $msgStmt->fetchAll();
    } catch (Exception $e) {}
} else {
    // Sample fallback data jika offline
    $unreadCount = 1;
    $recentMessages = [
        [
            'id' => 1,
            'name' => 'Dewi Anggraini',
            'email' => 'dewi.a@rsud-jabar.go.id',
            'phone' => '085678901234',
            'subject' => 'Pengadaan Sewa Perangkat PC & Laptop Kantor',
            'is_read' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ]
    ];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - PT Skill Nusa Infotama</title>
  <link rel="icon" href="../assets/logo-original.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/styles.css">
  <style>
    .admin-layout {
      display: flex;
      min-height: 100vh;
      background: var(--bg-primary);
    }
    .admin-sidebar {
      width: 260px;
      background: var(--bg-secondary);
      border-right: 1px solid var(--border-subtle);
      padding: 1.5rem;
      display: flex;
      flex-direction: column;
    }
    .admin-main {
      flex: 1;
      padding: 2rem;
      overflow-y: auto;
    }
    .admin-nav {
      list-style: none;
      padding: 0;
      margin: 2rem 0;
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }
    .admin-nav a {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      padding: 0.75rem 1rem;
      border-radius: 8px;
      color: var(--text-muted);
      font-weight: 500;
      transition: all 0.2s;
    }
    .admin-nav a:hover, .admin-nav a.active {
      background: var(--accent-cyan-dim);
      color: var(--accent-cyan);
    }
    .stat-badge-unread {
      background: #ef4444;
      color: white;
      font-size: 0.75rem;
      padding: 2px 7px;
      border-radius: 99px;
      margin-left: auto;
    }
    .top-header-admin {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-bottom: 1.5rem;
      margin-bottom: 2rem;
      border-bottom: 1px solid var(--border-subtle);
    }
    .overview-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 1.5rem;
      margin-bottom: 2rem;
    }
    .overview-card {
      background: var(--bg-card);
      border: 1px solid var(--border-light);
      border-radius: 12px;
      padding: 1.5rem;
    }
    .table-container {
      background: var(--bg-card);
      border: 1px solid var(--border-light);
      border-radius: 12px;
      overflow: hidden;
    }
    .data-table {
      width: 100%;
      border-collapse: collapse;
      text-align: left;
    }
    .data-table th, .data-table td {
      padding: 1rem 1.25rem;
      border-bottom: 1px solid var(--border-subtle);
    }
    .data-table th {
      background: var(--bg-secondary);
      color: var(--text-muted);
      font-weight: 600;
      font-size: 0.85rem;
    }
    .badge-status {
      display: inline-block;
      padding: 3px 8px;
      border-radius: 6px;
      font-size: 0.75rem;
      font-weight: 600;
    }
    .badge-status.unread {
      background: rgba(239, 68, 68, 0.15);
      color: #ef4444;
      border: 1px solid rgba(239, 68, 68, 0.3);
    }
    .badge-status.read {
      background: rgba(16, 185, 129, 0.15);
      color: #10b981;
      border: 1px solid rgba(16, 185, 129, 0.3);
    }
  </style>
</head>
<body>

<div class="admin-layout">
  
  <!-- Sidebar -->
  <aside class="admin-sidebar">
    <div class="brand">
      <img src="../assets/logo-original.png" alt="SkillNusa Logo" style="max-height: 40px;">
      <div class="brand-text">
        <span class="brand-title">SKILL NUSA</span>
        <span class="brand-sub">PANEL ADMIN</span>
      </div>
    </div>

    <ul class="admin-nav">
      <li>
        <a href="index.php" class="active">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="messages.php">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
          Pesan Masuk
          <?php if ($unreadCount > 0): ?>
            <span class="stat-badge-unread"><?= $unreadCount ?></span>
          <?php endif; ?>
        </a>
      </li>
      <li>
        <a href="services.php">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>
          Kelola Layanan
        </a>
      </li>
      <li>
        <a href="settings.php">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
          Pengaturan Profil
        </a>
      </li>
    </ul>

    <div style="margin-top: auto; padding-top: 1.5rem; border-top: 1px solid var(--border-subtle);">
      <a href="../index.php" target="_blank" class="btn btn-outline btn-sm btn-block mb-2">Lihat Website Publik</a>
      <a href="logout.php" class="btn btn-secondary btn-sm btn-block" style="background: rgba(239, 68, 68, 0.1); color: #ef4444; border-color: rgba(239, 68, 68, 0.2);">Keluar (Logout)</a>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="admin-main">
    <div class="top-header-admin">
      <div>
        <h1 style="font-size: 1.6rem; margin-bottom: 0.25rem;">Selamat Datang, <?= htmlspecialchars($_SESSION['admin_name'] ?? 'Admin') ?></h1>
        <p style="color: var(--text-muted); font-size: 0.9rem;">Kelola konten website PT Skill Nusa Infotama secara terpadu.</p>
      </div>
      <div>
        <?php if ($dbConnected): ?>
          <span style="display: inline-flex; align-items: center; gap: 6px; font-size: 0.85rem; color: #10b981; background: rgba(16,185,129,0.1); padding: 6px 12px; border-radius: 99px;">
            <span style="width: 8px; height: 8px; border-radius: 50%; background: #10b981;"></span>
            MySQL Terhubung
          </span>
        <?php else: ?>
          <span style="display: inline-flex; align-items: center; gap: 6px; font-size: 0.85rem; color: #f59e0b; background: rgba(245,158,11,0.1); padding: 6px 12px; border-radius: 99px;" title="Website berjalan dalam mode fallback terisolasi">
            <span style="width: 8px; height: 8px; border-radius: 50%; background: #f59e0b;"></span>
            Mode Fallback Mandiri (Aktif)
          </span>
        <?php endif; ?>
      </div>
    </div>

    <!-- Cards Ringkasan -->
    <div class="overview-grid">
      <div class="overview-card">
        <span style="color: var(--text-muted); font-size: 0.85rem;">Pesan Kontak Baru</span>
        <h2 style="font-size: 2.2rem; color: var(--accent-cyan); margin: 0.5rem 0;"><?= $unreadCount ?></h2>
        <a href="messages.php" style="color: var(--accent-cyan); font-size: 0.85rem;">Buka Inbox Pesan &rarr;</a>
      </div>

      <div class="overview-card">
        <span style="color: var(--text-muted); font-size: 0.85rem;">Total Pilar Layanan</span>
        <h2 style="font-size: 2.2rem; color: #3b82f6; margin: 0.5rem 0;"><?= $totalServices ?></h2>
        <a href="services.php" style="color: #3b82f6; font-size: 0.85rem;">Kelola Daftar Layanan &rarr;</a>
      </div>

      <div class="overview-card">
        <span style="color: var(--text-muted); font-size: 0.85rem;">Nomor WhatsApp Hotline</span>
        <h2 style="font-size: 1.3rem; color: #10b981; margin: 0.85rem 0;">+62 821-2664-2581</h2>
        <a href="settings.php" style="color: #10b981; font-size: 0.85rem;">Ubah Pengaturan Kontak &rarr;</a>
      </div>
    </div>

    <!-- Tabel Pesan Terbaru -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
      <h3 style="font-size: 1.2rem;">Pesan Masuk Terbaru</h3>
      <a href="messages.php" style="color: var(--accent-cyan); font-size: 0.85rem;">Lihat Semua Pesan</a>
    </div>

    <div class="table-container">
      <table class="data-table">
        <thead>
          <tr>
            <th>Status</th>
            <th>Nama Pengirim</th>
            <th>Email & Telepon</th>
            <th>Subjek Permintaan</th>
            <th>Waktu</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($recentMessages)): ?>
            <tr>
              <td colspan="5" style="text-align: center; color: var(--text-muted); padding: 2rem;">Belum ada pesan yang masuk.</td>
            </tr>
          <?php else: ?>
            <?php foreach ($recentMessages as $msg): ?>
              <tr>
                <td>
                  <span class="badge-status <?= $msg['is_read'] ? 'read' : 'unread' ?>">
                    <?= $msg['is_read'] ? 'Terbaca' : 'Baru' ?>
                  </span>
                </td>
                <td><strong><?= htmlspecialchars($msg['name']) ?></strong></td>
                <td>
                  <div><?= htmlspecialchars($msg['email']) ?></div>
                  <small style="color: var(--text-muted);"><?= htmlspecialchars($msg['phone'] ?: '-') ?></small>
                </td>
                <td><?= htmlspecialchars($msg['subject']) ?></td>
                <td><small style="color: var(--text-muted);"><?= htmlspecialchars($msg['created_at']) ?></small></td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

  </main>

</div>

</body>
</html>
