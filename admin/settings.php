<?php
/**
 * PT SKILL NUSA INFOTAMA - PENGATURAN SITUS
 */

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/auth_check.php';

$db = getDbConnection();
$alert = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $db) {
    $keys = [
        'site_name',
        'site_tagline',
        'company_address',
        'company_phone',
        'company_email',
        'company_whatsapp',
        'hero_headline',
        'hero_subheadline',
        'company_maps_embed'
    ];

    try {
        $stmt = $db->prepare("INSERT INTO site_settings (setting_key, setting_value) VALUES (:k, :v) ON DUPLICATE KEY UPDATE setting_value = :v2");
        foreach ($keys as $k) {
            if (isset($_POST[$k])) {
                $val = trim($_POST[$k]);
                $stmt->execute([':k' => $k, ':v' => $val, ':v2' => $val]);
            }
        }
        $alert = ['type' => 'success', 'msg' => 'Pengaturan situs berhasil diperbarui!'];
    } catch (Exception $e) {
        $alert = ['type' => 'danger', 'msg' => 'Gagal menyimpan pengaturan: ' . $e->getMessage()];
    }
}

$settings = getSiteSettings();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengaturan Situs - Panel Admin SkillNusa</title>
  <link rel="icon" href="../assets/logo-original.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/styles.css">
  <style>
    .admin-layout { display: flex; min-height: 100vh; background: var(--bg-primary); }
    .admin-sidebar { width: 260px; background: var(--bg-secondary); border-right: 1px solid var(--border-subtle); padding: 1.5rem; display: flex; flex-direction: column; }
    .admin-main { flex: 1; padding: 2rem; overflow-y: auto; }
    .admin-nav { list-style: none; padding: 0; margin: 2rem 0; display: flex; flex-direction: column; gap: 0.5rem; }
    .admin-nav a { display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem 1rem; border-radius: 8px; color: var(--text-muted); font-weight: 500; }
    .admin-nav a:hover, .admin-nav a.active { background: var(--accent-cyan-dim); color: var(--accent-cyan); font-weight: 600; }
    .settings-card { background: var(--bg-card); border: 1px solid var(--border-light); border-radius: 12px; padding: 2rem; max-width: 800px; }
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
      <li><a href="index.php"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg> Dashboard</a></li>
      <li><a href="messages.php"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> Pesan Masuk</a></li>
      <li><a href="services.php"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg> Kelola Layanan</a></li>
      <li><a href="settings.php" class="active"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg> Pengaturan Profil</a></li>
    </ul>
    <div style="margin-top: auto; padding-top: 1.5rem; border-top: 1px solid var(--border-subtle);">
      <a href="../index.php" target="_blank" class="btn btn-outline btn-sm btn-block mb-2">Lihat Website Publik</a>
      <a href="logout.php" class="btn btn-secondary btn-sm btn-block">Logout</a>
    </div>
  </aside>

  <!-- Main -->
  <main class="admin-main">
    <div style="margin-bottom: 2rem;">
      <h1 style="font-size: 1.6rem;">Pengaturan Profil & Kontak Situs</h1>
      <p style="color: var(--text-muted); font-size: 0.9rem;">Informasi kontak yang diperbarui di sini akan langsung tampil pada seluruh halaman website.</p>
    </div>

    <?php if ($alert): ?>
      <div class="alert alert-<?= $alert['type'] ?>" style="margin-bottom: 1.5rem;">
        <?= htmlspecialchars($alert['msg']) ?>
      </div>
    <?php endif; ?>

    <div class="settings-card">
      <form method="POST">
        
        <h3 style="font-size: 1.15rem; color: var(--accent-cyan); margin-bottom: 1rem; border-bottom: 1px solid var(--border-subtle); padding-bottom: 0.5rem;">Identitas Perusahaan</h3>

        <div class="form-group">
          <label class="form-label">Nama Resmi Perusahaan</label>
          <input type="text" name="site_name" class="form-control" value="<?= htmlspecialchars($settings['site_name']) ?>" required>
        </div>

        <div class="form-group">
          <label class="form-label">Slogan / Tagline</label>
          <input type="text" name="site_tagline" class="form-control" value="<?= htmlspecialchars($settings['site_tagline']) ?>" required>
        </div>

        <h3 style="font-size: 1.15rem; color: var(--accent-cyan); margin: 2rem 0 1rem 0; border-bottom: 1px solid var(--border-subtle); padding-bottom: 0.5rem;">Kontak & Alamat</h3>

        <div class="form-row">
          <div class="form-group form-col">
            <label class="form-label">Telepon Kantor</label>
            <input type="text" name="company_phone" class="form-control" value="<?= htmlspecialchars($settings['company_phone']) ?>" required>
          </div>
          <div class="form-group form-col">
            <label class="form-label">WhatsApp Hotline (Hanya Angka: contoh 62811206820)</label>
            <input type="text" name="company_whatsapp" class="form-control" value="<?= htmlspecialchars($settings['company_whatsapp']) ?>" required>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Email Dukungan</label>
          <input type="email" name="company_email" class="form-control" value="<?= htmlspecialchars($settings['company_email']) ?>" required>
        </div>

        <div class="form-group">
          <label class="form-label">Alamat Lengkap Kantor</label>
          <textarea name="company_address" rows="2" class="form-control" required><?= htmlspecialchars($settings['company_address']) ?></textarea>
        </div>

        <div class="form-group">
          <label class="form-label">URL Embed Google Maps</label>
          <input type="text" name="company_maps_embed" class="form-control" value="<?= htmlspecialchars($settings['company_maps_embed']) ?>" required>
        </div>

        <h3 style="font-size: 1.15rem; color: var(--accent-cyan); margin: 2rem 0 1rem 0; border-bottom: 1px solid var(--border-subtle); padding-bottom: 0.5rem;">Banner Utama (Hero Section)</h3>

        <div class="form-group">
          <label class="form-label">Headline Banner Beranda</label>
          <input type="text" name="hero_headline" class="form-control" value="<?= htmlspecialchars($settings['hero_headline']) ?>" required>
        </div>

        <div class="form-group">
          <label class="form-label">Sub-Headline Banner Beranda</label>
          <textarea name="hero_subheadline" rows="2" class="form-control" required><?= htmlspecialchars($settings['hero_subheadline']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 1rem;">Simpan Perubahan Pengaturan</button>
      </form>
    </div>

  </main>
</div>

</body>
</html>
