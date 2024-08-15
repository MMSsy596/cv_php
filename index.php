<?php
session_start(); // Bắt đầu phiên làm việc
require_once 'config/config.php';
require_once 'controllers/UserController.php';

$userController = new UserController($pdo);
$selectedUser = null;

if (isset($_SESSION['user_id'])) {
    $selectedUser = $userController->show($_SESSION['user_id']);
}
if (isset($_GET['user_id'])) {
    $selectedUser = $userController->show($_GET['user_id']);
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I Love You</title>
    <!-- <link rel="shortcut icon" href="https://phamvulinh18.github.io/crush6/icon.png" type="image/x-icon"> -->
    <link rel="stylesheet" href=" main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="css2" rel="stylesheet">
    
</head>
<body>
    
<div id="drag-container" style="transform: rotateX(-10.398deg) rotateY(2.80242deg);">
    <div id="spin-container" style="width: 120px; height: 170px; animation: 60s linear 0s infinite normal none running spinRevert;">
        <img src="FB_IMG_1723417952601.jpg" alt="" style="transform: rotateY(0deg) translateZ(233.6px); transition: transform 1s ease 0s;">
        <img src="FB_IMG_1723417952601.jpg" alt="" style="transform: rotateY(45deg) translateZ(233.6px); transition: transform 1s ease 0s;">
        <img src="FB_IMG_1723417952601.jpg" alt="" style="transform: rotateY(90deg) translateZ(233.6px); transition: transform 1s ease 0s;">
        <img src="FB_IMG_1723417952601.jpg" alt="" style="transform: rotateY(135deg) translateZ(233.6px); transition: transform 1s ease 0s;">
        <img src="FB_IMG_1723417952601.jpg" alt="" style="transform: rotateY(180deg) translateZ(233.6px); transition: transform 1s ease 0s;">
        <img src="FB_IMG_1723417952601.jpg" alt="" style="transform: rotateY(225deg) translateZ(233.6px); transition: transform 1s ease 0s;">
        <img src="FB_IMG_1723417952601.jpg" alt="" style="transform: rotateY(270deg) translateZ(233.6px); transition: transform 1s ease 0s;">
      

        <img src="FB_IMG_1723417952601.jpg" alt="" style="transform: rotateY(315deg) translateZ(233.6px); transition: transform 1s ease 0s;">
        <p>CV Project

        </p>
        <a class="navbar-brand" href="view/About.php">My Portfolio</a>
        
            <button class="navbar-toggler" 
            style="background: #1fc11ddd !important;"
            type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" >
                <span class="navbar-toggler-icon"></span>
            </button>
    </div>
    <div id="ground" style="width: 720px; height: 720px;"></div>
</div>

<div id="music-container">
    <audio id="music" controls autoplay loop>
        <source src="flower.ogg" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
</div>

<div id="canva">
    <canvas id="canvas" width="1788" height="857"></canvas>
</div>

<script src="main.js.download"></script>



</body>
</html>
