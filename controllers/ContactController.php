<?php
require_once "../config/db.php";

class ContactController {
    private $conn;

    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    // Lấy thông tin liên hệ của người dùng dựa trên user_id
    public function getContactInfo($user_id) {
        $query = "SELECT email, phone, address FROM users WHERE id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
