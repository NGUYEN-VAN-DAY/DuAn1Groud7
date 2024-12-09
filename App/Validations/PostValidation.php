<?php

namespace App\Validations;
use App\Helpers\NotificationHelper;

class PostValidation
{
    // Phương thức kiểm tra tạo mới bài viết
    public static function create(): bool
    {
        $is_valid = true;

        // Kiểm tra trường title
        if (empty($_POST['title'])) {
            NotificationHelper::error('title', 'Vui lòng không để trống tiêu đề');
            $is_valid = false;
        }

        // Kiểm tra trường contenttt
        if (empty($_POST['content'])) {
            NotificationHelper::error('content', 'Vui lòng không để trống nội dung');
            $is_valid = false;
        }

        return $is_valid;
    }
    public static function edit(): bool
    {
        $is_valid = true;
        if (!isset($_POST['title']) || $_POST['title'] === '') {
            NotificationHelper::error('title', 'Vui lòng k để trống tên loại');
            $is_valid = false;
        }
        if (!isset($_POST['content']) || $_POST['content'] === '') {
            NotificationHelper::error('content', 'Vui lòng k để trống trạng thái');
            $is_valid = false;
        }
        return $is_valid;
    }
    public static function uploadimage()
    {
      if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
        return false;
      }
      //nơi lưu trữ hình ảnh
      $target_dir = 'public/uploads/posts/';
      //kiểm tra loại file
      $imageFileType = strtolower(pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION));
      if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
        NotificationHelper::error('type_upload', 'Vui lòng upload file JPG, JPEG, PNG, GIF');
        return false;
      }
      $nameImage = date('YmdHmi') . '.' . $imageFileType;
      $target_file = $target_dir . $nameImage;
      if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        NotificationHelper::error('move_upload', 'Không thẻ tải ảnh');
        return false;
      }
      return $nameImage;
    }
}
