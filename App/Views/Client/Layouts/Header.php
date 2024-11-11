<?php

namespace App\Views\Client\Layouts;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Header extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checkLogin();
        // var_dump($is_login);

?>
        <!DOCTYPE html>
        <html>

        <head>
            <!-- Basic -->
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <!-- Mobile Metas -->
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <!-- Site Metas -->
            <meta name="keywords" content="" />
            <meta name="description" content="" />
            <meta name="author" content="" />
            <link rel="shortcut icon" href="images/bivicon.png" type="image/x-icon">

            <title>
                Giftos
            </title>

            <!-- slider stylesheet -->
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

            <!-- bootstrap core css -->
            <link rel="stylesheet" type="text/css" href="public/assets/client/css/bootstrap.css" />

            <!-- Custom styles for this template -->
            <link href="public/assets/client/css/style.css" rel="stylesheet" />
            <link href="public/assets/client/css/style copy.css" rel="stylesheet" />
            <link href="public/assets/client/css/input.css" rel="stylesheet" />
            <link href="public/assets/client/css/gioithieu" rel="stylesheet" />

            <!-- responsive style -->
            <link href="public/assets/client/css/responsive.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <link rel="stylesheet" href="<?= APP_URL ?>/public/assets/client/css/style.css">
        </head>

        <body>
            <div class="hero_area">
                <!-- header section strats -->
                <header class="header_section">
                    <nav class="navbar navbar-expand-lg custom_nav-container ">
                        <a class="navbar-brand" href="index.html">
                            <span>
                                NN SHOP
                            </span>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="bilse" aria-label="Toggle navigation">
                            <span class=""></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav  ">
                                <li class="nav-item ">
                                    <a class="nav-link" href="/">Trang chủ <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="/introduce">Giới thiệu
                                    </a>
                                </li><li class="nav-item ">
                                    <a class="nav-link" href="/products">Sản phẩm
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Liên hệ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link bi bi-cart2" href="#"> Giỏ hàng
                                    </a>
                                </li>
                                <div class="user_option">
                                    <?php
                                    if ($is_login) :
                                    ?>
                                        <li class="nav-item">
                                            <div class="dropdown">
                                                <a class="btn btn dropdown-toggle nav-link bi bi-person-lines-fill" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="bilse">
                                                    Tài khoản
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item bi bi-person-fill" href="/users/<?= $_SESSION['user']['id'] ?>"> <?= $_SESSION['user']['username'] ?></a>
                                                    <a class="dropdown-item bi bi-pencil-square" href="/change-password"> Đổi mật khẩu</a>
                                                    <a class="dropdown-item bi bi-box-arrow-right" href="/logout"> Đăng xuất</a>
                                                </div>
                                            </div>

                                        </li>

                                    <?php
                                    else :
                                    ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/login">Đăng nhập</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/register">Đăng ký</a>
                                        </li>

                                    <?php
                                    endif;
                                    ?>
                                    </span>
                                    </a>
                                </div>
                        </div>
                        </ul>
                    </nav>
                </header>







        <?php

    }
}

        ?>