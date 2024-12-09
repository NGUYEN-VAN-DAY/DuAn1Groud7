<?php

namespace App\Views\Client\Pages\Post;

use App\Views\BaseView;

class Post extends BaseView
{
    public static function render($data = null)
    {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Trang Tin & Sự Kiện</title>
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Custom CSS -->
            <style>
                body {
                    background-color: #f8f9fa;
                }

                /* ---------------------------------------banner------------------------------------------------------------------------ */
                /* Banner toàn màn hình */
                /* Banner toàn màn hình */
                .bannerr {
                    position: relative;
                    width: 100%;
                    height: 50vh;
                    /* Chiều cao banner (50% chiều cao màn hình) */
                }

                .bannerr img {
                    width: 100%;
                    /* Hình ảnh phủ toàn chiều ngang */
                    height: 100%;
                    /* Hình ảnh phủ toàn chiều cao */
                    object-fit: cover;
                    /* Đảm bảo hình ảnh không bị méo */
                }

                /* Chữ trên ảnh */
                .bannerr-text {
                    position: absolute;
                    top: 50%;
                    /* Căn giữa dọc */
                    left: 10%;
                    /* Đẩy văn bản sang bên trái */
                    transform: translateY(-50%);
                    /* Căn giữa theo trục dọc */
                    color: white;
                    /* Màu chữ trắng */
                    text-align: left;
                }

                .bannerr-text h1 {
                    font-size: 2.5rem;
                    /* Kích thước tiêu đề */
                    margin: 0 0 10px 0;
                    text-transform: uppercase;
                    color: #2e7d32;
                    /* Màu xanh lá cây */
                }

                .bannerr-text a {
                    font-size: 1rem;
                    /* Kích thước liên kết */
                    color: #000;
                    /* Màu đen cho liên kết */
                    text-decoration: none;
                    /* Bỏ gạch chân */
                    background-color: rgba(255, 255, 255, 0.8);
                    /* Nền trắng mờ */
                    padding: 5px 10px;
                    border-radius: 5px;
                    /* Bo tròn liên kết */
                }

                .bannerr-text a:hover {
                    text-decoration: underline;
                    /* Gạch chân khi hover */
                }


                /* ---------------------------------------banner------------------------------------------------------------------------ */
                /* phan cuoi cung */
                .post-container {
                    max-width: 1200px;
                    margin: 20px auto;
                    padding: 20px;
                    background: #fff;
                    border-radius: 10px;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                }

                .post-header {
                    text-align: center;
                    margin-bottom: 30px;
                }

                .post-header h2 {
                    color: #007bff;
                }

                .post-header h3 {
                    color: #6c757d;
                }

                .card img {
                    width: 100%;
                    /* Đảm bảo ảnh chiếm toàn bộ chiều rộng thẻ */
                    height: 200px;
                    /* Đặt chiều cao cố định để đồng đều */
                    object-fit: cover;
                    /* Giữ tỉ lệ ảnh, cắt phần dư */
                    border-radius: 8px;
                    /* Thêm góc bo mềm mại (tùy chọn) */
                }

                /* phan cuoi cung */

                .card img {
                    width: 100%;
                    /* Đảm bảo ảnh chiếm toàn bộ chiều rộng thẻ */
                    height: 200px;
                    /* Đặt chiều cao cố định để đồng đều */
                    object-fit: cover;
                    /* Giữ tỉ lệ ảnh, cắt phần dư */
                    border-radius: 8px;
                    /* Thêm góc bo mềm mại (tùy chọn) */
                }

                .card img {
                    width: 100%;
                    /* Đảm bảo ảnh chiếm toàn bộ chiều rộng thẻ */
                    height: 200px;
                    /* Đặt chiều cao cố định để đồng đều */
                    object-fit: cover;
                    /* Giữ tỉ lệ ảnh, cắt phần dư */
                    border-radius: 8px;
                    /* Thêm góc bo mềm mại */
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                    /* Bóng mờ mặc định */
                    transition: box-shadow 0.3s ease, transform 0.3s ease;
                    /* Hiệu ứng chuyển đổi khi di chuột */
                }

                .card img:hover {
                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
                    /* Bóng mạnh hơn khi di chuột */
                    transform: scale(1.05);
                    /* Phóng to nhẹ khi di chuột */
                }

                .post-container {
                    max-width: 1200px;
                    margin: 20px auto;
                    padding: 20px;
                    background: #fff;
                    border-radius: 10px;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                }

                .post-header {
                    text-align: center;
                    margin-bottom: 30px;
                }

                .post-header h2 {
                    color: #007bff;
                }

                .post-header h3 {
                    color: #6c757d;
                }

                .post-row {
                    display: flex;
                    justify-content: space-between;
                    gap: 20px;
                    overflow-x: auto;
                }

                .card {
                    flex: 0 0 calc(33.33% - 20px);
                    /* Chia đều 3 card */
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                    border: none;
                }

                .card:hover {
                    transform: translateY(-10px);
                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
                }

                .card img {
                    object-fit: cover;
                    transition: transform 0.3s ease;
                }

                .card:hover img {
                    transform: scale(1.05);
                }

                .card h6 {
                    font-size: 1.1rem;
                    font-weight: bold;
                    margin-top: 10px;
                }

                .card p {
                    font-size: 0.9rem;
                    color: #6c757d;
                }

                .post-row::-webkit-scrollbar {
                    height: 8px;
                }

                .post-row::-webkit-scrollbar-thumb {
                    background-color: #007bff;
                    border-radius: 10px;
                }

                .post-row::-webkit-scrollbar-track {
                    background-color: #f1f1f1;
                }

                /* phần dưới */
                body {
                    background-color: #f8f9fa;
                }

                .post-container {
                    max-width: 1200px;
                    margin: 20px auto;
                    padding: 20px;
                    background: #fff;
                    border-radius: 10px;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                }

                .post-header {
                    text-align: center;
                    margin-bottom: 30px;
                }

                .post-header h2 {
                    color: #007bff;
                }

                .post-header h3 {
                    color: #6c757d;
                }

                .card {
                    height: 100%;
                    /* Đồng bộ chiều cao các thẻ */
                    border: none;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }

                .card:hover {
                    transform: translateY(-10px);
                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
                }

                .card img {
                    height: 200px;
                    /* Đặt chiều cao cố định cho ảnh */
                    object-fit: cover;
                    /* Giữ ảnh luôn vừa khung mà không méo */
                }

                .card h6 {
                    font-size: 1.1rem;
                    font-weight: bold;
                    margin-top: 10px;
                }

                .card p {
                    font-size: 0.9rem;
                    color: #6c757d;
                }

                .row-cols-equal>.col {
                    display: flex;
                    flex-direction: column;
                }

                /* ------------------------------- */
            </style>
        </head>

        <body>
            <!-- ---------------------------------------------------------------banner -->
            <div class="bannerr">
                <!-- Hình ảnh nền -->
                <img src="public/assets/client/images/a.webp" alt="Banner trái cây">
                <!-- Chữ trên ảnh -->
                <div class="bannerr-text">
                    <h1>Tin Tức, Sự Kiện</h1>
                    <a href="">Trang chủ &gt; <a href="">Tin Khuyến Mãi & Sự Kiện</a></a>
                </div>
            </div>

            <!-- ------------------------------------banner -->

            >
            <div class="post-container">
                <!-- Header -->
                <div class="post-header">
                    <h2>o0 Bài viết 0o</h2>
                    <h3>Tin & Sự kiện</h3>
                    <p>Các sự kiện hot về cửa hàng chúng tôi</p>
                </div>


                <!-- Posts -->
                <div class="post-row">
                    <!-- Bài viết 1 -->
                    <div class="card">
                        <img src="public/assets/client/images/anhnho1.jpg" class="card-img-top" alt="Nho nhập khẩu giảm giá">
                        <div class="card-body">
                            <h6>Nho nhập khẩu giảm giá sốc 20%</h6>
                            <p>Đừng bỏ lỡ cơ hội mua nho nhập khẩu với giá ưu đãi chỉ trong tuần này!</p>
                        </div>
                    </div>

                    <!-- Bài viết 2 -->
                    <div class="card">
                        <img src="public/assets/client/images/anhcam1.jpg" class="card-img-top" alt="Cam nhập khẩu giảm giá">
                        <div class="card-body">
                            <h6>Cam tươi ngọt giá ưu đãi</h6>
                            <p>Cam nhập khẩu tươi ngon với mức giá đặc biệt giảm 20% chỉ dành cho khách hàng trung thành!</p>
                        </div>
                    </div>

                    <!-- Bài viết 3 -->
                    <div class="card">
                        <img src="public/assets/client/images/anhsoai1.jpg" class="card-img-top" alt="Xoài nhập khẩu giảm giá">
                        <div class="card-body">
                            <h6>Xoài chín mọng ưu đãi lớn</h6>
                            <p>Thưởng thức hương vị ngọt ngào từ xoài nhập khẩu giá chỉ từ 50k/kg.</p>
                        </div>
                    </div>

                    <!-- Bài viết 4 -->
                    <div class="card">
                        <img src="public/assets/client/images/anhman1.jpg" class="card-img-top" alt="Mận giảm giá">
                        <div class="card-body">
                            <h6>Mận ngọt thanh chỉ từ 30k</h6>
                            <p>Khuyến mãi mận ngọt chỉ trong 3 ngày, hãy đặt hàng ngay!</p>
                        </div>
                    </div>

                    <!-- Bài viết 5 -->
                    <div class="card">
                        <img src="public/assets/client/images/anhvu1.jpg" class="card-img-top" alt="Vú sữa giảm giá">
                        <div class="card-body">
                            <h6>Vú sữa chính gốc miền Nam</h6>
                            <p>Sản phẩm được tuyển chọn từ những vườn trái cây tốt nhất, giảm giá 10%.</p>
                        </div>
                    </div>

                    <!-- Bài viết 6 -->
                    <div class="card">
                        <img src="public/assets/client/images/anhoi1.jpg" class="card-img-top" alt="Hổi giảm giá">
                        <div class="card-body">
                            <h6>Hổi sạch từ nhà vườn</h6>
                            <p>Giảm giá cực sốc, chỉ có tại cửa hàng khi mua trên 3kg giảm ngay 15%.</p>
                        </div>
                    </div>
                </div>
            </div>





            <!-- phan duoi -->
            <div class="post-container">
                <!-- Header -->
                <div class="post-header">
                    <h3>Tin</h3>
                    <p>Các tin hot về cửa hàng chúng tôi</p>
                </div>

                <!-- Posts -->
                <div class="row row-cols-1 row-cols-md-3 g-4 row-cols-equal">
                    <!-- Bài viết 1 -->
                    <div class="col">
                        <div class="card">
                            <img src="public/assets/client/images/bai1.webp" class="card-img-top" alt="Nho nhập khẩu giảm giá">
                            <div class="card-body">
                                <h5>Halloween tại Bán Trái Cây, bốc thăm trúng thưởng đầy “Ma quái”</h5>
                                <p>"Halloween, Cơ hội bốc thăm trúng thưởng đầy 'ma quái"! <a href="">xem chi tiết</a></p>
                            </div>
                        </div>
                    </div>

                    <!-- Bài viết 2 -->
                    <div class="col">
                        <div class="card">
                            <img src="public/assets/client/images/bai2.webp" class="card-img-top" alt="Cam nhập khẩu giảm giá">
                            <div class="card-body">
                                <h6>SINH NHẬT NAM AN: MUA ĐƠN HÀNG WEBSITE – NHẬN VOUCHER GIÁ TRỊ</h6>
                                <p>- Giá trị đơn hàng từ 800.000VND, 500.000VND, 300.000VNĐ <a href="">xem chi tiết</a> </p>

                            </div>
                        </div>
                    </div>

                    <!-- Bài viết 3 -->
                    <div class="col">
                        <div class="card">
                            <img src="public/assets/client/images/bai3.jpg" class="card-img-top" alt="Xoài nhập khẩu giảm giá">
                            <div class="card-body">
                                <h6>CHƯƠNG TRÌNH BỐC THĂM MAY MẮN KHI MUA HÀNG TẠI NAM AN MARKET</h6>
                                <p>🌟CHƯƠNG TRÌNH BỐC THĂM MAY MẮN KHI MUA HÀNG TẠI NAM AN MARKET🌟 <a href="">Xem Chi Tiết</a></p>
                            </div>
                        </div>
                    </div>

                    <!-- Bài viết 4 -->
                    <div class="col">
                        <div class="card">
                            <img src="public/assets/client/images/bai4.webp" class="card-img-top" alt="Mận giảm giá">
                            <div class="card-body">
                                <h6>Ưu đãi Freeship mùa mưa (25/05 - 07/06)</h6>
                                <p>Đặc biệt khi mua ở buôn bán trái cây tươi, từ ngày 25/05 đến ngày 07/06, <a href="">Xem Chi Tiết</a></p>
                            </div>
                        </div>
                    </div>

                    <!-- Bài viết 5 -->
                    <div class="col">
                        <div class="card">
                            <img src="public/assets/client/images/bai5.webp" class="card-img-top" alt="Vú sữa giảm giá">
                            <div class="card-body">
                                <h6>ƯU ĐÃI GIỜ VÀNG, TỪ 11H ĐẾN 14H MỖI NGÀY (20/08-31/08)</h6>
                                <p>Giảm ngay 50.000đ khi nhập mã "HAPPYHOURS" - Áp dụng hóa đơn từ 500.000đ <a href="">Xem Chi Tiết</a></p>
                            </div>
                        </div>
                    </div>

                    <!-- Bài viết 6 -->
                    <div class="col">
                        <div class="card">
                            <img src="public/assets/client/images/bai6.webp" class="card-img-top" alt="Hổi giảm giá">
                            <div class="card-body">
                                <h6>MIỄN PHÍ VẬN CHUYỂN ĐƠN HÀNG ONLINE TỪ 300,000VNĐ (22/05 - 31/05)</h6>
                                <p>🎁 Nam An Market mang đến trải nghiệm mua sắm online tiện lợi <a href="">Xem Chi Tiết</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- phan duoi  cung -->
            <div class="post-container">
                <!-- Header -->
                <div class="post-header">
                    <h3>Các lợi ích tuyệt vời mà trái cây mang lại</h3>
                </div>

                <!-- Posts -->
                <div class="row row-cols-1 row-cols-md-3 g-4 row-cols-equal">
                    <!-- Bài viết 1 -->
                    <div class="col">
                        <div class="card">
                            <img src="public/assets/client/images/pa1.webp" class="card-img-top" alt="Nho nhập khẩu giảm giá">
                            <div class="card-body">
                                <h6>Các loại nho xanh ngon nhất hiện nay</h6>
                                <p>Nho xanh nổi tiếng với các giống ngon như nho xanh Úc <a href="">Xem Thêm</a> </p>
                            </div>
                        </div>
                    </div>

                    <!-- Bài viết 2 -->
                    <div class="col">
                        <div class="card">
                            <img src="public/assets/client/images/pa2.jpg" class="card-img-top" alt="Cam nhập khẩu giảm giá">
                            <div class="card-body">
                                <h6>Các loại cherry và hiệu quả mang lại</h6>
                                <p>
                                    Cherry xanh hiện nay phổ biến với các loại như cherry xanh Rainier <a href="">Xem Thêm</a></p>
                            </div>
                        </div>
                    </div>

                    <!-- Bài viết 3 -->
                    <div class="col">
                        <div class="card">
                            <img src="public/assets/client/images/pa3.jpg" class="card-img-top" alt="Xoài nhập khẩu giảm giá">
                            <div class="card-body">
                                <h6>Quả Lựu Huyết Rồng</h6>
                                <p>- Là một nguồn dinh dưỡng dồi dào, giàu vitamin C, A, E, K <a href="">Xem Thêm</a></p>
                            </div>
                        </div>
                    </div>

                    <!-- Bài viết 4 -->
                    <div class="col">
                        <div class="card">
                            <img src="public/assets/client/images/pa5.jpg" class="card-img-top" alt="Mận giảm giá">
                            <div class="card-body">
                                <h6>Xuân Đào Út - Đào Trơn Út</h6>
                                <p>Xuân Đào Út và Đào Trơn Út đều là những loại trái cây ngon và bổ dưỡng <a href="">Xem Thêm</a> </p>
                            </div>
                        </div>
                    </div>

                    <!-- Bài viết 5 -->
                    <div class="col">
                        <div class="card">
                            <img src="public/assets/client/images/pa4.jpg" class="card-img-top" alt="Vú sữa giảm giá">
                            <div class="card-body">
                                <h6>Hồng Giòn Mật Văn Sơn</h6>
                                <p>
                                    Hồng Giòn Mật Văn Sơn là một giống hồng nổi tiếng với vị ngọt thanh <a href="">Xem Thêm</a></p>
                            </div>
                        </div>
                    </div>

                    <!-- Bài viết 6 -->
                    <div class="col">
                        <div class="card">
                            <img src="public/assets/client/images/pa6.jpg" class="card-img-top" alt="Hổi giảm giá">
                            <div class="card-body">
                                <h6>Mận Đỏ Ruột Vàng Family Tree Farms </h6>
                                <p>
                                    Mận Đỏ Ruột Vàng Family Tree Farms từ Mỹ là một giống mận đặc biệt <a href="">Xem Thêm</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- phan duoi -->

            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>
<?php
    }
}
