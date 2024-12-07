<?php
class Category {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $query = "SELECT * FROM categories";
        return $this->pdo->query($query)->fetchAll();
    }

    public function getById($id) {
        $query = "SELECT * FROM categories WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function add($name) {
        $query = "INSERT INTO categories (name) VALUES (?)";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([$name]);
    }

    public function update($id, $name) {
        $query = "UPDATE categories SET name = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([$name, $id]);
    }

    public function delete($id) {
        $query = "DELETE FROM categories WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([$id]);
    }
}
?>
