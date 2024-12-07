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
        
        <form>
            <div class="input-group">
                <label>Username</label>
                <div class="input-with-icon">
                    <i class="user-icon fas fa-user"></i>
                    <input type="text" required>
                </div>
            </div>

            <div class="input-group">
                <label>Email</label>
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

            <div class="input-group">
                <label>Confirm Password</label>
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
            
            <button type="submit" class="login-btn">REGISTER</button>

            <p class="login-text">
                Already having an account? <a href="../login.php">Login Here</a> 
            </p>
        </form>
    </div>
</body>
</html>