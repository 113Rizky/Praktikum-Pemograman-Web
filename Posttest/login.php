<?php
session_start();

// kalau sudah login, langsung ke dashboard
if (isset($_SESSION['username'])) {
  header("Location: dashboard.php");
  exit;
}

$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  // contoh username & password sederhana
  if ($username === 'admin' && $password === '123') {
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
    exit;
  } else {
    $message = "Username atau password salah!";
  }
}

if (isset($_GET['logout']) && $_GET['logout'] === 'success') {
  $message = "Berhasil logout!";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login │ Pixel Play</title>
  <style>
    body {
      font-family: "Segoe UI", sans-serif;
      background-color: #f4f6fa;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .logo-area {
      text-align: center;
      margin-bottom: 5px; /* space kecil untuk logo */
    }

    .logo-area img {
      width: 80px; /* nanti kamu ganti sesuai logo */
      height: auto;
    }

    h2 {
      color: #19328a;
      margin-bottom: 10px;
      text-align: center;
    }

    .message {
      text-align: center;
      margin-bottom: 10px;
      color: green;
      font-weight: 500;
    }

    .error {
      color: red;
    }

    .login-container {
      background: #fff;
      padding: 25px 30px;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      width: 320px;
    }

    .login-container input {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    .login-container button {
      width: 100%;
      background-color: #3366ff;
      color: white;
      font-weight: bold;
      border: none;
      padding: 10px;
      border-radius: 6px;
      margin-top: 8px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .login-container button:hover {
      background-color: #2a4edc;
    }
  </style>
</head>
<body>

  <div class="logo-area">
    <img src="gambar for html/logo-pixelplay.png" alt="Pixel Play Logo">
  </div>

  <h2>Login ke Pixel Play</h2>

  <?php if ($message): ?>
    <div class="message <?= strpos($message, 'salah') !== false ? 'error' : '' ?>">
      <?= htmlspecialchars($message) ?>
    </div>
  <?php endif; ?>

  <form method="POST" class="login-container">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
  </form>

</body>
</html>
