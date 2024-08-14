<?php

session_start(); // Bắt đầu phiên làm việc
require_once '../config/config.php';


require_once '../controllers/UserController.php';
require_once '../controllers/BlogController.php';

$userController = new UserController($pdo);
$blogController = new BlogController($pdo);
$selectedUser = null;

if (isset($_SESSION['user_id'])) {
    $selectedUser = $userController->show($_SESSION['user_id']);
    $blogs = $blogController->getBlogsByUserId($selectedUser['id']);
}
if (isset($_GET['user_id'])) {
    $selectedUser = $userController->show($_GET['user_id']);
    $blogs = $blogController->getBlogsByUserId($selectedUser['id']);

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
                <h1>Blog</h1>
                <?php if ($selectedUser): ?>
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($selectedUser['name']); ?></p>
                    <?php if (!empty($blogs)): ?>
                        <ul>
                            <?php foreach ($blogs as $blog): ?>
                                <li>
                                    <h3><?php echo htmlspecialchars($blog['title']); ?></h3>
                                    <p><?php echo htmlspecialchars($blog['content']); ?></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>No blog posts found for this user.</p>
                    <?php endif; ?>
                <?php else: ?>
                    <p>Please select a user from the sidebar.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
