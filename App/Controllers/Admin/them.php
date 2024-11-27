<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog"; // Tên cơ sở dữ liệu của bạn

// Kết nối với cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra xem form có được gửi không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Truy vấn SQL để thêm bài viết
    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";

    if ($conn->query($sql) === TRUE) {
        echo "Bài viết đã được thêm thành công!<br><br>";
        echo "<a href='view_posts.php'>Xem tất cả bài viết</a>";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

// Đóng kết nối
$conn->close();
?>
