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

if(isset($_GET['delete_id'])){
    $projectsController->deleteProject($_GET['delete_id']);
    header('Location: edit_projects.php');
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
                <th>Title</th>
                <th>Description</th>
                <th>Link</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($projects)): ?>
                <?php foreach ($projects as $project): ?>
                    <tr id="row-<?php echo $experience['id']; ?>">
                        <td><?php echo htmlspecialchars($project['title']); ?></td>
                        <td><?php echo htmlspecialchars($project['description']); ?></td>
                        <td><?php echo htmlspecialchars($project['link']); ?></td>
                        <td>  <img src="<?php echo $project['image']; ?>" alt="<?php echo $project['title']; ?>" width="200px"></td>
                        <td>
                            <a href="projectUpdate.php?project_id=<?php echo $project['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                        <td>
                        <a href="edit_projects.php?delete_id=<?php echo $project['id'];

                        ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this experience?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No Projects found for this user.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="projectUpdate.php" class="btn btn-primary">Add New Project</a>
</div>


</body>
<footer>
    <?php include '../view/templates/footer.php'; ?>
</footer>
</html>