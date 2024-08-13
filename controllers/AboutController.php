
<?php
require_once "../config/db.php";

class AboutController {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function getUserInfo() {
        $query = "SELECT * FROM users WHERE id = 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}
?>
