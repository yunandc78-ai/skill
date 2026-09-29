<?php
/**
 * PT SKILL NUSA INFOTAMA - KELOLA LAYANAN & PROGRAM
 */

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/auth_check.php';

$db = getDbConnection();
$alert = null;

// Handle Simpan / Tambah Layanan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $db) {
    $action = $_POST['action'] ?? '';
    $title = sanitize($_POST['title'] ?? '');
    $slug = sanitize($_POST['slug'] ?? '');
    $summary = sanitize($_POST['summary'] ?? '');
    $description = sanitize($_POST['description'] ?? '');
    $features = trim($_POST['features'] ?? '');
    $icon = sanitize($_POST['icon'] ?? 'server');
    $is_featured = isset($_POST['is_featured']) ? 1 : 0;
    $order = (int)($_POST['display_order'] ?? 0);

    if (empty($slug)) {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    }

    if ($action === 'create' && !empty($title)) {
        try {
            $stmt = $db->prepare("INSERT INTO services (title, slug, summary, description, features, icon, is_featured, display_order) VALUES (:title, :slug, :summary, :description, :features, :icon, :is_featured, :display_order)");
            $stmt->execute([
                ':title' => $title,
                ':slug' => $slug,
                ':summary' => $summary,
                ':description' => $description,
                ':features' => $features,
                ':icon' => $icon,
                ':is_featured' => $is_featured,
                ':display_order' => $order
            ]);
            $alert = ['type' => 'success', 'msg' => 'Layanan baru berhasil ditambahkan!'];
        } catch (Exception $e) {
            $alert = ['type' => 'danger', 'msg' => 'Gagal menambahkan layanan: ' . $e->getMessage()];
        }
    } elseif ($action === 'delete') {
        $id = (int)($_POST['id'] ?? 0);
        if ($id > 0) {
            try {
                $stmt = $db->prepare("DELETE FROM services WHERE id = :id");
                $stmt->execute([':id' => $id]);
                $alert = ['type' => 'success', 'msg' => 'Layanan berhasil dihapus!'];
            } catch (Exception $e) {
                $alert = ['type' => 'danger', 'msg' => 'Gagal menghapus layanan: ' . $e->getMessage()];
            }
        }
    }
}

$services = getAllServices();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Layanan & Program - Panel Admin SkillNusa</title>
  <link rel="icon" href="../assets/logo-original.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/styles.css">
  <style>
    .admin-layout { display: flex; min-height: 100vh; background: var(--bg-primary); }
    .admin-sidebar { width: 260px; background: var(--bg-secondary); border-right: 1px solid var(--border-subtle); padding: 1.5rem; display: flex; flex-direction: column; }
    .admin-main { flex: 1; padding: 2rem; overflow-y: auto; }
    .admin-nav { list-style: none; padding: 0; margin: 2rem 0; display: flex; flex-direction: column; gap: 0.5rem; }
    .admin-nav a { display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem 1rem; border-radius: 8px; color: var(--text-muted); font-weight: 500; }
    .admin-nav a:hover, .admin-nav a.active { background: var(--accent-cyan-dim); color: var(--accent-cyan); }
    .service-admin-item { background: var(--bg-card); border: 1px solid var(--border-light); border-radius: 12px; padding: 1.5rem; margin-bottom: 1rem; display: flex; justify-content: space-between; align-items: flex-start; }
    .form-card { background: var(--bg-card); border: 1px solid var(--border-light); border-radius: 12px; padding: 1.5rem; margin-bottom: 2rem; }
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
      <li><a href="services.php" class="active"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg> Kelola Layanan</a></li>
      <li><a href="settings.php"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg> Pengaturan Situs</a></li>
    </ul>
    <div style="margin-top: auto; padding-top: 1.5rem; border-top: 1px solid var(--border-subtle);">
      <a href="../layanan.php" target="_blank" class="btn btn-outline btn-sm btn-block mb-2">Lihat Halaman Layanan</a>
      <a href="logout.php" class="btn btn-secondary btn-sm btn-block">Logout</a>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="admin-main">
    <div style="margin-bottom: 2rem;">
      <h1 style="font-size: 1.6rem;">Kelola Layanan & Program</h1>
      <p style="color: var(--text-muted); font-size: 0.9rem;">Tambah, ubah, atau sesuaikan katalog produk dan pilar solusi IT PT Skill Nusa Infotama.</p>
    </div>

    <?php if ($alert): ?>
      <div class="alert alert-<?= $alert['type'] ?>" style="margin-bottom: 1.5rem;">
        <?= htmlspecialchars($alert['msg']) ?>
      </div>
    <?php endif; ?>

    <!-- Form Tambah Layanan Baru -->
    <div class="form-card">
      <h3 style="font-size: 1.2rem; margin-bottom: 1rem; color: var(--accent-cyan);">+ Tambah Layanan Baru</h3>
      <form method="POST">
        <input type="hidden" name="action" value="create">
        
        <div class="form-row">
          <div class="form-group form-col">
            <label class="form-label">Judul Layanan *</label>
            <input type="text" name="title" class="form-control" placeholder="Contoh: Cybersecurity & Penetration Testing" required>
          </div>
          <div class="form-group form-col">
            <label class="form-label">Ikon</label>
            <select name="icon" class="form-control">
              <option value="server">Server / Data Center</option>
              <option value="network">Jaringan / Network</option>
              <option value="support">Managed Service / Support</option>
              <option value="power">Power / UPS</option>
              <option value="code">Software / Virtualisasi</option>
              <option value="hardware">Hardware / Devices</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Ringkasan Singkat (Summary untuk Beranda) *</label>
          <input type="text" name="summary" class="form-control" placeholder="Ringkasan 1-2 kalimat untuk kartu depan" required>
        </div>

        <div class="form-group">
          <label class="form-label">Deskripsi Lengkap (Halaman Layanan) *</label>
          <textarea name="description" rows="3" class="form-control" placeholder="Penjelasan lengkap mengenai solusi dan manfaatnya" required></textarea>
        </div>

        <div class="form-group">
          <label class="form-label">Fitur / Ruang Lingkup (Satu baris per poin)</label>
          <textarea name="features" rows="3" class="form-control" placeholder="Poin 1&#10;Poin 2&#10;Poin 3"></textarea>
        </div>

        <div style="display: flex; gap: 1.5rem; align-items: center; margin-bottom: 1.25rem;">
          <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
            <input type="checkbox" name="is_featured" value="1" checked>
            <span>Tampilkan di Halaman Beranda (Unggulan)</span>
          </label>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Layanan Baru</button>
      </form>
    </div>

    <!-- Daftar Layanan Aktif -->
    <h3 style="font-size: 1.2rem; margin-bottom: 1rem;">Daftar Layanan Terdaftar (<?= count($services) ?>)</h3>
    <div class="services-list-admin">
      <?php foreach ($services as $srv): ?>
        <div class="service-admin-item">
          <div>
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 6px;">
              <h4 style="font-size: 1.1rem; color: var(--text-heading);"><?= htmlspecialchars($srv['title']) ?></h4>
              <?php if (!empty($srv['is_featured'])): ?>
                <span style="font-size: 0.75rem; background: rgba(0,240,255,0.15); color: var(--accent-cyan); padding: 2px 8px; border-radius: 4px;">Unggulan Beranda</span>
              <?php endif; ?>
            </div>
            <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 8px;"><?= htmlspecialchars($srv['summary']) ?></p>
            <small style="color: var(--text-dim);">Slug: <code>#<?= htmlspecialchars($srv['slug']) ?></code> | Ikon: <?= htmlspecialchars($srv['icon']) ?></small>
          </div>

          <?php if ($db): ?>
            <div>
              <form method="POST" onsubmit="return confirm('Hapus layanan ini?');">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?= $srv['id'] ?>">
                <button type="submit" class="btn btn-secondary btn-sm" style="color: #ef4444;">Hapus</button>
              </form>
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>

  </main>
</div>

</body>
</html>
