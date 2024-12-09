<?php

namespace App\Views\Admin\Pages\User;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ NGƯỜI DÙNG</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách tài khoản</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Danh sách tài khoản</h5>
                                <form action="/admin/users/seach" method="get">
                                    <input type="hidden" name="method" value="GET">

                                    <div class="input-group w-100 mx-auto d-flex mb-3">
                                        <input type="search" class="form-control " name="query" id="query" placeholder="TÌM KIẾM" aria-describedby="search-icon-1" onchange="this.form.submit()">
                                        <span id="search-icon-1" class="input-group-text p-2"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Search_Icon.svg/20px-Search_Icon.svg.png" alt=""></span>
                                    </div>
                                </form>
                                <?php
                                if (count($data)) :
                                ?>
                                    <div class="table-responsive">
                                        <table id="" class="table table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Ảnh đại diện</th>
                                                    <th>Tên đăng nhập</th>
                                                    <th>Email</th>
                                                    <th>Địa chỉ</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Quyền</th>
                                                    <th>Trạng thái</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($data as $item) :
                                                ?>
                                                    <tr>
                                                        <td><?= $item['id'] ?></td>
                                                        <td>
                                                            <img class="avatar_user" src="<?= APP_URL ?>/public/uploads/users/<?= $item['avatar'] ?>" alt="" width="100px">
                                                        </td>
                                                        <td><?= $item['username'] ?></td>
                                                        <td><?= $item['email'] ?></td>
                                                        <td><?= $item['address'] ?></td>
                                                        <td><?= $item['phone'] ?></td>
                                                        <td><?= ($item['role'] == 1) ? 'Quản trị' : 'Khách hàng' ?></td>
                                                        <td><?= ($item['status'] == 1) ? 'Hoạt động' : 'Đã khóa' ?></td>
                                                        <td>
                                                            <a href="/admin/users/<?= $item['id'] ?>" class="btn btn-primary ">Sửa</a>
                                                            <?php
                                                            if ($_SESSION['user']['id'] != $item['id']):
                                                            ?>
                                                                <form action="/admin/users/<?= $item['id'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Bạn chắc chưa?')">
                                                                    <input type="hidden" name="method" value="DELETE" id="">
                                                                    <button type="submit" class="btn btn-danger text-white">Xoá</button>
                                                                </form>
                                                            <?php
                                                            endif;
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                endforeach;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php
                                else :
                                ?>
                                    <h4 class="text-center text-danger">Chưa có dữ liệu</h4>
                                <?php
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->


    <?php
    }
}
