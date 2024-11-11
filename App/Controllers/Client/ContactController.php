<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Contact\index;

class ContactController
{
    public static function index()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        index::render();
        Footer::render();
    }
}
