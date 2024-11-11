<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Product;
use App\Validations\ProductValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Product\Create;
use App\Views\Admin\Pages\Product\Index;
use App\Views\Admin\Pages\Product\Edit;

class ProductController
{
    public static function index()
    {
        $product = new Product();
        $data = $product->getAllProductJoinCategory();
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }
    public static function create()
    {
        $category = new Category();
        $data = $category->getAllCategory();
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Create::render($data);
        Footer::render();
    }
    public static function store()
    {
        $is_valid = ProductValidation::create();
        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm thất bại');
            header('location: /admin/products/create');
            exit;
        }
        $name = $_POST['name'];
        $product = new Product();
        $is_exist = $product->getOneProductByName($name);
        if ($is_exist) {
            NotificationHelper::error('store', 'Tên sản phẩm đã tồn tại');
            header('location: /admin/products/create');
            exit;
        }
        $data = [
            'name' => $name,
            'price' => $_POST['price'],
            'discount_price' => $_POST['discount_price'],
            'is_feature' => $_POST['is_feature'],
            'status' => $_POST['status'],
            'category_id' => $_POST['category_id'],
            'description' => $_POST['description'],
            'logDescription' => $_POST['logDescription'],

        ];
        $is_upload = ProductValidation::uploadImage();
        if ($is_upload) {
            $data['image'] = $is_upload;
        }
        $result = $product->createProduct($data);
        if ($result) {
            NotificationHelper::success('store', 'Thêm thành công');
            header('location: /admin/products');
        } else {
            NotificationHelper::error('store', 'Thêm thất bại');
            header('location: /admin/products/create');
        }
    }
    public static function show() {}
    public static function edit(int $id)
    {
        $product = new Product();
        $data_product = $product->getOneProduct($id);
        $category = new Category();
        $data_category = $category->getAllCategory();
        if (!$data_product) {
            NotificationHelper::error('edit', 'Không thể xem ');
            header('location: /admin/products');
            exit;
        }
        $data = [
            'product' => $data_product,
            'category' => $data_category
        ];
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Edit::render($data);
        Footer::render();
    }
    public static function update(int $id)
    {
        $is_valid = ProductValidation::edit();

        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật thất bại');
            header("location: /admin/products/$id");
            exit;
        }
        $name = $_POST['name'];
        $product = new Product();
        $is_exist = $product->getOneProductByName($name);

        if ($is_exist) {
            if ($is_exist['id'] != $id) {
                NotificationHelper::error('update', 'Tên đã tồn tại');
                header("location: /admin/products/$id");
                exit;
            }
        }
        $data = [
            'name' => $name,
            'price' => $_POST['price'],
            'discount_price' => $_POST['discount_price'],
            'is_feature' => $_POST['is_feature'],
            'status' => $_POST['status'],
            'category_id' => $_POST['category_id'],
            'description' => $_POST['description'],
            'logDescription' => $_POST['logDescription']

        ];

        $is_upload = ProductValidation::uploadImage();
        if ($is_upload) {
            $data['image'] = $is_upload;
        }
        $result = $product->updateProduct($id, $data);
        if ($result) {
            NotificationHelper::success('update', 'cập nhật thành công');
            header('location: /admin/products');
        } else {
            NotificationHelper::error('update', 'Cập nhật thất bại');
            header("location: /admin/products/$id");
        }
    }
    public static function delete(int $id)
    {
        $product = new Product();
        $result = $product->deleteProduct($id);
        if ($result) {
            NotificationHelper::success('delete', 'Xóa thành công');
        } else {
            NotificationHelper::error('delete', 'Xóa thất bại');
        }
        header('location: /admin/products');
    }
}
