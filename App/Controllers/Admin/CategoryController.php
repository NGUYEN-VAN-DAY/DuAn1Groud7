<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Validations\CategoryValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Category\Create;
use App\Views\Admin\Pages\Category\Edit;
use App\Views\Admin\Pages\Category\Index;

class CategoryController
{
    public static function index()
    {
        $category = new Category();
        $data = $category->getAllCategory();
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Index::render($data);
        Footer::render();
    }
    public static function create()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Create::render();
        Footer::render();
    }
    public static function store()
    {
        $is_valid = CategoryValidation::create();
        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm thất bại');
            header('location: /admin/categories/create');
            exit;
        }
        $name = $_POST['name'];
        $status = $_POST['status'];
        $category = new Category();
        $is_exist = $category->getOneCategoryByName($name);
        if ($is_exist) {
            NotificationHelper::error('store', 'Tên loại đã tồn tại');
            header('location: /admin/categories/create');
            exit;
        }
        $data = [
            'name' => $name,
            'status' => $status
        ];
        $result = $category->createCategory($data);
        if ($result) {
            NotificationHelper::success('store', 'Thêm thành công');
            header('location: /admin/categories');
        } else {
            NotificationHelper::error('store', 'Thêm thất bại');
            header('location: /admin/categories/create');
        }
    }
    public static function show() {}
    public static function edit(int $id)
    {
        $category = new Category();
        $data = $category->getOneCategory($id);
        if (!$data) {
            NotificationHelper::error('edit', 'Không thể xem');
            header('location: /admin/categories');
            exit;
        }
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Edit::render($data);
        Footer::render();
    }
    public static function update(int $id)
    {
        $is_valid = CategoryValidation::edit();
        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật thất bại');
            header("location: /admin/categories/$id");
            exit;
        }
        $name = $_POST['name'];
        $status = $_POST['status'];
        $category = new Category();
        $is_exist = $category->getOneCategoryByName($name);
        if ($is_exist) {
            if ($is_exist['id'] != $id) {
                NotificationHelper::error('update', 'Tên loại sản phẩm đã tồn tại');
                header("location: /admin/categories/$id");
                exit;
            }
        }
        $data = [
            'name' => $name,
            'status' => $status
        ];
        $result = $category->updateCategory($id, $data);
        if ($result) {
            NotificationHelper::success('update', 'cập nhật thành công');
            header('location: /admin/categories');
        } else {
            NotificationHelper::error('update', 'Cập nhật thất bại');
            header("location: /admin/categories/$id");
        }
    }
    public static function delete(int $id)
    {
        $category = new Category();
        $result = $category->deleteCategory($id);
        if ($result) {
            NotificationHelper::success('delete', 'Xóa thành công');
        } else {
            NotificationHelper::error('delete', 'Xóa thất bại');
        }
        header('location: /admin/categories');
    }
}
