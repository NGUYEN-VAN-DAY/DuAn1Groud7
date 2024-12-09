<?php

namespace App\Controllers\Admin;

use App\Models\Post;
use App\Helpers\NotificationHelper;
use App\Validations\PostValidation;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Post\Index;
use App\Views\Admin\Pages\Post\Create;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Pages\Post\Edit;

class PostController
{
    
    // Hiển thị danh sách bài viết
    public static function index()
    {
        $posts = new Post();
        $data = $posts->getAllPost(); // Lấy tất cả bài viết
        Header::render();
        Notification::render();
        Notification::unset();
        Index::render(['posts' => $data]); // Truyền dữ liệu vào view
        Footer::render();
        
    }
    

    private function getAllPost()
    {
        // Your logic to fetch posts from the database
    }

    
    // Hiển thị form thêm bài viết
    public static function create()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Create::render(); // Hiển thị form tạo bài viết
        Footer::render();
    }

    // Xử lý lưu bài viết mới
    public static function store()
    {
        $is_valid = PostValidation::create();
        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm thất bại');
            header('location: /admin/posts/create');
            exit;
        }
        $title = $_POST['title'];
        $content = $_POST['content'];
        $status = $_POST['status'];


        $post = new Post();
        $is_exist = $post->getOnePostByName($title);
        if ($is_exist) {
            NotificationHelper::error('store', 'Tên loại đã tồn tại');
            header('location: /admin/posts/create');
            exit;
        }
        $data = [
            'title' => $title,
            'content' => $content, 
            'status' => $status  

            
        ];
        $is_upload = PostValidation::uploadimage();
        if ($is_upload) {
            $data['image'] = $is_upload;
        }

        
        $result = $post->createPost($data);
        if ($result) {
            NotificationHelper::success('store', 'Thêm thành công');
            header('location: /admin/posts ');
        } else {
            NotificationHelper::error('posts', 'Thêm thất bại');
            header('location: /admin/posts/create');
        }

        
    }

    public static function edit(int $id)
{
    // Khởi tạo đối tượng Post và lấy bài viết theo ID
    $post = new Post();
    $data = $post->getOnePost($id);

    // Nếu bài viết không tồn tại, hiển thị thông báo lỗi và chuyển hướng về danh sách bài viết
    if (!$data) {
        NotificationHelper::error('edit', 'Không thể xem bài viết');
        header('Location: /admin/posts');
        exit;
    }

    // Render các phần của trang
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Edit::render($data);  // Gọi hàm để render trang chỉnh sửa bài viết
    Footer::render();
}

public static function update(int $id)
{
    // Kiểm tra tính hợp lệ của dữ liệu được gửi đến
    $is_valid = PostValidation::edit();
    if (!$is_valid) {
        NotificationHelper::error('update', 'Cập nhật bài viết thất bại');
        header("Location: /admin/posts/$id");
        exit;
    }

    // Lấy dữ liệu từ form
    $title = $_POST['title'];
    $content = $_POST['content'];
    $status = $_POST['status'];

    

    // Khởi tạo đối tượng Post và kiểm tra nếu bài viết đã tồn tại
    $post = new Post();
    $data = [
        'title' => $title,
        'content' => $content,
        'status' => $status


    ];

    $is_upload = PostValidation::uploadimage();
        if ($is_upload) {
            $data['image'] = $is_upload;
        }
    // Cập nhật bài viết
    $result = $post->updatePost($id, $data);
    if ($result) {
        NotificationHelper::success('update', 'Cập nhật bài viết thành công');
        header('Location: /admin/posts');
    } else {
        NotificationHelper::error('update', 'Cập nhật bài viết thất bại');
        header("Location: /admin/posts/$id");
    }
}

public static function delete(int $id)
{
    $post = new Post();
    $result = $post->deletePost($id);
    if ($result) {
        NotificationHelper::success('delete', 'Xóa thành công');
    } else {
        NotificationHelper::error('delete', 'Xóa thất bại');
    }
    header('location: /admin/posts');
}


}
