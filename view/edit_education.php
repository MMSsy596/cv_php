<?php
require_once '../config/config.php';
require_once '../controllers/EducationController.php';
require_once '../controllers/UserController.php';


$userController = new UserController($pdo);
$selectedUser = null;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$educationController = new EducationController($pdo);

if (isset($_SESSION['user_id'])) {
    $education = $educationController->getEducationByUserId($_SESSION['user_id']);
    $selectedUser = $userController->show($_SESSION['user_id']);

}
if (isset($_GET['user_id'])) {
    $education = $educationController->getEducationByUserId($_GET['user_id']);
    $selectedUser = $userController->show($_GET['user_id']);

}

if (isset($_GET['delete_id'])) {
    $educationController->delete($_GET['delete_id']);
    header('Location: edit_education.php'); // Redirect to avoid resubmission
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $degree = $_POST['degree'];
    $school = $_POST['school'];
    $major = $_POST['major'];
    $graduation_year = $_POST['graduation_year'];

    if ($education->update($_SESSION['id'], $degree, $school, $major, $graduation_year)) {
        header('Location: experience.php');
        exit();
    } else {
        echo "Error updating experience.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../view/templates/header1.php'; ?>
</head>
<body>
   
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>degree</th>
                <th>school</th>
                <th>major</th>
                <th>graduation_year</th>

                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($education as $edu): ?>
                <tr>
                    <td><?php echo htmlspecialchars($edu['degree']); ?></td>
                    <td><?php echo htmlspecialchars($edu['school']); ?></td>
                    <td><?php echo htmlspecialchars($edu['major']); ?></td>
                    <td><?php echo htmlspecialchars($edu['graduation_year']); ?></td>
                    <td>
                        <a href="edit_single_experience.php?id=<?php echo $edu['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                    <td>
                        <a href="edit_education.php?id=<?php echo $edu['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this experience?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
<footer>
    <?php include '../view/templates/footer.php'; ?>
</footer>
</html>
