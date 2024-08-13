<?php session_start(); // Bắt đầu phiên làm việc
if (isset($_GET['user_id'])) {
    $_SESSION['user_id'] = intval($_GET['user_id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Professional Portfolio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Information</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <style>
        .navbar-nav .nav-item.active .nav-link {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }

        .navbar-nav .nav-item .nav-link {
            color: #343a40;
        }

        .navbar-nav .nav-item .nav-link:hover {
            background-color: #0056b3;
            color: #fff;
        }
        .navbar-nav {
    margin: 0 auto; /* Căn giữa các mục menu */
    display: flex;
    justify-content: center;
}

.navbar-nav .nav-item {
    margin: 0 10px; /* Khoảng cách giữa các mục menu */
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
    /* Đảm bảo sidebar và nội dung chính không bị chồng chéo */
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

.col-md-9 {
    padding: 20px;
    background-color: #f4f6f9;
}

}


    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light"
            style="background: #1fc11ddd !important;"
>
        
        <a class="navbar-brand" href="index.php">My Portfolio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                    <a class="nav-link" href="../view/index.php">Home</a>
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
    </nav>
</header>

     <!-- jQuery -->
     <script src="plugins/jquery/jquery.min.js"></script>
    
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>
</html>
