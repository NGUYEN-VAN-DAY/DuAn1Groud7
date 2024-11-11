<?php

namespace App\Controllers\Admin;

use App\Views\Admin\Home;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;

class HomeController
{
    public static function index()
    {
        Header::render();
        Home::render();
        Footer::render();
    }
}
