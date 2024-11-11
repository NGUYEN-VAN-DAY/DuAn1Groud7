<?php

namespace App\Views\Client\Layouts;

use App\Views\BaseView;

class Footer extends BaseView
{
  public static function render($data = null)
  {
?>
    <section class="info_section  layout_padding2-top footer_client">
      <div class="social_container">
        <div class="social_box">
          <a href="">
            <i class="bi bi-bicebook" aria-hidden="true"></i>
          </a>
          <a href="">
            <i class="bi bi-twitter" aria-hidden="true"></i>
          </a>
          <a href="">
            <i class="bi bi-instagram" aria-hidden="true"></i>
          </a>
          <a href="">
            <i class="bi bi-youtube" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <div class="info_container ">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-lg-3">
              <h6>
                GIỚI THIỆU
              </h6>
              <p>
              Chào mừng bạn đến với cửa hàng trái cây tươi của chúng tôi! Nơi bạn sẽ tìm thấy những loại trái cây tươi ngon, an toàn và giàu dinh dưỡng mỗi ngày. Hãy cùng tận hưởng hương vị tươi mát từ thiên nhiên nhé!            </div>
            <div class="col-md-6 col-lg-3">
              <h6>
                Hỗ trợ khách hàng
              </h6>
              <p>
                Chính sách đổi trả<br>
                Chính sách bảo hành <br>
                Hướng dẫn mua hàng <br>
                Câu hỏi thường gặp (FAQ)
              </p>
            </div>
            <div class="col-md-6 col-lg-3">
              <h6>
                Liện hệ với chung tôi
              </h6>
              <div class="info_link-box">
                <a href="">
                  <i class="bi bi-geo-alt-fill" aria-hidden="true"></i>
                  <span>Cái Răng, Cần Thơ</span>
                </a>
                <a href="">
                  <i class="bi bi-phone" aria-hidden="true"></i>
                  <span>+84 0966729444</span>
                </a>
                <a href="">
                  <i class="bi bi-envelope" aria-hidden="true"></i>
                  <span>nhutnlmpc08486@gmail.com</span>
                </a>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="info_form ">
                <div class="fb-page" data-href="https://www.facebook.com/pods.vn?mibextid=ZbWKwL" data-tabs="timeline" data-width="" data-height="20" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                  <blockquote cite="https://www.facebook.com/pods.vn?mibextid=ZbWKwL" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/pods.vn?mibextid=ZbWKwL">Shop Quần Áo Nam</a></blockquote>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- footer section -->
      <footer class=" footer_section">
        <div class="container">
          <p>
            &copy; <span id="displayYear"></span> PC08486 Nguyễn Lương Minh Nhựt
          </p>
        </div>
      </footer>
      <!-- footer section -->

    </section>

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
    
<?php


    // unset($_SESSION['success']);
    // unset($_SESSION['error']);
  }
}

?>
