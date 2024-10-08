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
                <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
                <link rel="stylesheet" href="../dist/css/adminlte.min.css">
            </div>
            
            <!-- Main Content -->
            <div class="col-md-9">
                <h1>About Me</h1>

                
                <?php if ($selectedUser): ?>
                    <img src="<?php echo $selectedUser['image']; ?>">
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

<footer>
<?php include '../view/templates/footer.php'; ?>
</footer>
</html>
<?php
// Khi người dùng được chọn, lưu ID vào session
if (isset($_GET['user_id'])) {
    $_SESSION['user_id'] = intval($_GET['user_id']);
}

// Khi người dùng được chọn, lưu ID vào session
if (isset($_GET['user_id'])) {
    $_SESSION['user_id'] = intval($_GET['user_id']);
}
?>
