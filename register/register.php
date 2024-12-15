<?php
session_start();
include '../db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if (strlen($password) < 8 || 
            !preg_match('/[A-Z]/', $password) || 
            !preg_match('/[a-z]/', $password) || 
            !preg_match('/[0-9]/', $password) || 
            !preg_match('/[\W_]/', $password)) {
            $message = "Password harus terdiri dari minimal 8 karakter, termasuk huruf besar, huruf kecil, angka, dan karakter khusus.";
        } elseif ($password !== $confirm_password) {
            $message = "Password dan konfirmasi password tidak cocok.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $checkSql = "SELECT * FROM users WHERE username = ? OR email = ?";
            $checkStmt = $pdo->prepare($checkSql);
            $checkStmt->execute([$username, $email]);
            $result = $checkStmt->fetchAll();

            if (count($result) > 0) {
                $message = "Username atau email sudah ada.";
            } else {
                $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
                $stmt = $pdo->prepare($sql);

                if ($stmt->execute([$username, $email, $hashed_password])) {
                    $message = "Selamat $username, Anda telah berhasil mendaftar.";
                } else {
                    $message = "Error: " . $stmt->errorInfo()[2];
                }
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
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<img src="../img/gta_nama.png" alt="GTA Logo" class="gta-background">
<img src="../img/register.png" alt="Character" class="character-overlay">
<img src="../img/mp.png" alt="Backdrop" class="backdrop-overlay">
<div class="regis-container">
        <h1>Create Account</h1>
        <p class="subtitle">GET STARTED BY CREATING YOUR NEW ACCOUNT</p>
        
        <form method="POST">
            <div class="input-group">
                <label>Username</label>
                <div class="input-with-icon">
                    <i class="user-icon fas fa-user"></i>
                    <input type="text" name="username" required>
                </div>
            </div>

            <div class="input-group">
                <label>Email</label>
                <div class="input-with-icon">
                    <i class="user-icon fas fa-user"></i>
                    <input type="email" name="email" required>
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

            <div class="input-group">
                <label>Confirm Password</label>
                <div class="input-with-icon">
                    <i class="lock-icon fas fa-lock"></i>
                    <input type="password" name="confirm_password" required>
                    <i class="eye-icon fas fa-eye"></i>
                </div>
            </div>
            
            <div class="options">
                <label>
                    <input type="checkbox"> Remember me
                </label>
                <a href="#" style="color: #8B0000; text-decoration: none;">Forgot Password?</a>
            </div> <br> <br>
            
            <button type="submit" name="register" class="login-btn">REGISTER</button>

            <p class="login-text">
                Already having an account? <a href="../login.php">Login Here</a> 
            </p>
        </form>
        <?php if ($message): ?>
            <div id="message" style="color: black; margin-top: 10px; align-items: center;" >
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