<?php

namespace App\Views\Client\Pages\Post;

use App\Views\BaseView;

class index extends BaseView
{
    public static function render($data = null)
    {
        ?>
            <style>
                body {
                    background-color: #f8f9fa;
                }

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
                    width: 100%; /* Đảm bảo ảnh chiếm toàn bộ chiều rộng thẻ */
                    height: 200px; /* Đặt chiều cao cố định để đồng đều */
                    object-fit: cover; /* Giữ tỉ lệ ảnh, cắt phần dư */
                    border-radius: 8px; /* Thêm góc bo mềm mại (tùy chọn) */
                }

                /* phan cuoi cung */

                .card img {
    width: 100%; /* Đảm bảo ảnh chiếm toàn bộ chiều rộng thẻ */
    height: 200px; /* Đặt chiều cao cố định để đồng đều */
    object-fit: cover; /* Giữ tỉ lệ ảnh, cắt phần dư */
    border-radius: 8px; /* Thêm góc bo mềm mại (tùy chọn) */
}
.card img {
    width: 100%; /* Đảm bảo ảnh chiếm toàn bộ chiều rộng thẻ */
    height: 200px; /* Đặt chiều cao cố định để đồng đều */
    object-fit: cover; /* Giữ tỉ lệ ảnh, cắt phần dư */
    border-radius: 8px; /* Thêm góc bo mềm mại */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Bóng mờ mặc định */
    transition: box-shadow 0.3s ease, transform 0.3s ease; /* Hiệu ứng chuyển đổi khi di chuột */
}

.card img:hover {
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3); /* Bóng mạnh hơn khi di chuột */
    transform: scale(1.05); /* Phóng to nhẹ khi di chuột */
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
                    flex: 0 0 calc(33.33% - 20px); /* Chia đều 3 card */
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
                    height: 100%; /* Đồng bộ chiều cao các thẻ */
                    border: none;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }

                .card:hover {
                    transform: translateY(-10px);
                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
                }

                .card img {
                    height: 200px; /* Đặt chiều cao cố định cho ảnh */
                    object-fit: cover; /* Giữ ảnh luôn vừa khung mà không méo */
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

                .row-cols-equal > .col {
                    display: flex;
                    flex-direction: column;
                }
                /* ------------------------------- */
            </style>
        </head>

        <body>
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
                                <h5>Halloween tại Bán Trái Cây, cơ hội bốc thăm trúng thưởng đầy “Ma quái”</h5>
                                <p>Chào mừng các bạn đến với Nam An Market - nơi mua sắm thực phẩm sạch và tạo nên những trải nghiệm đáng nhớ trong mùa Halloween 2023! Đừng bỏ lỡ cơ hội tham gia chương trình khuyến mãi đặc biệt của chúng tôi - "Halloween tại Nam An, Cơ hội bốc thăm trúng thưởng đầy 'ma quái"!</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bài viết 2 -->
                    <div class="col">
                        <div class="card">
                            <img src="public/assets/client/images/bai2.webp" class="card-img-top" alt="Cam nhập khẩu giảm giá">
                            <div class="card-body">
                                <h6>SINH NHẬT NAM AN: MUA ĐƠN HÀNG WEBSITE – NHẬN VOUCHER GIÁ TRỊ</h6>
                                <p>- Giá trị đơn hàng từ 800.000VND: nhận ngay voucher 30.000VND <br>- Giá trị đơn hàng từ 1.000.000VND: nhận ngay voucher 50.000VND <br> - Giá trị đơn hàng từ 2.000.000VND: nhận ngay voucher 100.000VND</p>
                                <p>Quý khách hãy truy cập vào website của Bán Trái Cây, lựa chọn những sản phẩm ưng ý và tiến hành đặt hàng để nhận ngay những ưu đãi hấp dẫn nhé.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bài viết 3 -->
                    <div class="col">
                        <div class="card">
                            <img src="public/assets/client/images/bai3.jpg" class="card-img-top" alt="Xoài nhập khẩu giảm giá">
                            <div class="card-body">
                                <h6>CHƯƠNG TRÌNH BỐC THĂM MAY MẮN KHI MUA HÀNG TẠI NAM AN MARKET</h6>
                                <p>🌟CHƯƠNG TRÌNH BỐC THĂM MAY MẮN KHI MUA HÀNG TẠI NAM AN MARKET🌟 <br>

Tiếp tục chuỗi chương trình mừng sinh nhật Nam An Market lần thứ 11, với hóa đơn mua sắm từ 800.000VND tại cửa hàng, quý khách sẽ có cơ hội tham gia bốc thăm may mắn và nhận về những phần quà hấp dẫn.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bài viết 4 -->
                    <div class="col">
                        <div class="card">
                            <img src="public/assets/client/images/bai4.webp" class="card-img-top" alt="Mận giảm giá">
                            <div class="card-body">
                                <h6>Ưu đãi Freeship mùa mưa (25/05 - 07/06)</h6>
                                <p>Đặc biệt, từ ngày 25/05 đến ngày 07/06, khi quý khách hàng đặt hàng trên website Nam An Market với giá trị thanh toán từ 300.000đ sẽ nhận ưu đãi miễn phí vận chuyển (tối đa 30.000VND) trong nội thành TP.HCM (trừ Hóc Môn, Bình Chánh, Củ Chi).

<br> Nhập ngay code “FREESHIP2023” để áp dụng ưu đãi.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bài viết 5 -->
                    <div class="col">
                        <div class="card">
                            <img src="public/assets/client/images/bai5.webp" class="card-img-top" alt="Vú sữa giảm giá">
                            <div class="card-body">
                                <h6>ƯU ĐÃI GIỜ VÀNG, TỪ 11H ĐẾN 14H MỖI NGÀY (20/08-31/08)</h6>
                                <p>Giảm ngay 50.000đ khi nhập mã "HAPPYHOURS" - Áp dụng hóa đơn từ 500.000đ <br>
Chương trình kéo dài từ 20/08 đến hết 31/08/2020 <br>
*Mã khuyến mãi chỉ áp dụng cho 30 đơn hàng đầu tiên trong khung giờ vàng mỗi ngày <br>
*Chỉ áp dụng cho quý khách mua hàng online trên website của Nam An Market <br>
☎️Hotline: 0903.166.228</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bài viết 6 -->
                    <div class="col">
                        <div class="card">
                            <img src="public/assets/client/images/bai6.webp" class="card-img-top" alt="Hổi giảm giá">
                            <div class="card-body">
                                <h6>MIỄN PHÍ VẬN CHUYỂN ĐƠN HÀNG ONLINE TỪ 300,000 ĐỒNG (22/05 - 31/05)</h6>
                                <p>.


                                🎁 Nam An Market mang đến trải nghiệm mua sắm online tiện lợi, đa dạng và chất lượng như đi chợ truyền thống, giúp bạn tiết kiệm thời gian chỉ với vài thao tác đơn giản trên điện thoại. <br>

🥦 Dù bạn là người bận rộn hay nội trợ, Nam An Market luôn sẵn sàng đáp ứng mọi nhu cầu với sự an toàn tuyệt đối. <br>

👉 Đặc biệt, bạn còn được miễn phí vận chuyển khi đặt hàng để nhận ngay sản phẩm chất lượng tận tay!

</p>
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
                                <h6>Các loại nho xanh ngon nhất hiện nay, lợi ích tuyệt vời và bí quyết chọn mua</h6>
                                <p>Nho xanh nổi tiếng với các giống ngon như nho xanh Úc, nho xanh Mỹ không hạt, và nho xanh Nhật Bản Shine Muscat. Chúng giàu vitamin C, chất xơ, và chất chống oxy hóa, giúp tăng cường hệ miễn dịch, làm đẹp da, và hỗ trợ tiêu hóa. Khi chọn mua, nên ưu tiên nho có màu xanh tươi, cuống chắc, trái đều, và không có vết thâm. Hương thơm nhẹ và vị ngọt tự nhiên là dấu hiệu của nho tươi ngon. Bảo quản nho trong tủ lạnh để giữ độ tươi lâu hơn.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bài viết 2 -->
                    <div class="col">
                        <div class="card">
                            <img src="public/assets/client/images/pa2.jpg" class="card-img-top" alt="Cam nhập khẩu giảm giá">
                            <div class="card-body">
                                <h6>Các loại cherry hiện nay, lợi ích tuyệt mang lại vời và bí quyết chọn mua</h6>
                                <p>
                                Cherry xanh hiện nay phổ biến với các loại như cherry xanh Rainier, cherry xanh từ Chile và Mỹ, nổi bật bởi vị ngọt thanh và màu sắc hấp dẫn. Chúng chứa nhiều vitamin C, kali và chất chống oxy hóa, giúp cải thiện sức khỏe tim mạch, tăng cường miễn dịch và làm đẹp da. Khi mua, nên chọn quả cherry màu xanh nhạt tự nhiên, vỏ căng bóng, không dập nát, và cuống còn tươi. Cherry tươi thường có vị ngọt nhẹ, hương thơm dễ chịu. Bảo quản cherry ở nhiệt độ thấp để giữ được độ ngon và dinh dưỡng lâu hơn.!</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bài viết 3 -->
                    <div class="col">
                        <div class="card">
                            <img src="public/assets/client/images/pa3.jpg" class="card-img-top" alt="Xoài nhập khẩu giảm giá">
                            <div class="card-body">
                                <h6>Quả Lựu Huyết Rồng</h6>
                                <p>- Là một nguồn dinh dưỡng dồi dào, giàu vitamin C, A, E, K và các khoáng chất như kali, magie, rất tốt cho sức khỏe tim mạch và hệ miễn dịch. <br>
                                - Thêm vào đó, loại lựu này có giá trị dinh dưỡng cao, hỗ trợ tiêu hóa, giảm cholesterol và giúp điều hòa huyết áp nhờ vào lượng kali dồi dào.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bài viết 4 -->
                    <div class="col">
                        <div class="card">
                            <img src="public/assets/client/images/pa5.jpg" class="card-img-top" alt="Mận giảm giá">
                            <div class="card-body">
                                <h6>Xuân Đào Út - Đào Trơn Út</h6>
                                <p>Xuân Đào Út và Đào Trơn Út đều là những loại trái cây ngon và bổ dưỡng. Xuân Đào Út có vỏ mịn, màu sắc đỏ cam, thịt quả ngọt đậm và mọng nước, thường được ưa chuộng vì vị ngọt mát. Đào Trơn Út có vỏ mịn, ít lông, màu vàng nhẹ, vị ngọt dịu và chua nhẹ, thích hợp cho những ai yêu thích sự cân bằng. Cả hai đều cung cấp vitamin C, A và chất xơ, giúp tăng cường miễn dịch và làm đẹp da. Khi chọn mua, nên tìm quả tươi, vỏ bóng và cuống còn nguyên vẹn.</p>
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
                                Hồng Giòn Mật Văn Sơn là một giống hồng nổi tiếng với vị ngọt thanh, giòn tan và hương thơm đặc trưng. Quả có màu cam đẹp mắt, lớp vỏ mịn, thịt quả chắc và không có hạt, ăn rất thơm ngon. Đây là loại trái cây không chỉ ngon mà còn bổ dưỡng, giàu vitamin A, C, giúp cải thiện sức khỏe da và tăng cường hệ miễn dịch. Khi mua, nên chọn quả có màu cam đều, vỏ mịn và không bị nứt. Hồng Giòn Mật Văn Sơn rất thích hợp để ăn trực tiếp hoặc làm món tráng miệng.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bài viết 6 -->
                    <div class="col">
                        <div class="card">
                            <img src="public/assets/client/images/pa6.jpg" class="card-img-top" alt="Hổi giảm giá">
                            <div class="card-body">
                                <h6>Mận Đỏ Ruột Vàng Family Tree Farms Mỹ</h6>
                                <p>
                                Mận Đỏ Ruột Vàng Family Tree Farms từ Mỹ là một giống mận đặc biệt với màu đỏ tươi sáng và ruột vàng bắt mắt. Vị mận ngọt đậm, chua nhẹ và rất mọng nước, mang đến cảm giác sảng khoái khi thưởng thức. Loại mận này giàu vitamin C, chất xơ và các chất chống oxy hóa, giúp tăng cường sức khỏe tim mạch và cải thiện làn da. Khi mua, hãy chọn quả có vỏ bóng, căng và không bị dập nát. Mận Đỏ Ruột Vàng thích hợp ăn trực tiếp hoặc sử dụng trong các món tráng miệng, sinh tố.</p>
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
