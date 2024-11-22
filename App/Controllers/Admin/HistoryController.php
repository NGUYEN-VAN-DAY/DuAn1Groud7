<?php

namespace App\Controllers\Admin;

use App\Views\Admin\Pages\History\index;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;

class HistoryController
{
    public static function index()
    {
        Header::render();
        index::render();
        Footer::render();
    }
}
