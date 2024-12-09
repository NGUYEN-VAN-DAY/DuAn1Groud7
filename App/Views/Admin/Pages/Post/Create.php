<?php

namespace App\Views\Admin\Pages\Post;

use App\Views\BaseView;

class Create extends BaseView
{
    public static function render($data = null)
    {
?>

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ LOẠI BÀI VIẾT</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thêm loại bài viết</li>
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
            <!-- ============================================================== -------->
            <div class="container-fluid">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form class="form-horizontal" action="/admin/posts" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <h4 class="card-title">Thêm bài viết</h4>
                                         <input type="hidden" name="method" value="POST">

                                        <div class="form-group">
                                            <label for="title">Tiêu đề*</label>
                                            <input type="text" class="form-control" id="title" placeholder="Nhập tiêu đề" name="title">
                                        </div>

                                        <div class="form-group">
                                            <label for="content">Nội dung*</label>
                                            <textarea class="form-control" id="content" placeholder="Nhập nội dung" name="content" rows="5"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="image">Hình ảnh</label>
                                            <input type="file" class="form-control" id="image" placeholder="Chọn hình ảnh" name="image">
                                        </div>
                                        <div class="form-group">
                                        <label for="status">Trạng thái*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status">
                                            <option value="" selected disabled>Vui lòng chọn</option>
                                            <option value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                        </select>
                                    </div>
                                    </div>

                                    <div class="border-top">
                                        <div class="card-body">
                                            <button type="reset" class="btn btn-danger text-white">Làm lại</button>
                                            <button type="submit" class="btn btn-primary">Thêm</button>
                                        </div>
                                    </div>
                                </form>



                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->

        <?php
    }
}
