<?php
session_start(); // Bắt đầu phiên làm việc
require_once '../config/config.php';
require_once '../controllers/UserController.php';

$userController = new UserController($pdo);
$selectedUser = null;

if (isset($_SESSION['user_id'])) {
    $selectedUser = $userController->show($_SESSION['user_id']);
}
if (isset($_GET['user_id'])) {
    $selectedUser = $userController->show($_GET['user_id']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../view/templates/header.php'; ?>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <?php include '../view/templates/sidebar.php'; ?>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-9">
                <h1>About Me</h1>

                
                <?php if ($selectedUser): ?>
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($selectedUser['name']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($selectedUser['email']); ?></p>
                    <p><strong>Bio:</strong> <?php echo htmlspecialchars($selectedUser['bio']); ?></p>
                <?php else: ?>
                    <p>Please select a user from the sidebar.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
