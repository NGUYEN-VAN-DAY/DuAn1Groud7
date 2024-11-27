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
                Cửa hàng trái cây
            </title>

            <!-- slider stylesheet -->
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

            <!-- bootstrap core css -->
            <link rel="stylesheet" type="text/css" href="public/assets/client/css/bootstrap.css" />

            <!-- Custom styles for this template -->
            <link href="public/assets/client/css/style.css" rel="stylesheet" />
            <link href="public/assets/client/css/style copy.css" rel="stylesheet" />
            <link href="public/assets/client/css/input.css" rel="stylesheet" />
            <link rel="stylesheet" href="public/assets/client/css/gioithieu.css">
            <!-- responsive style -->
            <link href="public/assets/client/css/responsive.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <link rel="stylesheet" href="<?= APP_URL ?>/public/assets/client/css/style.css">
            <link href="//maps.googleapis.com" rel="dns-prefetch">
            <link href="//maps.gstatic.com/" rel="dns-prefetch">
            <link href="//www.facebook.com" rel="dns-prefetch">
            <link href="//plus.google.com" rel="dns-prefetch">
            <link href="//csi.gstatic.com" rel="dns-prefetch">
            <link href="//www.youtube.com" rel="dns-prefetch">
            <link href="//feedburner.google.com" rel="dns-prefetch">
            <link href="//scontent.fsgn3-1.fna.fbcdn.net" rel="dns-prefetch">
            <link href="//googleads.g.doubleclick.net" rel="dns-prefetch">
            <link href="//static.doubleclick.net" rel="dns-prefetch">
            <link href="//apis.google.com" rel="dns-prefetch">
            <link href="//maps.google.com" rel="dns-prefetch">
            <link href="//connect.facebook.net" rel="dns-prefetch">
            <link href="//www.google-analytics.com" rel="dns-prefetch">
            <link href="//www.googletagmanager.com/" rel="dns-prefetch">
            <link rel="schema.DC" href="//purl.org/dc/elements/1.1/">
            <link href="css/reset.css" type="text/css" rel="stylesheet">
            <link href="css/css.css" type="text/css" rel="stylesheet">
            <link href="css/default.css" type="text/css" rel="stylesheet">
            <link href="css/slick.css" type="text/css" rel="stylesheet">
            <link href="css/slick-theme.css" type="text/css" rel="stylesheet">
            <link href="font-awesome-4.6.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
            <link href="bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
            <link rel="stylesheet" href="css/jquery.simplyscroll.css" media="all" type="text/css">
            <link href="css/LobiBox.min.css" type="text/css" rel="stylesheet">
            <link href="css/nprogress.css" type="text/css" rel="stylesheet">
            <link href="style.css?v=1731303970" type="text/css" rel="stylesheet">
            <meta name="google-site-verification" content="googled84dfd607262956f.html">
        </head>

        <body>
            <div class="banner">
                <div class="banner-content">
                    <span>Ưu đãi lên đến 30% cho tất cả sản phẩm mùa hè!</span>
                    <span>Mua 2 tặng 1 cho mọi loại trái cây!</span>
                    <span>Freeship toàn quốc cho đơn hàng từ 300,000 VNĐ!</span>
                </div>
            </div>
            <div class="hero_area">
                <!-- header section strats -->
                <header class="header_section">
                    <nav class="navbar navbar-expand-lg custom_nav-container ">

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
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="/products">Sản phẩm
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/contact">Liên hệ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/post">Bài viết</a>
                                </li>

                                <div class="user_option" style="z-index: 100000000000;">
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
                                <li class="nav-item">
                                    <a class="nav-link bi bi-cart2" href="#">
                                    </a>
                                </li>
                        </div>

                        </ul>
                    </nav>
                </header>







        <?php

    }
}

        ?>