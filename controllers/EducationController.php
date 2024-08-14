<?php

class EducationController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Lấy tất cả các thông tin học vấn của người dùng dựa trên user_id
    public function getEducationByUserId($user_id) {
        $query = "SELECT * FROM education WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $degree, $school, $major, $graduation_year) {
        $sql = "UPDATE education SET degree = :degree, school = :school, major = :major, graduation_year = :graduation_year WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':degree', $degree);
        $stmt->bindParam(':school', $school);
        $stmt->bindParam(':major', $major);
        $stmt->bindParam(':graduation_year', $graduation_year);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function delete($delete_id) {
        $query = "DELETE FROM education WHERE id = :delete_id";
        echo $query;
        
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':delete_id', $delete_id);
        $stmt->execute();
        return $stmt->execute();
    }
}
?>
