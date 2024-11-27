<?php
// Kết nối với cơ sở dữ liệu
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

    // Truy vấn để lấy bài viết cần sửa
    $sql = "SELECT * FROM posts WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $content = $row['content'];
    } else {
        echo "Bài viết không tồn tại.";
        exit();
    }
} else {
    echo "Không có ID bài viết.";
    exit();
}

// Kiểm tra nếu form được gửi đi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Truy vấn SQL để cập nhật bài viết
    $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Bài viết đã được cập nhật thành công!<br><br>";
        echo "<a href='view_posts.php'>Xem tất cả bài viết</a>";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}

// Đóng kết nối
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Bài Viết</title>
</head>
<body>
    <h2>Sửa Bài Viết</h2>
    <form action="edit_post.php?id=<?php echo $id; ?>" method="POST">
        <label for="title">Tiêu đề:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $title; ?>" required><br><br>

        <label for="content">Nội dung:</label><br>
        <textarea id="content" name="content" rows="6" required><?php echo $content; ?></textarea><br><br>

        <input type="submit" value="Cập Nhật Bài Viết">
    </form>
</body>
</html>
