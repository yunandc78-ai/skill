<?php
/**
 * PT SKILL NUSA INFOTAMA - ADMIN PESAN MASUK
 */

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/auth_check.php';

$db = getDbConnection();
$alert = null;

// Handle Actions (Tandai Terbaca / Hapus)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $db) {
    $action = $_POST['action'] ?? '';
    $id = (int)($_POST['id'] ?? 0);

    if ($action === 'mark_read' && $id > 0) {
        $stmt = $db->prepare("UPDATE contact_messages SET is_read = 1 WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $alert = ['type' => 'success', 'msg' => 'Pesan telah ditandai sebagai terbaca.'];
    } elseif ($action === 'delete' && $id > 0) {
        $stmt = $db->prepare("DELETE FROM contact_messages WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $alert = ['type' => 'success', 'msg' => 'Pesan berhasil dihapus.'];
    }
}

// Ambil pesan
$messages = [];
if ($db) {
    try {
        $stmt = $db->query("SELECT * FROM contact_messages ORDER BY id DESC");
        $messages = $stmt->fetchAll();
    } catch (Exception $e) {}
}

if (empty($messages) && !$db) {
    $messages = [
        [
            'id' => 1,
            'name' => 'Dewi Anggraini',
            'email' => 'dewi.a@rsud-jabar.go.id',
            'phone' => '085678901234',
            'subject' => 'Pengadaan Sewa Perangkat PC & Laptop Kantor',
            'message' => 'Selamat siang tim SkillNusa, kami memerlukan penawaran sewa perangkat kerja laptop dan desktop 50 unit untuk masa sewa 2 tahun. Mohon hubungi kami melalui email atau nomor terlampir.',
            'is_read' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ],
        [
            'id' => 2,
            'name' => 'Rizky Pratama',
            'email' => 'rizky.pratama@enterprise.co.id',
            'phone' => '081234567890',
            'subject' => 'Konsultasi Penataan Ruang Data Center & PAC',
            'message' => 'Halo tim SkillNusa, kami berencana melakukan peremajaan ruang server kantor kami di kawasan Pasteur Bandung. Mohon info untuk jadwal survey dan estimasi solusi PAC & UPS.',
            'is_read' => 1,
            'created_at' => date('Y-m-d H:i:s', strtotime('-1 day'))
        ]
    ];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesan Masuk - Panel Admin SkillNusa</title>
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
    .message-card { background: var(--bg-card); border: 1px solid var(--border-light); border-radius: 12px; padding: 1.5rem; margin-bottom: 1.25rem; transition: border-color 0.2s; }
    .message-card.unread { border-left: 4px solid var(--accent-cyan); }
    .msg-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 0.75rem; }
    .msg-sender { font-size: 1.1rem; font-weight: 600; color: var(--text-heading); }
    .msg-meta { font-size: 0.85rem; color: var(--text-muted); margin-top: 2px; }
    .msg-body { background: rgba(0, 0, 0, 0.25); border-radius: 8px; padding: 1rem; margin: 1rem 0; font-size: 0.95rem; line-height: 1.6; color: var(--text-main); }
    .msg-actions { display: flex; gap: 0.75rem; align-items: center; }
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
      <li><a href="messages.php" class="active"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> Pesan Masuk</a></li>
      <li><a href="services.php"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg> Kelola Layanan</a></li>
      <li><a href="settings.php"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg> Pengaturan Situs</a></li>
    </ul>
    <div style="margin-top: auto; padding-top: 1.5rem; border-top: 1px solid var(--border-subtle);">
      <a href="../index.php" target="_blank" class="btn btn-outline btn-sm btn-block mb-2">Lihat Website</a>
      <a href="logout.php" class="btn btn-secondary btn-sm btn-block">Logout</a>
    </div>
  </aside>

  <!-- Main -->
  <main class="admin-main">
    <div style="margin-bottom: 2rem;">
      <h1 style="font-size: 1.6rem;">Kotak Masuk Pesan & Permintaan RFP</h1>
      <p style="color: var(--text-muted); font-size: 0.9rem;">Daftar pertanyaan dan permintaan konsultasi yang dikirim melalui formulir kontak.</p>
    </div>

    <?php if ($alert): ?>
      <div class="alert alert-<?= $alert['type'] ?>" style="margin-bottom: 1.5rem;">
        <?= htmlspecialchars($alert['msg']) ?>
      </div>
    <?php endif; ?>

    <div class="messages-list">
      <?php if (empty($messages)): ?>
        <div style="background: var(--bg-card); padding: 3rem; text-align: center; border-radius: 12px; color: var(--text-muted);">
          Belum ada pesan yang diterima.
        </div>
      <?php else: ?>
        <?php foreach ($messages as $m): ?>
          <div class="message-card <?= $m['is_read'] ? '' : 'unread' ?>">
            <div class="msg-header">
              <div>
                <span class="msg-sender"><?= htmlspecialchars($m['name']) ?></span>
                <span style="margin-left: 8px; font-size: 0.75rem; padding: 2px 8px; border-radius: 4px; background: <?= $m['is_read'] ? 'rgba(255,255,255,0.08)' : 'rgba(0,240,255,0.15)' ?>; color: <?= $m['is_read'] ? 'var(--text-muted)' : 'var(--accent-cyan)' ?>;">
                  <?= $m['is_read'] ? 'Sudah Dibaca' : 'Pesan Baru' ?>
                </span>
                <div class="msg-meta">
                  Email: <a href="mailto:<?= htmlspecialchars($m['email']) ?>" style="color: var(--accent-cyan);"><?= htmlspecialchars($m['email']) ?></a>
                  <?php if (!empty($m['phone'])): ?>
                    • Telepon/WA: <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $m['phone']) ?>" target="_blank" style="color: #10b981;"><?= htmlspecialchars($m['phone']) ?></a>
                  <?php endif; ?>
                </div>
              </div>
              <div style="text-align: right;">
                <span style="font-size: 0.8rem; color: var(--text-dim);"><?= htmlspecialchars($m['created_at']) ?></span>
              </div>
            </div>

            <div style="font-weight: 600; color: var(--text-heading); margin-bottom: 0.25rem;">
              Subjek: <?= htmlspecialchars($m['subject']) ?>
            </div>

            <div class="msg-body">
              <?= nl2br(htmlspecialchars($m['message'])) ?>
            </div>

            <div class="msg-actions">
              <a href="mailto:<?= htmlspecialchars($m['email']) ?>?subject=Re:%20<?= urlencode($m['subject']) ?>" class="btn btn-outline btn-sm">Balas via Email</a>
              <?php if (!empty($m['phone'])): ?>
                <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $m['phone']) ?>?text=Halo%20<?= urlencode($m['name']) ?>,%20kami%20dari%20PT%20Skill%20Nusa%20Infotama%20ingin%20menanggapi%20pesan%20Anda." target="_blank" class="btn btn-whatsapp btn-sm">Balas WhatsApp</a>
              <?php endif; ?>

              <?php if (!$m['is_read'] && $db): ?>
                <form method="POST" style="display: inline;">
                  <input type="hidden" name="action" value="mark_read">
                  <input type="hidden" name="id" value="<?= $m['id'] ?>">
                  <button type="submit" class="btn btn-secondary btn-sm">Tandai Terbaca</button>
                </form>
              <?php endif; ?>

              <?php if ($db): ?>
                <form method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                  <input type="hidden" name="action" value="delete">
                  <input type="hidden" name="id" value="<?= $m['id'] ?>">
                  <button type="submit" class="btn btn-secondary btn-sm" style="color: #ef4444;">Hapus</button>
                </form>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

  </main>
</div>

</body>
</html>
