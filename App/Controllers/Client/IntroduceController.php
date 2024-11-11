<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Introduce;

class IntroduceController
{
    public static function index(): void
    {
        Header::render();
        
        Notification::render();

        NotificationHelper::unset();


        Footer::render();
    }
}
