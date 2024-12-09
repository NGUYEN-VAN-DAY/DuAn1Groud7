<?php

namespace App\Models;

class Post extends BaseModel
{
    protected $table = 'posts';  // Đổi tên bảng từ 'categories' thành 'posts'
    protected $id = 'id';

    // Lấy tất cả bài viết
    public function getAllPost()
    {
        return $this->getAll();
        
    }
     
    

    // Lấy một bài viết theo ID
    public function getOnePost($id)
    {
        return $this->getOne($id);
    }

    // Tạo bài viết mới
    public function createPost($data)
    {
        
        return $this->create($data);
    }

    // Cập nhật bài viết
    public function updatePost($id, $data)
    {
        return $this->update($id, $data);
    }

    // Xóa bài viết
    public function deletePost($id)
    {
        return $this->delete($id);
    }

    // Lấy tất cả bài viết theo trạng thái (Nếu cần)
    public function getAllPostByStatus($status)
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE status = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $status);  // Truyền tham số trạng thái vào câu lệnh
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi: ' . $th->getMessage());
            return [];
        }
    }

    // Lấy bài viết theo tên (Title)
    public function getOnePostByName($title)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM $this->table WHERE title = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $title);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi: ' . $th->getMessage());
            return $result;
        }
    }

    // Lấy tất cả bài viết theo tên (dùng LIKE để tìm kiếm bài viết tương tự))))
    public function getAllPostByName($title)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM $this->table WHERE title LIKE ?";  // Cập nhật để sử dụng LIKE cho tìm kiếm
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $likeTitle = "%" . $title . "%";  // Thêm ký tự % để tìm kiếm phần trăm khớp
            $stmt->bind_param('s', $likeTitle);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi: ' . $th->getMessage());
            return $result;
        }
    }
    // public function getPostById($id)
    // {
    //     // Kết nối với cơ sở dữ liệu và lấy bài viết theo IDd
    //     $query = "SELECT * FROM posts WHERE id = :id LIMIT 1";
    //     $stmt = Database::getConnection()->prepare($query);
    //     $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    //     $stmt->execute();

    //     // Trả về dữ liệu bài viết
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }
}
