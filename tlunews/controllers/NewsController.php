<?php
require_once '../config/database.php';
require_once '../models/News.php';
require_once '../models/Category.php';

class NewsController
{
    private News $newsModel;
    private Category $categoryModel;

    public function __construct()
    {
        $database = new Database();
        $pdo = $database->pdo;
        $this->newsModel = new News($pdo);
        $this->categoryModel = new Category($pdo);
    }

    public function getAllNews(): void
    {
    }

    public function detail(int $id): void
    {
    }
}
?>
