<?php

namespace App\Helpers;

use App\Models\User;

class AuthHelper
{
    public static function register($data)
    {
        $user = new User();
        $is_exist = $user->getOneUserByUsername($data['username']);
        if ($is_exist) {
            NotificationHelper::error('exist_register', 'Tên đăng nhập đã tồn tại');
            return false;
        }
        $result = $user->createUser($data);
        if ($result) {
            NotificationHelper::success('register', 'Đăng ký thành công');
            return true;
        }
        NotificationHelper::error('register', 'Đăng Ký thất bại');
        return false;
    }
    public static function login($data)
    {
        $user = new User();
        $is_exist = $user->getOneUserByUsername($data['username']);
        if (!$is_exist) {
            NotificationHelper::error('username', 'Tên đăng nhập không tồn tại');
            return false;
        }
        if (!password_verify($data['password'], $is_exist['password'])) {
            NotificationHelper::error('password', 'Mật khẩu chưa chính xác');
            return false;
        }
        if ($is_exist['status'] == 0) {
            NotificationHelper::error('status', 'Tài khoản đã bị khóa');
            return false;
        }
        if ($data['remember']) {
            self::updateCookie($is_exist['id']);
        } else {
            self::updateSession($is_exist['id']);
        }
        NotificationHelper::success('login', 'Đăng nhập thành công');
        return true;
    }
    public static function updateCookie(int $id)
    {
        $user = new User();
        $result = $user->getOneUser($id);
        if ($result) {
            $user_data = json_encode($result);
            setcookie('user', $user_data, time() + 3600 * 24 * 30 * 12, '/');
            $_SESSION['user'] = $result;
            return true;
        }
    }
    public static function updateSession(int $id)
    {
        $user = new User();
        $result = $user->getOneUser($id);
        if ($result) {
            $_SESSION['user'] = $result;
            return true;
        }
    }
    public static function checkLogin(): bool
    {
        if (isset($_COOKIE['user'])) {
            $user = $_COOKIE['user'];
            $user_data = (array) json_decode($user);
            self::updateCookie($user_data['id']);
            return true;
        }
        if (isset($_SESSION['user'])) {
            self::updateSession($_SESSION['user']['id']);
            return true;
        }
        return false;
    }
    public static function logout()
    {
        unset($_SESSION['user']);
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        if (isset($_COOKIE['user'])) {
            setcookie('user', '', time() - 3600 * 24 * 30 * 12, '/');
        }
    }
    public static function edit($id): bool
    {
        if (!self::checkLogin()) {
            NotificationHelper::error('login', 'Vui lòng đăng nhập');
            return false;
        }
        $data = $_SESSION['user'];
        $user_id = $data['id'];
        if ($user_id != $id) {
            NotificationHelper::error('user_id', 'Bạn không có quyền');
            return false;
        }
        return true;
    }
    public static function update($id, $data)
    {
        $user = new User();
        $result = $user->updateUser($id, $data);
        if (!$result) {
            NotificationHelper::error('update_user', 'Cập nhật thất bại');
            return false;
        }
        if ($_SESSION['user']) {
            self::updateSession($id);
        }
        if ($_COOKIE['user']) {
            self::updateCookie($id);
        }
        NotificationHelper::success('update_user', 'Cập nhật thông tin tài khoản thành công');
        return true;
    }
    public static function changePassword($id, $data)
    {
        $user = new User();
        $result = $user->getOneUser($id);
        if (!$result) {
            NotificationHelper::error('account', 'Tài khoản không tồn tại');
            return false;
        }
        if (!password_verify($data['old_password'], $result['password'])) {
            NotificationHelper::error('password_verify', 'Mật khẩu chưa chính xác');
            return false;
        }
        $hash_password = password_hash($data['new_password'], PASSWORD_DEFAULT);
        $data_update = [
            'password' => $hash_password,
        ];
        $result_update = $user->updateUser($id, $data_update);
        if ($result_update) {
            if (isset($_COOKIE['user'])) {
                self::updateCookie($id);
            }
            self::updateSession($id);
            NotificationHelper::success('change_password', 'Đổi thành công');
            return true;
        } else {
            NotificationHelper::error('change_password', 'Đổi thất bại');
            return false;
        }
    }
    public static function forgotPassword($data)
    {
        $user = new User();
        $result = $user->getOneUserByUsername($data['username']);
        return $result;
    }
    public static function middLeware()
    {
        $admin = explode('/', $_SERVER['REQUEST_URI']);
        $admin = $admin[1];
        if ($admin == 'admin') {
            if (!isset($_SESSION['user'])) {
                NotificationHelper::error('admin', 'Vui lòng đăng nhập');
                header('location:/login');
                exit;
            }
            if ($_SESSION['user']['role'] != 1) {
                NotificationHelper::error('admin', 'Bạn không có quyền');
                header('location:/login');
                exit;
            }
        }
    }
    public static function resetPassword($data)
    {
        $user = new User();
        $result = $user->updateUserByUsernameAndEmail($data);
        return $result;
    }
}
