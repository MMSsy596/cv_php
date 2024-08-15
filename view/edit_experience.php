<?php
require_once '../config/config.php';
require_once '../controllers/ExperienceController.php';
require_once '../controllers/UserController.php';


$userController = new UserController($pdo);
$selectedUser = null;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$experienceController = new ExperienceController($pdo);

if (isset($_SESSION['user_id'])) {
    $experiences = $experienceController->getWorkExperienceByUserId($_SESSION['user_id']);
    $selectedUser = $userController->show($_SESSION['user_id']);

}
if (isset($_GET['user_id'])) {
    $experiences = $experienceController->getWorkExperienceByUserId($_GET['user_id']);
    $selectedUser = $userController->show($_GET['user_id']);

}

if (isset($_GET['delete_id'])) {
    $experienceController->deleteWorkExperienceByUserId($_GET['delete_id']);
    header('Location: edit_experience.php'); // Redirect to avoid resubmission
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    if ($experienceController->update($_SESSION['id'], $title, $description, $start_date, $end_date)) {
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
                <th>Position</th>
                <th>Company</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($experiences)): ?>
                <?php foreach ($experiences as $experience): ?>
                    <tr id="row-<?php echo $experience['id']; ?>">
                        <td><?php echo htmlspecialchars($experience['position']); ?></td>
                        <td><?php echo htmlspecialchars($experience['company']); ?></td>
                        <td><?php echo htmlspecialchars($experience['start_date']); ?></td>
                        <td><?php echo htmlspecialchars($experience['end_date']); ?></td>
                        <td><?php echo htmlspecialchars($experience['description']); ?></td>
                        <td>
                            <a href="edit_single_experience.php?id=<?php echo $experience['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                        <td>
                        <a href="edit_experience.php?delete_id=<?php echo $experience['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this experience?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No experiences found for this user.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="add_experience.php" class="btn btn-primary">Add New Experience</a>
</div>


</body>
<footer>
    <?php include '../view/templates/footer.php'; ?>
</footer>
</html>