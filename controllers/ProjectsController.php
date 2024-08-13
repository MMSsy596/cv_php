
<?php
require_once "../config/db.php";

class ProjectsController {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function getProjects() {
        $query = "SELECT * FROM projects WHERE user_id = 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $projects;
    }
}
?>
