<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null): void
    {
?>
        <div class="container mt-5">

            <h2 class="text-center"> Thông tin tài khoản</h2>
            <div class="row justify-content-center">
                <div class="col-md-7 ">
                    <div class="card card-body">
                        <form action="/users/<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="method" value="PUT">
                            <div class="offset" style="display: flex">
                                <?php

                                if ($data && $data['avatar']):
                                ?>
                                    <img class="avatar_user " src="<?= APP_URL ?>/public/uploads/users/<?= $data['avatar'] ?>" width="150px" height="150px" style="margin: auto; border-radius: 50%; " alt="">
                                <?php
                                else :
                                ?>
                                    <img src="<?= APP_URL ?>/public/uploads/users/20241115121158.jpg" width="150px" height="150px" style="margin: auto; border-radius: 50%; " alt="avatar">
                                <?php
                                endif;
                                ?>

                            </div>
                            <div class="form-group">
                                <label for="username">Tên đăng nhập*</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= $data['username'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input type="text" class="form-control" id="email" placeholder="Nhập email" name="email" value="<?= $data['email'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="avatar">Ảnh đại diện</label>
                                <input type="file" class="form-control" id="avatar" placeholder="Chọn ảnh đại diện" name="avatar">
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="tel" class="form-control" id="phone" placeholder="Nhập số điện thoại" name="phone" value="<?= $data['phone'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ" name="address" value="<?= $data['address'] ?>">
                            </div>
                            <button type="reset" class="btn btn-outline-danger mb-3">nhập lại</button>
                            <button type="submit" class="btn btn-outline-info mb-3">Cập nhật</button>
                            <br>
                            <a href="/change-password" class="text-danger">Đổi mật khẩu</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php

    }
}
