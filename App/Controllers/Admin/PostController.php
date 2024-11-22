<?php

namespace App\Controllers\Admin;

use App\Views\Admin\Pages\Post\index;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;

class PostController
{
    public static function index()
    {
        Header::render();
        index::render();
        Footer::render();
    }
}
