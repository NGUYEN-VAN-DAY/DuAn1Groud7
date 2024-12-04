<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Methods</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .method {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .method:hover {
            background: #f0f0f0;
        }
        .method img {
            width: 40px;
            height: 40px;
        }
        .method span {
            font-size: 18px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Chọn Phương Thức Thanh Toán</h1>
        <div class="method" onclick="selectPayment('MoMo')" name="MoMo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/62/MoMo_Logo.png" alt="MoMo">
            <span>MoMo</span>
        </div>
        <div class="method" onclick="selectPayment('Bank Transfer')" name="Bank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/e/e2/Bank_icon.svg" alt="Bank Transfer">
            <span>Chuyển khoản ngân hàng</span>
        </div>
        <div class="method" onclick="selectPayment('Cash')" name="Cash">
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Cash_icon.svg" alt="Cash">
            <span>Thanh toán trực tiếp</span>
        </div>
    </div>

    <script>
        function selectPayment(method) {
            alert(`Bạn đã chọn phương thức thanh toán: ${method}`);
            // Thêm logic xử lý khi chọn phương thức thanh toán
        }
    </script>
</body>
</html>
