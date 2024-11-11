<?php

namespace App\Views\Client\Pages\Introduce;

use App\Views\BaseView;

class index extends BaseView
{
  public static function render($data = null): void
  {
?>
    <header>
        <h1>Chào Mừng Đến Với Cửa Hàng Trái Cây Tươi</h1>
        <p>Nơi cung cấp những loại trái cây tươi ngon và chất lượng nhất</p>
        <button onclick="scrollToSection()">Khám Phá Ngay</button>
    </header>

    <section id="about">
        <h2>Về Chúng Tôi</h2>
        <p>Chúng tôi là cửa hàng chuyên cung cấp các loại trái cây tươi ngon, được lựa chọn kỹ càng từ những nguồn uy tín. Cam kết mang đến sự hài lòng cho khách hàng qua chất lượng và dịch vụ tận tình.</p>
    </section>

    <section id="products">
        <h2>Sản Phẩm Nổi Bật</h2>
        <div class="product-grid">
            <div class="product-card">
                <img src="apple.jpg" alt="Táo Tươi">
                <h3>Táo Tươi</h3>
                <p>Giàu vitamin, ngọt thanh, rất tốt cho sức khỏe.</p>
            </div>
            <div class="product-card">
                <img src="orange.jpg" alt="Cam Ngọt">
                <h3>Cam Ngọt</h3>
                <p>Cam tươi mọng nước, bổ sung vitamin C tuyệt vời.</p>
            </div>
            <div class="product-card">
                <img src="banana.jpg" alt="Chuối Chín">
                <h3>Chuối Chín</h3>
                <p>Chuối giàu dinh dưỡng, giúp bổ sung năng lượng.</p>
            </div>
        </div>
    </section>

<?php
  }
}
