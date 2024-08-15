<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['user_id'])) {
    $_SESSION['user_id'] = intval($_GET['user_id']);
}

require_once '../config/config.php';
require_once '../controllers/UserController.php';

$userController = new UserController($pdo);
$selectedUser = null;

if (isset($_SESSION['user_id'])) {
    $selectedUser = $userController->show($_SESSION['user_id']);
} else {
    // Nếu không có user_id trong session, có thể chọn user mặc định hoặc thông báo lỗi
    $selectedUser = $userController->show(1); // Chọn user mặc định, ví dụ user có ID 1
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Professional Portfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <style>
    /* Căn giữa các mục trong thanh điều hướng */
.navbar-nav {
    display: flex;
    justify-content: center; /* Căn giữa các mục menu */
    flex-grow: 1; /* Cho phép menu chiếm toàn bộ không gian có sẵn */
    margin: 0;
    padding: 0;
    list-style-type: none; /* Xóa dấu chấm của danh sách */
}

        .navbar-nav .nav-item {
            margin-left: 10px; /* Khoảng cách giữa các mục menu */
        }

        .navbar-nav .nav-item .nav-link {
            color: #343a40;
        }

        .navbar-nav .nav-item .nav-link:hover {
            background-color: #0056b3;
            color: #fff;
        }

        .navbar-nav .nav-item.active .nav-link {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }

        .navbar-brand {
            margin-right: auto; /* Đưa navbar-brand về bên trái */
        }

        .nav-item.dropdown {
            margin-left: auto;
        }

        .nav-item.dropdown img {
            border-radius: 50%;
        }

        .list-group-item a {
            text-decoration: none;
            color: #007bff;
            display: block;
            padding: 10px;
        }

        .list-group-item a:hover, 
        .list-group-item a.active {
            background-color: #f8f9fa;
            color: #0056b3;
        }

        .container-fluid {
            margin-top: 20px;
        }

        .col-md-3 {
            padding: 0;
        }

        .card {
            margin-bottom: 20px;
            width: 100% !important;
        }

        .col-md-9 {
            padding: 20px;
            background-color: #f4f6f9;
        }
        .col-md-9 img{
            width: 140px;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light"
            style="background: #1fc11ddd !important;"
>
            <a class="navbar-brand" href="../index.php">My Portfolio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'About.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="../view/About.php">About Me</a>
                    </li>
                    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'experience.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="../view/experience.php">Experience</a>
                    </li>
                    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'education.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="../view/education.php">Education</a>
                    </li>
                    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'projects.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="../view/projects.php">Projects</a>
                    </li>
                    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'blog.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="../view/blog.php">Blog</a>
                    </li>
                    <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="../view/contact.php">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="<?php echo isset($selectedUser['image']) ? $selectedUser['image'] : 'default_avatar.png'; ?>" alt="User Avatar" class="rounded-circle" width="40" height="40">
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
        <a class="dropdown-item" href="../index.php">Logout</a>
    </div>
</div>

        </nav>
    </header>



    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
</body>


</html>
