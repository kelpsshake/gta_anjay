<?php
session_start();
include 'db.php';

$message = '';

$checkAdminSql = "SELECT * FROM admin_users WHERE username = 'admin'";
$checkAdminStmt = $pdo->prepare($checkAdminSql);
$checkAdminStmt->execute();
$adminUser   = $checkAdminStmt->fetch();

if (!$adminUser  ) {
    $adminPassword = password_hash('root', PASSWORD_DEFAULT);
    $insertAdminSql = "INSERT INTO admin_users (username, email, password, is_admin) VALUES (?, ?, ?, ?)";
    $insertAdminStmt = $pdo->prepare($insertAdminSql);
    $insertAdminStmt->execute(['admin', 'admin@example.com', $adminPassword, 1]);
}

$username_email = '';
$password = '';
if (isset($_COOKIE['username_email'])) {
    $username_email = $_COOKIE['username_email'];
}
if (isset($_COOKIE['password'])) {
    $password = $_COOKIE['password'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        $username_email = $_POST['username_email'];
        $password = $_POST['password'];
        $remember_me = isset($_POST['remember_me']);

        $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username_email, $username_email]);
        $user = $stmt->fetch();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['is_admin'] = false;

                if ($remember_me) {
                    setcookie('username_email', $username_email, time() + (86400 * 30), "/"); // 30 days
                    setcookie('password', $password, time() + (86400 * 30), "/"); // 30 days (not recommended)
                } else {
                    setcookie('username_email', '', time() - 3600, "/"); // Delete cookie
                    setcookie('password', '', time() - 3600, "/"); // Delete cookie
                }

                header("Location: home/home.php");
                exit();
            } else {
                $message = "Password Anda salah.";
            }
        } else {
            $sql = "SELECT * FROM admin_users WHERE username = ? OR email = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$username_email, $username_email]);
            $admin = $stmt->fetch();

            if ($admin) {
                if (password_verify($password, $admin['password'])) {
                    $_SESSION['user_id'] = $admin['id'];
                    $_SESSION['is_admin'] = true;

                    if ($remember_me) {
                        setcookie('username_email', $username_email, time() + (86400 * 30), "/"); // 30 days
                        setcookie('password', $password, time() + (86400 * 30), "/"); // 30 days (not recommended)
                    } else {
                        setcookie('username_email', '', time() - 3600, "/"); // Delete cookie
                        setcookie('password', '', time() - 3600, "/"); // Delete cookie
                    }

                    header("Location: admin_dashboard.php");
                    exit();
                } else {
                    $message = "Password Anda salah.";
                }
            } else {
                $message = "Username atau email tidak ditemukan.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <img src="img/gta_nama.png" alt="GTA Logo" class="gta-background">
    <img src="img/login.png" alt="Character" class="character-overlay">
    <img src="img/mp.png" alt="Backdrop" class="backdrop-overlay">
    <div class="login-container">
        <h1>Welcome Back!</h1>
        <p class="subtitle">LOGIN TO YOUR ACCOUNT</p>
        
        <form method="POST">
            <div class="input-group">
                <label>Username/Email</label>
                <div class="input-with-icon">
                    <i class="user-icon fas fa-user"></i>
                    <input type="text" name="username_email" required>
                </div>
            </div>
            
            <div class="input-group">
                <label>Password</label>
                <div class="input-with-icon">
                    <i class="lock-icon fas fa-lock"></i>
                    <input type="password" name="password" required>
                    <i class="eye-icon fas fa-eye"></i>
                </div>
            </div>
            
            <div class="options">
                <label>
                    <input type="checkbox"> Remember me
                </label>
                <a href="#" style="color: #8B0000; text-decoration: none;">Forgot Password?</a>
            </div> <br> <br>
            
            <button type="submit" name="login" class="login-btn">LOGIN</button>

            <p class="register-text">
                Don't Have Account? <a href="register/register.php">Register Here</a> 
            </p>
        </form>

        <?php if ($message): ?>
            <div id="message" style="color: red; margin-top: 10px;">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
    </div>
    <script>
        setTimeout(function() {
            var messageElement = document.getElementById('message');
            if (messageElement) {
                messageElement.style.display = 'none';
            }
        }, 5000);
    </script>
</body>
</html>