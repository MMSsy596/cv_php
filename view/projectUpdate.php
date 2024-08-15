<?php
session_start(); // Bắt đầu phiên làm việc

require_once '../config/config.php';
require_once "../controllers/ProjectsController.php";

// Kết nối cơ sở dữ liệu
$database = new Database();
$pdo = $database->getConnection();
$projectsController = new ProjectsController($pdo);
$project = null;

if (isset($_GET['project_id'])) {
    $project = $projectsController->getProjectById($_GET['project_id']);
 
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];
    $image = $_POST['image'];
    $projectsController->updateProject($user_id, $title, $description, $image, $user_id);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Project</title>
    <?php include '../view/templates/header.php'; ?>
</head>
<body>

    <div class="container">
        <h1>Edit Project</h1>
        <form action="projectUpdate.php?project_id=<?php echo $_GET['project_id']; ?>" method="POST">
            <input type="hidden" name="project_id" value="<?php echo $project['id']; ?>">
            <div class="form-group">
                <label for="name">Project Name</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($project['title']); ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($project['description']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="image_url">Image URL</label>
                <input type="text" class="form-control" id="image" name="image" value="<?php echo htmlspecialchars($project['image']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</body>
</html>

