<?php
/**
 * PT SKILL NUSA INFOTAMA - ADMIN LOGIN
 */

require_once __DIR__ . '/../config/database.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Jika sudah login, langsung ke dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: index.php');
    exit;
}

$error = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        $error = 'Silakan isi username dan password.';
    } else {
        $db = getDbConnection();
        $authenticated = false;
        $adminData = null;

        if ($db) {
            try {
                $stmt = $db->prepare("SELECT * FROM admins WHERE username = :username LIMIT 1");
                $stmt->execute([':username' => $username]);
                $user = $stmt->fetch();
                if ($user && password_verify($password, $user['password_hash'])) {
                    $authenticated = true;
                    $adminData = $user;
                    // Update last login
                    $updateStmt = $db->prepare("UPDATE admins SET last_login = NOW() WHERE id = :id");
                    $updateStmt->execute([':id' => $user['id']]);
                }
            } catch (Exception $e) {
                // Fallback check jika query DB gagal
            }
        }

        // Fallback default admin credentials jika DB offline atau belum diisi
        if (!$authenticated && $username === 'admin' && $password === 'admin123') {
            $authenticated = true;
            $adminData = [
                'username'  => 'admin',
                'full_name' => 'Administrator SkillNusa',
                'email'     => 'Support@skillnusa.co.id'
            ];
        }

        if ($authenticated) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_user'] = $adminData['username'];
            $_SESSION['admin_name'] = $adminData['full_name'];
            header('Location: index.php');
            exit;
        } else {
            $error = 'Username atau kata sandi yang Anda masukkan salah.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Panel Admin - PT Skill Nusa Infotama</title>
  <link rel="icon" href="../assets/logo-original.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/styles.css">
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background: var(--bg-primary);
      padding: 1.5rem;
    }
    .login-card {
      width: 100%;
      max-width: 440px;
      background: var(--bg-card);
      border: 1px solid var(--border-light);
      border-radius: 16px;
      padding: 2.5rem;
      box-shadow: var(--shadow-lg);
    }
    .login-brand {
      text-align: center;
      margin-bottom: 2rem;
    }
    .login-brand img {
      max-height: 50px;
      margin-bottom: 0.75rem;
    }
    .login-brand h2 {
      font-size: 1.35rem;
      font-family: var(--font-heading);
      color: var(--text-heading);
    }
    .login-brand p {
      font-size: 0.85rem;
      color: var(--text-muted);
    }
    .login-help-box {
      margin-top: 1.5rem;
      padding: 0.85rem;
      background: rgba(0, 240, 255, 0.05);
      border: 1px dashed var(--accent-cyan-dim);
      border-radius: 8px;
      font-size: 0.8rem;
      color: var(--text-muted);
      text-align: center;
    }
  </style>
</head>
<body>

  <div class="login-card">
    <div class="login-brand">
      <img src="../assets/logo-original.png" alt="SkillNusa Logo">
      <h2>Panel Manajemen Konten</h2>
      <p>PT Skill Nusa Infotama</p>
    </div>

    <?php if ($error): ?>
      <div class="alert alert-danger" style="margin-bottom: 1.5rem;">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <form action="login.php" method="POST">
      <div class="form-group mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username" required autofocus value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
      </div>

      <div class="form-group mb-4">
        <label for="password" class="form-label">Kata Sandi (Password)</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
      </div>

      <button type="submit" class="btn btn-primary btn-block">
        Masuk ke Dashboard
      </button>
    </form>

    <div class="login-help-box">
      <strong>Kredensial Default:</strong><br>
      Username: <code>admin</code> | Password: <code>admin123</code>
    </div>

    <div class="text-center mt-4">
      <a href="../index.php" style="color: var(--accent-cyan); font-size: 0.85rem;">&larr; Kembali ke Website Publik</a>
    </div>
  </div>

</body>
</html>
