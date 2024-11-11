<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null): void
    {
?>
        <div class="container mt-5">

            <h2 class="text-center"> Thông tin chi tiết</h2>
            <div class="row">
                <div class="offset-md-1 col-md-3">
                    <p class="text-center" style="font-size: 23px;"> Ảnh đại diện </p>

                    <?php

                    if ($data && $data['avatar']):
                    ?>
                        <img class="avatar_user" src="<?= APP_URL ?>/public/uploads/users/<?= $data['avatar'] ?>" width="100%" alt="">
                    <?php
                    else :
                    ?>
                        <img src="<?= APP_URL ?>/public/uploads/users/avatars.jpg" width="100%" alt="">

                    <?php
                    endif;
                    ?>
                </div>
                <div class="col-md-7">
                    <div class="card card-body">
                        <h3 class="text-centers">Thông tin tài khoản</h3>
                        <form action="/users/<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="method" value="PUT">

                            <div class="form-group">
                                <label for="username">Tên đăng nhập*</label>
                                <input type="text" class="form-control" id="username" placeholder="Nhập tên đăng nhập..." name="username" value="<?= $data['username'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input type="text" class="form-control" id="email" placeholder="Nhập email" name="email" value="<?= $data['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Họ và tên*</label>
                                <input type="text" class="form-control" id="name" placeholder="Họ và tên" name="name" value="<?= $data['name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="avatar">Ảnh đại diện</label>
                                <input type="file" class="form-control" id="avatar" placeholder="Chọn ảnh đại diện" name="avatar">
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
