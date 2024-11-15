<?php

namespace App\Views\Client\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{
  public static function render($data = null)
  {
?>
    <div class="zalo-fb">
      <div class="zalo-btn">
        <a href="https://zalo.me/0123456789" target="_blank">
          <img src="https://img.icons8.com/ios-filled/50/ffffff/zalo.png" alt="Zalo">
        </a>
      </div>

      <!-- Nút Facebook -->
      <div class="facebook-btn">
        <a href="https://www.facebook.com/yourfacebookpage" target="_blank">
          <img src="https://img.icons8.com/ios-filled/50/ffffff/facebook--v1.png" alt="Facebook">
        </a>
      </div>
    </div>
    <div style="padding: 10px;"></div>
    <footer class="bg-light text-dark pt-5">
      <div class="container">
        <div class="row">
          <!-- Về Chúng Tôi -->
          <div class="col-md-3 mb-4">
            <h5 class="font-weight-bold">Về Chúng Tôi</h5>
            <p>Chúng tôi chuyên cung cấp trái cây tươi, ngon và an toàn, nhập khẩu trực tiếp từ các nông trại uy tín trong và ngoài nước.</p>
          </div>

          <!-- Liên Hệ -->
          <div class="col-md-3 mb-4">
            <h5 class="font-weight-bold">Liên Hệ</h5>
            <p>Địa chỉ: 123 Đường Trái Cây, Quận 1, TP. Hồ Chí Minh</p>
            <p>Số điện thoại: (0123) 456 789</p>
            <p>Email: info@cuahangtraicay.com</p>
          </div>

          <!-- Liên Kết Nhanh -->
          <div class="col-md-3 mb-4">
            <h5 class="font-weight-bold">Liên Kết Nhanh</h5>
            <ul class="list-unstyled">
              <li><a href="/ve-chung-toi" class="text-dark">Về Chúng Tôi</a></li>
              <li><a href="/san-pham" class="text-dark">Sản Phẩm</a></li>
              <li><a href="/lien-he" class="text-dark">Liên Hệ</a></li>
              <li><a href="/chinh-sach" class="text-dark">Chính Sách</a></li>
            </ul>
          </div>

          <!-- Mạng Xã Hội -->
          <div class="col-md-3 mb-4">
            <h5 class="font-weight-bold">Kết Nối Với Chúng Tôi</h5>
            <div class="fb-page" data-href="https://www.facebook.com/TraiCayTuoiSachHG?locale=vi_VN" data-tabs="timeline" data-width="" data-height="100" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
              <blockquote cite="https://www.facebook.com/TraiCayTuoiSachHG?locale=vi_VN" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/TraiCayTuoiSachHG?locale=vi_VN">Trái Cây HG Fresh</a></blockquote>
            </div>
          </div>
        </div>

        <!-- Bản quyền -->
        <div class="text-center py-4">
          <p class="mb-0">&copy; 2024 Cửa Hàng Trái Cây - Bảo Lưu Mọi Quyền</p>
        </div>
      </div>
    </footer>


    <!-- end info section -->

    <script src="public/assets/client/js/gioithieu.js"></script>

    <script src="public/assets/client/js/jquery-3.4.1.min.js"></script>
    <script src="public/assets/client/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script src="public/assets/client/js/custom.js"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v20.0" nonce="AOcTsMhu"></script>
    <script>
      function eyepassword() {
        let password = document.getElementById('password');
        if (password.type == 'text') {
          password.type = 'password';
        } else {
          password.type = 'text';
        }
      }

      function re_eyepassword() {
        let password = document.getElementById('re_password');
        if (password.type == 'text') {
          password.type = 'password';
        } else {
          password.type = 'text';
        }
      }

      function new_eyepassword() {
        let password = document.getElementById('new_password');
        if (password.type == 'text') {
          password.type = 'password';
        } else {
          password.type = 'text';
        }
      }

      function old_eyepassword() {
        let password = document.getElementById('old_password');
        if (password.type == 'text') {
          password.type = 'password';
        } else {
          password.type = 'text';
        }
      }
    </script>
    <div id="backtop">
      <i class="bi bi-arrow-up-short"></i>
    </div>
    </body>

    </html>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function() {
        $(window).scroll(function() {
          if ($(this).scrollTop()) {
            $('#backtop').fadeIn();
          } else {
            $('#backtop').fadeOut()
          }
        });
        $("#backtop").click(function() {
          $('html, body').animate({
            scrollTop: 0
          }, 1000);
        });
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php

    // unset($_SESSION['success']);
    // unset($_SESSION['error']);
  }
}

?>