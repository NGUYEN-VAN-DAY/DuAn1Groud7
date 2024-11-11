<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class UserValidation
{
  public static function create(): bool
  {
    $is_valid = true;
    if (!isset($_POST['username']) || $_POST['username'] === '') {
      NotificationHelper::error('username', 'Vui lòng k để trống tên đăng nhập');
      $is_valid = false;
    }

    if (!isset($_POST['password']) || $_POST['password'] === '') {
      NotificationHelper::error('password', 'Vui lòng k để trống mật khẩu');
      $is_valid = false;
    } else {
      if (strlen($_POST['password']) < 3) {
        NotificationHelper::error('password', 'Mật khẩu phải từ 3 ký tự');
        $is_valid = false;
      }
    }

    if (!isset($_POST['re_password']) || $_POST['re_password'] === '') {
      NotificationHelper::error('re_password', 'Vui lòng k để trống nhập lại mật khẩu');
      $is_valid = false;
    } else {
      if ($_POST['password'] != $_POST['re_password']) {
        NotificationHelper::error('re_password', 'Mật khẩu chưa khớp');
        $is_valid = false;
      }
    }

    if (!isset($_POST['name']) || $_POST['name'] === '') {
      NotificationHelper::error('name', 'Vui lòng k để trống Họ và tên');
      $is_valid = false;
    }

    if (!isset($_POST['status']) || $_POST['status'] === '') {
      NotificationHelper::error('status', 'Vui lòng k để trống trạng thái');
      $is_valid = false;
    }

    if (!isset($_POST['email']) || $_POST['email'] === '') {
      NotificationHelper::error('email', 'Vui lòng k để trống Email');
      $is_valid = false;
    } else {
      $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
      if (!preg_match($emailPattern, $_POST['email'])) {
        NotificationHelper::error('email', 'Email không hợp lệ');
        $is_valid = false;
      }
    }
    return $is_valid;
  }
  public static function edit(): bool
  {
    $is_valid = true;
    if (isset($_POST['password']) && $_POST['password'] !== '') {
      if (strlen($_POST['password']) < 3) {
        NotificationHelper::error('password', 'Mật khẩu từ 3 ký tự');
        $is_valid = false;
      }

      if (!isset($_POST['re_password']) || $_POST['re_password'] === '') {
        NotificationHelper::error('re_password', 'Vui lòng k để trống nhập lại mật khẩu');
        $is_valid = false;
      } else {
        if ($_POST['password'] != $_POST['re_password']) {
          NotificationHelper::error('re_password', 'Mật khẩu chưa khớp');
          $is_valid = false;
        }
      }
    }

    if (!isset($_POST['email']) || $_POST['email'] === '') {
      NotificationHelper::error('email', 'Vui lòng k để trống Email');
      $is_valid = false;
    } else {
      $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
      if (!preg_match($emailPattern, $_POST['email'])) {
        NotificationHelper::error('email', 'Email không hợp lệ');
        $is_valid = false;
      }
    }

    if (!isset($_POST['status']) || $_POST['status'] === '') {
      NotificationHelper::error('status', 'Vui lòng k để trống trạng thái');
      $is_valid = false;
    }

    if (!isset($_POST['name']) || $_POST['name'] === '') {
      NotificationHelper::error('name', 'Vui lòng k để trống Họ và tên');
      $is_valid = false;
    }
    return $is_valid;
  }
  public static function uploadAvatar()
  {
    if (!file_exists($_FILES['avatar']['tmp_name']) || !is_uploaded_file($_FILES['avatar']['tmp_name'])) {
      return false;
    }
    //nơi lưu hình ảnh
    $target_dir = 'public/uploads/users/';
    // kiểm tra loại file
    $imageFileType = strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION));
    if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
      NotificationHelper::error('type_upload', 'Vui lòng upload file JPG, JPEG, PNG, GIF');
      return false;
    }
    $nameImage = date('YmdHmi') . '.' . $imageFileType;
    $target_file = $target_dir . $nameImage;
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file)) {
      NotificationHelper::error('move_upload', 'Không thẻ tải ảnh vào thư mục đã lưu trữ');
      return false;
    }
    return $nameImage;
  }
}
