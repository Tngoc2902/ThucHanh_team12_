<?php
class News 
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo) 
    {
        $this->pdo = $pdo;
    }

    public function getAll(): array 
    {
        $query = "SELECT n.*, c.name AS category_name 
                  FROM news n 
                  LEFT JOIN categories c ON n.category_id = c.id";
        return $this->pdo->query($query)->fetchAll();
    }

    public function getById(int $id): array|false 
    {
        $stmt = $this->pdo->prepare(
            "SELECT n.*, c.name AS category_name 
             FROM news n 
             LEFT JOIN categories c ON n.category_id = c.id 
             WHERE n.id = ?"
        );
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getByTitleOrContent(string $keyword): array|false 
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM news 
             WHERE title LIKE ? OR content LIKE ?"
        );
        $stmt->execute(["%$keyword%", "%$keyword%"]);
        return $stmt->fetch();
    }

    public function add(string $title, string $content, string $image, int $category_id): bool 
    {
        $imgURL = "public/" . $image;
        $stmt = $this->pdo->prepare(
            "INSERT INTO news (title, content, image, category_id) 
             VALUES (?, ?, ?, ?)"
        );
        return $stmt->execute([$title, $content, $imgURL, $category_id]);
    }

    public function update(int $id, string $title, string $content, string $image, int $category_id): bool 
    {
        $stmt = $this->pdo->prepare(
            "UPDATE news 
             SET title = ?, content = ?, image = ?, category_id = ? 
             WHERE id = ?"
        );
        return $stmt->execute([$title, $content, $image, $category_id, $id]);
    }

    public function delete(int $id): bool 
    {
        $stmt = $this->pdo->prepare("DELETE FROM news WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getAllByCategoryId(int $id): array 
    {
        $stmt = $this->pdo->prepare("SELECT * FROM news WHERE category_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }
}
?>