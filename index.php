<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: dashboard.php'); 
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Aplikasi Saksi">
    <meta name="author" content="Farhan Maulana Syidiq">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/assets/icon/logo.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style-login.css">
    <title>Login Saksi</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="text-white navbar-brand" href="dashboard.php"><img src="/assets/icon/logo-saksi.png" height="50" alt="Logo"></a>
        </div>
    </nav>
    <div class="container card col-md-4 mt-4">
        <h2 class="card-header text-center text-white">Login Saksi</h2>
        <form method="POST" action="" class="card-body mt-4">
            <div class="mb-3">
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            </div>
            <?php if (isset($error)): ?>
                <p class='text-danger'><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
            <button type="submit" class="btn btn-success text-dark mb-3 w-100"><img src="/assets/icon/google.png" class="me-2" alt="google"> Login with google</button>
            <p class="text-start">Belum memiliki akun? <a href="register.php" class="caption"> Sign Up</a></p>
        </form>
    </div>

    <footer class="mt-5">
        <p class="text-center">Copyright &copy; 2024 Alea Engineer. All rights reserved</p>
    </footer>

</body>

</html>
