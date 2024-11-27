<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog"; // Tên cơ sở dữ liệu của bạn

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra nếu có id bài viết được gửi qua URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Truy vấn SQL để xóa bài viết
    $sql = "DELETE FROM posts WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Bài viết đã được xóa thành công!<br><br>";
        echo "<a href='view_posts.php'>Quay lại danh sách bài viết</a>";
    } else {
        echo "Lỗi: " . $conn->error;
    }
} else {
    echo "Không có ID bài viết.";
}

// Đóng kết nối
$conn->close();
?>
