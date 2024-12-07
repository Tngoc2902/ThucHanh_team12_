<?php include 'views/header.php'; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white text-center py-3">
                    <h2 class="mb-0">Sửa Tin Tức</h2>
                </div>
                <div class="card-body px-4 py-5">
                    <form action="index.php?action=news&method=edit&id=<?php echo $news['id']; ?>" method="POST"
                        enctype="multipart/form-data">
                        
                        <!-- Tiêu Đề -->
                        <div class="mb-4">
                            <label for="title" class="form-label">Tiêu Đề</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="<?php echo htmlspecialchars($news['title']); ?>" placeholder="Nhập tiêu đề"
                                required>
                        </div>

                        <!-- Danh Mục -->
                        <div class="mb-4">
                            <label for="category_id" class="form-label">Danh Mục</label>
                            <select class="form-select" id="category_id" name="category_id" required>
                                <option value="">Chọn danh mục</option>
                                <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['id']; ?>"
                                    <?php echo $category['id'] == $news['category_id'] ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($category['name']); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Nội Dung -->
                        <div class="mb-4">
                            <label for="content" class="form-label">Nội Dung</label>
                            <textarea class="form-control" id="content" name="content" rows="8"
                                placeholder="Nhập nội dung tin tức"
                                required><?php echo htmlspecialchars($news['content']); ?></textarea>
                        </div>

                        <!-- Hình Ảnh Hiện Tại -->
                        <?php if ($news['image']): ?>
                        <div class="mb-4">
                            <label class="form-label">Hình Ảnh Hiện Tại</label>
                            <div>
                                <img src="<?php echo htmlspecialchars($news['image']); ?>" alt="Hình ảnh hiện tại"
                                    class="img-thumbnail" style="max-width: 200px;">
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Thay Đổi Hình Ảnh -->
                        <div class="mb-4">
                            <label for="image" class="form-label">Thay Đổi Hình Ảnh</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <!-- Nút hành động -->
                        <div class="d-grid gap-3 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-success btn-lg px-4">Cập Nhật</button>
                            <a href="index.php?action=dashboard" class="btn btn-secondary btn-lg px-4">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'views/footer.php'; ?>