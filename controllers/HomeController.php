
<?php
require_once "../config/db.php";
class HomeController {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function index() {
        $query = "SELECT * FROM users WHERE id = 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function getRecentProjects() {
        $query = "SELECT * FROM projects WHERE user_id = 1 LIMIT 3";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $projects;
    }
}
?>
