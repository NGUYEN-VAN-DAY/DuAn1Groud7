<?php
namespace App\Controllers\Client;

use App\Models\Comment;

class CommentController
{
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $commentModel = new Comment();
            $data = [
                'content' => $_POST['content'],
                'user_id' => $_POST['user_id'],
                'product_id' => $_POST['product_id'],
                'status' => 1, // 1 = enabled
                'date' => date('Y-m-d H:i:s')
            ];
            $result = $commentModel->createComment(data: $data);

            if ($result) {
                header(header: 'Location: ' . $_SERVER['HTTP_REFERER']); 
                exit;
            } else {
                die('Lỗi khi thêm bình luận.');
            }
        }
    }
}
?>