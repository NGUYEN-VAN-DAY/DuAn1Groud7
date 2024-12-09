<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Validations\AuthValidation;
use App\Views\Client\Components\Notification;
use App\Models\Post;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Post\index;




class PostController
{

    public static function index()
    {
        // Lấy tất cả bài viết từ model
        $postsModel = new Post();
        $posts = $postsModel->getAllPost(); // Lấy tất cả bài viết

        // Truyền dữ liệu vào view
        Header::render();
        index::render(['posts' => $posts]); // Truyền bài viết vào view
        Footer::render();
    }
    
}
