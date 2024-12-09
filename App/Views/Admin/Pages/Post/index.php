<?php

namespace App\Views\Admin\Pages\Post;

use App\Views\BaseView;

class index extends BaseView
{
    public static function render($data = null)
    {
        // Kiểm tra xem $data có phải là mảng không
        $items = isset($data['posts']) ? $data['posts'] : [];

?>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ BÀI VIẾT</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách bài viết</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Danh sách bài viết</h5>

                                <!-- Kiểm tra nếu $items có dữ liệu -->
                                <?php if (count($items) > 0): ?>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Tên bài viết</th>
                                                    <th>Nội dung</th>
                                                    <th>Hình ảnh</th>
                                                    <th>trạng thái</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($items as $item): ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($item['id']) ?></td>
                                                        <td><?= htmlspecialchars($item['title']) ?></td>
                                                        <td><?= htmlspecialchars($item['content']) ?></td>
                                                        <td>

                                                            <?php if (!empty($item['image']) && file_exists('public/uploads/posts/' . $item['image'])): ?>
                                                                <img src="<?= APP_URL ?>/public/uploads/posts/<?= htmlspecialchars($item['image']) ?>" alt="image" width="100px">
                                                            <?php else: ?>
                                                                <span>No image</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        
                                                        <td>
                                                            <?= htmlspecialchars($item['status'] == 1) ? 'Hiển thị' : 'Ẩn'?></td>
                                                        </td>

                                                        </td>

                                                        <td>
                                                            <a href="/admin/posts/<?= htmlspecialchars($item['id']) ?>" class="btn btn-primary">Sửa</a>
                                                            <form action="/admin/posts/<?= htmlspecialchars($item['id']) ?>" method="POST" style="display:inline;">
                                                                <input type="hidden" name="method" value="DELETE">
                                                                <button type="submit" class="btn btn-danger text-white" onclick="return confirm('Bạn chắc chắn muốn xóa bài viết này?')">Xóa</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php else: ?>
                                    <h4 class="text-center text-danger">Chưa có dữ liệu</h4>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid -->
            <!-- ============================================================== -->
        </div>
<?php
    }
}
?>