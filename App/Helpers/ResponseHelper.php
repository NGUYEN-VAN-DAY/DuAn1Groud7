<?php

namespace App\Helpers;

class ResponseHelper
{
    public static function success($data, $message)
    {
        // Xử lý trả về dữ liệu thành công
        echo json_encode(['status' => 'success', 'data' => $data, 'message' => $message]);
    }

    public static function error($message)
    {
        // Xử lý trả về lỗi
        echo json_encode(['status' => 'error', 'message' => $message]);
    }
}
