<?php
include_once 'config/database.php';
include_once 'models/News.php';
include_once 'models/Category.php';
class HomeController
{
    private $newsModel;
    private $categoryModel;

    public function __construct()
    {
        $database = new Database();
        $this->newsModel = new News($database->pdo);
        $this->categoryModel = new Category($database->pdo);
    }

    public function index()
    {
        $newsList = $this->newsModel->getAll();
        $categoryList = $this->categoryModel->getAll();
        $_SESSION['news'] = [];
        $_SESSION['category'] = [];
        $_SESSION['news'] = $newsList;
        $_SESSION['category'] = $categoryList;
        include 'views/home/index.php';
    }

    public function detail($id) {
        $news = $this->newsModel->getById($id);
        $category = $this->categoryModel->getById($news['category_id'])['name'];
        include 'views/news/detail.php';
    }

    public function filter($categoryId){
        unset($_SESSION['news']);
        $newsList = $this->newsModel->getAllByCategoryId($categoryId);
        $_SESSION['news'] = $newsList;
        include 'views/home/index.php';
    }

    public function search($keyword){
        unset($_SESSION['news']);
        $newsList = $this->newsModel->getByTitleOrContent($keyword);
        $_SESSION['news'] = $newsList;
        include 'views/home/index.php';
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: index.php?action=login');
        exit();
    }
}

?>