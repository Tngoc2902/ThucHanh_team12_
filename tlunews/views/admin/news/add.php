<?php include 'views/header.php'; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white text-center py-3">
                    <h2 class="mb-0">Thêm Tin Tức Mới</h2>
                </div>
                <div class="card-body px-4 py-5">
                    <form action="index.php?action=news&method=add" method="POST" enctype="multipart/form-data">
                        <!-- Tiêu Đề -->
                        <div class="mb-4">
                            <label for="title" class="form-label">Tiêu Đề</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Nhập tiêu đề"
                                required>
                        </div>

                        <!-- Danh Mục -->
                        <div class="mb-4">
                            <label for="category_id" class="form-label">Danh Mục</label>
                            <select class="form-select" id="category_id" name="category_id" required>
                                <option value="">Chọn danh mục</option>
                                <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['id']; ?>">
                                    <?php echo htmlspecialchars($category['name']); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Nội Dung -->
                        <div class="mb-4">
                            <label for="content" class="form-label">Nội Dung</label>
                            <textarea class="form-control" id="content" name="content" rows="8"
                                placeholder="Nhập nội dung tin tức" required></textarea>
                        </div>

                        <!-- Hình Ảnh -->
                        <div class="mb-4">
                            <label for="image" class="form-label">Hình Ảnh</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <!-- Nút hành động -->
                        <div class="d-grid gap-3 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-success btn-lg px-4">Thêm Tin Tức</button>
                            <a href="?action=dashboard" class="btn btn-secondary btn-lg px-4">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'views/footer.php'; ?>