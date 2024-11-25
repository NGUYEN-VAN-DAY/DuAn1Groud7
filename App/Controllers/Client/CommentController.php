<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Models\Comment;
use App\Validations\CommentValidation;


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
}
?>