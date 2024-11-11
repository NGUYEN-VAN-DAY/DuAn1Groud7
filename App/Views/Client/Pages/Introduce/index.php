<?php

namespace App\Views\Client\Pages\Introduce;

use App\Views\BaseView;

class index extends BaseView
{
    public static function render($data = null): void
    {
?>

        <style>
            .body {
                font-family: 'Poppins', sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }

            .header {
                background: url('your_image_link_here.jpg') no-repeat center center/cover;
                height: 100vh;
                color: white;
                text-align: center;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                position: relative;
            }

            .header h1 {
                font-size: 4rem;
                font-weight: 600;
                text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            }

            .header p {
                font-size: 1.5rem;
                margin-top: 15px;
                text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
            }

            .section-title {
                font-size: 2.5rem;
                font-weight: 600;
                color: #333;
                margin-bottom: 30px;
                text-align: center;
            }

            .section-content p {
                font-size: 1.1rem;
                color: #666;
                line-height: 1.7;
                margin-bottom: 20px;
            }

            /* Hiệu ứng hình ảnh hover */
            .img-hover-effect {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .img-hover-effect:hover {
                transform: scale(1.05);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            }

            .team-member {
                text-align: center;
                margin-bottom: 50px;
            }

            .team-member img {
                width: 150px;
                height: 150px;
                border-radius: 50%;
                object-fit: cover;
                border: 5px solid #fff;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .team-member img:hover {
                transform: scale(1.1);
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            }

            .team-member h5 {
                font-size: 1.2rem;
                font-weight: 600;
                margin-top: 20px;
                color: #333;
            }

            .team-member p {
                font-size: 1rem;
                color: #888;
            }

            footer {
                background-color: #333;
                color: white;
                padding: 30px;
                text-align: center;
                box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
            }

            footer p {
                font-size: 1rem;
            }

            /* Responsive Design */
            @media (max-width: 768px) {
                header h1 {
                    font-size: 3rem;
                }

                header p {
                    font-size: 1.2rem;
                }

                .section-title {
                    font-size: 2rem;
                }

                .team-member img {
                    width: 120px;
                    height: 120px;
                }
            }
        </style>
        </head>

        <body>
            <div class="body">
                <header class="header">
                    <div class="container">
                        <h1>Chào Mừng Đến Với Cửa Hàng Trái Cây Tươi</h1>
                        <p>Chúng tôi mang đến những trái cây tươi ngon, chất lượng và an toàn cho mọi gia đình. Hãy khám phá thế
                            giới trái cây tươi mát ngay hôm nay!</p>
                    </div>
                </header>

                <!-- Phần Giới Thiệu Về Chúng Tôi -->
                <section class="container py-5">
                    <h2 class="section-title">Về Chúng Tôi</h2>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <p>Chúng tôi là cửa hàng chuyên cung cấp trái cây tươi sạch, được lựa chọn từ những nông trại uy tín
                                và chất lượng nhất. Mỗi sản phẩm của chúng tôi đều được kiểm tra kỹ lưỡng và đạt chuẩn an toàn
                                vệ sinh thực phẩm. Chúng tôi cam kết cung cấp sản phẩm sạch, an toàn và bảo vệ sức khỏe người
                                tiêu dùng.</p>
                            <p>Được sáng lập bởi một nhóm chuyên gia trong ngành nông sản, chúng tôi có mục tiêu mang lại những
                                trái cây tươi ngon nhất từ khắp mọi miền đất nước. Chúng tôi luôn tập trung vào việc phát triển
                                bền vững và khuyến khích việc sử dụng sản phẩm sạch, không hóa chất độc hại.</p>
                        </div>
                        <div class="col-md-6">
                            <img src="" alt="Trái cây tươi ngon"
                                class="img-fluid rounded shadow-lg img-hover-effect">
                        </div>
                    </div>
                </section>

                <!-- Phần Lịch Sử Hình Thành -->
                <section class="container py-5">
                    <h2 class="section-title">Lịch Sử Hình Thành</h2>
                    <p class="text-center">Cửa Hàng Trái Cây Tươi được thành lập vào năm 2015 tại TP. Hồ Chí Minh, với sứ mệnh
                        mang lại những trái cây tươi ngon, chất lượng, và an toàn cho người tiêu dùng. Chúng tôi bắt đầu chỉ với
                        một cửa hàng nhỏ, nhưng nhờ vào cam kết chất lượng và sự tín nhiệm từ khách hàng, chúng tôi đã phát
                        triển mạnh mẽ.</p>
                    <p class="text-center">Chúng tôi hiện đang cung cấp các loại trái cây từ các nông trại lớn trong cả nước, và
                        tiếp tục mở rộng dịch vụ cung cấp cho các khu vực lân cận. Mỗi năm, chúng tôi đều nâng cấp quy trình
                        kiểm soát chất lượng và mở rộng các mối quan hệ đối tác với các nông trại sạch và uy tín.</p>
                </section>

                <!-- Phần Cam Kết Chất Lượng -->
                <section class="bg-light py-5">
                    <div class="container text-center">
                        <h2 class="section-title">Cam Kết Chất Lượng</h2>
                        <p>Chúng tôi cam kết cung cấp những sản phẩm trái cây sạch, đảm bảo chất lượng và an toàn cho sức khỏe
                            người tiêu dùng. Mỗi sản phẩm đều được kiểm tra chất lượng nghiêm ngặt, và chỉ những trái cây tươi
                            ngon nhất mới được đưa đến tay khách hàng. Quy trình kiểm tra chất lượng của chúng tôi bao gồm việc
                            kiểm tra mẫu và các tiêu chuẩn an toàn thực phẩm quốc tế.</p>
                        <p>Chúng tôi luôn tìm kiếm và hợp tác với những nhà cung cấp có chứng nhận sản phẩm sạch và không có hóa
                            chất độc hại, giúp đảm bảo rằng trái cây của chúng tôi luôn đạt tiêu chuẩn tốt nhất.</p>
                    </div>
                </section>

                <!-- Phần Tiêu Chuẩn An Toàn -->
                <section class="container py-5">
                    <h2 class="section-title">Tiêu Chuẩn An Toàn</h2>
                    <p class="text-center">Chúng tôi cam kết thực hiện đúng các tiêu chuẩn an toàn thực phẩm nghiêm ngặt. Mỗi
                        sản phẩm trái cây đều được lựa chọn kỹ lưỡng từ các nông trại đạt tiêu chuẩn quốc tế về vệ sinh an toàn
                        thực phẩm. Chúng tôi cũng luôn ưu tiên sử dụng phương pháp canh tác hữu cơ để bảo vệ sức khỏe của người
                        tiêu dùng và bảo vệ môi trường.</p>
                    <p class="text-center">Mỗi loại trái cây trước khi được phân phối đều phải trải qua các kiểm tra nghiêm ngặt
                        về chất lượng và an toàn. Chúng tôi sử dụng công nghệ tiên tiến để kiểm tra độ tươi ngon và kiểm soát
                        các yếu tố ảnh hưởng đến chất lượng sản phẩm.</p>
                </section>

                <!-- Phần Đội Ngũ -->
                <section class="container py-5">
                    <h2 class="section-title">Đội Ngũ Của Chúng Tôi</h2>
                    <div class="row justify-content-center">
                        <div class="col-md-4 team-member">
                            <img src="public/assets/client/images/avatar_trang_1_cd729c335b.jpg" alt="Giám đốc" class="img-fluid rounded-circle img-hover-effect">
                            <h5>Nguyễn Lương Minh Nhựt</h5>
                            <p>Thành viên</p>
                            <p></p>
                        </div>
                        <div class="col-md-4 team-member">
                            <img src="public/assets/client/images/avatar_trang_1_cd729c335b.jpg" alt="Giám đốc" class="img-fluid rounded-circle img-hover-effect">
                            <h5>Nguyễn Văn Đây</h5>
                            <p>Thành viên</p>
                            <p></p>
                        </div>
                        <div class="col-md-4 team-member">
                            <img src="public/assets/client/images/avatar_trang_1_cd729c335b.jpg" alt="Marketing" class="img-fluid rounded-circle img-hover-effect">
                            <h5>Lưu Hữu Phước</h5>
                            <p>Thành viên</p>
                            <p></p>
                        </div>
                        <div class="col-md-4 team-member">
                            <img src="public/assets/client/images/avatar_trang_1_cd729c335b.jpg" alt="Chất lượng" class="img-fluid rounded-circle img-hover-effect">
                            <h5>Cường</h5>
                            <p>Thành viên</p>
                            <p></p>
                        </div>
                        <div class="col-md-4 team-member">
                            <img src="public/assets/client/images/avatar_trang_1_cd729c335b.jpg" alt="Giám đốc" class="img-fluid rounded-circle img-hover-effect">
                            <h5>Khanh</h5>
                            <p>Thành viên</p>
                            <p></p>
                        </div>
                    </div>
                </section>

                <!-- Phần Liên Hệ -->
                <section class="bg-light py-5">
                    <div class="container text-center">
                        <h2 class="section-title">Liên Hệ Với Chúng Tôi</h2>
                        <p>Để biết thêm thông tin chi tiết hoặc đặt hàng, vui lòng liên hệ với chúng tôi qua các phương thức
                            dưới đây:</p>
                        <p>Email: <strong>contact@fruitstore.com</strong></p>
                        <p>Hotline: <strong>(+84) 123 456 789</strong></p>
                        <p>Địa chỉ: Số 123, Đường ABC, TP. Hồ Chí Minh, Việt Nam</p>
                    </div>
                </section>
            </div>
    <?php
    }
}
