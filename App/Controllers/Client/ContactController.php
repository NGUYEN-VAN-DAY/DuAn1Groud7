<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Contact\Index;

class ContactController
{
    // Hàm xử lý trang liên hệ
    public static function index()
    {
        // Bắt đầu session nếu chưa

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render();
        Footer::render();
    }

    // Hàm xử lý form liên hệ
    public static function handleContactForm()
    {


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name'] ?? '');
            $email = htmlspecialchars($_POST['email'] ?? '');
            $phone = htmlspecialchars($_POST['phone'] ?? '');
            $message = htmlspecialchars($_POST['message'] ?? '');

            // Gửi email hoặc lưu thông tin vào cơ sở dữ liệu
            $result = self::sendContactEmail($name, $email, $phone, $message);

            // Thêm thông báo dựa trên kết quả gửi form
            if ($result) {
                NotificationHelper::success('contact_form', 'Liên hệ của bạn đã được gửi thành công!');
            } else {
                NotificationHelper::error('contact_form', 'Có lỗi xảy ra khi gửi liên hệ. Vui lòng thử lại!');
            }

            // Quay lại trang liên hệ
            header("Location: /contact");
            exit;
        }
    }

    // Hàm gửi email
    private static function sendContactEmail($name, $email, $phone, $message)
    {
        // Sử dụng PHPMailer để gửi email
        try {
            $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'khanhncpc08418@gmail.com'; // Thay bằng email của bạn
            $mail->Password = 'khanhkhanh'; // Thay bằng mật khẩu ứng dụng
            $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('khanhncpc08418@gmail.com', 'Trang Liên Hệ');
            $mail->addAddress('khanhncpc08418@gmail.com', 'Admin'); // Email nhận liên hệ

            $mail->isHTML(true);
            $mail->Subject = 'Liên hệ từ người dùng';
            $mail->Body = "
                <h2>Thông tin liên hệ:</h2>
                <p><strong>Họ Tên:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Số điện thoại:</strong> $phone</p>
                <p><strong>Nội dung:</strong> $message</p>
            ";

            $mail->send();
            return true;
        } catch (\Exception $e) {
            error_log("Error sending email: " . $mail->ErrorInfo);
            return false;
        }
    }
}
