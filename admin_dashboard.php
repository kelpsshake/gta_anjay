<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1) {
    header("Location: depan/depan.php");
    exit();
}

if (isset($_GET['delete'])) {
    $username = $_GET['delete'];
    $deleteSql = "DELETE FROM users WHERE username = ?";
    $deleteStmt = $pdo->prepare($deleteSql);
    $deleteStmt->execute([$username]);
}

if (isset($_POST['edit_user'])) {
    $oldUsername = $_POST['old_username']; 
    $newUsername = $_POST['username']; 
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $updateSql = "UPDATE users SET username = ?, email = ?, password = ? WHERE username = ?";
        $updateStmt = $pdo->prepare($updateSql);
        $updateStmt->execute([$newUsername, $email, $hashedPassword, $oldUsername]);
    } else {
        $updateSql = "UPDATE users SET username = ?, email = ? WHERE username = ?";
        $updateStmt = $pdo->prepare($updateSql);
        $updateStmt->execute([$newUsername, $email, $oldUsername]);
    }

    header("Location: admin_dashboard.php");
    exit();
}

$sql = "SELECT * FROM users";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Dashboard Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="admin_dashboard.css">
    <script src="https://unpkg.com/feather-icons"></script>


</head>
<body>
    <div class="logo">
        <img alt="" src="img/rockstar.png">
    </div>
    <div class="container">
        <div class="header">Dashboard <span style="color: red;">Admin</span></div>
        <h2 style="color: white;">Manage <span style="color: red;">User</span> Accounts</h2>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Created at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo htmlspecialchars($user['created_at']); ?></td>
                        <td>
                            <a style="color: white;" href="?username=<?php echo urlencode($user['username']); ?>"><i data-feather="edit"></i></a>
                            <span style="border-left: 1px solid white; height: 20px; margin: 0 10px;"></span> <!-- Vertical line -->
                            <a style="color: red;" href="#" onclick="openModal('<?php echo urlencode($user['username']); ?>')"><i data-feather="user-x"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div id="deleteModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Confirm Deleting</h2>
                <p>Are you sure you want to delete this user?</p>
                <button class="modal-button" id="confirmDelete">Yes, Delete</button>
                <button class="modal-button cancel" onclick="closeModal()">Cancel</button>
            </div>
        </div>

        <?php if (isset($_GET['username'])): ?>
            <?php
            $username = $_GET['username'];
            $editSql = "SELECT * FROM users WHERE username = ?";
            $editStmt = $pdo->prepare($editSql);
            $editStmt->execute([$username]);
            $editUser  = $editStmt->fetch();
            ?>
           
<div class="floating-alert">
    <h2 class="edit-user-title">Edit <span style="color: red;">User </span> Account</h2>
    <form method="POST" class="edit-user-form">
        <input type="hidden" name="old_username" value="<?php echo htmlspecialchars($editUser  ['username']); ?>">
        <div class="form-group">
            <label for="username" class="form-label">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($editUser  ['username']); ?>" required class="form-input">
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($editUser  ['email']); ?>" required class="form-input">
        </div>
        <button type="submit" name="edit_user" class="update-button">Update User</button>
        <span class="close-alert" onclick="closeAlert()">×</span> 
    </form>
</div>

<script>
    </script>
        <?php endif; ?>
        
        <div class="logout-container">
            <a href="login.php" class="logout-button">Logout</a>
        </div>
    </div>
    
    <script>
        function closeAlert() {
            document.querySelector('.floating-alert').style.display = 'none';
        }
        function openModal(username) {
            document.getElementById('deleteModal').style.display = 'block';
            document.getElementById('confirmDelete').onclick = function() {
                window.location.href = '?delete=' + username;
            };
        }

        function closeModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if ( event.target == document.getElementById('deleteModal')) {
                closeModal();
            }
        }
        feather.replace();
    </script>
</body>
</html>         