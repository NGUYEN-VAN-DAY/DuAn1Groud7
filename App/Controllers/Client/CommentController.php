<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Models\Comment;
use App\Validations\CommentValidation;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Auth\Edit;

class CommentController
{
    public static function store()
{
    if (!isset($_POST['product_id']) || !$_POST['product_id']) {
        NotificationHelper::error('store', 'Product ID is missing.');
        header("location: /products");
        exit;
    }

    $is_valid = CommentValidation::createClient();
    if (!$is_valid) {
        NotificationHelper::error('store', 'Thêm bình luận thất bại');
        header("location: /products/{$_POST['product_id']}");
        exit;
    }

    $product_id = $_POST['product_id'];
    $data = [
        'content' => $_POST['content'],
        'product_id' => $product_id,
        'user_id' => $_POST['user_id'],
    ];

    $comment = new Comment();
    $result = $comment->createComment($data);
    if ($result) {
        NotificationHelper::success('store', 'Thêm bình luận thành công');
    } else {
        NotificationHelper::error('store', 'Thêm bình luận thất bại');

    }
    header("location: /products/$product_id");
}

public static function delete(int $id)
{
    $comment = new Comment();
    $result = $comment->deleteComment($id);
    if ($result) {
        NotificationHelper::success('delete', 'Xóa thành công');
    } else {
        NotificationHelper::error('delete', 'Xóa thất bại');
    }
    header("location: /products/{$_POST['product_id']}");
}
public static function edit(int $id)
    {
        $comment = new Comment();
        $data = $comment->getOneCommentJoinProductAndUser($id);
     
        if (!$data) {
            NotificationHelper::error('edit', 'Không thể xem');
            header('location: /client/comments');
            exit;
        }
       
    }
    public function update(int $id)
{
    // Kiểm tra và xác thực dữ liệu
    if (empty($_POST['content'])) {
        NotificationHelper::error('update', 'Nội dung không được để trống.');
        header("location: /products/{$_POST['product_id']}");
        exit;
    }

    // Chuẩn bị dữ liệu để cập nhật
    $data = [
        'content' => $_POST['content'],
        'status' => $_POST['status'] ?? 1, // Trạng thái mặc định là 1
    ];

    $commentModel = new Comment();
    $result = $commentModel->updateComment($id, $data);

    // Xử lý kết quả
    if ($result) {
        NotificationHelper::success('update', 'Cập nhật bình luận thành công.');
    } else {
        NotificationHelper::error('update', 'Cập nhật bình luận thất bại.');
    }

    // Chuyển hướng về trang sản phẩm
    header("location: /products/{$_POST['product_id']}");
}

    
    
}

?>