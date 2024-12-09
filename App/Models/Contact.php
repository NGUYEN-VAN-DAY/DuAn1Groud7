<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // Khởi tạo PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Cấu hình SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'khanhncpc08418@gmail.com'; // Thay bằng email gửi
        $mail->Password = 'khanhkhanh'; // Thay bằng mật khẩu ứng dụng
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Thông tin gửi và nhận
        $mail->setFrom('khanhncpc08418@gmail.com', 'Tên bạn');
        $mail->addAddress('khanhncpc08418@gmail.com', 'Tên nhận'); // Thay bằng email của bạn

        // Nội dung email
        $mail->isHTML(true);
        $mail->Subject = 'Thông tin từ form liên hệ';
        $mail->Body = "
            <h2>Thông tin từ người dùng:</h2>
            <p><strong>Họ Tên:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Số điện thoại:</strong> $phone</p>
            <p><strong>Nội dung:</strong> $message</p>
        ";

        // Gửi email
        $mail->send();
        echo "Gửi email thành công!";
    } catch (Exception $e) {
        echo "Gửi email thất bại. Lỗi: {$mail->ErrorInfo}";
    }
}
?>
