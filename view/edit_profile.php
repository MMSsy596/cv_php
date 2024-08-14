<?php
session_start();
require_once '../config/config.php';
require_once '../controllers/UserController.php';

$userController = new UserController($pdo);
$selectedUser = null;

if (isset($_SESSION['user_id'])) {
    $selectedUser = $userController->show($_SESSION['user_id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission to update user profile
    $name = $_POST['name'];
    $email = $_POST['email'];
    $image = $_POST['image']; // This could be handled with file upload if necessary
    $address = $_POST['address'];
    $bio = $_POST['bio'];
    $phone = $_POST['phone'];

    $userController->update($_SESSION['user_id'], $name, $email, $image, $phone, $address, $bio);
    header('Location: About.php'); // Redirect to profile or another page after update
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include '../view/templates/header1.php'; ?>

    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <!-- Include AdminLTE 3 styles -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body>

    <div class="container mt-5">
        <h1>Edit Profile</h1>
        
        <form action="edit_profile.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($selectedUser['name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($selectedUser['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control" value="<?php echo htmlspecialchars($selectedUser['phone']); ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" class="form-control" value="<?php echo htmlspecialchars($selectedUser['address']); ?>" required>
            </div>
            <div class="form-group">
                <label for="bio">Bio</label>
                <input type="text" id="bio" name="bio" class="form-control" value="<?php echo htmlspecialchars($selectedUser['bio']); ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Profile Image URL</label>
                <input type="text" id="image" name="image" class="form-control" value="<?php echo htmlspecialchars($selectedUser['image']); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
    <!-- Include necessary scripts -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
