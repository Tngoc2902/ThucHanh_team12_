<?php include 'views/header.php'; ?>

<div class="container py-5">
    <div class="row">
        <!-- Cột Tin Tức -->
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-success"><b>Tin Tức Mới Nhất</b></h2>
                <div class="input-group" style="max-width: 300px;">
                    <input type="text" class="form-control form-control-sm" placeholder="Tìm kiếm...">
                    <button class="btn btn-sm btn-success"><i class="bi bi-search"></i></button>
                </div>
            </div>

            <?php foreach ($_SESSION['news'] as $item): ?>
            <div class="card mb-4 shadow-sm border-0">
                <div class="row g-0">
                    <!-- Hình ảnh -->
                    <div class="col-md-4">
                        <img src="<?php echo htmlspecialchars($item['image']); ?>" class="img-fluid rounded-start"
                            alt="<?php echo htmlspecialchars($item['title']); ?>"
                            style="height: 100%; object-fit: cover;">
                    </div>
                    <!-- Nội dung -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="?action=news&method=detail&id=<?php echo $item['id']; ?>"
                                    class="text-decoration-none text-dark">
                                    <?php echo htmlspecialchars($item['title']); ?>
                                </a>
                            </h5>
                            <p class="card-text text-muted">
                                <?php echo substr(htmlspecialchars($item['content']), 0, 150) . '...'; ?>
                            </p>
                            <p class="card-text">
                                <small class="text-muted">
                                    Đăng ngày: <?php echo date('d/m/Y', strtotime($item['created_at'])); ?>
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Cột Danh Mục -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0">Danh Mục</h3>
                </div>
                <div class="list-group list-group-flush">
                    <?php foreach ($_SESSION['category'] as $category): ?>
                    <a href="?action=filter&categoryId=<?php echo $category['id']; ?>"
                        class="list-group-item list-group-item-action">
                        <?php echo htmlspecialchars($category['name']); ?>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'views/footer.php'; ?>