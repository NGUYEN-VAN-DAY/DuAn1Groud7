<?php

namespace App\Views\Client\Pages\Contact;

use App\Views\BaseView;

class Index extends BaseView
{
  public static function render($data = null)
  {



?>

    <!-- contact section -->

    <!-- <section class="contact_section layout_padding">
      <div class="container px-0">
        <div class="heading_container ">
          <h2 class="">
            Liên hệ 
          </h2>
        </div>
      </div>
      <div class="container container-bg">
        <div class="row">
          <div class="col-lg-7 col-md-6 px-0">
            <div class="map_container">
              <div class="map-responsive">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d251454.373366061!2d105.46308079453124!3d10.018955899999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a08b0049875e9d%3A0x2bbfd7253fd97618!2zSG9hIFTGsMahaSwgVHLDoWkgQ8OieSBOaOG6rXAgS2jhuql1IFRoacOqbiBUcmFuZw!5e0!3m2!1svi!2s!4v1730825745808!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 px-0">
            <form action="#">
              <div>
                <input type="text" placeholder="Họ tên" />
              </div>
              <div>
                <input type="email" placeholder="Email" />
              </div>
              <div>
                <input type="text" placeholder="Số điện thoại" />
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Nội dung" />
              </div>
              <div class="d-flex ">
                <button>
                  Gửi
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section> -->
    <section class="contact_section layout_padding">
      <div class="container px-0">
        <div class="heading_container ">
          <h2 class="">
            Liên hệ 
          </h2>
        </div>
      </div>
      <div class="container container-bg">
        <div class="row">
          <div class="col-lg-7 col-md-6 px-0">
            <div class="map_container">
              <div class="map-responsive">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d251454.373366061!2d105.46308079453124!3d10.018955899999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a08b0049875e9d%3A0x2bbfd7253fd97618!2zSG9hIFTGsMahaSwgVHLDoWkgQ8OieSBOaOG6rXAgS2jhuql1IFRoacOqbiBUcmFuZw!5e0!3m2!1svi!2s!4v1730825745808!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 px-0">
            <form action="#">
              <div>
                <input type="text" placeholder="Họ tên" />
              </div>
              <div>
                <input type="email" placeholder="Email" />
              </div>
              <div>
                <input type="text" placeholder="Số điện thoại" />
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Nội dung" />
              </div>
              <div class="d-flex ">
                <button>
                  Gửi
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- end contact section -->

    <!-- info section -->

    

    <!-- end info section -->


    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script src="js/custom.js"></script>

    </body>

    </html>

<?php
  }
}
