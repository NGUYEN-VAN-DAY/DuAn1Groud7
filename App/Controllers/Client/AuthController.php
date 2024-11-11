<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Validations\AuthValidation;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Auth\ChangePassword;
use App\Views\Client\Pages\Auth\Edit;
use App\Views\Client\Pages\Auth\ForgotPassword;
use App\Views\Client\Pages\Auth\Login;
use App\Views\Client\Pages\Auth\Register;
use App\Views\Client\Pages\Auth\ResetPassword;

class AuthController
{
    public static function register()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Register::render();
        Footer::render();
    }
    public static function registerAction()
    {
        $is_valid = AuthValidation::register();
        if (!$is_valid) {
            NotificationHelper::error('register_vaild', 'Đăng ký thất bại');
            header('location: /register');
            exit();
        }
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $name = $_POST['name'];
        $data = [
            'username' => $username,
            'password' => $hash_password,
            'email' => $email,
            'name' => $name,

        ];
        $result = AuthHelper::register($data);
        if ($result) {
            header('Location: /login');
        } else {
            header('Location: /register');
        }
    }
    public static function login()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Login::render();
        Footer::render();
    }
    public static function loginAction()
    {
        $is_valid = AuthValidation::login();
        if (!$is_valid) {
            NotificationHelper::error('login', 'Đăng nhập thất bại');
            header('location: /login');
            exit();
        }
        $data = [
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'name' => $_POST['name'],
            'remember' => isset($_POST['remember'])
        ];
        $result = AuthHelper::login($data);
        if ($result) {
            header('location: /');
        } else {
            header('location: /login');
        }
    }
    public static function logout()
    {
        AuthHelper::logout();
        NotificationHelper::success('logout', 'Đăng xuất thành công');
        header('location: /');
    }
    public static function edit($id)
    {
        $result = AuthHelper::edit($id);
        if (!$result) {
            if (isset($_SESSION['error']['login'])) {
                header('location: /login');
                exit();
            }
            if (isset($_SESSION['error']['user_id'])) {
                $data = $_SESSION['user'];
                $user_id = $data['id'];
                header("Location: /users/edit/$user_id");
                exit();
            }
        }
        $data = $_SESSION['user'];
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Edit::render($data);
        Footer::render();
    }
    public static function update($id)
    {
        $is_valid = AuthValidation::edit();
        if (!$is_valid) {
            NotificationHelper::error('update_user', 'Cập nhật thất bại');
            header("Location: /users/$id");
            exit();
        }
        $data = [
            'email' => $_POST['email'],
            'name' => $_POST['name'],
        ];
        $is_upload = AuthValidation::uploadAvatar();
        if ($is_upload) {
            $data['avatar'] = $is_upload;
        }
        $result = AuthHelper::update($id, $data);
        header("Location: /users/$id");
    }

    public static function forgotPassword()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        ForgotPassword::render();
        Footer::render();
    }
    public static function forgotPasswordAction()
    {
        $is_valid = AuthValidation::forgotPassword();
        if (!$is_valid) {
            NotificationHelper::error('forgot_password', 'Lấy lại thất bại');
            header('location: /forgot-password');
            exit;
        }
        $username = $_POST['username'];
        $email = $_POST['email'];
        $data = ['username' => $username];
        $result = AuthHelper::forgotPassword($data);
        if (!$result) {
            NotificationHelper::error('username_exist', 'Tài khoản không tồn tại');
            header('location: /forgot-password');
            exit;
        }
        if ($result['email'] != $email) {
            NotificationHelper::error('email_exist', 'Email chưa chính xác');
            header('location: /forgot-password');
            exit;
        }
        $_SESSION['reset_password'] = [
            'username' => $username,
            'email' => $email
        ];
        header('location: /reset-password');
    }
    public static function resetPassword()
    {
        if (!isset($_SESSION['reset_password'])) {
            NotificationHelper::error('reset_password', 'Vui lòng k để trống');
            header('location: /forgot-password');
            exit;
        }
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        ResetPassword::render();
        Footer::render();
    }
    public static function resetPasswordAction()
    {
        $is_valid = AuthValidation::resetPassword();
        if (!$is_valid) {
            NotificationHelper::error('reset_password', 'Đặc lại mật khẩu thất bại');
            header('location: /reset-password');
            exit;
        }
        $password = $_POST['password'];
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            'username' => $_SESSION['reset_password']['username'],
            'email' => $_SESSION['reset_password']['email'],
            'password' => $hash_password
        ];
        $result = AuthHelper::resetPassword($data);
        if ($result) {
            NotificationHelper::success('reset_password', 'Đặt lại mật khẩu thành công');
            unset($_SESSION['reset_password']);
            header('location: /login');
        } else {
            NotificationHelper::error('reset_password', 'Đặt lại mật khẩu thất bại');
            header('location: /reset-password');
        }
    }
    public static function changePassword()
    {
        $is_login = AuthHelper::checkLogin();
        if (!$is_login) {
            NotificationHelper::error('login', 'Đăng nhập mới được đổi mật khẩu');
            header('location: /login');
            exit();
        }
        $data = $_SESSION['user'];
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        ChangePassword::render($data);
        Footer::render();
    }
    public static function changePasswordAction()
    {
        // validation
        $is_valid = AuthValidation::changePassword();
        if (!$is_valid) {
            NotificationHelper::error('change_password', 'Đổi thất bại');
            header('location: /change-password');
            exit();
        }
        $id = $_SESSION['user']['id'];
        $data = [
            'old_password' => $_POST['old_password'],
            'new_password' => $_POST['new_password'],
        ];
        $result = AuthHelper::changePassword($id, $data);
        header('location: /change-password');
    }
}
