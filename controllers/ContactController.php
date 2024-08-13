<?php
require_once "../config/db.php";
class ContactController {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getContactInfo() {
        $query = "SELECT * FROM contacts WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $user_id);
        $user_id = 1;  // Giả sử ID người dùng là 1
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
