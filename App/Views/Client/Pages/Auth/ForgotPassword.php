<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ForgotPassword extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="container mt-5">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="card card-body">
                        <h3 class="text-center text-muted" style="font-weight:bold; font-size:40px;">Khôi phục mật khẩu</h3>
                        <form action="/forgot-password" method="post">
                            <input type="hidden" name="method" value="POST">
                            <div class="form-group mt-4">
                                <label for="username">Tên đăng nhập......*</label>
                                <input type="text" class="form-control" id="username" placeholder="Nhập tên đăng nhập.........." name="username">
                            </div>
                            <div class="form-group mt-4 --">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Nhập email......." name="email">
                            </div>
                            <button type="reset" class="btn btn-outline-danger">nhập lại</button>
                            <button type="submit" class="btn btn-outline-info">Lấy lại mật khẩu</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php

    }
}