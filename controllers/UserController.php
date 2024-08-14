<?php
class UserController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $stmt = $this->pdo->query('SELECT id, name FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function show($userId) {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->execute(['id' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update($id, $name, $email, $image, $phone, $address, $bio) {
        $stmt = $this->pdo->prepare("UPDATE users SET name = :name, email = :email, image = :image, phone = :phone, address = :address, bio = :bio WHERE id = :id");
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'image' => $image,
            'phone' => $phone,
            'address' => $address,
            'bio' => $bio,
            'id' => $id
        ]);
    }
}
?>
