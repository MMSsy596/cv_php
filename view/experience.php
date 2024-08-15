<?php
require_once '../config/config.php';
require_once '../controllers/ExperienceController.php';
require_once '../controllers/UserController.php';


$userController = new UserController($pdo);
$selectedUser = null;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$experienceController = new ExperienceController($pdo);

if (isset($_SESSION['user_id'])) {
    $work_experience = $experienceController->getWorkExperienceByUserId($_SESSION['user_id']);
    $selectedUser = $userController->show($_SESSION['user_id']);

}
if (isset($_GET['user_id'])) {
    $work_experience = $experienceController->getWorkExperienceByUserId($_GET['user_id']);
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
                <h1>Work Experience</h1>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($selectedUser['name']); ?></p>
                <?php if ($work_experience): ?>
                    <ul>
                        <?php foreach ($work_experience as $work): ?>
                            <li>
                                <h3><?php echo htmlspecialchars($work['position']); ?> at <?php echo htmlspecialchars($work['company']); ?></h3>
                                <p><?php echo htmlspecialchars($work['description']); ?></p>
                                <p>From: <?php echo htmlspecialchars($work['start_date']); ?> To: <?php echo htmlspecialchars($work['end_date']); ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No work experience available for this user.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
   
</body>
<footer>
    <?php include '../view/templates/footer.php'; ?>
</footer>
</html>
