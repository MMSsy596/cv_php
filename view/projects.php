<?php
session_start(); // Bắt đầu phiên làm việc
require_once '../config/config.php';
require_once '../controllers/UserController.php';
require_once '../controllers/ProjectsController.php';


$userController = new UserController($pdo);
$projectsController = new ProjectsController($pdo);
$projects = null;

if (isset($_SESSION['user_id'])) {
    $selectedUser = $userController->show($_SESSION['user_id']);
    $projects = $projectsController->getProjectsByUserId($_SESSION['user_id']);

}
if (isset($_GET['user_id'])) {
    $_SESSION['user_id'] = intval($_GET['user_id']);
    $projects = $projectsController->getProjectsByUserId($_SESSION['user_id']);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../view/templates/header.php'; ?>
    <style> </style>
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
                <h1>Project</h1>
                <?php if ($projects): ?>
                    <ul>
                    <?php foreach ($projects as $project): ?>
                <li>
                <img src="<?php echo $project['image']; ?>" alt="<?php echo $project['title']; ?>" width="200px">

                    <h3><?php echo $project['title']; ?></h3>
                    <p><?php echo $project['description']; ?></p>
                    <!-- <?php if (!empty($project['image'])): ?>
                        <img src="path/to/uploads/<?php echo $project['image']; ?>" alt="<?php echo $project['title']; ?>" width="200">
                    <?php endif; ?>
                    <form action="../view/uploads/projectUpdate.php" method="post" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Project Title">
    <textarea name="description" placeholder="Project Description"></textarea>
    <input type="file" name="image">
    <input type="submit" value="Upload Project">
</form> -->

                </li>
            <?php endforeach; ?>
                    </ul>
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
