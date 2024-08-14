<?php
require_once '../../config/config.php';
require_once "../../controllers/ProjectsController.php";

// Kết nối cơ sở dữ liệu
$database = new Database();
$pdo = $database->getConnection();
$projectsController = new ProjectsController($pdo);

// Xử lý upload ảnh
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];

    // Xử lý tệp hình ảnh
    $image_name = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image_name);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // Lưu thông tin dự án vào database
        $projectsController->addProject($user_id, $title, $description, $image_name);
        echo "Project uploaded successfully!";
    } else {
        echo "Error uploading file.";
    }
}
?>
