<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\User;
use App\Validations\UserValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\User\Create;
use App\Views\Admin\Pages\User\Edit;
use App\Views\Admin\Pages\User\Index;

class UserController
{
    public static function index()
    {
        $user = new User();
        $data = $user->getAllUser();
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }
    public static function create()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Create::render();
        Footer::render();
    }
    public static function store()
    {
        $is_valid = UserValidation::create();
        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm thất bại');
            header('location: /admin/users/create');
            exit;
        }
        $username = $_POST['username'];
        $user = new User();
        $is_exist = $user->getOneUserByUserName($username);
        if ($is_exist) {
            NotificationHelper::error('store', 'Tên đã tồn tại');
            header('location: /admin/users/create');
            exit;
        }
        $data = [
            'username' => $username,
            'name' => $_POST['name'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'status' => $_POST['status'],
            'email' => $_POST['email']
        ];
        $is_upload = UserValidation::uploadAvatar();
        if ($is_upload) {
            $data['avatar'] = $is_upload;
        }
        $result = $user->createUser($data);
        if ($result) {
            NotificationHelper::success('store', 'Thêm thành công');
            header('location: /admin/users');
        } else {
            NotificationHelper::error('store', 'Thêm thất bại');
            header('location: /admin/users/create');
        }
    }
    public static function show() {}
    public static function edit(int $id)
    {
        $user = new User();
        $data = $user->getOneUser($id);
        if (!$data) {
            NotificationHelper::error('edit', 'Không thể xem');
            header('location: /admin/users');
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
        $is_valid = UserValidation::edit();
        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật thất bại');
            header("location: /admin/users/$id");
            exit;
        }
        $user = new User();
        $data = [
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'status' => $_POST['status']
        ];
        if ($_POST['password'] !== '') {
            $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
        $is_upload = UserValidation::uploadAvatar();
        if ($is_upload) {
            $data['avatar'] = $is_upload;
        }
        $result = $user->updateUser($id, $data);
        if ($result) {
            NotificationHelper::success('update', 'Cập nhật thành công');
            header('location: /admin/users');
        } else {
            NotificationHelper::error('update', 'Cập nhật thất bại');
            header("location: /admin/users/$id");
        }
    }
    public static function delete(int $id)
    {
        $user = new User();
        $result = $user->deleteUser($id);
        if ($result) {
            NotificationHelper::success('delete', 'Xóa thành công');
        } else {
            NotificationHelper::error('delete', 'Xóa thất bại');
        }
        header('location: /admin/users');
    }
}
