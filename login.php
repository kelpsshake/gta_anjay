<?php
session_start();
include 'db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        $username_email = $_POST['username_email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
        $stmt = $pdo->prepare($sql); // Use $pdo instead of $conn
        $stmt->execute([$username_email, $username_email]);
        $user = $stmt->fetch();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header("Location: depan/depan.php");
                exit();
            } else {
                $message = "Password Anda salah.";
            }
        } else {
            $message = "Username atau email tidak ditemukan.";
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