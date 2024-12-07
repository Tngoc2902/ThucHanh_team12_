<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập - Hệ Thống Quản Trị NewsFlash</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background: linear-gradient(to right, #f8efd4, #d3e9d7);
        color: #333;
        font-family: 'Arial', sans-serif;
    }

    .card {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        color: #333;
    }

    .card-header {
        text-align: center;
        background: #a3d8b9;
        color: #fff;
        border-radius: 15px 15px 0 0;
    }

    .btn-primary {
        background: #6abf95;
        border: none;
    }

    .btn-primary:hover {
        background: #4da77a;
    }

    .btn-secondary {
        background: #d3d3d3;
        border: none;
    }

    .btn-secondary:hover {
        background: #b8b8b8;
    }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-sm-10">
                <div class="card">
                    <div class="card-header py-3">
                        <h2>Đăng Nhập</h2>
                    </div>
                    <div class="card-body px-4 py-5">
                        <!-- Thông báo lỗi -->
                        <?php if (!empty($error)): ?>
                        <div class="alert alert-danger text-center">
                            <?php echo htmlspecialchars($error); ?>
                        </div>
                        <?php endif; ?>

                        <!-- Form đăng nhập -->
                        <form action="index.php?action=login" method="POST">
                            <div class="mb-4">
                                <label for="username" class="form-label">Tên Đăng Nhập</label>
                                <input type="text" class="form-control" id="username" name="username" required
                                    value="<?php echo htmlspecialchars($username ?? ''); ?>"
                                    placeholder="Nhập tên đăng nhập">
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Mật Khẩu</label>
                                <input type="password" class="form-control" id="password" name="password" required
                                    placeholder="Nhập mật khẩu">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">Đăng Nhập</button>
                                <a href="?action=guest" class="btn btn-secondary btn-lg">Người dùng</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>