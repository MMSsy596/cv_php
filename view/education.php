<?php
require_once '../config/config.php';
require_once '../controllers/EducationController.php';
require_once '../controllers/UserController.php';


$userController = new UserController($pdo);
$selectedUser = null;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$educationController = new EducationController($pdo);

if (isset($_SESSION['user_id'])) {
    $education = $educationController->getEducationByUserId($_SESSION['user_id']);
    $selectedUser = $userController->show($_SESSION['user_id']);

}
if (isset($_GET['user_id'])) {
    $education = $educationController->getEducationByUserId($_GET['user_id']);
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
                <h1>Education</h1>
                <?php if ($selectedUser): ?>
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($selectedUser['name']); ?></p>
                    <?php if (!empty($education)): ?>
                        <ul>
                            <?php foreach ($education as $edu): ?>
                                <li>
                                        <h3><?php echo htmlspecialchars($edu['degree']); ?> at <?php echo htmlspecialchars($edu['school']); ?></h3>
                                    <p>Graduated: <?php echo htmlspecialchars($edu['graduation_year']); ?></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>No education records found for this user.</p>
                    <?php endif; ?>
                <?php else: ?>
                    <p>Please select a user from the sidebar.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
