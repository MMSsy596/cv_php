<?php
session_start(); // Bắt đầu phiên làm việc
require_once "../config/db.php";
require_once "../config/config.php";

require_once '../controllers/UserController.php';
require_once '../controllers/ProjectsController.php';

$userController = new UserController($pdo);
$projectsController = new ProjectsController($pdo);
$selectedUser = null;

if (isset($_GET['user_id'])) {
    $selectedUser = $userController->show($_GET['user_id']);
    $projects = $projectsController->getProjects($selectedUser['id']);
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
                <h1>Projects</h1>
                <?php if ($selectedUser): ?>
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($selectedUser['name']); ?></p>
                    <?php if (!empty($projects)): ?>
                        <ul>
                            <?php foreach ($projects as $project): ?>
                                <li>
                                    <h3><?php echo htmlspecialchars($project['title']); ?></h3>
                                    <p><?php echo htmlspecialchars($project['description']); ?></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>No projects found for this user.</p>
                    <?php endif; ?>
                <?php else: ?>
                    <p>Please select a user from the sidebar.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
