<?php
require_once "../controllers/HomeController.php";
include '../view/templates/header.php';
include '../view/templates/sidebar.php'; 

$homeController = new HomeController();
$user = $homeController->index();
$projects = $homeController->getRecentProjects();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Portfolio - Home</title>
    <!-- Include AdminLTE 3 styles -->

    <style>/* Đảm bảo sidebar luôn hiển thị ở phía bên phải */
.col-md-3 {
    position: sticky;
    top: 0;
    height: 100vh; /* Chiều cao bằng với chiều cao của trang */
    overflow-y: auto; /* Thêm thanh cuộn nếu nội dung dài */
}

.card {
    margin-top: 20px;
}

.list-group-item {
    background-color: #f8f9fa;
}

.list-group-item a {
    text-decoration: none;
    color: #007bff;
}

.list-group-item a:hover {
    color: #0056b3;
    text-decoration: underline;
}
</style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Main Content Area -->
        <div class="col-md-9">
            <!-- Nội dung chính của trang ở đây -->
        </div>
        
        <!-- Right Sidebar -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Switch User</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="?user=johndoe">John Doe</a></li>
                        <li class="list-group-item"><a href="?user=janesmith">Jane Smith</a></li>
                        <li class="list-group-item"><a href="?user=steverogers">Steve Rogers</a></li>
                        <!-- Thêm các người dùng khác ở đây -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="content">
        <h1>Welcome to My Portfolio</h1>
        <p>This is the home page of my professional portfolio.</p>
        <p>Name: <?php echo $user['name']; ?></p>
        <p>Email: <?php echo $user['email']; ?></p>
        <p>Bio: <?php echo $user['bio']; ?></p>

        <h2>Recent Projects</h2>
        <ul>
            <?php foreach ($projects as $project): ?>
                <li><?php echo $project['title']; ?> - <a href="<?php echo $project['link']; ?>">View Project</a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
