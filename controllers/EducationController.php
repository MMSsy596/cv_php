
<?php
require_once "../config/db.php";

class EducationController {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function getEducation() {
        $query = "SELECT * FROM education WHERE user_id = 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $education = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $education;
    }
}
?>
