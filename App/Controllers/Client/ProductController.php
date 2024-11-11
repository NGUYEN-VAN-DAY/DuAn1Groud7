<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Product;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Views\Client\Pages\Product\Detail;
use App\Views\Client\Pages\Product\Index;

class ProductController
{
    public static function index()
    {
        $product = new Product();
        $data['products'] = $product->getAllProductByStatus();
        $category = new Category();
        $data['categories'] = $category->getAllCategoryByStatus();
        Header::render();
        Index::render($data);
        Footer::render();
    }
    public static function detail($id): void
    {
        $product = new Product();
        $data['product'] = $product->getOneProductByStatus($id);
        $data['is_login'] = AuthHelper::checkLogin();
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Detail::render($data);
        Footer::render();
    }
    public static function getProductByCategory($id): void
    {
        $product = new Product();
        $data['products'] = $product->getAllProductByCategoryAndStatus($id);
        $category = new Category();
        $data['categories'] = $category->getAllCategoryByStatus();
        Header::render();
        ProductCategory::render($data);
        Footer::render();
    }
}
