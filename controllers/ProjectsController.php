<?php
require_once "../config/db.php";

class ProjectsController {
    private $conn;

    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    // Lấy tất cả các dự án của người dùng dựa trên user_id
    public function getProjectsByUserId($user_id) {
        $query = "SELECT * FROM projects WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addProject($user_id, $title, $description, $image) {
        $query = "INSERT INTO projects (user_id, title, description, image) VALUES (:user_id, :title, :description, :image)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);
        return $stmt->execute();
    }

    // Cập nhật dự án
    public function updateProject($project_id, $title, $description, $image) {
        $query = "UPDATE projects SET title = :title, description = :description, image = :image WHERE id = :project_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':project_id', $project_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);
        return $stmt->execute();
    }

    // Xóa dự án
    public function deleteProject($project_id) {
        $query = "DELETE FROM projects WHERE id = :project_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':project_id', $project_id);
        return $stmt->execute();
    }
}
?>
