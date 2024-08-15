<?php
require_once "../config/db.php";

class ProjectsController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Lấy tất cả các dự án của người dùng dựa trên user_id
    public function getProjectsByUserId($user_id) {
        $query = "SELECT * FROM projects WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addProject($user_id, $title, $description, $image) {
        $query = "INSERT INTO projects (user_id, title, description, image) VALUES (:user_id, :title, :description, :image)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);
        return $stmt->execute();
    }

    // Cập nhật dự án
    public function updateProject($project_id, $title, $description, $image) {
        $query = "UPDATE projects SET title = :title, description = :description, image = :image WHERE id = :project_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':project_id', $project_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);
        return $stmt->execute();
    }

    // Xóa dự án
    public function deleteProject($delete_id) {
        $query = "DELETE FROM projects WHERE id = :delete_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':delete_id', $delete_id);
        return $stmt->execute();
    }
    public function getProjectById($project_id) {
        $query = "SELECT * FROM projects WHERE id = :project_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':project_id', $project_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

