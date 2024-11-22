<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Comment;
use App\Validations\CommentValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Comment\Create;
use App\Views\Admin\Pages\Comment\Edit;
use App\Views\Admin\Pages\Comment\Index;
use App\Views\Admin\Pages\Product\Edit as ProductEdit;
use App\Views\Admin\Pages\User\Edit as UserEdit;



class CommentController
{
    public static function index()
    {
        $comment = new Comment();
        $data = $comment->getAllCommentJoinProductAndUser();

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }
    public static function create()
    {
       
    }
    public static function store()
    {
       
    }
    public static function show() {}
    public static function edit(int $id)
    {
        $comment = new Comment();
        $data = $comment->getOneCommentJoinProductAndUser($id);
     
        if (!$data) {
            NotificationHelper::error('edit', 'Không thể xem');
            header('location: /admin/comments');
            exit;
        }
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Edit::render($data);
        Footer::render();
    }
        public static function update(int $id)
        {
            $is_valid = CommentValidation::edit();
            if (!$is_valid) {
                NotificationHelper::error('update', 'Cập nhật thất bại');
                header("location: /admin/comments/$id");
                exit;
            }
            $status = $_POST['status'];
            $comment = new Comment();
          
            $data = [
                'status' => $status,
            ];
            $result = $comment->updateComment($id, $data);
            if ($result) {
                NotificationHelper::success('update', 'cập nhật thành công');
                header("location: /admin/comments");
            } else {
                NotificationHelper::error('update', 'Cập nhật thất bại');
                header("location: /admin/comments/$id");
            }
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
        header('location: /admin/comments');
    }
}
