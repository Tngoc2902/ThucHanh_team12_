<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-success">Quản Lý Tin Tức</h2>
    <a href="index.php?action=news&method=add" class="btn btn-success btn-lg">
        <i class="bi bi-plus-circle"></i> Thêm Tin Tức
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover"> 
                <thead class="table-light">
                    <tr>
                        <th>Tiêu Đề</th>
                        <th>Danh Mục</th>
                        <th>Ngày Đăng</th>
                        <th>Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php foreach ($news as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['title']); ?></td>
                        <td><?php echo htmlspecialchars($item['category_name']); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($item['created_at'])); ?></td>
                        <td>
                            <a href="index.php?action=news&method=edit&id=<?php echo $item['id']; ?>"
                                class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i> Sửa
                            </a>
                            <a href="index.php?action=news&method=delete&id=<?php echo $item['id']; ?>"
                                class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa tin này?')">
                                <i class="bi bi-trash-fill"></i> Xóa
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
body {
    background: #f8f9fa;
    font-family: 'Arial', sans-serif;
}

.card {
    border-radius: 10px;
    background: #fff;
}

.btn-success {
    background-color: #6abf95;
    border: none;
}

.btn-success:hover {
    background-color: #4da77a;
}

.btn-warning {
    color: #fff;
    background-color: #f39c12;
    border: none;
}

.btn-warning:hover {
    background-color: #d68910;
}

.btn-danger {
    background-color: #e74c3c;
    border: none;
}

.btn-danger:hover {
    background-color: #c0392b;
}

table.table-hover tbody tr:hover {
    background-color: #f4f4f4;
}

table.table-hover tbody tr td {
    vertical-align: middle;
}
</style>