<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ChangePassword extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="container mt-5">
            <div class="row">
                <div class="offset-md-1 col-md-3">
                    <?php
                    if ($data && $data['avatar']):
                    ?>
                        <img src="<?= APP_URL ?>/public/uploads/users/<?= $data['avatar'] ?>" width="100%" alt="">
                    <?php
                    else :
                    ?>
                        <img src="<?= APP_URL ?>/public/uploads/users/use4.jpg" width="100%" alt="">

                    <?php
                    endif;
                    ?>
                </div>
                <div class="col-md-7">
                    <div class="card card-body">
                        <h3 class="text-center">Đổi mật Khẩu</h3>
                        <form action="/change-password" method="post">
                            <input type="hidden" name="method" value="PUT">

                            <div class="form-group">
                                <label for="username">Tên đăng nhập*</label>
                                <input type="text" class="form-control" id="username" placeholder="Nhập tên đăng nhập..." name="username" disabled value="<?= $data['username'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="old_password">Mật Khẩu cũ*</label>
                                <input type="password" class="form-control" id="old_password" onclick="old_eyepassword()" placeholder="Nhập mật khẩu cũ" name="old_password">
                            </div>
                            <div class="form-group">
                                <label for="new_password">Mật Khẩu mới*</label>
                                <input type="password" class="form-control" id="new_password" onclick="new_eyepassword()" placeholder="Nhập mật khẩu mới" name="new_password">
                            </div>
                            <div class="form-group">
                                <label for="re_password">nhập lại mật khẩu mới*</label>
                                <input type="password" class="form-control" id="re_password" onclick="re_eyepassword()" placeholder="Nhập lại mật khẩu mới" name="re_password">
                            </div>
                            <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
                            <button type="submit" class="btn btn-outline-info">Đổi mật Khẩu</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php

    }
}
