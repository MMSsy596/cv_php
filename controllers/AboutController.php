
<?php
require_once "../config/db.php";

class AboutController {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function getUserInfo() {
        $query = "SELECT * FROM users WHERE id = :user_id";


        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        echo "$query";
        $stmt->execute();
  

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}
?>
