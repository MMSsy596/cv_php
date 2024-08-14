
<?php
require_once "../config/db.php";
class BlogController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Lấy tất cả các bài viết blog của người dùng dựa trên user_id
    public function getBlogsByUserId($user_id) {
        $query = "SELECT * FROM blog_posts WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $content) {
        $sql = "UPDATE blog_posts SET title = :title, content = :content WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function delete($delete_id) {
        $query = "DELETE FROM blog_posts WHERE id = :delete_id";
        
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':delete_id', $delete_id);
        $stmt->execute();
        return $stmt->execute();
    }
}
?>
