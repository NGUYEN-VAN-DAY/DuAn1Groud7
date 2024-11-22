<?php

namespace App\Controllers\Admin;

use App\Views\Admin\Pages\Comment\index;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;

class CommentController
{
    public static function index()
    {
        Header::render();
        index::render();
        Footer::render();
    }
}
