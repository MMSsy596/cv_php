<?php

require_once "../controllers/UserController.php";
require_once '../config/config.php';



$userController = new UserController($pdo);
$users = $userController->index();
$selectedUser = null;

if (isset($_GET['user_id'])) {
    $selectedUser = $userController->show($_GET['user_id']);
    if (isset($_GET['user_id'])) {
        $_SESSION['user_id'] = intval($_GET['user_id']);
    }
}
?>



    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Select User</h3>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <?php foreach ($users as $user): ?>
                    <li class="list-group-item">
                        <a href="?user_id=<?php echo $user['id']; ?>" 
                           class="<?php echo isset($_GET['user_id']) && $_GET['user_id'] == $user['id'] ? 'active' : ''; ?>">
                            <?php echo $user['name']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

