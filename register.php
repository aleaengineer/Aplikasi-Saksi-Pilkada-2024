<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi input
    if (empty($username) || empty($password) || empty($confirm_password)) {
        $error = "Semua field wajib diisi!";
    } elseif ($password !== $confirm_password) {
        $error = "Password dan konfirmasi password tidak cocok!";
    } else {
        // Cek apakah username sudah terdaftar
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Username sudah digunakan!";
        } else {
            // Hash password dan simpan ke database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param('ss', $username, $hashed_password);

            if ($stmt->execute()) {
                $success = "Pendaftaran berhasil! Silakan login.";
                header('Location: index.php');
                exit;
            } else {
                $error = "Terjadi kesalahan saat menyimpan data.";
            }
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/assets/icon/logo.png" type="image/png">
    <title>Daftar Saksi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style-login.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="text-white navbar-brand" href="dashboard.php"><img src="/assets/icon/logo-saksi.png" height="50" alt="Logo"></a>
        </div>
    </nav>
    <div class="container card col-md-4 mt-4">
        <h2 class="card-header text-center text-white">Register Saksi</h2>
        <form method="POST" action="" class="card-body mt-4">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Konfirmasi Password" required>
            </div>
            <?php if (isset($error)): ?>
                <p class='text-danger'><?= htmlspecialchars($error) ?></p>
            <?php elseif (isset($success)): ?>
                <p class='text-success'><?= htmlspecialchars($success) ?></p>
            <?php endif; ?>
            <button type="submit" class="btn btn-success text-dark mb-3 w-100">Daftar</button>
            <button type="submit" class="btn btn-outline-light mb-3 text-dark"><img src="/assets/icon/google.png" class="me-2" alt="google">Sign Up with google</button>
            <p>Sudah punya akun? <a href="index.php" class="caption">Sign In</a></p>
        </form>
    </div>

    <footer class="mt-5">
        <p class="text-center text-white">Copyright &copy; 2024 Alea Engineer. All rights reserved</p>
    </footer>

</body>

</html>
