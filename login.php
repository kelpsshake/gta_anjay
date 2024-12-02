<!DOCTYPE html>
<html lang="en">
<head>s
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
        
        <form>
            <div class="input-group">
                <label>Username/Email</label>
                <div class="input-with-icon">
                    <i class="user-icon fas fa-user"></i>
                    <input type="text" required>
                </div>
            </div>
            
            <div class="input-group">
                <label>Password</label>
                <div class="input-with-icon">
                    <i class="lock-icon fas fa-lock"></i>
                    <input type="password" required>
                    <i class="eye-icon fas fa-eye"></i>
                </div>
            </div>
            
            <div class="options">
                <label>
                    <input type="checkbox"> Remember me
                </label>
                <a href="#" style="color: #8B0000; text-decoration: none;">Forgot Password?</a>
            </div> <br> <br>
            
            <button type="submit" class="login-btn">LOGIN</button>

            <p class="register-text">
                Don't Have Account? <a href="#">Register Here</a> 
            </p>
        </form>
    </div>

    <?php
    
</body>
</html>