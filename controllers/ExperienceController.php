
<?php
require_once "../config/db.php";
class ExperienceController {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function getWorkExperience() {
        $query = "SELECT * FROM work_experience WHERE user_id = 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $work_experience = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $work_experience;
    }
}
?>
