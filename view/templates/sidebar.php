<?php
// Bắt đầu session nếu chưa bắt đầu
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../config/config.php';
require_once '../controllers/UserController.php';

$userController = new UserController($pdo);
$users = $userController->index();

// Kiểm tra xem user_id có được truyền qua URL không
if (isset($_GET['user_id'])) {
    $_SESSION['user_id'] = intval($_GET['user_id']);
} elseif (!isset($_SESSION['user_id']) && !empty($users)) {
    // Nếu chưa có user_id nào trong session, chọn người dùng đầu tiên
    $_SESSION['user_id'] = $users[0]['id'];
} 
?>

<!-- Hiển thị danh sách người dùng -->
<div class="list-group">
    <?php foreach ($users as $user): ?>
        <a href="?user_id=<?php echo $user['id']; ?>" 
           class="list-group-item list-group-item-action <?php echo isset($_SESSION['user_id']) && $_SESSION['user_id'] == $user['id'] ? 'active' : ''; ?>">
            <?php echo htmlspecialchars($user['name']); ?>
        </a>
    <?php endforeach; ?>
</div>
<?php
// Khi người dùng được chọn, lưu ID vào session


?>