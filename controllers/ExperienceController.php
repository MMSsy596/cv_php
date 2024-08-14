<?php
class ExperienceController {
    private $pdo;
    private $conn;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Lấy tất cả các kinh nghiệm làm việc của người dùng dựa trên user_id
    public function getWorkExperienceByUserId($user_id) {
        $query = "SELECT * FROM work_experience WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update($id, $title, $description, $start_date, $end_date) {
        $sql = "UPDATE experiences SET title = :title, description = :description, start_date = :start_date, end_date = :end_date WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':end_date', $end_date);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function deleteWorkExperienceByUserId($delete_id) {
        $query = "DELETE FROM work_experience WHERE id = :delete_id";
        echo $query;
        
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':delete_id', $delete_id);
        $stmt->execute();
        return $stmt->execute();
    }
}
?>
