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
if (isset($_GET['delete_id'])) {
    $blogController->delete($_GET['delete_id']);
    header('Location: edit_blog.php'); // Redirect to avoid resubmission
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include '../view/templates/header1.php'; ?>
<meta charset="UTF-8">
    <title>Edit Experience</title>
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body>
<div class="container">
    <h2>Edit Experience</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>title</th>
                <th>content</th>
                <th>image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($blogs)): ?>
                <?php foreach ($blogs as $blog): ?>
                    <tr id="row-<?php echo $blog['id']; ?>">
                        <td><?php echo htmlspecialchars($blog['title']); ?></td>
                        <td><?php echo htmlspecialchars($blog['content']); ?></td>
                        <td>                <img src="<?php echo $blog['image']; ?>" alt="<?php echo $blog['title']; ?>" width="200px">
                        </td>
        
                        <td>
                            <a href="edit_single_experience.php?id=<?php echo $blog['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                        <td>
                        <a href="edit_blog.php?delete_id=<?php echo $blog['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this experience?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No experiences found for this user.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="add_experience.php" class="btn btn-primary">Add New Experience</a>
</div>


</body>
<footer>
    <?php include '../view/templates/footer.php'; ?>
</footer>
</html>